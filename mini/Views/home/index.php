<div style="background-color: #f8f9fa; padding: 15px 20px; border-bottom: 1px solid #ddd; display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
    
    <div style="font-size: 1.2em; font-weight: bold;">
        <a href="./" style="text-decoration: none; color: #333;">🛒 Mon E-Shop</a>
    </div>

    <div>
        <?php if (isset($_SESSION['user'])): ?>
            <span style="color: #28a745; font-weight: bold; margin-right: 15px;">
                👋 Bonjour, <?= htmlspecialchars($_SESSION['user']['nom']) ?>
            </span>
            
            <a href="cart" style="text-decoration: none; color: #333; margin-right: 15px;">
                Mon Panier 🛒
            </a>

            <a href="orders" style="text-decoration: none; color: #333; margin-right: 15px;">
                📦 Mes Commandes
            </a>

            <a href="logout" style="text-decoration: none; color: white; background-color: #dc3545; padding: 5px 10px; border-radius: 4px;">
                Se déconnecter
            </a>

        <?php else: ?>
            <a href="login" style="text-decoration: none; color: #007bff; margin-right: 15px;">
                Se connecter
            </a>
            <a href="register" style="text-decoration: none; color: white; background-color: #28a745; padding: 5px 10px; border-radius: 4px;">
                Créer un compte
            </a>
        <?php endif; ?>
    </div>
</div>

<h1><?= $title ?? 'Boutique' ?></h1>

<div style="background: #f1f1f1; padding: 15px; border-radius: 8px; margin-bottom: 20px;">
    <form action="" method="GET" style="display: flex; gap: 20px; align-items: center; flex-wrap: wrap;">
        
        <div>
            <label>Catégorie :</label>
            <select name="cat" style="padding: 5px;">
                <option value="">Toutes</option>
                <?php foreach ($categories as $cat): ?>
                    <option value="<?= $cat['id'] ?>" <?= ($filters['cat'] == $cat['id']) ? 'selected' : '' ?>>
                        <?= htmlspecialchars($cat['nom']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div>
            <label>Prix Min :</label>
            <input type="number" name="min" value="<?= $filters['min'] ?>" style="width: 70px; padding: 5px;" placeholder="0"> €
        </div>

        <div>
            <label>Prix Max :</label>
            <input type="number" name="max" value="<?= $filters['max'] ?>" style="width: 70px; padding: 5px;" placeholder="Max"> €
        </div>

        <button type="submit" style="background: #333; color: white; border: none; padding: 6px 15px; cursor: pointer;">Filtrer</button>
        
        <a href="./" style="color: #666; text-decoration: underline; font-size: 0.9em;">Réinitialiser</a>
    </form>
</div>

<div class="container" style="display: flex; flex-wrap: wrap; gap: 20px; margin-top: 20px;">

    <?php if (empty($products)): ?>
        <p>⚠️ Aucun produit trouvé. (La table 'produits' est-elle vide ?)</p>
    <?php else: ?>
        
        <?php foreach ($products as $product): ?>
            <div class="card" style="border: 1px solid #ccc; padding: 15px; width: 250px; border-radius: 8px;">
                
                <h3><?= htmlspecialchars($product['nom']) ?></h3>
                
                <p><?= htmlspecialchars(substr($product['description'] ?? '', 0, 50)) ?>...</p>
                
                <p style="color: green; font-weight: bold; font-size: 1.2em;">
                    <?= number_format((float)$product['prix'], 2) ?> €
                </p>
                
                <a href="product?id=<?= $product['id'] ?>" style="background-color: #007bff; color: white; padding: 8px 12px; text-decoration: none; border-radius: 4px; display:inline-block;">
                    Voir le détail
                </a>
            </div>
        <?php endforeach; ?>

    <?php endif; ?>
</div>