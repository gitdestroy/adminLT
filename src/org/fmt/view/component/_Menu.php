<?php

namespace org\fmt\view\component;

use NeoPHP\web\html\Tag;

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class _Menu extends Tag{
   

    public function __construct ( $name = "nav", $attributes = array('class'=>'navbar navbar-inverse navbar-fixed-top', 'role'=>'navigation'), $content = null )
    {
        parent::__construct ( $name, $attributes, $content );
        
    }
    
    private function getMenuItems($menusItems = array (),$atributes = array('id'=>'demo' ,'class'=>'collapse')){
        
        $component = new Tag("ul", $atributes);
        foreach ($menusItems as $menu => $item){
            $liTag = new Tag("li");
            $aTag = new Tag("a", array('href'=>$item),$menu);
//            $aTag->add(new Tag ( "i", array('class'=>'fa fa-circle-o') ));             
            $liTag->add($aTag);
           $component->add($liTag);
        }        
        return $component;
    }
    
    
    function addMenuBar($menus= array()){
        
        $divT = new Tag("div", array('class'=>'collapse navbar-collapse navbar-ex1-collapse'));
        $ulTag = new Tag("ul", array('class'=>'nav navbar-nav side-nav'));
        foreach ($menus as $menu){
            $ulTag->add($menu);
        }
        $divT->add($ulTag);
        $this->add($divT);
        return $this;
    }
    
    function addMenu($menu = array ()){        
        $liTag = new Tag("li");
        $aTag = new Tag("a", array('href'=>$menu),  key ( $menu));
        $iTag = new Tag("i",array('class'=>'fa fa-fw fa-wrench'));
        $aTag->add($iTag);
        $liTag->add($aTag);
        return $liTag;
    }
        
        
    
    function addMenuItems($menu = array (),$menuItems = array ()){
        
        $liTag = new Tag("li");
        $aTag = new Tag("a", array('href'=>'javascript:;','data-toggle'=>'collapse','data-target'=>'#demo'),  key ( $menu));
        $iTag = new Tag("i",array('class'=>'fa fa-fw fa-arrows-v'));
        $aTag->add($iTag);
        $liTag->add($aTag);
        $liTag->add(  $this->getMenuItems($menuItems) );
        return $liTag;
    }
    
    
    private function addMenuSmall(){
        
        $divT = new Tag("div",array('class'=>'navbar-header'));
        $buttomT = new Tag("button",array('type'=>'button','class'=>'navbar-toggle','data-toggle'=>'collapse','data-target'=>'.navbar-ex1-collapse'));
        $divT->add($buttomT);
        $buttomT->add(new Tag("span",array('class'=>'sr-only'),"Toggle navigation"));   
        $buttomT->add(new Tag("span",array('class'=>'icon-bar')));   
        $buttomT->add(new Tag("span",array('class'=>'icon-bar')));   
        $buttomT->add(new Tag("span",array('class'=>'icon-bar')));   
        $divT->add(new Tag("a",array('class'=>'navbar-brand','href'=>'index.html')));
        
        return $divT;
        
    }
    
}