<?php

namespace org\fmt\view;

use NeoPHP\web\html\HTMLView;
use NeoPHP\web\html\Tag;
use org\fmt\view\component\Navegador;

abstract class DefaultView extends HTMLView
{    
    protected function build()
    {
        parent::build();
        $this->setTitle($this->getApplication()->getName());
        $this->addMeta(array("http-equiv"=>"Content-Type", "content"=>"text/html; charset=UTF-8"));
        $this->addMeta(array("charset"=>"utf-8"));
        $this->addMeta(array("name"=>"viewport", "content"=>"width=device-width, initial-scale=1.0"));
        $this->addScriptFile($this->getBaseUrl() . "res/assets/jquery-1.11.2/jquery.min.js");
        $this->addScriptFile($this->getBaseUrl() . "res/assets/bootstrap-3.3.4/js/bootstrap.min.js");
        $this->addScriptFile($this->getBaseUrl() . "res/sb/js/plugins/morris/raphael.min.js");
        $this->addScriptFile($this->getBaseUrl() . "res/sb/js/plugins/morris/morris.min.js");
        $this->addScriptFile($this->getBaseUrl() . "res/sb/js/plugins/morris/morris-data.js");
        $this->addStyleFile($this->getBaseUrl() . "res/sb/css/bootstrap.min.css");
        $this->addStyleFile($this->getBaseUrl() . "res/sb/css/sb-admin.css");
        $this->addStyleFile($this->getBaseUrl() . "res/sb/css/plugins/morris.css");
        $this->addStyleFile($this->getBaseUrl() . "res/sb/font-awesome/css/font-awesome.min.css");
        
        $this->getBodyTag()->add($this->createMainHeader());
        $this->getBodyTag()->add($this->createMainContent());
        
    }
    
    protected function addOnDocumentReadyScript($script, $hash=null)
    {
        if ($hash == null)
            $hash = md5($script);
        if (!isset($this->onDocumentReadyScriptHashes[$hash]))
        {
            if (!isset($this->documentReadyTag))
            {
                $this->documentReadyTag = new Tag("script", array("type"=>"text/javascript"), "$(document).ready(function(){});");
                $this->htmlTag->add($this->documentReadyTag);
            }
            
            $content = $this->documentReadyTag->getContent();
            $newContent = substr_replace($content, $script, -3, 0);
            $this->documentReadyTag->setContent($newContent);
            $this->onDocumentReadyScriptHashes[$hash] = true;
        }
    }
    
    protected function createMainHeader ()
    {
//        return '
//                <div id="wrapper">
//                   ' . $this->createHeaderContent() . '
//               </div>';
        
        $tag = new Tag("div",array('id'=>'wrapper'));
        $nav = new Navegador(['class'=>'navbar navbar-inverse navbar-fixed-top', 'role'=>'navigation']);
        $nav->addMenu($this->createTitle ());
        $nav->addMenu($this->createHeaderContent());
        $tag->add($nav);
        $tag->add($this->createContent());
        return $tag;
        
    }
    
    protected function createMainContent ()
    {
//        return '
//        <div id="mainContent">
//            <div id="mainBody">
//                ' . $this->createContent() . '
//            </div>
//        </div>';
//        
        
    }
    
    protected function createTitle(){
        
        $div = new Tag("div",['class'=>'navbar-header']);   
        
        $button = new Tag("button",['type'=>'button', 'class'=>'navbar-toggle', 'data-toggle'=>'collapse', 'data-target'=>'.navbar-ex1-collapse']);
        $button->add(new Tag("span",['class'=>'sr-only'],"Toggle navigation"));
        $button->add(new Tag("span",['class'=>'icon-bar']));
        $button->add(new Tag("span",['class'=>'icon-bar']));
        $button->add(new Tag("span",['class'=>'icon-bar']));
        $div->add($button);
        $div->add(new Tag("a",['class'=>"navbar-brand", 'href'=>'index.html'],  $this->setHeaderTitle()));
        return $div;
    }


    protected abstract function createHeaderContent();
    protected abstract function createContent();
    protected abstract function setHeaderTitle();
}

?>