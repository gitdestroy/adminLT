<?php

namespace org\fmt\view;

use NeoPHP\web\html\Tag;
use org\fmt\view\component\Menu;
use org\fmt\view\component\MenuItem;
use org\fmt\view\component\Navegador;

class TestView extends DefaultView{
    
    protected function createContent ()
    {
//        $tag = new Tag("ul",array('class'=>'sidebar-menu'));
//        $tag->add(new Menu());
//        return $tag;
        
//        return '<ul class="nav nav-tabs">
//                    <li class="dropdown">
//                      <a class="dropdown-toggle" data-toggle="dropdown" href="#">
//                        Menú desplegable <span class="caret"></span>
//                      </a>
//                      <ul class="dropdown-menu">
//                      </ul>
//                    </li>
//                  </ul>';
        
    }

    protected function createHeaderContent ()
    {
        
        
        $menuI = new MenuItem("Menu2",['href'=>'javascript:;', 'data-toggle'=>'collapse', 'data-target'=>'#demo']);
        $menuT = new Menu(['id'=>'demo', 'class'=>'collapse']);
        $menuT->addMenuItem(new MenuItem("Item1",['href'=>'#']));
        $menuT->addMenuItem(new MenuItem("Item2",['href'=>'#']));
        $menuT->addMenuItem(new MenuItem("Item3",['href'=>'#']));
        
        $menuI->setMenu($menuT);
        
        
        $menu = new Menu(["class"=>"nav navbar-nav side-nav"]);        
        $menu->addMenuItem(new MenuItem("Menu1",['href'=>'#']));
        $menu->addMenuItem($menuI);
        $menu->addMenuItem(new MenuItem("Menu3",['href'=>'#']));
        
        
        $divMenu = new Tag("div", ['class'=>'collapse navbar-collapse navbar-ex1-collapse']);
        $divMenu->add($menu);
        
        $nav = new Navegador(['class'=>'navbar navbar-inverse navbar-fixed-top', 'role'=>'navigation']);
        
        $nav->addMenu($divMenu);
        
        return $nav;
        
        
        
    }
    
}


?>