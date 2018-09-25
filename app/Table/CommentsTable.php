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
    public function getAllComments() 
    {
        $req = self::query("SELECT * 
                FROM comments
                LEFT JOIN articles ON article_id = articles.id");
                

        return $req;        
    }

    /**
     * Récupère les commentaires de l'article
     *  @param $category_id int
     *  @return array
     */
    public function getCommentsById($id) 
    {
        return $this->query("SELECT * 
                FROM comments 
                WHERE article_id = {$id}
                ORDER BY comments.id DESC");
    }

    /**
     * Incrémente le compteur du signalement de commentaire
     *  @param type $id id du commentaire ciblé
     */
    public function report($id) 
    {
        return $this->query("UPDATE comments SET reported = reported + 1 WHERE id = ?", [$id]);
    }

            /**
     * Récupère les derniers commentaires
     * @return array
     */
    public function lastComment(){
        return $this->query("
            SELECT comments.id, comments.pseudo, comments.mail, comments.contenu, comments.reported, articles.id as article
            FROM comments
            LEFT JOIN articles ON article_id = articles.id
            ORDER BY articles.date DESC");
    }

}