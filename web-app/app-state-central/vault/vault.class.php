<?php

# VAULT
#
# This object provides functionality for accessing the database and managing that connection.
# Inspiration taken from wickstjo's db class - see https://github.com/wickstjo/backend/blob/master/core/classes/db.php

class Vault {

    private static $connection = null;
    private $handler = null;

    private function __CONSTRUCT()
    {
        $host = 'localhost';
        $name = 'web_serv_cms_project_1';
        $username = 'wscp1-admin';
        $password = '';
        $this->handler = new PDO('mysql:host=' . $host . '; dbname=' . $name, $username, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES UTF8"));
        $this->handler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    }
    
    public static function getConnection()
    {
        if (!isset(self::$connection)) {
            self::$connection = new Vault();
        }
        return self::$connection;
    }

    public static function closeConnection()
    {
        // TODO: make this function
    }

    public function create()
    {
        // TODO: make this function
    }

    public function read($select, $from, $where)
    {
        $command = "SELECT ";
        foreach ($select as $s) {
            $command .= "`" . $s . "`";
            if ($s !== $select[count($select) - 1]) $command .= ",";
        }
        $command .= " FROM ";
        foreach ($from as $f) {
            $command .= "`" . $f . "`";
            if ($f !== $from[count($from) - 1]) $command .= ",";
        }
        $command .= " WHERE " . $where;
        return $this->handler->prepare($command);
    }

    public function update()
    {
        // TODO: make this function
    }

    public function delete()
    {
        // TODO: make this function
    }
}

include 'vault-transactions.php';