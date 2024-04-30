<?php
namespace App\Models;

use App\Services\Database;

class UserManager
{

    //Fonction permettant d'inserer un nouvel utilisateur
    public function insert($data)
    {
        $db = new Database();
        $sql = "INSERT INTO user (username, email, password) VALUES (?, ?, ?)";
        $db->query($sql, $data);
    }

    //Fonction permettant de retrouver un utilisateur par son email
    public function getOnebyEmail($email)
    {
        $db = new Database();
        $sql = "SELECT * FROM user WHERE email = ?";
        return $db->select($sql, [$email]);
    }
}