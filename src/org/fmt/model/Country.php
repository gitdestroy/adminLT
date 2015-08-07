<?php

namespace org\fmt\model;

use NeoPHP\mvc\Model;

/**
 * @table (tableName="country")
 */
class Country extends Model 
{
    /**
     * @column (columnName="countryid", id=true)
     */
    private $id;
    
    /**
     * @column (columnName="description")
     */
    private $description;
    
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