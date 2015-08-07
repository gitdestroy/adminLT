<?php

namespace org\fmt\manager;

use NeoPHP\mvc\Manager;
use org\fmt\connection\ProductionConnection;
use org\fmt\model\User;
use PDO;

class UsersManager extends MainManager
{
    public function getUserByUsernameAndPassword ($username, $password)
    {
        $user = null;
        $userTable = $this->getConnection()->getTable("\"user\"");
        $userTable->addWhere("username", "=", $username);
        $userTable->addWhere("password", "=", $password);
        $user = $userTable->get(User::getClass());
        
        echo "<pre>";
        print_r ($user);
        echo "</pre>";
        
        
        
//        while ($userTable->hasNext())
//        {
//            $user = $userTable->next(User::getClass());
////            $user = 
//        }
        
        
        
//        if ($userTable->find(true))
//        {
//            $userTable->fetch(User::getClass());
//            
//            echo "<pre>";
//            print_r ($userTable->getFields());
//            echo "</pre>";
//
//    //        $user = new User($record);
//        }
        return $user;
    }
}

?>