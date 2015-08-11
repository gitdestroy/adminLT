<?php   

namespace org\fmt\view\component;

use NeoPHP\web\html\Tag;

class Form extends Tag
{
    private $components = [];
    
    public function __construct (array $attributes = null,$accion= null,$method="POST")
    {
        parent::__construct("form", $attributes);
        $this->setAttributes(array_merge($attributes , ['accion'=>$accion,'method'=>$method]));
    }
    
    public function addComponent(Tag $component){
        $this->components[] = $component;
    }

    public function compile ()
    {
        foreach ($this->components as $component)
        {
            $this->add($component); 
        }
    }
    
}

?>