<?php

namespace org\fmt\view\component;

use NeoPHP\web\html\Tag;

class MenuItem extends Tag
{
    private $name;
    private $menu;
    private $attributes;
    
    public function __construct ($name, array $attributes = [])
    {
        parent::__construct("li", []);
        $this->name = $name;
        $this->attributes = $attributes;
        $this->menu = null;
        
        
//        <li>
//            <a href="font-awesome.html">
//                <i class="menu-icon fa fa-rocket"></i>
//                <span class="menu-text">Font Awesome</span>
//            </a>
//        </li>
        
    }
    
    public function getMenu ()
    {
        return $this->menu;
    }

    public function setMenu ( $menu )
    {
        $this->menu = $menu;
    }
    public function setHref($href)
    {
        $this->href = $href;
    }
    public function setIcon($icon)
    {
        $this->icon = $icon;
    }
    function setName ( $name )
    {
        $this->name = $name;
    }
    
    public function toHtml ( $offset = 0 )
    {
        
        if (!empty($this->name)) {
            $href = ['href'=>(!empty($this->href)) ? $this->href : "#"];
            if(!empty($this->attributes)){
                $this->attributes = array_merge($href,  $this->attributes);
            }else{
                $this->attributes = $href;
            }
            
            $aTag = new Tag("a",$this->attributes, '<span class="menu-text">'.$this->name.'</span>');
            if (!empty($this->icon)) {
                $aTag->add (new Tag("i",['class'=>  $this->icon], ""));
            }
            $this->add($aTag);
        }
        if (!empty($this->menu)) {
            $this->add($this->menu);
        }
        return parent::toHtml ( $offset );
    }
}

?>