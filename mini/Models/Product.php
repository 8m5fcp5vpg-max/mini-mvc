<?php

namespace Mini\Models;

use Mini\Core\Database;
use PDO;

class Product
{
    private $pdo;

    public function __construct()
    {
        // On récupère ton instance PDO via le Singleton
        $this->pdo = Database::getPDO();
    }

    // Récupère les produits avec des filtres optionnels
    
    public function findAll(?int $categoryId = null, ?float $minPrice = null, ?float $maxPrice = null)
    {
        $sql = "SELECT * FROM produit WHERE 1=1"; 
        $params = [];

        // Filtre par catégorie
        if ($categoryId) {
            $sql .= " AND categorie_id = :cat_id";
            $params['cat_id'] = $categoryId;
        }

        // Filtre minimum
        if ($minPrice) {
            $sql .= " AND prix >= :min_price";
            $params['min_price'] = $minPrice;
        }

        // Filtre maximum
        if ($maxPrice) {
            $sql .= " AND prix <= :max_price";
            $params['max_price'] = $maxPrice;
        }

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Récupère un produit par son ID
     * @param int $id
     * @return array|false
     */
    public function find(int $id)
    {
        $sql = "SELECT * FROM produit WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}