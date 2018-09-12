<?php

require_once ROOT . '\core\Entity\Entity.php';

class CategoryEntity extends Entity{

    public function getUrl(){
        return 'index.php?p=posts.category&id=' . $this->id;
    }

   
}
