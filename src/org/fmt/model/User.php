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
    private $lastname;
    
    /**
     * @column (columnName="birthdate")
     */
    private $birthDate;
    
    /**
     * @column (columnName="address")
     */
    private $address;
    
    /**
     * @column (columnName="contactvia1")
     */
    private $contactVia1;
    
    /**
     * @column (columnName="contactvia2")
     */
    private $contactVia2;
    
    /**
     * @column (columnName="contactvia3")
     */
    private $contactVia3;
    
    /**
     * @column (columnName="email")
     */
    private $email;
    
    /**
     * @column (columnName="documentnumber")
     */
    private $documentNumber;
    
    /**
     * @column (columnName="countryid", relatedTableName="country")
     */
    private $country;
    
    /**
     * @column (columnName="provinceid", relatedTableName="province")
     */
    private $province;
    
    /**
     * @column (columnName="clubid", relatedTableName="club")
     */
    private $club;
    
    /**
     * @column (columnName="disponibility")
     */
    private $disponibility;
    
    /**
     * @column (columnName="active")
     */
    private $active;
    
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

    public function getLastname()
    {
        return $this->lastname;
    }

    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }

    public function getBirthDate()
    {
        return $this->birthDate;
    }

    public function setBirthDate($birthDate)
    {
        $this->birthDate = $birthDate;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function setAddress($address)
    {
        $this->address = $address;
    }

    public function getContactVia1()
    {
        return $this->contactVia1;
    }

    public function setContactVia1($contactVia1)
    {
        $this->contactVia1 = $contactVia1;
    }

    public function getContactVia2()
    {
        return $this->contactVia2;
    }

    public function setContactVia2($contactVia2)
    {
        $this->contactVia2 = $contactVia2;
    }

    public function getContactVia3()
    {
        return $this->contactVia3;
    }

    public function setContactVia3($contactVia3)
    {
        $this->contactVia3 = $contactVia3;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getDocumentNumber()
    {
        return $this->documentNumber;
    }

    public function setDocumentNumber($documentNumber)
    {
        $this->documentNumber = $documentNumber;
    }

    public function getCountry()
    {
        return $this->country;
    }

    public function setCountry(Country $country)
    {
        $this->country = $country;
    }

    public function getProvince()
    {
        return $this->province;
    }

    public function setProvince(Province $province)
    {
        $this->province = $province;
    }
    
    public function getClub()
    {
        return $this->club;
    }

    public function setClub(Club $club)
    {
        $this->club = $club;
    }

    public function getDisponibility()
    {
        return $this->disponibility;
    }

    public function setDisponibility($disponibility)
    {
        $this->disponibility = $disponibility;
    }
    
    public function setActive($active)
    {
        $this->active = $active;
    }
    
    public function isActive()
    {
        return $this->active;
    }
}

?>
