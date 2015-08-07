<?php

namespace org\fmt\manager;

use NeoPHP\mvc\Manager;
use NeoPHP\sql\Connection;
use org\fmt\connection\ProductionConnection;

class MainManager extends Manager
{
    /**
     * Obtiene la conexión principal de manejador
     * @return type
     * @return Connection conexion principal
     */
    protected function getConnection()
    {
        return ProductionConnection::getInstance();
    }
}

?>