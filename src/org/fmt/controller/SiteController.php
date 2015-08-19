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
        
//        if (! $this->getSession ()->isStarted() ) {
//            $this->getSession()->start();
//        }
        
//        $executeAccion = ($this->getSession()->isStarted() && isset($this->getSession()->sessionId));
//        
//        if (!$executeAccion) {
//            $response = new RedirectResponse("/");
//            $response->send();
//        }
//        return $executeAccion;
        return true;
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
    
   /**
     * @routeAction (action="setuser") 
     */
    public function insertUser ( $username, $password,$type,$firstname,$lastname,$document,$telephone,$mobile,$address,$provinceid,$countryid )
    {
        
        echo '<pre>';
        print_r ($_REQUEST);
        echo '</pre>';
        
        echo $username;
        exit;
        
//        $user = new User();
//        $user->setUsername($username);
//        $user->setPassword($password);
//        $user->setType((!empty($type))? $type: 3);
//        $user->setFirstname($firstname);
//        $user->setLastname($lastname);
//        $user->setDocument($document);
//        $user->setTelephone($telephone);
//        $user->setMobile($mobile);
//        $user->setAddress($address);
//        $user->setProvinceid($provinceid);
//        $user->setCountryid($countryid);
//        $insert = UsersManager::getInstance()->setUser($user);
        
    }
    
    
}

?>