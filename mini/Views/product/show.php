<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($product['nom']) ?> - Premium Digital Store</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html, body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Helvetica Neue', sans-serif;
            background-color: #ffffff;
            color: #1d1d1f;
            line-height: 1.6;
        }

        nav {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(0, 0, 0, 0.08);
            padding: 0 20px;
        }

        nav .nav-container {
            max-width: 1440px;
            margin: 0 auto;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 60px;
            width: 100%;
            padding: 0 20px;
        }

        nav .logo {
            font-size: 18px;
            font-weight: 600;
            letter-spacing: -0.5px;
            min-width: 40px;
            position: absolute;
            left: 20px;
        }

        nav .nav-middle {
            display: flex;
            gap: 32px;
            align-items: center;
            justify-content: center;
        }

        nav .nav-right {
            display: flex;
            gap: 24px;
            align-items: center;
            min-width: fit-content;
            position: absolute;
            right: 20px;
        }

        nav .logo a {
            text-decoration: none;
            color: #1d1d1f;
            transition: opacity 0.3s ease;
        }

        nav .logo a:hover {
            opacity: 0.6;
        }

        nav .nav-middle a {
            text-decoration: none;
            color: #1d1d1f;
            font-size: 14px;
            transition: opacity 0.3s ease;
            white-space: nowrap;
        }

        nav .nav-middle a:hover {
            opacity: 0.6;
        }

        nav .nav-right a, nav .nav-right span {
            text-decoration: none;
            color: #1d1d1f;
            font-size: 14px;
            transition: opacity 0.3s ease;
        }

        nav .nav-right a:hover, nav .nav-right span:hover {
            opacity: 0.6;
        }

        nav .user-greeting {
            font-weight: 500;
            color: #34c759;
        }

        nav .btn-auth {
            padding: 8px 16px;
            border-radius: 980px;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
        }

        nav .btn-signin {
            color: #0071e3;
        }

        nav .btn-signup {
            background-color: #34c759;
            color: white;
        }

        nav .btn-signup:hover {
            background-color: #30b752;
        }

        nav .btn-logout {
            background-color: #ff3b30;
            color: white;
        }

        nav .btn-logout:hover {
            background-color: #ff453a;
        }

        main {
            margin-top: 60px;
            padding: 0;
        }

        .product-detail {
            max-width: 1400px;
            margin: 0 auto;
            padding: 60px 20px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 80px;
            align-items: center;
        }

        .product-image-container {
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f5f5f7;
            border-radius: 18px;
            min-height: 600px;
            padding: 60px;
            position: relative;
        }

        .product-image-container img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            max-width: 500px;
            max-height: 500px;
        }

        .product-image-container.no-image {
            font-size: 120px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .product-info-container {
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
        }

        .product-category {
            font-size: 12px;
            color: #666666;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 600;
            margin-bottom: 16px;
        }

        .product-title {
            font-size: clamp(32px, 5vw, 48px);
            font-weight: 700;
            color: #1d1d1f;
            margin-bottom: 24px;
            line-height: 1.2;
        }

        .product-price {
            font-size: 36px;
            font-weight: 700;
            color: #34c759;
            margin-bottom: 24px;
        }

        .product-description {
            font-size: 16px;
            color: #666666;
            line-height: 1.8;
            margin-bottom: 32px;
            max-width: 100%;
        }

        .product-stock {
            padding: 12px 16px;
            border-radius: 8px;
            margin-bottom: 32px;
            font-weight: 500;
            font-size: 14px;
            display: inline-block;
            width: fit-content;
        }

        .product-stock.in-stock {
            background-color: #d1f4d1;
            color: #1f5e1f;
        }

        .product-stock.out-of-stock {
            background-color: #ffd1d1;
            color: #8b0000;
        }

        .add-to-cart-form {
            display: flex;
            gap: 16px;
            align-items: flex-end;
            margin-bottom: 32px;
        }

        .quantity-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .quantity-group label {
            font-size: 14px;
            font-weight: 500;
            color: #1d1d1f;
        }

        .quantity-group input {
            padding: 8px 12px;
            border: 1px solid #d5d5d7;
            border-radius: 8px;
            font-size: 16px;
            width: 80px;
            transition: all 0.3s ease;
        }

        .quantity-group input:focus {
            outline: none;
            border-color: #0071e3;
            box-shadow: 0 0 0 3px rgba(0, 113, 227, 0.1);
        }

        .btn-add-cart {
            padding: 12px 32px;
            background-color: #0071e3;
            color: white;
            text-decoration: none;
            border-radius: 980px;
            font-size: 15px;
            font-weight: 500;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            height: fit-content;
        }

        .btn-add-cart:hover {
            background-color: #0077ed;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 113, 227, 0.3);
        }

        .btn-add-cart:active {
            transform: translateY(0);
        }

        .product-meta {
            padding-top: 32px;
            border-top: 1px solid #d5d5d7;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 32px;
            margin-top: 32px;
        }

        .meta-item {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .meta-label {
            font-size: 12px;
            color: #666666;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-weight: 600;
        }

        .meta-value {
            font-size: 16px;
            color: #1d1d1f;
            font-weight: 500;
        }

        @media (max-width: 1024px) {
            .product-detail {
                grid-template-columns: 1fr;
                gap: 60px;
                padding: 40px 20px;
            }

            .product-image-container {
                min-height: 400px;
            }

            .product-title {
                font-size: 36px;
            }

            .product-price {
                font-size: 28px;
            }

            .product-meta {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 768px) {
            nav {
                height: auto;
                padding: 0 15px;
            }

            nav .nav-container {
                height: auto;
                padding: 12px 15px;
                flex-wrap: wrap;
                gap: 12px;
            }

            nav .logo {
                position: static;
                left: auto;
                font-size: 16px;
            }

            nav .nav-middle {
                display: none;
            }

            nav .nav-right {
                position: static;
                right: auto;
                gap: 12px;
                width: 100%;
                justify-content: flex-end;
                align-items: center;
            }

            main {
                margin-top: auto;
                padding-top: 20px;
            }

            .product-detail {
                gap: 40px;
                padding: 30px 20px;
            }
        }

        @media (max-width: 640px) {
            nav .btn-auth {
                padding: 6px 12px;
                font-size: 13px;
            }

            nav .user-greeting {
                display: none;
            }

            .product-detail {
                padding: 20px;
                gap: 30px;
            }

            .product-image-container {
                min-height: 300px;
                padding: 40px;
                border-radius: 12px;
            }

            .product-image-container.no-image {
                font-size: 80px;
            }

            .product-image-container img {
                max-width: 100%;
                max-height: 100%;
            }

            .product-category {
                font-size: 11px;
                margin-bottom: 12px;
            }

            .product-title {
                font-size: 24px;
                margin-bottom: 16px;
            }

            .product-price {
                font-size: 20px;
                margin-bottom: 16px;
            }

            .product-description {
                font-size: 14px;
                margin-bottom: 20px;
            }

            .product-stock {
                padding: 10px 14px;
                margin-bottom: 20px;
                font-size: 13px;
            }

            .add-to-cart-form {
                flex-direction: column;
                align-items: stretch;
                margin-bottom: 20px;
                gap: 12px;
            }

            .quantity-group {
                gap: 6px;
            }

            .quantity-group label {
                font-size: 13px;
            }

            .quantity-group input {
                width: 100%;
                padding: 10px 12px;
                font-size: 14px;
                border-radius: 6px;
            }

            .btn-add-cart {
                width: 100%;
                padding: 12px 20px;
                font-size: 14px;
                justify-content: center;
            }

            .product-meta {
                grid-template-columns: 1fr;
                gap: 20px;
                margin-top: 20px;
            }

            .meta-label {
                font-size: 11px;
            }

            .meta-value {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <nav>
        <div class="nav-container">
            <div class="logo">
                <a href="./">🍎</a>
            </div>
            <div class="nav-middle">
                <a href="./">← Retour</a>
            </div>
            <div class="nav-right">
                <?php if (isset($_SESSION['user'])): ?>
                    <span class="user-greeting">👋 <?= htmlspecialchars($_SESSION['user']['nom']) ?></span>
                    <a href="cart">🛒</a>
                    <a href="orders">📦</a>
                    <a href="logout" class="btn-auth btn-logout">Se déconnecter</a>
                <?php else: ?>
                    <a href="login" class="btn-auth btn-signin">Se connecter</a>
                    <a href="register" class="btn-auth btn-signup">Créer un compte</a>
                <?php endif; ?>
            </div>
        </div>
    </nav>

    <main>
        <article class="product-detail">
            <div class="product-image-container <?= (isset($product['image_url']) && !empty($product['image_url'])) ? '' : 'no-image' ?>">
                <?php if (isset($product['image_url']) && !empty($product['image_url'])): ?>
                    <img src="<?= htmlspecialchars($product['image_url']) ?>" alt="<?= htmlspecialchars($product['nom']) ?>">
                <?php else: ?>
                    📦
                <?php endif; ?>
            </div>

            <div class="product-info-container">
                <span class="product-category"><?= htmlspecialchars($product['categorie_nom'] ?? 'Produit') ?></span>
                <h1 class="product-title"><?= htmlspecialchars($product['nom']) ?></h1>
                
                <div class="product-price"><?= number_format((float)$product['prix'], 2, ',', ' ') ?> €</div>

                <p class="product-description">
                    <?= nl2br(htmlspecialchars($product['description'] ?? 'Aucune description disponible.')) ?>
                </p>

                <?php if ($product['stock'] > 0): ?>
                    <div class="product-stock in-stock">
                        ✅ En stock (<?= $product['stock'] ?> disponible<?= $product['stock'] > 1 ? 's' : '' ?>)
                    </div>
                    
                    <form action="cart/add" method="POST" class="add-to-cart-form">
                        <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                        
                        <div class="quantity-group">
                            <label for="qty">Quantité</label>
                            <input type="number" id="qty" name="quantity" value="1" min="1" max="<?= $product['stock'] ?>">
                        </div>
                        
                        <button type="submit" class="btn-add-cart">
                            Ajouter au panier 🛒
                        </button>
                    </form>
                <?php else: ?>
                    <div class="product-stock out-of-stock">
                        ❌ Rupture de stock
                    </div>
                <?php endif; ?>

                <div class="product-meta">
                    <div class="meta-item">
                        <span class="meta-label">Catégorie</span>
                        <span class="meta-value"><?= htmlspecialchars($product['categorie_nom'] ?? 'Produit') ?></span>
                    </div>
                    <div class="meta-item">
                        <span class="meta-label">Référence</span>
                        <span class="meta-value">ID #<?= $product['id'] ?></span>
                    </div>
                </div>
            </div>
        </article>
    </main>
</body>
</html>