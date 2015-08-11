<?php

namespace org\fmt\controller;

use NeoPHP\web\WebController;

/**
 * @route (path="account")
 */
class AccountController extends WebController
{
    public function onBeforeActionExecution ($action, $params)
    {
        //$this->getSession()->destroy();
        return true;
    }
    
    /**
     * @routeAction (action="prueba")
     */
    public function testAction(){
        echo"correcto!!";
    }
    
}

?>