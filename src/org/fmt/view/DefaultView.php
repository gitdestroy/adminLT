<?php

namespace org\fmt\view;

use NeoPHP\web\html\HTMLView;
use NeoPHP\web\html\Tag;
use org\fmt\view\component\Navegador;

abstract class DefaultView extends HTMLView {

    protected function build() {
        parent::build();
        $this->setTitle($this->getApplication()->getName());
        $this->addMeta(array("http-equiv" => "Content-Type", "content" => "text/html; charset=UTF-8"));
        $this->addMeta(array("charset" => "utf-8"));
        $this->addMeta(array("name" => "viewport", "content" => "width=device-width, initial-scale=1.0"));

        $this->addScriptFile($this->getBaseUrl() . "res/assets/js/jquery.min.js");
        $this->addScriptFile($this->getBaseUrl() . "res/assets/js/bootstrap.min.js");
        $this->addScriptFile($this->getBaseUrl() . "res/assets/js/slimscroll/jquery.slimscroll.min.js");
        $this->addScriptFile($this->getBaseUrl() . "res/assets/js/skins.min.js");
        $this->addScriptFile($this->getBaseUrl() . "res/assets/js/beyond.min.js");


        $this->addStyleFile($this->getBaseUrl() . "res/assets/css/bootstrap.min.css");
        $this->addStyleFile($this->getBaseUrl() . "res/assets/css/font-awesome.min.css");
        $this->addStyleFile($this->getBaseUrl() . "res/assets/css/weather-icons.min.css");
        $this->addStyleFile($this->getBaseUrl() . "res/assets/css/typicons.min.css");
        $this->addStyleFile($this->getBaseUrl() . "res/assets/css/demo.min.css");
        $this->addStyleFile($this->getBaseUrl() . "res/assets/css/animate.min.css");
        $this->addStyleFile($this->getBaseUrl() . "res/assets/css/inskey.css");
        $this->addStyleFile("http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,600,700,300");

        $this->htmlTag->add('<link id="bootstrap-rtl-link" href="" rel="stylesheet" />');
        $this->htmlTag->add('<link id="beyond-link" href="' . $this->getBaseUrl() . '/res/assets/css/beyond.min.css" rel="stylesheet" />');
        $this->htmlTag->add('<link id="skin-link" href="" rel="stylesheet" type="text/css" />');

        $this->getBodyTag()->add($this->createMainHeader());
        $this->getBodyTag()->add($this->createMainContent());
    }

    protected function addOnDocumentReadyScript($script, $hash = null) {
        if ($hash == null)
            $hash = md5($script);
        if (!isset($this->onDocumentReadyScriptHashes[$hash])) {
            if (!isset($this->documentReadyTag)) {
                $this->documentReadyTag = new Tag("script", array("type" => "text/javascript"), "$(document).ready(function(){});");
                $this->htmlTag->add($this->documentReadyTag);
            }

            $content = $this->documentReadyTag->getContent();
            $newContent = substr_replace($content, $script, -3, 0);
            $this->documentReadyTag->setContent($newContent);
            $this->onDocumentReadyScriptHashes[$hash] = true;
        }
    }

    protected function createMainHeader() {

        return '<div class="loading-container">
                    <div class="loader"></div>
                </div>
                <div class="navbar">
                    <div class="navbar-inner">
                        <div class="navbar-container">
                            <div class="navbar-header pull-left">
                                <a href="#" class="navbar-brand"><span>'.$this->getApplication()->getName().'</span></a>
                            </div>
                            <div class="sidebar-collapse" id="sidebar-collapse">
                                <i class="collapse-icon glyphicon glyphicon-th-list"></i>
                            </div>
                            <div class="navbar-header pull-right">
                                <div class="navbar-account">
                                ' . $this->createHeaderContent() . '
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';
        
//        return '<div class="loading-container">
//                    <div class="loader"></div>
//                </div>
//                <div class="navbar">
//                    <div class="navbar-inner">
//                        <div class="navbar-container">
//                            <div class="navbar-header pull-left">
//                                <a href="#" class="navbar-brand">
//                                    <span>Admin</span>
//                                </a>
//                            </div>
//                            <div class="sidebar-collapse" id="sidebar-collapse">
//                                <i class="collapse-icon fa fa-bars"></i>
//                            </div>
//                            <div class="navbar-header pull-right">
//                                <div class="navbar-account">
//                                    ' . $this->createHeaderContent() . '
//                                    <div class="setting">
//                                        <a id="btn-setting" title="Setting" href="#">
//                                            <i class="icon glyphicon glyphicon-cog"></i>
//                                        </a>
//                                    </div>
//                                    <div class="setting-container">
//                                        <label>
//                                            <input type="checkbox" id="checkbox_fixednavbar">
//                                                <span class="text">Fixed Navbar</span>
//                                        </label>
//                                        <label>
//                                            <input type="checkbox" id="checkbox_fixedsidebar">
//                                                <span class="text">Fixed SideBar</span>
//                                        </label>
//                                        <label>
//                                            <input type="checkbox" id="checkbox_fixedbreadcrumbs">
//                                                <span class="text">Fixed BreadCrumbs</span>
//                                        </label>
//                                        <label>
//                                            <input type="checkbox" id="checkbox_fixedheader">
//                                                <span class="text">Fixed Header</span>
//                                        </label>
//                                    </div>
//                                </div>
//                            </div>
//                        </div>
//                    </div>
//                </div>';
        
        
//        <ul class="nav sidebar-menu">
//                                <li>
//                                    <a href="index.html"><i class="menu-icon glyphicon glyphicon-home"></i><span class="menu-text"> Dashboard </span></a>
//                                </li>
//                            </ul>
    }

    protected function createMainContent() {
        
        return '<div class="main-container container-fluid">
                    <div class="page-container">
                        <div class="page-sidebar" id="sidebar">
                            <div class="sidebar-header-wrapper">
                                    <i class="searchicon glyphicon glyphicon-th-large"></i>
                            </div>
                            '.$this->addMenu ().'
                        </div>
                        <div class="page-content">
                            <div class="page-breadcrumbs">
                                <ul class="breadcrumb">
                                    <li>
                                        <i class="fa fa-home"></i>
                                        <a href="#">Home</a>
                                    </li>
                                    <li>
                                        <a href="#">More Pages</a>
                                    </li>
                                    <li class="active">Blank Page</li>
                                </ul>
                            </div>
                            <div class="page-header position-relative">
                                <div class="header-title">
                                    <h1>
                                        Blank Page
                                    </h1>
                                </div>
                                <div class="header-buttons">
                                    <a class="sidebar-toggler" href="#">
                                        <i class="fa fa-arrows-h"></i>
                                    </a>
                                    <a class="refresh" id="refresh-toggler" href="">
                                        <i class="glyphicon glyphicon-refresh"></i>
                                    </a>
                                    <a class="fullscreen" id="fullscreen-toggler" href="#">
                                        <i class="glyphicon glyphicon-fullscreen"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="page-body">
                                '.$this->createContent().'
                            </div>
                        </div>
                    </div>
                </div>';
        
//        return '<div class="main-container container-fluid">
//                        <!-- Page Container -->
//                        <div class="page-container">
//                            <!-- Page Sidebar -->
//                            <div class="page-sidebar" id="sidebar">
//                                <!-- Page Sidebar Header-->
//                                <div class="sidebar-header-wrapper">
//                                    <input type="text" class="searchinput" />
//                                    <i class="searchicon fa fa-search"></i>
//                                    <div class="searchhelper">Search Reports, Charts, Emails or Notifications</div>
//                                </div>
//                                <!-- /Page Sidebar Header -->
//                                <!-- Sidebar Menu -->
//                                <ul class="nav sidebar-menu">
//                                    <!--Dashboard-->
//                                    <li>
//                                        <a href="index.html">
//                                            <i class="menu-icon glyphicon glyphicon-home"></i>
//                                            <span class="menu-text"> Dashboard </span>
//                                        </a>
//                                    </li>
//                                    <!--Databoxes-->
//                                    <li>
//                                        <a href="databoxes.html">
//                                            <i class="menu-icon glyphicon glyphicon-tasks"></i>
//                                            <span class="menu-text"> Data Boxes </span>
//                                        </a>
//                                    </li>
//                                </ul>
//                                <!-- /Sidebar Menu -->
//                            </div>
//                            <!-- /Page Sidebar -->
//                            <!-- Chat Bar -->
//                            <div id="chatbar" class="page-chatbar">
//                                <div class="chatbar-contacts">
//                                    <div class="contacts-search">
//                                        <input type="text" class="searchinput" placeholder="Search Contacts" />
//                                        <i class="searchicon fa fa-search"></i>
//                                        <div class="searchhelper">Search Your Contacts and Chat History</div>
//                                    </div>
//                                    <ul class="contacts-list">
//                                        <li class="contact">
//                                            <div class="contact-avatar">
//                                                <img src="assets/img/avatars/divyia.jpg" />
//                                            </div>
//                                            <div class="contact-info">
//                                                <div class="contact-name">Divyia Philips</div>
//                                                <div class="contact-status">
//                                                    <div class="online"></div>
//                                                    <div class="status">online</div>
//                                                </div>
//                                                <div class="last-chat-time">
//                                                    last week
//                                                </div>
//                                            </div>
//                                        </li>
//                                    </ul>
//                                </div>
//                                <div class="chatbar-messages" style="display: none;">
//                                    <div class="messages-contact">
//                                        <div class="contact-avatar">
//                                            <img src="assets/img/avatars/divyia.jpg" />
//                                        </div>
//                                        <div class="contact-info">
//                                            <div class="contact-name">Divyia Philips</div>
//                                            <div class="contact-status">
//                                                <div class="online"></div>
//                                                <div class="status">online</div>
//                                            </div>
//                                            <div class="last-chat-time">
//                                                a moment ago
//                                            </div>
//                                            <div class="back">
//                                                <i class="fa fa-arrow-circle-left"></i>
//                                            </div>
//                                        </div>
//                                    </div>
//                                    <ul class="messages-list">
//                                        <li class="message">
//                                            <div class="message-info">
//                                                <div class="bullet"></div>
//                                                <div class="contact-name">Me</div>
//                                                <div class="message-time">10:14 AM, Today</div>
//                                            </div>
//                                            <div class="message-body">
//                                                Hi, Hope all is good. Are we meeting today?
//                                            </div>
//                                        </li>
//                                    </ul>
//                                    <div class="send-message">
//                                        <span class="input-icon icon-right">
//                                            <textarea rows="4" class="form-control" placeholder="Type your message"></textarea>
//                                            <i class="fa fa-camera themeprimary"></i>
//                                        </span>
//                                    </div>
//                                </div>
//                            </div>
//                            <!-- /Chat Bar -->
//                            <!-- Page Content -->
//                            <div class="page-content">
//                                <!-- Page Breadcrumb -->
//                                <div class="page-breadcrumbs">
//                                    <ul class="breadcrumb">
//                                        <li>
//                                            <i class="fa fa-home"></i>
//                                            <a href="#">Home</a>
//                                        </li>
//                                        <li>
//                                            <a href="#">More Pages</a>
//                                        </li>
//                                        <li class="active">Blank Page</li>
//                                    </ul>
//                                </div>
//                                <!-- /Page Breadcrumb -->
//                                <!-- Page Header -->
//                                <div class="page-header position-relative">
//                                    <div class="header-title">
//                                        <h1>
//                                            Blank Page
//                                        </h1>
//                                    </div>
//                                    <!--Header Buttons-->
//                                    <div class="header-buttons">
//                                        <a class="sidebar-toggler" href="#">
//                                            <i class="fa fa-arrows-h"></i>
//                                        </a>
//                                        <a class="refresh" id="refresh-toggler" href="">
//                                            <i class="glyphicon glyphicon-refresh"></i>
//                                        </a>
//                                        <a class="fullscreen" id="fullscreen-toggler" href="#">
//                                            <i class="glyphicon glyphicon-fullscreen"></i>
//                                        </a>
//                                    </div>
//                                    <!--Header Buttons End-->
//                                </div>
//                                <div class="page-body">
//                                    ' . $this->createContent() . '
//                                </div>
//                                <!-- /Page Body -->
//                            </div>
//                            <!-- /Page Content -->
//                        </div>
//                        <!-- /Page Container -->
//                        <!-- Main Container -->
//
//                    </div>';
    }
    
   

    protected function createTitle() {

//        $div = new Tag("div", ['class' => 'navbar-header']);
//
//        $button = new Tag("button", ['type' => 'button', 'class' => 'navbar-toggle', 'data-toggle' => 'collapse', 'data-target' => '.navbar-ex1-collapse']);
//        $button->add(new Tag("span", ['class' => 'sr-only'], "Toggle navigation"));
//        $button->add(new Tag("span", ['class' => 'icon-bar']));
//        $button->add(new Tag("span", ['class' => 'icon-bar']));
//        $button->add(new Tag("span", ['class' => 'icon-bar']));
//        $div->add($button);
//        $div->add(new Tag("a", ['class' => "navbar-brand", 'href' => 'index.html'], $this->setHeaderTitle()));
//        return $div;
    }

    protected abstract function createHeaderContent();

    protected abstract function createContent();

     protected  abstract function addMenu();
}

?>