<?php

require_once ROOT . '\core\Table\Table.php';

class Article extends Table
{

    protected $table = 'articles';

    public static function getLast()
    {
        $req =  self::query(
            "SELECT articles.id, articles.titre, articles.contenu, categories.titre AS categorie 
            FROM articles 
            LEFT JOIN categories on category_id = categories.id
            ORDER BY articles.date DESC");
        return $req;
    }

    public function getUrl()
    {
        return 'index.php?p=article&id=' . $this->id;
    }

    /**
     * @return html
     */
    public function getExtrait()
    {
        $html = '<p>'. substr($this->contenu, 0, 390) .'...</p>';
        $html .= '<p><a href="'. $this->getUrl() .'">Voir la suite</a></p>';
        return $html;
    }

    /**
     * @return requete sql
     */
    public static function lastByCategory($category_id)
    {
        $req = self::query("SELECT articles.id, articles.titre, articles.contenu, categories.titre AS categorie 
            FROM articles 
            LEFT JOIN categories
                on category_id = categories.id 
            WHERE articles.id=?
            ORDER BY articles.date DESC", [$category_id]);
        return $req;
    }   
    
    /**
     * @return requete sql
     */
    public function find($id)
    {
        $req = self::query(
            "SELECT articles.id, articles.titre, articles.contenu, categories.titre as categorie 
            FROM articles 
            LEFT JOIN categories ON category_id = categories.id", [$id], true);
        return $req;
    }

}