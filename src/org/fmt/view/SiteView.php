<?php

namespace org\fmt\view;

use NeoPHP\web\html\Tag;
use org\fmt\model\UserType;

abstract class SiteView extends DefaultView
{   
    protected function createHeaderContent ()
    {   
        $headerContent = '';
        $headerContent .= $this->createMainMenu();
        $headerContent .= $this->createUserMenu();
        return $headerContent;
    }
    
    protected function createMainMenu()
    {
        $mainMenu = new Tag("ul", array("class"=>"nav navbar-nav navbar-left"));
        if ($this->getSession()->get("type") == UserType::USERTYPE_ADMINISTRATOR)
            $mainMenu->add ($this->createAdministratorToolsMenu());
        if ($this->getSession()->get("type") == UserType::USERTYPE_ADMINISTRATOR || $this->getSession()->get("type") == UserType::USERTYPE_ORGANIZER)
            $mainMenu->add ($this->createOrganizerToolsMenu());
        if ($this->getSession()->get("type") == UserType::USERTYPE_ADMINISTRATOR || $this->getSession()->get("type") == UserType::USERTYPE_ORGANIZER || $this->getSession()->get("type") == UserType::USERTYPE_PLAYER)
            $mainMenu->add ($this->createPlayerToolsMenu());
        return $mainMenu;
    }
    
    protected function createUserMenu()
    {
        return '
        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">            
                <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="fa fa-user"></i> ' . $this->getSession()->get("firstname") . ' ' . $this->getSession()->get("lastname") . ' <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="#" onclick="loadUrl(\'' . $this->getUrl("account/") . '\')"><i class="fa fa-user"></i> Mi Cuenta</a></li>
                    <li><a href="#" onclick="loadUrl(\'' . $this->getUrl("settings/") . '\')"><i class="fa fa-gear"></i> Configuración</a></li>
                    <li class="divider"></li>
                    <li><a href="' . $this->getUrl("site/logout") . '"><i class="fa fa-power-off"></i> Salir</a></li>
                </ul>
            </li>
        </ul>';
    }
    
    protected function createAdministratorToolsMenu ()
    {
        $list = new Tag("ul", array("class"=>"dropdown-menu"));
        $list->add ($this->createToolMenuItem ("Adm Usuarios", "user/showUserList"));
        $list->add ($this->createToolMenuItem ("Adm Categorías", "category/showCategoryList"));
        $list->add ($this->createToolMenuItem ("Adm Clubes", "club/showClubList"));
        $list->add ($this->createToolMenuItem ("Adm Paises", "country/showCountryList"));
        $list->add ($this->createToolMenuItem ("Adm Provincias", "province/showProvinceList"));
        return new Tag("li", array(new Tag("a", array("href"=>"#", "class"=>"dropdown-toggle", "data-toggle"=>"dropdown"), "&nbsp;Administración<b class=\"caret\"></b>"), $list));;
    }
    
    protected function createOrganizerToolsMenu ()
    {
        $list = new Tag("ul", array("class"=>"dropdown-menu"));
        $list->add ($this->createToolMenuItem ("Adm Torneos", "tournament/"));
        $list->add ($this->createToolMenuItem ("Adm Rankings", "ranking/"));
        $list->add ($this->createToolMenuItem ("Adm Anuncios", "notification/"));
        return new Tag("li", array(new Tag("a", array("href"=>"#", "class"=>"dropdown-toggle", "data-toggle"=>"dropdown"), "&nbsp;Organización<b class=\"caret\"></b>"), $list));;
    }
    
    protected function createPlayerToolsMenu ()
    {
        $list = new Tag("ul", array("class"=>"dropdown-menu"));
        $list->add ($this->createToolMenuItem ("Ver Torneos", "tournament/viewAll"));
        $list->add ($this->createToolMenuItem ("Ver Rankings", "ranking/viewAll"));
        return new Tag("li", array(new Tag("a", array("href"=>"#", "class"=>"dropdown-toggle", "data-toggle"=>"dropdown"), "&nbsp;Jugadores<b class=\"caret\"></b>"), $list));;
    }
    
    protected function createToolMenuItem ($title, $action)
    {
        $menuItem = new Tag("li", array(), new Tag("a", array("href"=>$this->getUrl($action)), $title));
        return $menuItem;
    }
}

?>