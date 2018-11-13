<?php

namespace App\Entity;

use Core\Entity\Entity;

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

}