<?php

namespace org\fmt\view\component;

use NeoPHP\web\html\Tag;

class MenuItem extends Tag
{
    private $title;
    private $titleAtributes;
    private $menu;
    
    public function __construct ($title,$titleAtributes, array $attributes = [])
    {
        parent::__construct("li", $attributes);
        $this->title = $title;
        $this->titleAtributes = $titleAtributes;
        $this->menu = null;
    }
    
    public function getMenu ()
    {
        return $this->menu;
    }

    public function setMenu ( $menu )
    {
        $this->menu = $menu;
    }
    
    function getTitle ()
    {
        return $this->title;
    }

    function setTitle ( $title )
    {
        $this->title = $title;
    }
    
    public function toHtml ( $offset = 0 )
    {
        if (!empty($this->title)) {
            $this->add (new Tag("a", $this->titleAtributes, $this->title));
        }
        if (!empty($this->menu)) {
            $this->add($this->menu);
        }
        return parent::toHtml ( $offset );
    }
}

?>