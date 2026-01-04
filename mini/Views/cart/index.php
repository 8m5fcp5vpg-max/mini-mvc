<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Panier - Premium Digital Store</title>
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

        /* Main Content */
        main {
            margin-top: 60px;
            padding: 0;
            min-height: calc(100vh - 60px);
        }

        /* Cart Container */
        .cart-container {
            max-width: 1200px;
            margin: 60px auto;
            padding: 0 20px;
        }

        /* Empty Cart State */
        .empty-cart {
            text-align: center;
            padding: 100px 20px;
            background: #f5f5f7;
            border-radius: 18px;
            margin-bottom: 40px;
        }

        .empty-cart h3 {
            font-size: 24px;
            color: #1d1d1f;
            margin-bottom: 16px;
            font-weight: 600;
        }

        .empty-cart p {
            font-size: 16px;
            color: #666666;
            margin-bottom: 32px;
        }

        .empty-cart a {
            display: inline-block;
            padding: 12px 32px;
            background-color: #0071e3;
            color: white;
            text-decoration: none;
            border-radius: 980px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .empty-cart a:hover {
            background-color: #0077ed;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 113, 227, 0.3);
        }

        /* Cart Items Table */
        .cart-items {
            background: #ffffff;
            border: 1px solid #d5d5d7;
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            margin-bottom: 40px;
        }

        .cart-items table {
            width: 100%;
            border-collapse: collapse;
        }

        .cart-items thead {
            background: #f5f5f7;
            border-bottom: 1px solid #d5d5d7;
        }

        .cart-items th {
            padding: 16px 20px;
            text-align: left;
            font-size: 13px;
            font-weight: 600;
            color: #666666;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .cart-items td {
            padding: 16px 20px;
            border-bottom: 1px solid #f5f5f7;
            font-size: 15px;
        }

        .cart-items tbody tr:last-child td {
            border-bottom: none;
        }

        .cart-items tbody tr:hover {
            background: #fafafa;
        }

        .product-name {
            font-weight: 600;
            color: #1d1d1f;
        }

        .product-price,
        .product-qty,
        .product-total {
            color: #1d1d1f;
        }

        .product-total {
            font-weight: 600;
            color: #34c759;
        }

        /* Cart Summary */
        .cart-summary {
            display: flex;
            flex-direction: column;
            gap: 24px;
            background: #ffffff;
            border: 1px solid #d5d5d7;
            border-radius: 18px;
            padding: 40px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 0;
        }

        .summary-label {
            font-size: 16px;
            color: #666666;
        }

        .summary-total {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 16px 0;
            border-top: 1px solid #d5d5d7;
            border-bottom: 1px solid #d5d5d7;
        }

        .summary-total-label {
            font-size: 18px;
            font-weight: 600;
            color: #1d1d1f;
        }

        .summary-total-value {
            font-size: 24px;
            font-weight: 700;
            color: #34c759;
        }

        /* Cart Actions */
        .cart-actions {
            display: flex;
            gap: 16px;
            flex-direction: column-reverse;
        }

        .btn-checkout {
            padding: 12px 28px;
            background-color: #34c759;
            color: white;
            text-decoration: none;
            border: none;
            border-radius: 980px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-align: center;
        }

        .btn-checkout:hover {
            background-color: #30b752;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(52, 199, 89, 0.3);
        }

        .btn-checkout:active {
            transform: translateY(0);
        }

        .btn-login {
            padding: 12px 28px;
            background-color: #ff9500;
            color: white;
            text-decoration: none;
            border: none;
            border-radius: 980px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-align: center;
        }

        .btn-login:hover {
            background-color: #ff8a00;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(255, 149, 0, 0.3);
        }

        .btn-empty {
            padding: 12px 28px;
            background-color: transparent;
            color: #ff3b30;
            text-decoration: none;
            border: 1px solid #ff3b30;
            border-radius: 980px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-align: center;
        }

        .btn-empty:hover {
            background-color: #ff3b30;
            color: white;
        }

        .btn-back {
            padding: 12px 28px;
            background-color: transparent;
            color: #0071e3;
            text-decoration: none;
            border: 1px solid #0071e3;
            border-radius: 980px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-align: center;
        }

        .btn-back:hover {
            background-color: #0071e3;
            color: white;
        }

        /* Responsive Design */
        @media (max-width: 1024px) {
            .cart-items th:nth-child(3),
            .cart-items td:nth-child(3) {
                display: none;
            }

            .cart-container {
                margin: 50px auto;
            }

            .cart-actions {
                flex-direction: column;
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

            .cart-container {
                margin: 30px auto;
            }

            .cart-items th:nth-child(2),
            .cart-items td:nth-child(2),
            .cart-items th:nth-child(3),
            .cart-items td:nth-child(3) {
                display: none;
            }

            .cart-summary {
                padding: 24px;
            }

            .cart-actions {
                gap: 12px;
            }
        }

        @media (max-width: 640px) {
            nav .btn-auth {
                padding: 6px 12px;
                font-size: 13px;
            }

            nav .user-greeting {
                display: none;
                font-size: 12px;
            }

            .cart-header {
                padding: 30px 20px 20px 20px;
            }

            .cart-header h1 {
                font-size: 24px;
            }

            .cart-container {
                margin: 20px auto;
            }

            .empty-cart {
                padding: 60px 20px;
            }

            .empty-cart h3 {
                font-size: 20px;
            }

            .empty-cart p {
                font-size: 14px;
            }

            .cart-items th,
            .cart-items td {
                padding: 10px;
                font-size: 12px;
            }

            .cart-items th {
                font-size: 11px;
            }

            .product-name {
                font-weight: 600;
            }

            .cart-summary {
                padding: 20px;
                gap: 16px;
            }

            .summary-label {
                font-size: 14px;
            }

            .summary-total-label {
                font-size: 16px;
            }

            .summary-total-value {
                font-size: 20px;
            }

            .cart-actions {
                flex-direction: column-reverse;
                gap: 10px;
            }

            .btn-checkout,
            .btn-login,
            .btn-empty,
            .btn-back {
                padding: 12px 20px;
                font-size: 13px;
                width: 100%;
            }

            .empty-cart a {
                padding: 12px 24px;
                font-size: 14px;
            }

            .btn-checkout,
            .btn-login,
            .btn-empty,
            .btn-back {
                padding: 12px 20px;
                font-size: 13px;
                width: 100%;
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
                <a href="./">Accueil</a>
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
        <div class="cart-container">
            <?php if (empty($items)): ?>
                <!-- Empty Cart -->
                <div class="empty-cart">
                    <p>Commencez à explorer nos produits et ajoutez des articles à votre panier.</p>
                    <a href="./">← Retourner à la boutique</a>
                </div>
            <?php else: ?>
                <div class="cart-items">
                    <table>
                        <thead>
                            <tr>
                                <th>Produit</th>
                                <th>Prix Unitaire</th>
                                <th>Quantité</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($items as $item): ?>
                                <tr>
                                    <td class="product-name"><?= htmlspecialchars($item['product']['nom']) ?></td>
                                    <td class="product-price"><?= number_format((float)$item['product']['prix'], 2, ',', ' ') ?> €</td>
                                    <td class="product-qty"><?= $item['qty'] ?></td>
                                    <td class="product-total"><?= number_format((float)$item['total'], 2, ',', ' ') ?> €</td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <div class="cart-summary">
                    <div class="summary-total">
                        <span class="summary-total-label">Total à payer</span>
                        <span class="summary-total-value"><?= number_format((float)$totalGeneral, 2, ',', ' ') ?> €</span>
                    </div>

                    <div class="cart-actions">
                        <a href="cart/clear" class="btn-empty">Vider le panier</a>
                        <?php if (isset($_SESSION['user'])): ?>
                            <a href="order/add" class="btn-checkout">Passer la commande ✅</a>
                        <?php else: ?>
                            <a href="login" class="btn-login">Connectez-vous pour commander</a>
                        <?php endif; ?>
                        <a href="./" class="btn-back">← Continuer les achats</a>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </main>
</body>
</html>