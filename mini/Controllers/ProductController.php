<?php

declare(strict_types=1);

namespace Mini\Controllers;

use Mini\Core\Controller;
use Mini\Models\Product;

class ProductController extends Controller
{
    public function show(): void
    {
        // filter_input renvoie false si l'id n'est pas valide
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        // 2. Vérification de sécurité
        if (!$id) {
            die("Erreur : ID produit manquant ou invalide.");
        }

        // 3. Récupérer le produit via le Modèle
        $productModel = new Product();
        $product = $productModel->find($id);

        // 4. Si le produit n'existe pas en BDD
        if (!$product) {
            die("Erreur : Produit introuvable.");
        }

        // 5. Afficher la vue
        $this->render('product/show', [
            'title' => $product['nom'],
            'product' => $product
        ]);
    }
}