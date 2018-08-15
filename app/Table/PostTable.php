<?php

class PostTable extends Table{

    protected $table = "articles";

    /**
     * Recupere les derniers articles
     *
     * @return array
     */
    
    public function last(){
        return $this->query("SELECT articles.id, articles.titre, articles.contenu, categories.titre as categorie 
        FROM articles 
        LEFT JOIN categories
            on category_id = categories.id 
        ORDER BY articles.date DESC");
    }

    /**
     * recupere les articles de la categorie demandée
     *
     * @param [type] $category_id int
     * @return array
     */
    public function lastByCategory ($category_id){
        return $this->query("SELECT articles.id, articles.titre, articles.contenu, categories.titre as categorie 
        FROM articles 
        LEFT JOIN categories ON category_id = categories.id
        WHERE articles.category_id = ?     
        ORDER BY articles.date DESC", [$category_id]);
    }


    /**
     * Recupere un article a l'aide de la categorie
     * @param $id int
     * @return object App\Entity\PostEntity
     */

    public function findWithCategory($id){
        return $this->query("SELECT articles.id, articles.titre, articles.contenu, articles.date, categories.titre AS categorie 
        FROM articles 
        LEFT JOIN categories
            on category_id = categories.id 
        WHERE articles.id = ?", [$id], true);
    }
}