<?php

namespace org\fmt\controller;

use NeoPHP\web\http\RedirectResponse;
use NeoPHP\web\WebController;
use org\fmt\view\DashboardView;

/**
 * @route (path="site")
 */
class SiteController extends WebController
{
    protected function onBeforeActionExecution($action, $parameters)
    {
        return parent::onBeforeActionExecution($action, $parameters);
    }
    
    /**
     * @routeAction
     */
    public function showDashboard ()
    {
        return new DashboardView();
    }
    
    /**
     * @routeAction (action="logout")
     */
    public function logout ()
    {
        return new RedirectResponse("/");
    }
}

?>