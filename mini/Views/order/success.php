<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commande Confirmée</title>
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

        /* Success Container */
        .success-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 0 20px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: calc(100vh - 60px);
        }

        /* Success Card */
        .success-card {
            text-align: center;
            background: #ffffff;
            border: 1px solid #d5d5d7;
            border-radius: 18px;
            padding: 60px 40px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            animation: slideUp 0.6s ease-out;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Success Icon */
        .success-icon {
            font-size: 80px;
            margin-bottom: 24px;
            animation: bounce 0.6s ease-out;
        }

        @keyframes bounce {
            0%, 100% {
                transform: scale(0);
            }
            50% {
                transform: scale(1.1);
            }
            100% {
                transform: scale(1);
            }
        }

        /* Success Title */
        .success-title {
            font-size: clamp(24px, 4vw, 36px);
            font-weight: 700;
            color: #34c759;
            margin-bottom: 16px;
            letter-spacing: -0.5px;
        }

        /* Order ID */
        .order-id {
            font-size: 18px;
            color: #1d1d1f;
            margin-bottom: 24px;
            font-weight: 600;
        }

        .order-id strong {
            color: #0071e3;
        }

        /* Success Message */
        .success-message {
            font-size: 16px;
            color: #666666;
            margin-bottom: 40px;
            line-height: 1.8;
        }

        .success-message p {
            margin-bottom: 12px;
        }

        .success-message p:last-child {
            margin-bottom: 0;
        }

        /* Success Details */
        .success-details {
            background: #f5f5f7;
            border-radius: 12px;
            padding: 24px;
            margin-bottom: 40px;
            text-align: left;
        }

        .detail-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 0;
            border-bottom: 1px solid #e0e0e0;
        }

        .detail-item:last-child {
            border-bottom: none;
        }

        .detail-label {
            font-size: 14px;
            color: #666666;
            font-weight: 500;
        }

        .detail-value {
            font-size: 16px;
            color: #1d1d1f;
            font-weight: 600;
        }

        /* Action Buttons */
        .success-actions {
            display: flex;
            gap: 16px;
            flex-direction: column;
        }

        .btn-primary {
            padding: 12px 28px;
            background-color: #34c759;
            color: white;
            text-decoration: none;
            border-radius: 980px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            border: none;
            text-align: center;
        }

        .btn-primary:hover {
            background-color: #30b752;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(52, 199, 89, 0.3);
        }

        .btn-secondary {
            padding: 12px 28px;
            background-color: transparent;
            color: #0071e3;
            text-decoration: none;
            border: 1px solid #0071e3;
            border-radius: 980px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-secondary:hover {
            background-color: #0071e3;
            color: white;
        }

        /* Responsive Design */
        @media (max-width: 1024px) {
            .success-container {
                margin: 40px auto;
            }

            .success-card {
                padding: 40px;
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

            .success-container {
                margin: 30px auto;
            }

            .success-card {
                padding: 32px 20px;
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

            .success-container {
                margin: 20px auto;
                padding: 0 20px;
            }

            .success-card {
                padding: 24px 16px;
                border-radius: 12px;
            }

            .success-icon {
                font-size: 48px;
                margin-bottom: 16px;
            }

            .success-title {
                font-size: 24px;
                margin-bottom: 16px;
            }

            .order-id {
                font-size: 14px;
                margin-bottom: 20px;
            }

            .success-message {
                font-size: 14px;
                margin-bottom: 24px;
            }

            .success-message p {
                margin-bottom: 12px;
            }

            .success-details {
                grid-template-columns: 1fr;
                gap: 16px;
                margin-bottom: 24px;
            }

            .detail-label {
                font-size: 12px;
            }

            .detail-value {
                font-size: 14px;
            }

            .success-actions {
                flex-direction: column;
                gap: 12px;
            }

            .btn-primary,
            .btn-secondary {
                padding: 12px 20px;
                font-size: 14px;
                width: 100%;
            }
        }
            .success-container {
                min-height: auto;
                padding: 40px 20px;
            }

            .success-card {
                padding: 40px 24px;
            }

            .success-icon {
                font-size: 60px;
                margin-bottom: 20px;
            }

            .success-title {
                font-size: 24px;
            }

            .order-id {
                font-size: 16px;
            }

            .success-message {
                font-size: 15px;
                margin-bottom: 32px;
            }

            .success-details {
                padding: 16px;
                margin-bottom: 32px;
            }

            .detail-item {
                padding: 10px 0;
            }

            .btn-primary,
            .btn-secondary {
                padding: 12px 20px;
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
        <div class="success-container">
            <div class="success-card">
                <div class="success-icon">✅</div>

                <h1 class="success-title">Félicitations !</h1>

                <div class="order-id">
                    Votre commande <strong>#<?= $orderId ?></strong> a été confirmée
                </div>

                <!-- Success Message -->
                <div class="success-message">
                    <p>Merci pour votre achat ! Votre commande a bien été enregistrée et sera traitée rapidement.</p>
                    <p>Vous recevrez un email de confirmation dans quelques instants.</p>
                <
                <!-- Success Details -->
                <div class="success-details">
                    <div class="detail-item">
                        <span class="detail-label">N° Commande</span>
                        <span class="detail-value">#<?= $orderId ?></span>
                    <div class="detail-item">
                        <span class="detail-label">Statut</span>
                        <span class="detail-value">En cours de traitement</span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Email de confirmation</span>
                        <span class="detail-value"><?= htmlspecialchars($_SESSION['user']['email'] ?? 'Votre email') ?></span>
                    </div>
                </div>

                <div class="success-actions">
                    <a href="/orders" class="btn-primary">Voir mes commandes 📦</a>
                    <a href="/" class="btn-secondary">Retour à l'accueil</a>
                </div>
            </div>
        </div>
    </main>
</body>
</html>