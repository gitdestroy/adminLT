<?php

namespace org\fmt\manager;

use org\fmt\model\User;

class UsersManager extends MainManager
{
    public function getUserByUsernameAndPassword ($username, $password)
    {
        $user = null;
        $userTable = $this->getConnection()->getTable("user");
        $userTable->addWhere("username", "=", $username);
        $userTable->addWhere("password", "=", $password);
        $user = $userTable->get(User::getClass());
        return $user[0];
    }
}

?>