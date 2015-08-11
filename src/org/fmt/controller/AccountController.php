<?php

namespace org\fmt\controller;


/**
 * @route (path="account")
 */
class AccountController extends SiteController
{    
    /**
     * @routeAction (action="prueba")
     */
    public function testAction(){
        echo "correcto!!";
    }
    
}

?>