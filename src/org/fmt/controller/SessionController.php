<?php

namespace org\fmt\controller;

use Exception;
use NeoPHP\web\http\Response;
use NeoPHP\web\WebController;
use org\fmt\manager\UsersManager;
use org\fmt\view\ForgetfulnessPasswordView;
use stdClass;

/**
 * @route (path="session")
 */
class SessionController extends WebController
{
   /**
     * @routeAction  (method="PUT")
     */
    public function createSession ($username, $password)
    {   
        $response = new Response();
        $responseObject = new stdClass();
        
        
        try
        {
            $this->getSession()->destroy();
            $sessionId = false;
            $user = UsersManager::getInstance()->getUserByUsernameAndPassword($username, $password);
            
            if (!empty($user) )
            {
                
                $this->getSession()->start();
                
                $this->getSession()->sessionId = session_id();
                $this->getSession()->sessionName = session_name();
                $this->getSession()->userId = $user->getId();
                $this->getSession()->firstname = $user->getFirstname();
//                $this->getSession()->lastname = $user->getLastname();
//                $this->getSession()->type = $user->getType()->getId();
                $responseObject->success = true;
                $responseObject->sessionId = $this->getSession()->getId();
                $response->setContent(json_encode($responseObject));
                
            }
            else
            {
                $responseObject->success = false;
                $responseObject->errorMessage = "Nombre de usuario o contraseña incorrecta";
                $response->setStatusCode(401);
                $response->setContent(json_encode($responseObject));
            }
        }
        catch (Exception $ex)
        {
            $responseObject->success = false;
            $responseObject->errorMessage = $ex->getMessage();
            $response->setStatusCode(500);
            $response->setContent(json_encode($responseObject));
        }
        
        return $response;
    }
    
   /**
     * @routeAction  (action="reset",method="GET")
     */
    public function forgetfulnessPassword($email){
        
        $view = new ForgetfulnessPasswordView();
        if ( !empty($email) ) {
            
            $hashUpdate = UsersManager::getInstance()->setUserHash($email);
            
            $body = '';
            $notification = new SMTPMailer();
            $notification->addRecipient($email);
            $notification->setFrom("\"Fuenn.com\" <notifications@fuenn.com>");
            $notification->setSubject('Blanque de contraseña');
            $notification->setMessage($body);
            $notification->send();
            
            $view->setMessage('El email no pertenece a nuestra base de datos');
        } 
        
        return $view;        
    }
    
    
}

?>