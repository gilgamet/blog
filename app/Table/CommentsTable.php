<?php

require_once ROOT . '\core\Table\Table.php';


class CommentsTable extends Table
{
    protected $table = 'comments';

    /** Récupère tous les commentaires
     * 
     * @param id int 
     * @return array
     */
    public function getAllComments($id) 
    {
        $req = $this->query
        (
            "SELECT * 
            FROM comments
            WHERE comments.id = ?", [$id]
        );
                

        return $req;        
    }

    /**
     * Récupère les commentaires de l'article
     *  @param $category_id int
     *  @return array
     */
    public function getCommentsById($id) 
    {
        $req = $this->query
        (
            "SELECT articles.id, articles.titre, articles.contenu, articles.date, comments.id, comments.pseudo, comments.contenu, comments.reported
            FROM articles
            LEFT JOIN comments ON articles.id = article_id
            WHERE comments.article_id = ?", [$id]
        );
        return $req;
                
    }

    /**
     * Récupère les derniers commentaires
     * @return array
     */
    public function lastComment()
    {
        return $this->query
        (
            "SELECT comments.id, comments.pseudo, comments.mail, comments.contenu, comments.reported
            FROM comments
            ORDER BY comments.date DESC"
        );
    }

    public function findComment($id)
    {
        $req = $this->query
        (
            "SELECT  comments.id, comments.reported 
            FROM comments", [$id], true
        );
        return $req;
    }

    /**
     * Incrémente le compteur du signalement de commentaire
     *  @param type $id id du commentaire ciblé
     */
    public function report($id) 
    {
        $req = $this->query
        (
            "UPDATE FROM comments SET reported = reported + 1 WHERE id = ?", [$id]
        );
        return $req;
    }    
}