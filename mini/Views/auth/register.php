<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>S'inscrire</title>
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

        /* Main Content */
        main {
            margin-top: 60px;
            padding: 0;
            min-height: calc(100vh - 60px);
        }

        /* Auth Container */
        .auth-container {
            max-width: 480px;
            margin: 60px auto;
            padding: 0 20px;
        }

        .auth-form {
            display: flex;
            flex-direction: column;
            gap: 24px;
            background: #ffffff;
            padding: 40px;
            border-radius: 18px;
            border: 1px solid #d5d5d7;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .form-group label {
            font-size: 14px;
            font-weight: 600;
            color: #1d1d1f;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .form-group input {
            padding: 12px 16px;
            border: 1px solid #d5d5d7;
            border-radius: 8px;
            font-size: 16px;
            transition: all 0.3s ease;
            font-family: inherit;
            color: #1d1d1f;
            background-color: #ffffff;
        }

        .form-group input::placeholder {
            color: #a1a1a6;
        }

        .form-group input:focus {
            outline: none;
            border-color: #0071e3;
            box-shadow: 0 0 0 3px rgba(0, 113, 227, 0.1);
            background-color: #ffffff;
        }

        .form-group input::-webkit-outer-spin-button,
        .form-group input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        .btn-submit {
            padding: 12px 28px;
            background-color: #34c759;
            color: white;
            border: none;
            border-radius: 980px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 12px;
        }

        .btn-submit:hover {
            background-color: #30b752;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(52, 199, 89, 0.3);
        }

        .btn-submit:active {
            transform: translateY(0);
        }

        .auth-footer {
            text-align: center;
            margin-top: 24px;
            font-size: 14px;
        }

        .auth-footer p {
            color: #666666;
            margin: 0;
        }

        .auth-footer a {
            color: #0071e3;
            text-decoration: none;
            font-weight: 600;
            transition: opacity 0.3s ease;
        }

        .auth-footer a:hover {
            opacity: 0.6;
        }

        /* Responsive Design */
        @media (max-width: 1024px) {
            nav .nav-middle {
                gap: 24px;
            }

            nav .nav-right {
                gap: 16px;
            }

            .auth-container {
                max-width: 100%;
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
            }

            main {
                margin-top: auto;
                padding-top: 20px;
            }

            .auth-container {
                margin: 30px auto;
            }

            .auth-form {
                padding: 24px 16px;
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

            .auth-container {
                margin: 20px auto;
            }

            .auth-form {
                padding: 20px 16px;
                gap: 16px;
                border: none;
                box-shadow: none;
            }

            .form-group label {
                font-size: 13px;
            }

            .form-group input {
                padding: 12px 14px;
                font-size: 16px;
                border-radius: 6px;
            }

            .btn-submit {
                padding: 14px 24px;
                font-size: 14px;
                width: 100%;
            }

            .auth-footer {
                margin-top: 16px;
                font-size: 13px;
            }
        }
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
                <a href="login" class="btn-auth btn-signin">Se connecter</a>
                <a href="register" class="btn-auth btn-signup">Créer un compte</a>
            </div>
        </div>
    </nav>

    <main>
        <div class="auth-container">
            <form action="register" method="POST" class="auth-form">
                <div class="form-group">
                    <label for="nom">Nom</label>
                    <input 
                        type="text" 
                        id="nom"
                        name="nom" 
                        required 
                        placeholder="Votre nom complet"
                        autocomplete="name"
                    >
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input 
                        type="email" 
                        id="email"
                        name="email" 
                        required 
                        placeholder="votre@email.com"
                        autocomplete="email"
                    >
                </div>

                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input 
                        type="password" 
                        id="password"
                        name="password" 
                        required
                        placeholder="Créez un mot de passe sécurisé"
                        autocomplete="new-password"
                    >
                </div>

                <button type="submit" class="btn-submit">Créer mon compte</button>
            </form>

            <div class="auth-footer">
                <p>Déjà inscrit ? <a href="login">Se connecter ici</a></p>
            </div>
        </div>
    </main>
</body>
</html>