<?php

class DB
{
    private static $instance = null;

    public static function getInstance()
    {
        if(!self::$instance){
            try {
                self::$instance = new PDO(DSN, USER, PASSWORD, array (PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return self::$instance;
            }
            catch(Exception $e){
                die('Erreur: '.$e->getMessage());
            }
        }
    }

}