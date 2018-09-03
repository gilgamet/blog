<?php

/**
 * Class Table
 * Réuni les actions élémentaires à la bdd
 */
class Table {

    protected $table;
    protected $db;

    /**
     * Constructeur
     * @param string $db Database
     * Défini la database et la classe correspondante à la table à utiliser
     */
    public function __construct(Database $db) {
        $this->db = $db;
        if (is_null($this->table)) {
            $parts = explode('\\', get_class($this));
            $class_name = end($parts);
            $this->table = strtolower(str_replace('Table', '', $class_name)) . 's';
        }
    }

    /**
     * Renvoi tout les élément de la table
     * @param $class string Le nom de la classe à charger
     */
    public function all() {
        return $this->query('SELECT * FROM ' . $this->table);
    }

    /**
     * Recherche l'élément de la table correspondant à l'id
     * @param int $id Id de l'element à rechercher
     */
    public function find($id) {
        return $this->query("SELECT * FROM {$this->table} WHERE id = ?", [$id], true);
    }

    /**
     * Parcours les éléménts du tableau pour les passer à la réquête update
     * @param $int $id Id de l'element à rechercher
     * @param $array $fields Tableau contenant les éléménts à modifier
     */
    public function update($id, $fields) {
        $sql_parts = [];
        $attributes = [];
        foreach ($fields as $k => $v) {
            $sql_parts[] = "$k = ?";
            $attributes[] = $v;
        }
        $attributes[] = $id;
        $sql_part = implode(', ', $sql_parts);
        return $this->query("UPDATE {$this->table} SET $sql_part WHERE id = ?", $attributes, true);
    }

    /**
     * Supprime un élément
     * @param int $id Id de l'element à rechercher
     */
    public function delete($id) {
        return $this->query("DELETE FROM {$this->table} WHERE id = ?", [$id], true);
    }

    /**
     * Créé un élément 
     * @param array tableau des champs à inserer dans la table
     */
    public function create($fields) {
        $sql_parts = [];
        $attributes = [];
        foreach ($fields as $k => $v) {
            $sql_parts[] = "$k = ?";
            $attributes[] = $v;
        }
        $sql_part = implode(', ', $sql_parts);
        return $this->query("INSERT INTO {$this->table} SET $sql_part", $attributes, true);
    }

    /**
     * @return array les informations recherchées dans le resultat d'une requête
     */
    public function extract($key, $value) {
        $records = $this->all();
        $return = [];
        foreach ($records as $k => $v) {
            $return[$v->$key] = $v->$value;
        }
        return $return;
    }

    /**
     * Prepare les requêtes, s'il y a des données externes, en requête préparée sinon requête simple
     */
    public function query($statement, $attributes = null, $one = false) {
        if ($attributes) {
            return $this->db->prepare(
                $statement, $attributes, str_replace('Table', 'Entity', get_class($this)), $one
            );
        } else {
            return $this->db->query(
                $statement, str_replace('Table', 'Entity', get_class($this)), $one
            );
        }
    }

}
