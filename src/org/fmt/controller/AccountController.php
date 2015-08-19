<?php

namespace org\fmt\controller;

use org\fmt\manager\UsersManager;
use org\fmt\view\SingUpView;


/**
 * @route (path="account")
 */
class AccountController extends SiteController
{    
    /**
     * @routeAction (action="prueba")
     */
    public function testAction(){
        
//        $user = UsersManager::getInstance()->getUser("yamij","1234");
        
        echo "correcto!!";
    }
    
    
     /**
     * @routeAction (action="singup")
     */
    public function singupAction(){
        
        $view = new SingUpView();
        return $view;
    }
    
}

?>