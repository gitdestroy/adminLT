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
     * @routeAction (action="prueba",method="GET") 
     */
    public function testAction($email){
        
        $user = UsersManager::getInstance()->resetPassword($email);
        
        echo $user;
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