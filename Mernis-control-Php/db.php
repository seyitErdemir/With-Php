<?php
class Db extends Mernis
{
    public function __construct()
    {
    }
    public function db()
    {
        try {
            $db = new PDO("mysql:host=localhost;dbname=mernis;charset=utf8", "root", "");
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        return $db;
    }
}

 
