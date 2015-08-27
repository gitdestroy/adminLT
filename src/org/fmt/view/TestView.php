<?php

namespace org\fmt\view;

use NeoPHP\web\html\Tag;
use org\fmt\view\component\Form;
use org\fmt\view\component\Menu;
use org\fmt\view\component\MenuItem;

class TestView extends DefaultView{
    
    protected function build() {
        parent::build();
//        $this->getBodyTag()->add($this->createMessageBox());
        $this->addScript('
            function checkPageLocation ()
            {
                var src = window.location.href;
                if(window.top != window.self) {
                    window.open(src,"_top");
                }
            }

            function clearErrorMessage ()
            {
                $("#messageBox .modal-body").html("");
            }

            function showErrorMessage (message)
            {
                $("#messageBox .modal-body").html(message);
                $("#messageBox").modal("show");
            }

            function disableLoginControls ()
            {
                $("input[name=username]").prop("disabled", true);
                $("input[name=password]").prop("disabled", true);
                $("button[name=loginbutton]").prop("disabled", true);
                $("body").css("cursor", "progress");
            }

            function enableLoginControls ()
            {
                $("input[name=username]").prop("disabled", false);
                $("input[name=password]").prop("disabled", false);
                $("button[name=loginbutton]").prop("disabled", false);
                $("body").css("cursor", "default");
                $("input[name=username]").focus();
            }

            $("button[name=loginbutton]").click(function(event)
            {
                clearErrorMessage();
                disableLoginControls();
                var username = $("input[name=username]")[0].value;
                var password = $("input[name=password]")[0].value;
                $.ajax("' . $this->getUrl("session/") . '?username=" + username + "&password=" + password,
                {
                    method: "PUT",
                    success: function (response)
                    {
                        var data = jQuery.parseJSON(response);
                        if (data.success)
                        {
                            window.open("' . $this->getUrl("site/") . '", "_self");
                        }
                        else
                        {
                            showErrorMessage(data.errorMessage);
                            enableLoginControls();
                        }
                    },
                    error: function (qXHR, textStatus, errorThrown)
                    {
                        if (qXHR.responseText)
                        {
                            var responseObject = jQuery.parseJSON(qXHR.responseText);
                            showErrorMessage(responseObject.errorMessage);
                        }
                        else
                        {
                            showErrorMessage(textStatus + " - " + errorThrown);
                        }
                        enableLoginControls();
                    },
                    timeout: function ()
                    {
                        showErrorMessage("Se ha agotado el tiempo de conexión. Intente más tarde");
                        enableLoginControls();
                    }
                });
                return false;
            });
        ');
    }

    
    protected function createContent ()
    {
        
        $form = new Form(['class'=>"rawStyle"]);
        $form->addElement("text", "firstname", "Nombre");
        $form->addElement("text", "lastname", "Apellido");
        $form->addElement("text", "username", "Usuario");
        $form->addElement("password", "password", "Contraseña");
        
        return $form;
        
        
    }

    protected function createHeaderContent ()
    {
        return '<ul class="account-area">
                '.$this->setLogin().'
            </ul>';
        
    }
    
    protected function setLogin()
    {
        $form = new Form(['class'=>'navbar-form navbar-right']);
        
        $componentUser = new Tag('div',['class'=>'form-group']);
        $componentUser->add(new Tag('input',['type'=>'text', 'name'=>'username', 'placeholder'=>'Usuario', 'class'=>'form-control']));
        $componentPass = new Tag('div',['class'=>'form-group']);
        $componentPass->add(new Tag('input',['type'=>'password', 'name'=>'password', 'placeholder'=>'Contraseña', 'class'=>'form-control']));
        
        
        $form->addComponent($componentUser);
        $form->addComponent($componentPass);
        $form->addComponent(new Tag ( 'button',['type'=>'button', 'name'=>'loginbutton', 'class'=>'btn btn-primary'] ,'Login'));
        
        return $form;
    }

    protected function addMenu ()
    {
        $menu = new Menu(['class'=>'nav sidebar-menu']);
        
        $itemHome = new MenuItem("Home");
        $itemHome->setHref($this->getUrl ( "/site") );
        $itemHome->setIcon("menu-icon glyphicon glyphicon-home");
        $menu->addMenuItem($itemHome);
        
        $itemAdmUser = new MenuItem("Adm. User",['class'=>'menu-dropdown']);
        $itemAdmUser->setIcon("menu-icon glyphicon glyphicon-user");
        
        $menuUser = new Menu(['class'=>'submenu']);
        $itemCreateUser = new MenuItem("Crear Usuario");         
        $menuUser->addMenuItem($itemCreateUser);
                
        $itemAdmUser->setMenu($menuUser);
        $menu->addMenuItem($itemAdmUser);
        
        return $menu;
    }

    protected function createBarPage ()
    {
        return "";
    }

}


?>