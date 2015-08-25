<?php

namespace org\fmt\manager;

use NeoPHP\util\mail\SMTPMailer;
use org\fmt\model\User;

class UsersManager extends MainManager
{
    public function getUserByUsernameAndPassword ($username, $password)
    {
        $user = null;
        $userTable = $this->getConnection()->getTable("user");
        $userTable->addWhere("username", "=", $username);
        $userTable->addWhere("password", "=", $password);
        $user = $userTable->getFirst(User::getClass());
        return $user;
    }
    
    public function getUser ($username, $password)
    {
        
        $userTable = $this->getConnection()->getTable("user");
        $userTable->addWhere("username", "=", $username);
        $userTable->addWhere("password", "=", $password);
        $userTable->addFields (["usertypeid", "description"], "usertype_%s", "usertype");
        $userTable->addFields (["userid", "firstname"], "%s", "user");
        $userTable->addInnerJoin ("usertype", "usertype.usertypeid","user.usertypeid");
        $userTable->setLimit(1);
        return $userTable->getFirst(User::getClass());
        
    }
    
    
    public function setUser(  User $user){
        $this->getConnection()->insertEntity($user);
    }
    
    
    public function resetPassword($email){
        
        $body = '';
        
        $userTable = $this->getConnection()->getTable("user");
        $userTable->addWhere("username", "=", "yamij");
        $userTable->update(['firstname'=>'Yamil']);
        
        $notification = new SMTPMailer();
        $notification->addRecipient($email);
        $notification->setFrom("\"Fuenn.com\" <notifications@fuenn.com>");
        $notification->setSubject('Blanque de contraseña');
        $notification->setMessage($body);
        $notification->send();
        return "Email enviado a {$email}";
    }
    
    
}

?>