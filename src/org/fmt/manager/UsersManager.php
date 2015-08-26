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
    
    
    public function setUserHash($email){
        
        $userTable = $this->getConnection()->getTable("user");
        $userTable->addWhere("email", "=", $email );
        $userTable->update(['hashcode'=>hash("md5", $email)]);
        return $userTable->getFirst(User::getClass());
    }
    
    
}

?>