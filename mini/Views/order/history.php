<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes Commandes - Premium Digital Store</title>
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

        /* Orders Container */
        .orders-container {
            max-width: 1200px;
            margin: 60px auto;
            padding: 0 20px;
        }

        /* Empty Orders State */
        .empty-orders {
            text-align: center;
            padding: 100px 20px;
            background: #f5f5f7;
            border-radius: 18px;
        }

        .empty-orders h3 {
            font-size: 24px;
            color: #1d1d1f;
            margin-bottom: 16px;
            font-weight: 600;
        }

        .empty-orders p {
            font-size: 16px;
            color: #666666;
            margin-bottom: 32px;
        }

        .empty-orders a {
            display: inline-block;
            padding: 12px 32px;
            background-color: #0071e3;
            color: white;
            text-decoration: none;
            border-radius: 980px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .empty-orders a:hover {
            background-color: #0077ed;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 113, 227, 0.3);
        }

        /* Orders Table */
        .orders-table {
            background: #ffffff;
            border: 1px solid #d5d5d7;
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .orders-table table {
            width: 100%;
            border-collapse: collapse;
        }

        .orders-table thead {
            background: #f5f5f7;
            border-bottom: 1px solid #d5d5d7;
        }

        .orders-table th {
            padding: 16px 20px;
            text-align: left;
            font-size: 13px;
            font-weight: 600;
            color: #666666;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .orders-table td {
            padding: 16px 20px;
            border-bottom: 1px solid #f5f5f7;
            font-size: 15px;
        }

        .orders-table tbody tr:last-child td {
            border-bottom: none;
        }

        .orders-table tbody tr:hover {
            background: #fafafa;
        }

        .order-id {
            font-weight: 600;
            color: #1d1d1f;
        }

        .order-date {
            color: #666666;
        }

        .order-total {
            font-weight: 600;
            color: #34c759;
        }

        .order-status {
            display: inline-block;
            padding: 6px 12px;
            background: #f5f5f7;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 600;
            color: #1d1d1f;
            text-transform: capitalize;
        }

        .order-status.pending {
            background: #fff3cd;
            color: #856404;
        }

        .order-status.confirmed {
            background: #d1ecf1;
            color: #0c5460;
        }

        .order-status.shipped {
            background: #d1f2eb;
            color: #0f5132;
        }

        .order-status.delivered {
            background: #d1f4d1;
            color: #1f5e1f;
        }

        /* Responsive Design */
        @media (max-width: 1024px) {
            .orders-table th:nth-child(2),
            .orders-table td:nth-child(2) {
                display: none;
            }

            .orders-container {
                margin: 50px auto;
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

            .orders-container {
                margin: 30px auto;
            }

            .orders-table th:nth-child(2),
            .orders-table td:nth-child(2),
            .orders-table th:nth-child(3),
            .orders-table td:nth-child(3) {
                display: none;
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

            .orders-header {
                padding: 30px 20px 20px 20px;
            }

            .orders-header h1 {
                font-size: 24px;
            }

            .orders-container {
                margin: 20px auto;
            }

            .empty-orders {
                padding: 60px 20px;
            }

            .empty-orders h3 {
                font-size: 20px;
            }

            .empty-orders p {
                font-size: 14px;
            }

            .empty-orders a {
                padding: 12px 24px;
                font-size: 14px;
            }

            .orders-table th,
            .orders-table td {
                padding: 10px;
                font-size: 12px;
            }

            .orders-table th {
                font-size: 11px;
            }

            .order-id {
                font-weight: 600;
            }

            .order-status {
                padding: 4px 8px;
                font-size: 11px;
            }
        }
                padding: 4px 8px;
                font-size: 12px;
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
        <div class="orders-container">
            <?php if (empty($orders)): ?>
                <!-- Empty Orders -->
                <div class="empty-orders">
                    <p>Commencez vos achats et retrouvez vos commandes ici.</p>
                    <a href="./">Retour à la boutique</a>
                </div>
            <?php else: ?>
                <!-- Orders Table -->
                <   <table>
                        <thead>
                            <tr>
                                <th>N° Commande</th>
                                <th>Date</th>
                                <th>Montant</th>
                                <th>Statut</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($orders as $order): ?>
                                <tr>
                                    <td class="order-id">#<?= $order['id'] ?></td>
                                    <td class="order-date"><?= date('d/m/Y H:i', strtotime($order['date'])) ?></td>
                                    <td class="order-total"><?= number_format((float)$order['total'], 2, ',', ' ') ?> €</td>
                                    <td>
                                        <span class="order-status <?= strtolower($order['statut']) ?>">
                                            <?= htmlspecialchars($order['statut']) ?>
                                        </span>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>
        </div>
    </main>
</body>
</html>