<?php

try {
    $db= new PDO("mysql:host=localhost;dbname=web;charset=utf8","root","");

} catch (PDOException $e) {
    echo $e->getMessage();
}

?>