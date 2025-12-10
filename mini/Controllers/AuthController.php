<?php

declare(strict_types=1);

namespace Mini\Controllers;

use Mini\Core\Controller;
use Mini\Models\User;

class AuthController extends Controller
{
    // INSCRIPTION

    // On affiche le formulaire 
    public function register(): void
    {
        $this->render('auth/register', [
            'title' => 'Inscription'
        ]);
    }

    // Traite le formulaire
    public function registerPost(): void
    {
        // Récupération et nettoyage des données
        $nom = htmlspecialchars($_POST['nom'] ?? '');
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $password = $_POST['password'] ?? '';

        // Validation
        if (empty($nom) || empty($email) || empty($password)) {
            die("Erreur : Tous les champs sont obligatoires.");
        }

        // Vérifier si l'email existe déjà
        if (User::findByEmail($email)) {
            die("Erreur : Cet email est déjà utilisé ! <a href='login'>Se connecter</a>");
        }

        // Création de l'objet User
        $user = new User();
        $user->setNom($nom);
        $user->setEmail($email);
        
        // Hachage du mot de passe 
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $user->setMotDePasse($hashedPassword);

        // Sauvegarde en BDD
        if ($user->save()) {
            // SUccès -> renvoyer à la page login
            header('Location: ./login'); 
            exit;
        } else {
            die("Erreur technique lors de l'enregistrement.");
        }
    }

    // PARTIE CONNEXION

    // On affiche le formulaire de connexion
    public function login(): void
    {
        $this->render('auth/login', [
            'title' => 'Se connecter'
        ]);
    }

    public function loginPost(): void
    {
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $password = $_POST['password'] ?? '';

        // On cherche l'utilisateur en base de données
        $userArray = User::findByEmail($email);

        // Vérification -> utilisateur exite (userArray True, et mdp correspond = password_verify)
        if ($userArray && password_verify($password, $userArray['mot_de_passe'])) {
            
            // SUCCÈS
            $_SESSION['user'] = [
                'id'    => $userArray['id'],
                'nom'   => $userArray['nom'],
                'email' => $userArray['email'],
                'role'  => $userArray['role']
            ];

            // Redirection vers l'accueil
            header('Location: ./');
            exit;

        } else {
            // ÉCHEC
            die("Identifiants incorrects (Email ou mot de passe invalide). <a href='login'>Réessayer</a>");
        }
    }

    // PARTIE DÉCONNEXION

    public function logout(): void
    {
        // On détruit la session
        session_destroy();
        
        //  Et redirige vers l'accueil
        header('Location: ./');
        exit;
    }
}