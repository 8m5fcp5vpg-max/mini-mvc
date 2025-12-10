<?php

declare(strict_types=1);

namespace Mini\Controllers;

use Mini\Core\Controller;
use Mini\Models\Order;
use Mini\Models\Product;

class OrderController extends Controller
{
    // TRAITEMENT DE LA COMMANDE
    public function add(): void
    {
        // Sécurité -> est-ce que l'utilisateur est connecté ?
        if (!isset($_SESSION['user'])) {
            header('Location: ../login');
            exit;
        }

        // Est-ce que le panier est vide ?
        if (empty($_SESSION['panier'])) {
            header('Location: ../cart');
            exit;
        }

        // Re-calculer le total et préparer les données
        $productModel = new Product();
        $cartItems = [];
        $totalGeneral = 0;

        foreach ($_SESSION['panier'] as $id => $qty) {
            $product = $productModel->find($id);
            if ($product) {
                $totalLigne = $product['prix'] * $qty;
                $totalGeneral += $totalLigne;
                
                $cartItems[] = [
                    'product' => $product,
                    'qty' => $qty
                ];
            }
        }

        // Sauvegarder la commande avec le Modèle
        $orderModel = new Order();
        $userId = (int) $_SESSION['user']['id'];
        
        $orderId = $orderModel->create($userId, $totalGeneral, $cartItems);

        if ($orderId) {
            // SUCCÈS -> On vide le panier
            unset($_SESSION['panier']);
            
            // Et on affiche la page succès
            $this->render('order/success', [
                'title' => 'Commande validée',
                'orderId' => $orderId
            ]);
            // Sinon -> erreur
        } else {
            die("Erreur lors de l'enregistrement de la commande.");
        }
    }
    // HISTORIQUE DES COMMANDES
    public function history(): void
    {
        // Sécurité -> Il faut être connecté
        if (!isset($_SESSION['user'])) {
            header('Location: ../login');
            exit;
        }

        // Récupérer l'ID
        $userId = (int) $_SESSION['user']['id'];

        // Chercher les commandes
        $orderModel = new Order();
        $orders = $orderModel->findAllByUserId($userId);

        // Afficher la vue
        $this->render('order/history', [
            'title' => 'Mes Commandes',
            'orders' => $orders
        ]);
    }
}