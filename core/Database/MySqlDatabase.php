<?php

namespace Core\Database;

use \PDO;

class MysqlDatabase extends Database 
{

    private $db_name;
    private $db_user;
    private $db_pass;
    private $db_host;
    private $pdo;
    
    public function __construct($db_name, $db_user='root', $db_pass='',$db_host='localhost')
    {
        $this->db_name=$db_name;
        $this->db_host=$db_host;
        $this->db_user=$db_user;
        $this->db_pass=$db_pass;
    }
   
    private function getPDO()
    {
        if ($this->pdo === null){
            $pdo = new PDO("mysql:dbname=fuentestuyp4;host=fuentestuyp4.mysql.db;charset=utf8","fuentestuyp4","31128211Aa");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo = $pdo;
        }  
        return $this->pdo;
    }

    public function query($statement, $class_name = null, $one = false) 
    {
        $req = $this->getPDO()->query($statement);
        if (strpos($statement, 'UPDATE') === 0 
            || strpos($statement, 'INSERT') === 0 
            || strpos($statement, 'DELETE') === 0
        ) {
            return $req;
        }
        if ($class_name === null) {
            $req->setFetchMode(PDO::FETCH_OBJ);
        } else {
            $req->setFetchMode(PDO::FETCH_CLASS, $class_name);
        }
        if ($one) {
            $datas = $req->fetch();
        } else {
            $datas = $req->fetchAll();
        }
        return $datas;
    }

    /**
     * Prepare les requête puis l'éxécute
     * 
     * @param $statement string le type de la requête
     * @param $class_name string le nom de la table à rechercher
     * @param $one int s'il n'y a qu'un élément à rechercher
     * @return array les éléments de la requête
     */
    public function prepare($statement, $attributes, $class_name = null, $one = false) 
    {
        $req = $this->getPDO()->prepare($statement);
        $res = $req->execute($attributes);
        if (strpos($statement, 'UPDATE') === 0 
            || strpos($statement, 'INSERT') === 0 
            || strpos($statement, 'DELETE') === 0
        ) {
            return $res;
        }
        if ($class_name === null) {
            $req->setFetchMode(PDO::FETCH_OBJ);
        } else {
            $req->setFetchMode(PDO::FETCH_CLASS, $class_name);
        }
        if ($one) {
            $datas = $req->fetch();
        } else {
            $datas = $req->fetchAll();
        }
        return $datas;
    }

    /**
     * Recupere le dernier article inseré
     */

    public function lastInsertId()
    {
        return $this->getPDO()->lastInsertId();
    }

}