<?php

namespace App\Entity;

use Core\Entity\Entity;

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
        $html =  substr($this->contenu, 0, 390) .'...';
        $html .= '<a href="'. $this->getUrl() .'">Voir la suite</a>';
        return $html;
    }

}