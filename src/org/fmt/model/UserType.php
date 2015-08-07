<?php

namespace org\fmt\model;

use NeoPHP\mvc\Model;

/**
 * @table (tableName="usertype")
 */
class UserType extends Model 
{
    const USERTYPE_ADMINISTRATOR = 1;
    const USERTYPE_ORGANIZER = 2;
    const USERTYPE_PLAYER = 3;
    
    /**
     * @column (columnName="usertypeid", id=true)
     */
    private $id;
    
    /**
     * @column (columnName="description")
     */
    private $description;
    
    public function __construct($id=null)
    {
        $this->id = $id; 
    }
    
    public function getId() 
    {
        return $this->id;
    }

    public function setId($id) 
    {
        $this->id = $id;
    }

    public function getDescription() 
    {
        return $this->description;
    }

    public function setDescription($description) 
    {
        $this->description = $description;
    }
}

?>