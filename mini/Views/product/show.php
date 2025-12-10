<div style="margin-top: 20px;">
    <a href="./" style="text-decoration: none; color: #666;">&larr; Retour à la boutique</a>
</div>

<div class="product-detail" style="display: flex; gap: 40px; margin-top: 20px; border: 1px solid #ddd; padding: 30px; border-radius: 8px; background: #fff;">
    
    <div style="flex: 1;">
        <img src="https://via.placeholder.com/400" alt="Image produit" style="width: 100%; border-radius: 8px;">
    </div>

    <div style="flex: 1;">
        <h1 style="margin-top: 0;"><?= htmlspecialchars($product['nom']) ?></h1>
        
        <p style="font-size: 1.5em; color: #28a745; font-weight: bold;">
            <?= number_format((float)$product['prix'], 2) ?> €
        </p>

        <p style="line-height: 1.6; color: #555;">
            <?= nl2br(htmlspecialchars($product['description'] ?? 'Aucune description.')) ?>
        </p>

        <hr style="border: 0; border-top: 1px solid #eee; margin: 20px 0;">

        <?php if ($product['stock'] > 0): ?>
            <p style="color: green;">✅ En stock (<?= $product['stock'] ?> disponibles)</p>
            
            <form action="cart/add" method="POST" style="margin-top: 20px;">
                <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                
                <label for="qty">Quantité :</label>
                <input type="number" id="qty" name="quantity" value="1" min="1" max="<?= $product['stock'] ?>" style="width: 60px; padding: 5px;">
                
                <button type="submit" style="background-color: #007bff; color: white; padding: 8px 20px; border: none; border-radius: 4px; cursor: pointer; margin-left: 10px;">
                    Ajouter au panier 🛒
                </button>
            </form>

        <?php else: ?>
            <p style="color: red; font-weight: bold;">❌ Rupture de stock</p>
        <?php endif; ?>

        <div style="margin-top: 20px; font-size: 0.9em; color: #888;">
            Catégorie : Informatique (ID: <?= $product['categorie_id'] ?>)
        </div>
    </div>
</div>