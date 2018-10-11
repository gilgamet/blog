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
        $req = $this->query("SELECT * 
                FROM comments");
                

        return $req;        
    }

    /**
     * Récupère les commentaires de l'article
     *  @param $category_id int
     *  @return array
     */
    public function getCommentsById($id) 
    {
        $req = $this->query("SELECT *
            FROM articles
            LEFT JOIN comments ON comment_id = comment.id
           ", [$id]);
        return $req;
                
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
        return $this->query(
            "SELECT comments.id, comments.pseudo, comments.mail, comments.contenu, comments.reported
            FROM comments
            ORDER BY comments.date DESC");
    }

}