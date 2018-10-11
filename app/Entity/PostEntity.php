<?php

require_once ROOT . '\core\Entity\Entity.php';

/**
 * Class entity  permet un affichage des données de post (article) 
 */

class PostEntity extends Entity
{

    /* 
    *Fonction magique url rewriting
    */
    public function getUrl()
    {
        return 'index.php?p=posts.show&id=' . $this->id;
    }

    /**
     * Montre un extrait de la publication (article)
     *
     * @return html
     */
    public function getExtrait()
    {
        $html = '<p>'. substr($this->contenu, 0, 390) .'...</p>';
        $html .= '<p><a href="'. $this->getUrl() .'">Voir la suite</a></p><br/><br/><br/><br/>';
        return $html;
    }

}