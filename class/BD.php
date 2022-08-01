<?php

class BD{
    private static $instance;
    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new PDO(DB.':host='.DB_HOST.';
                port='.DB_PORT.';
                dbname='.DB_DATABASE,
                DB_USER, 
                DB_USER_PASS
            );

            self::$instance->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            self::$instance->setAttribute(PDO::ATTR_ORACLE_NULLS,PDO::NULL_EMPTY_STRING);
        }

        return self::$instance;
    }
}