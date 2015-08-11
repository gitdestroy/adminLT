<?php

namespace org\fmt\manager;

use NeoPHP\mvc\ModelManager;
use NeoPHP\sql\Connection;
use org\fmt\connection\ProductionConnection;

class MainManager extends ModelManager
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