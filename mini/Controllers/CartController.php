<?php

declare(strict_types=1);

namespace Mini\Controllers;

use Mini\Core\Controller;
use Mini\Models\Product;

class CartController extends Controller
{
    // AJOUTER AU PANIER

    public function add(): void
    {
        // On récupère les données du formulaire (POST)
        $productId = filter_input(INPUT_POST, 'product_id', FILTER_VALIDATE_INT);
        $quantity = filter_input(INPUT_POST, 'quantity', FILTER_VALIDATE_INT);

        // Validation
        if (!$productId || !$quantity || $quantity < 1) {
            die("Erreur : Produit ou quantité invalide.");
        }

        // Initialiser le panier s'il n'existe pas encore
        if (!isset($_SESSION['panier'])) {
            $_SESSION['panier'] = [];
        }

        // Ajouter le produit
        if (isset($_SESSION['panier'][$productId])) {
            $_SESSION['panier'][$productId] += $quantity;
        } else {
            // Sinon, on le crée
            $_SESSION['panier'][$productId] = $quantity;
        }

        // Redirection vers la page panier
        header('Location: ../cart');
        exit;
    }

    // AFFICHE LE PANIER
    public function index(): void
    {
        $panierDetails = [];
        $totalGeneral = 0;

        // Si le panier n'est pas vide, on récupère les infos des produits en BDD
        if (!empty($_SESSION['panier'])) {
            $productModel = new Product();

            foreach ($_SESSION['panier'] as $id => $qty) {
                $product = $productModel->find($id);
                
                // Si le produit existe bien en BDD
                if ($product) {
                    // calcule le prix total pour cette ligne
                    $totalLigne = $product['prix'] * $qty;
                    $totalGeneral += $totalLigne;

                    // prépare les données pour la vue
                    $panierDetails[] = [
                        'product' => $product,
                        'qty' => $qty,
                        'total' => $totalLigne
                    ];
                }
            }
        }

        // Et envoie tout à la vue
        $this->render('cart/index', [
            'title' => 'Mon Panier',
            'items' => $panierDetails,
            'totalGeneral' => $totalGeneral
        ]);
    }

    // VIDER LE PANIER
    public function clear(): void
    {
        unset($_SESSION['panier']);
        header('Location: ./cart');
        exit;
    }
}