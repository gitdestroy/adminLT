<?php

namespace org\fmt\connection;

use NeoPHP\sql\PostgreSQLConnection;

class ProductionConnection extends PostgreSQLConnection
{
    public function getDatabaseName()
    {
        return "tennisfederation";
    }

    public function getHost()
    {
        return "localhost";
    }
    
    public function getUsername ()
    {
        return "postgres";
    }
    
    public function getPassword ()
    {
        return "tuvieja.com";
    }
}

?>