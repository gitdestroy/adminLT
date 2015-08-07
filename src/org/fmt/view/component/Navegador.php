<?php

namespace org\fmt\view\component;

use NeoPHP\web\html\Tag;

class Navegador extends Tag
{
    private $menu;
    
    public function __construct ( $attributes = null, $content = null )
    {
        parent::__construct ( "nav", $attributes, $content );
        $this->menu = [];
    }
    
    public function addMenu ( $menu )
    {
        $this->menu[] = $menu;
    }

        public function compile ()
    {
        if(!empty($this->menu)){
            foreach (  $this->menu as $dMenu ){            
                $this->add($dMenu);
            }
        }
    }

    
}
