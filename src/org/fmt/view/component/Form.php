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
    
    public function addElement($tag,$name,$title){
        
        $component= null;
        
        switch ($name){
            
            case "text":
                $div = new Tag('div',['class'=>'form-group']);
                $div->add(new Tag('label',['For'=>'email']));
                $div->add(new Tag('input',['type'=>"$tag",'class'=>'form-control','id'=>"$name",'name'=>"$name"],$title));
                
//                <div class="form-group">
//			< f>Email</label>
//			<input type="email" class="form-control" id="email" placeholder="Tu email" name="email">
//			</div>
                $component = $div;
                break;
            
        }
        
        return $component;
    }
}

?>