<?php

declare(strict_types=1);

namespace Mini\Controllers;

use Mini\Core\Controller;
use Mini\Models\Product;
use Mini\Models\Category;

final class HomeController extends Controller
{
    // Affiche la page d'accueil avec la liste des produits
    public function index(): void
    {
        // On vérifie si l'utilisateur a envoyé des paramètres via l'URL
        $categoryId = filter_input(INPUT_GET, 'cat', FILTER_VALIDATE_INT);
        $minPrice   = filter_input(INPUT_GET, 'min', FILTER_VALIDATE_FLOAT);
        $maxPrice   = filter_input(INPUT_GET, 'max', FILTER_VALIDATE_FLOAT);

        // Si le champ est vide, filter_input renvoie FALSE
        // On le force à NULL pour que le modèle accepte
        if ($categoryId === false) $categoryId = null;
        if ($minPrice === false)   $minPrice = null;
        if ($maxPrice === false)   $maxPrice = null;

        // Récupérer les produits en appliquant les filtre
        // (Si les variables sont nulles, la méthode findAll renverra tout)
        $productModel = new Product();
        $products = $productModel->findAll($categoryId, $minPrice, $maxPrice);

        // Récupérer la liste des catégories pour le formulaire de filtre
        $categories = Category::findAll();

        // ENvoie à la view
        $this->render('home/index', [
            'title'      => 'Accueil - E-Shop',
            'products'   => $products,   
            'categories' => $categories, 
            
            // (Pour que l'utilisateur voie ce qu'il a cherché)
            'filters'    => [
                'cat' => $categoryId,
                'min' => $minPrice,
                'max' => $maxPrice
            ]
        ]);
    }
}