<?php

namespace org\fmt\connection;

use NeoPHP\sql\MySqlConnection;

class ProductionConnection extends MySqlConnection
{
    public function getDatabaseName()
    {
        return "adminfuenn";
    }

    public function getHost()
    {
        return "localhost";
    }
    
    public function getUsername ()
    {
        return "";
    }
    
    public function getPassword ()
    {
        return "";
    }
}

?>