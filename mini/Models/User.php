<?php

namespace Mini\Models;

use Mini\Core\Database;
use PDO;

class User
{
    private $id;
    private $nom;
    private $email;
    private $mot_de_passe;
    private $role;         

    // Getters et Setters

    public function setId($id) { $this->id = $id; }
    public function getId() { return $this->id; }

    public function setNom($nom) { $this->nom = $nom; }
    public function getNom() { return $this->nom; }

    public function setEmail($email) { $this->email = $email; }
    public function getEmail() { return $this->email; }

    public function setMotDePasse($mdp) { $this->mot_de_passe = $mdp; }
    public function getMotDePasse() { return $this->mot_de_passe; }

    public function setRole($role) { $this->role = $role; }
    public function getRole() { return $this->role; }

    // On vérifie si l'email existe déjà
    public static function findByEmail($email)
    {
        $pdo = Database::getPDO();
        $stmt = $pdo->prepare("SELECT * FROM utilisateur WHERE email = ?");
        $stmt->execute([$email]);

            return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Enregistre le nouvel utilisateur en BDD
    public function save()
    {
        $pdo = Database::getPDO();
        
        // On force le rôle "client" si rien n'est défini
        if (empty($this->role)) {
            $this->role = 'client';
        }

        $sql = "INSERT INTO utilisateur (nom, email, mot_de_passe, role) VALUES (?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        
        return $stmt->execute([
            $this->nom, 
            $this->email, 
            $this->mot_de_passe, 
            $this->role
        ]);
    }
}