<?php

require_once ROOT . '\core\Entity\Entity.php';

class CommentsEntity extends Entity
{
    /** 
     * Fonction magique url 
     * @return url
     */  
    public function getUrl()
    {
        return 'index.php?p=admin.comments.show&id=' . $this->id;
    }

    /**
     * Montre un extrait du commentaire
     *
     * @return html
     */
    public function getExtrait()
    {
        $html = '<p>'. substr($this->contenu, 0, 390) .'...</p>';
        $html .= '<p><a href="'. $this->getUrl() .'">Voir la suite</a></p>';
        return $html;
    }
}