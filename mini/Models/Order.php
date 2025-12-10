<?php

namespace Mini\Models;

use Mini\Core\Database;
use PDO;
use Exception;

class Order
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = Database::getPDO();
    }

   
    public function create(int $userId, float $total, array $cartItems)
    {
        try {
            // 1. Démarrer la transaction
            $this->pdo->beginTransaction();

            // 2. Insérer la commande
            $sql = "INSERT INTO commande (utilisateur_id, total, date, statut) 
                    VALUES (:uid, :total, NOW(), 'en_attente')";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute(['uid' => $userId, 'total' => $total]);

            $commandeId = $this->pdo->lastInsertId();

            // 3. Préparer les requêtes pour les lignes ET la mise à jour du stock
            $sqlItem = "INSERT INTO order_item (commande_id, produit_id, quantite, prix_unitaire) 
                        VALUES (:cid, :pid, :qty, :prix)";
            $stmtItem = $this->pdo->prepare($sqlItem);

            $sqlStock = "UPDATE produit SET stock = stock - :qty WHERE id = :pid";
            $stmtStock = $this->pdo->prepare($sqlStock);

            foreach ($cartItems as $item) {
                $stmtItem->execute([
                    'cid' => $commandeId,
                    'pid' => $item['product']['id'],
                    'qty' => $item['qty'],
                    'prix' => $item['product']['prix']
                ]);

                // B. --- GESTION STOCK : Décrémenter la quantité ---
                $stmtStock->execute([
                    'qty' => $item['qty'],
                    'pid' => $item['product']['id']
                ]);
            }

            // 4. Valider la transaction
            $this->pdo->commit();
            return $commandeId;

        } catch (Exception $e) {
            $this->pdo->rollBack();
            return false;
        }
    }
    // Récupère l'historique des commandes d'un utilisateur

    public function findAllByUserId(int $userId): array
    {
        $sql = "SELECT * FROM commande WHERE utilisateur_id = :uid ORDER BY date DESC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['uid' => $userId]);
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}