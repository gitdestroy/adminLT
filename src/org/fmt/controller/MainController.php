<?php

namespace org\fmt\controller;

use NeoPHP\web\WebController;
use org\fmt\view\TestView;

/**
 * @route (path="/")
 */
class MainController extends WebController
{
    public function onBeforeActionExecution ($action, $params)
    {
        $this->getSession()->destroy();
        return true;
    }
   
    /**
     * @routeAction
     */
    public function showPortal ()
    {
//        return new PortalView();
        return new TestView();
        
        
//        $conn = ProductionConnection::getInstance();
//        
//        
//        $country = new Country();
//        $country->setDescription("Afganistan");
//        ConnectionUtils::insertEntity($conn, $country);
//        
//        
//        $countries = $conn->getTable("country")->get(Country::getClass());
//        echo "<pre>";
//        print_r ($countries);
//        echo "</pre>";
    }
}

?>