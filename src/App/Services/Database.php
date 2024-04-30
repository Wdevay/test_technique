<?php
namespace App\Services;

use PDO;
use PDOException;

class Database
{
    /////////////////Attributs///////////////////////////////
    private $db_host;
    private $db_name;
    private $db_port;
    private $db_user;
    private $db_password;
    private $db_dsn;
    private $pdo;

    /////////////////Constructeur///////////////////////////////
    public function __construct()
    {
        $this->db_host = DB_HOST;
        $this->db_name = DB_NAME;
        $this->db_port = DB_PORT;
        $this->db_user = DB_USER;
        $this->db_password = DB_PASSWORD;
        $this->db_dsn = "mysql:host={$this->db_host};port={$this->db_port};dbname={$this->db_name};charset=utf8";
    }
///////////////Fonctions///////////////////////////////
    private function getPDO()
    {
        if ($this->pdo === null) {
            try {
                $db = new PDO($this->db_dsn, $this->db_user, $this->db_password);
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo "Problème de connexion au serveur de base de données: " . $e->getMessage();
                die();
            }
            $this->pdo = $db;
        }
        return $this->pdo;
    }

    //Fonction permettant d'executer une requete Select
    public function select($statement,$params=[]){
        $sql = $this->getPDO()->prepare($statement);
        $sql->execute($params); 
        $data = $sql->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    //Fonction permettant d'executer une requete Insert, Update, Delete
    public function query($statement, $params = [])
    {
        $sql = $this->getPDO()->prepare($statement);
        $sql->execute($params);
        return $this->getPDO();
    }
}

