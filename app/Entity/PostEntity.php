<?php

class PostEntity extends Entity{

    public function getUrl(){
        return 'index.php?p=posts.show&id=' . $this->id;
    }

    public function getExtrait(){
        $html = '<p>'. substr($this->contenu, 0, 390) .'...</p>';
        $html .= '<p><a href="'. $this->getUrl() .'">Voir la suite</a></p>';
        return $html;
    }

}