<?php

namespace org\fmt\view;

use NeoPHP\web\html\HTMLView;
use NeoPHP\web\html\Tag;

abstract class DefaultView2 extends HTMLView
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
        $this->addStyleFile($this->getBaseUrl() . "res/assets/bootstrap-3.3.4/css/bootstrap.min.css");
//        $this->addStyleFile($this->getBaseUrl() . "res/css/site.css");
        
        
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
        return '
        <div id="mainNavbar" class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="#" class="navbar-brand">' . $this->getApplication()->getName() . '</a>
                </div>
                 <div class="navbar-collapse collapse navbar-responsive-collapse">
                    ' . $this->createHeaderContent() . '
                </div>
            </div>
        </div>';
    }
    
    protected function createMainContent ()
    {
        return '
        <div id="mainContent">
            <div id="mainBody">
                ' . $this->createContent() . '
            </div>
        </div>';
    }
    
    protected abstract function createHeaderContent();
    protected abstract function createContent();
}

?>