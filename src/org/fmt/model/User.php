<?php

namespace org\fmt\model;

use NeoPHP\mvc\Model;

/**
 * @table (tableName="user")
 */
class User extends Model
{  
    /**
     * @column (columnName="userid", id=true)
     */
    private $id;
    
    /**
     * @column (columnName="username")
     */
    private $username;
    
    /**
     * @column (columnName="password")
     */
    private $password;
    
    /**
     * @column (columnName="usertypeid", relatedTableName="usertype")
     */
    private $type;
    
    /**
     * @column (columnName="firstname")
     */
    private $firstname;
    
    /**
     * @column (columnName="lastname")
     */
    
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setType(UserType $type)
    {
        $this->type = $type;
    }

    public function getFirstname()
    {
        return $this->firstname;
    }

    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }
}

?>
