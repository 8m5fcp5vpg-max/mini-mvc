<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Mon E-Shop' ?> - Premium Digital Store</title>
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

        /* Navigation Bar */
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
            justify-content: space-between;
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
        }

        nav .nav-middle {
            display: flex;
            gap: 32px;
            align-items: center;
            flex: 1;
            justify-content: center;
        }

        nav .nav-right {
            display: flex;
            gap: 24px;
            align-items: center;
            min-width: fit-content;
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

        /* Buttons */
        .btn-primary {
            padding: 12px 28px;
            background-color: #0071e3;
            color: white;
            text-decoration: none;
            border-radius: 980px;
            font-weight: 500;
            font-size: 15px;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            display: inline-block;
        }

        .btn-primary:hover {
            background-color: #0077ed;
            transform: translateY(-2px);
        }

        .btn-secondary {
            padding: 12px 28px;
            background-color: transparent;
            color: #0071e3;
            text-decoration: none;
            border-radius: 980px;
            font-weight: 500;
            font-size: 15px;
            border: 2px solid #0071e3;
            transition: all 0.3s ease;
            cursor: pointer;
            display: inline-block;
        }

        .btn-secondary:hover {
            background-color: #0071e3;
            color: white;
            transform: translateY(-2px);
        }

        /* Main Content */
        main {
            margin-top: 0;
            padding: 0;
        }

        /* Hero Section */
        .hero {
            padding: 80px 20px;
            text-align: center;
            background-image: url('https://www.apple.com/v/home/ck/images/heroes/iphone-family/hero_iphone_family__fuz5j2v5xx6y_largetall.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: scroll;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: center;
            position: relative;
            padding-top: 150px;
            margin-top: -60px;
            width: 100%;
            max-width: 100%;
        }

        /* Overlay pour meilleure lisibilité */
        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(255, 255, 255, 0);
            z-index: 1;
        }

        .hero h1 {
            font-size: clamp(36px, 5vw, 56px);
            font-weight: 700;
            letter-spacing: -1px;
            margin-bottom: 24px;
            line-height: 1.2;
            color: #1d1d1f;
            position: relative;
            z-index: 2;
        }

        .hero p {
            font-size: 18px;
            color: #1d1d1f;
            max-width: 600px;
            margin: 0 auto 40px;
            font-weight: 400;
            letter-spacing: 0.4px;
            position: relative;
            z-index: 2;
        }

        .hero-actions {
            display: flex;
            gap: 16px;
            justify-content: center;
            flex-wrap: wrap;
            margin-bottom: 0;
            position: relative;
            z-index: 2;
        }

        .hero-image {
            display: none;
        }

        .hero-image img {
            width: 100%;
            height: auto;
            display: block;
        }

        /* Products Section - Apple Style */
        .products-section {
            padding: 0;
            background: #ffffff;
        }

        .section-header {
            text-align: center;
            padding: 80px 20px;
            background: #ffffff;
        }

        .section-header h2 {
            font-size: clamp(32px, 4vw, 48px);
            font-weight: 700;
            letter-spacing: -0.5px;
            color: #1d1d1f;
        }

        /* Product Grid - Full Screen Sections */
        .product-grid {
            display: flex;
            flex-direction: column;
            gap: 10px;
            padding: 40px 20px;
            max-width: 1400px;
            margin: 0 auto;
        }

        .product-card {
            width: 100%;
            height: 900px;
            background: #f5f5f7;
            display: grid;
            grid-template-columns: 1fr 1fr;
            align-items: center;
            padding: 0;
            overflow: hidden;
            border-radius: 18px;
        }

        /* Inverser le deuxième produit */
        .product-card:nth-child(2) {
            grid-template-columns: 1fr 1fr;
        }

        .product-card:nth-child(2) .product-image {
            order: 2;
        }

        .product-card:nth-child(2) .product-info {
            order: 1;
        }

        .product-image {
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 120px;
            overflow: hidden;
            position: relative;
            padding: 60px;
            background: transparent;
        }

        .product-image img {
            width: 80%;
            height: 80%;
            object-fit: contain;
            filter: none;
        }

        .product-info {
            padding: 80px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            height: 100%;
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
            font-size: clamp(32px, 4vw, 48px);
            font-weight: 700;
            color: #1d1d1f;
            margin-bottom: 24px;
            line-height: 1.2;
        }

        .product-description {
            font-size: 18px;
            color: #666666;
            margin-bottom: 40px;
            line-height: 1.6;
            max-width: 500px;
        }

        .product-price {
            font-size: 28px;
            font-weight: 700;
            color: #1d1d1f;
            margin-bottom: 32px;
        }

        .product-link {
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
            display: inline-block;
            width: fit-content;
        }

        .product-link:hover {
            background-color: #0077ed;
            transform: scale(1.05);
        }

        /* Responsive Design */
        @media (max-width: 1024px) {
            .product-card {
                grid-template-columns: 1fr;
                height: auto;
                min-height: 600px;
            }

            .product-image {
                min-height: 400px;
                font-size: 80px;
            }

            .product-info {
                padding: 60px;
                min-height: auto;
            }

            .product-title {
                font-size: 32px;
            }

            .product-description {
                font-size: 16px;
            }

            .product-price {
                font-size: 24px;
            }
        }

        @media (max-width: 640px) {
            .product-card {
                grid-template-columns: 1fr;
                height: auto;
                min-height: 500px;
            }

            .product-image {
                min-height: 300px;
                font-size: 60px;
            }

            .product-info {
                padding: 40px 24px;
            }

            .product-title {
                font-size: 28px;
            }

            .product-description {
                font-size: 16px;
            }

            .product-price {
                font-size: 22px;
            }

            .product-link {
                padding: 10px 24px;
                font-size: 14px;
            }

            .section-header {
                padding: 60px 20px;
            }

            .section-header h2 {
                font-size: 32px;
            }
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 100px 20px;
            min-height: 600px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .empty-state h3 {
            font-size: 24px;
            margin-bottom: 16px;
            color: #1d1d1f;
        }

        .empty-state p {
            font-size: 16px;
            color: #666666;
            margin-bottom: 32px;
        }
    </style>
</head>
<body>
    <!-- Navigation Bar -->
    <nav>
        <div class="nav-container">
            <div class="logo">
                <a href="./">🍎</a>
            </div>
            <div class="nav-middle">
                <?php if (!empty($products)): ?>
                    <?php 
                    $count = 0;
                    foreach ($products as $product): 
                        if ($count >= 3) break;
                    ?>
                        <a href="product?id=<?= $product['id'] ?>" class="nav-product">
                            <?= htmlspecialchars($product['nom']) ?>
                        </a>
                    <?php 
                        $count++;
                    endforeach; 
                    ?>
                <?php endif; ?>
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

    <!-- Main Content -->
    <main>
        <!-- Hero Section -->
        <section class="hero">
            <h1>L'essentiel. En plus puissant.</h1>
            <p>Découvrez nos trois produits phares. Conçus pour la performance. Façonnés pour vous.</p>
            <div class="hero-actions">
                <a href="#products" class="btn-primary">Explorer les produits</a>
                <?php if (!isset($_SESSION['user'])): ?>
                    <a href="register" class="btn-secondary">Créer un compte</a>
                <?php endif; ?>
            </div>
        </section>

        <!-- Products Section -->
        <section class="products-section" id="products">
            <div class="section-header">
                <h2>Notre sélection</h2>
            </div>

            <?php if (empty($products)): ?>
                <div class="empty-state">
                    <h3>⚠️ Aucun produit disponible</h3>
                    <p>La section des produits sera bientôt remplie !</p>
                </div>
            <?php else: ?>
                <div class="product-grid">
                    <?php 
                    $count = 0;
                    foreach ($products as $product): 
                        if ($count >= 3) break;
                        $count++;
                    ?>
                        <article class="product-card">
                            <div class="product-image">
                                <?php if (isset($product['image_url']) && !empty($product['image_url'])): ?>
                                    <img src="<?= htmlspecialchars($product['image_url']) ?>" alt="<?= htmlspecialchars($product['nom']) ?>">
                                <?php else: ?>
                                    📦
                                <?php endif; ?>
                            </div>
                            <div class="product-info">
                                <span class="product-category">Produit</span>
                                <h3 class="product-title"><?= htmlspecialchars($product['nom']) ?></h3>
                                <p class="product-description"><?= htmlspecialchars($product['description'] ?? '') ?></p>
                                <div class="product-price"><?= number_format((float)$product['prix'], 2, ',', ' ') ?> €</div>
                                <a href="product?id=<?= $product['id'] ?>" class="product-link">Voir plus</a>
                            </div>
                        </article>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </section>
    </main>
</body>

</html></html>