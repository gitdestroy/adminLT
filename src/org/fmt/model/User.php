<?php

namespace org\fmt\model;

use NeoPHP\mvc\Model;

/**
 * @table (tableName="user")
 */
class User extends Model
{  
    //CREATE TABLE employees (userid INT NOT NULL PRIMARY KEY AUTO_INCREMENT,username VARCHAR(20) NOT NULL,password VARCHAR(20) NOT NULL,usertypeid INT NOT NULL,firstname VARCHAR(20) NOT NULL,lastname VARCHAR(20) NOT NULL,document VARCHAR(20) NOT NULL,telephone VARCHAR(20) NOT NULL,mobile VARCHAR(20) NOT NULL,address VARCHAR(50) NOT NULL,provinceid INT,countryid INT)
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
    private $lastname;
    
    /**
     * @column (columnName="document")
     */
    private $document;
    
    /**
     * @column (columnName="telephone")
     */
    private $telephone;
    
    /**
     * @column (columnName="mobile")
     */
    private $mobile;
    
    /**
     * @column (columnName="address")
     */
    private $address;
    
    /**
     * @column (columnName="provinceid", relatedTableName="province")
     */
    private $provinceid;
    
    /**
     * @column (columnName="countryid", relatedTableName="country")
     */
    private $countryid;
    
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
    
    function getLastname ()
    {
        return $this->lastname;
    }

    function getDocument ()
    {
        return $this->document;
    }

    function getTelephone ()
    {
        return $this->telephone;
    }

    function getMobile ()
    {
        return $this->mobile;
    }

    function getAddress ()
    {
        return $this->address;
    }

    function getProvinceid ()
    {
        return $this->provinceid;
    }

    function getCountryid ()
    {
        return $this->countryid;
    }

    function setLastname ( $lastname )
    {
        $this->lastname = $lastname;
    }

    function setDocument ( $document )
    {
        $this->document = $document;
    }

    function setTelephone ( $telephone )
    {
        $this->telephone = $telephone;
    }

    function setMobile ( $mobile )
    {
        $this->mobile = $mobile;
    }

    function setAddress ( $address )
    {
        $this->address = $address;
    }

    function setProvinceid ( $provinceid )
    {
        $this->provinceid = $provinceid;
    }

    function setCountryid ( $countryid )
    {
        $this->countryid = $countryid;
    }
}

?>
