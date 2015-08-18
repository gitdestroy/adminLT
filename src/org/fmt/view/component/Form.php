<?php   

namespace org\fmt\view\component;

use NeoPHP\web\html\Tag;

class Form extends Tag
{
    private $components = [];
    
    public function __construct (array $attributes = null,$accion= "#",$method="POST")
    {
        parent::__construct("form", $attributes);
//        $this->add(new Tag ( "h4",[],"formulario Registro"));
        if ( !empty($attributes) ){
            $this->setAttributes(array_merge($attributes , ['role'=>'form','accion'=>$accion,'method'=>$method]));
        } else {
            $this->setAttributes(['role'=>'form','accion'=>$accion,'method'=>$method]);
        }
        
    }
    public function toHtml ( $offset = 0 )
    {   
        foreach ($this->components as $component)
        {
            $this->add($component); 
        }
        return parent::toHtml ( $offset );
    }

    public function addComponent(Tag $component){
        $this->components[] = $component;
    }

    public function addElement($tag,$name,$title){
        
        $component= null;
        
        switch ($tag){
            
            case "text":
            case "password":
                $div = new Tag('div',['class'=>'form-group col-xs-12  center-block']);
                $div->add(new Tag('label',['For'=>"sminput"],$title));
                $div->add(new Tag('input',['type'=>"$tag",'class'=>'form-control input-sm "center-block','id'=>"$name",'name'=>"$name"]));
                $component = $div;
                break;
            
        }
        $divRow =  new Tag("div",['class'=>'row']);
        $divRow->add($component);
        $this->components[] =$divRow ;
        return $this;
//        $this->addComponent($component);
    }
}

?>