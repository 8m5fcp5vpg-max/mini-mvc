<?php

namespace Mini\Models;

use Mini\Core\Database;
use PDO;

class Category
{
    public static function findAll()
    {
        $pdo = Database::getPDO();
        $stmt = $pdo->query("SELECT * FROM categorie ORDER BY nom ASC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}