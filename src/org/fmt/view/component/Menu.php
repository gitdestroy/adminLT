<?php

namespace org\fmt\view\component;

use NeoPHP\web\html\Tag;

class Menu extends Tag
{
    private $menuItems;
    
    public function __construct (array $attributes = [])
    {
        parent::__construct("ul", $attributes);
        $this->menuItems = [];
    }
    
    public function addMenuItem (MenuItem $item)
    {
        $this->menuItems[] = $item;
    }
    
    public function compile ()
    {
        foreach ($this->menuItems as $menuItem)
        {
            $this->add($menuItem); 
        }
    }
}

?> 