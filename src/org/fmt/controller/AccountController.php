<?php

namespace org\fmt\controller;

use org\fmt\manager\UsersManager;


/**
 * @route (path="account")
 */
class AccountController extends SiteController
{    
    /**
     * @routeAction (action="prueba")
     */
    public function testAction(){
        
        $user = UsersManager::getInstance()->getUser("yamij","1234");
        
        echo "correcto!!";
    }
    
}

?>