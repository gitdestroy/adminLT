<?php

namespace org\fmt\controller;

use NeoPHP\web\http\RedirectResponse;
use NeoPHP\web\WebController;
use org\fmt\model\User;
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
        $this->getSession()->start();
        $user = new User();
        $user->setFirstname($this->getSession()->firstname);
        $dV = new DashboardView();
        $dV->setUser($user);
        return $dV;
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