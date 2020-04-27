<?php

class DB
{
    /**
     * @return PDO
     */
    public static function getConnection()
    {
        static $pdo;

        require_once './config.php';

        if ($pdo === null) {
            $pdo = new PDO("mysql:host={$config['host']};dbname={$config['dbname']}", $config['username'], $config['passwd']);
            $pdo->exec("set names utf8");
        }

        return $pdo;
    }
}