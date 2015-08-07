<?php

namespace org\fmt\model;

use NeoPHP\mvc\Model;

/**
 * @table (tableName="tournament")
 */
class Tournament extends Model
{
    const STATE_INSCRIPTION = 1;
    const STATE_PLAYING = 2;
    const STATE_FINALIZED = 3;
    
    /**
     * @column (columnName="tournamentid", id=true)
     */
    private $id;
    
    /**
     * @column (columnName="description")
     */
    private $description;
    
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
     * @column (columnName="startdate")
     */
    private $startDate;
    
    /**
     * @column (columnName="inscriptionsdate")
     */
    private $inscriptionsDate;
    
    /**
     * @column (columnName="state")
     */
    private $state;
    
    /**
     * @column (columnName="organizeruserid", relatedTableName="user")
     */
    private $organizer;
    
    private $categories = array();
    private $inscriptions = array();
    
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

    public function getStartDate()
    {
        return $this->startDate;
    }

    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;
    }

    public function getInscriptionsDate()
    {
        return $this->inscriptionsDate;
    }

    public function setInscriptionsDate($inscriptionsDate)
    {
        $this->inscriptionsDate = $inscriptionsDate;
    }

    public function getState()
    {
        return $this->state;
    }

    public function setState($state)
    {
        $this->state = $state;
    }
    
    public function getCategories ()
    {
        return $this->categories;
    }
    
    public function addCategory (Category $category)
    {
        $this->categories[] = $category;
    }
    
    public function getInscriptions (Category $category = null)
    {
        $inscriptions = array();
        if ($category == null)
        { 
            $inscriptions = array_values($this->inscriptions);
        }
        else if (isset($this->inscriptions[$category]))
        {
            $inscriptions = $this->inscriptions[$category];
        }
        return $inscriptions;
    }
    
    public function addInscription(Category $category, PlayerTeam $team)
    {
        if (!isset($this->inscriptions[$category]))
            $this->inscriptions[$category] = array();
        $this->inscriptions[$category][] = $team;
    }
    
    public function getOrganizer()
    {
        return $this->organizer;
    }

    public function setOrganizer(User $organizer)
    {
        $this->organizer = $organizer;
    }
}

?>
