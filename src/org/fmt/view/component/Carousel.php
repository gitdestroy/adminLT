<?php

namespace org\fmt\view\component;

use NeoPHP\web\html\Tag;


class Carousel extends Tag{
    

    protected function _construct ()
    {
        parent::__construct ("<div>");
        $this->setAttributes(["id"=>"pepehongo"]);
        return $this->toHtml();
        
    }

    
    
    
    
    
}



?>