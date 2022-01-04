<?php 

try {
    $db= new PDO("mysql:host=localhost;dbname=adres_defteri;charset=utf8","root","");

} catch (PDOException $e) {
    echo $e->getMessage();
}
?>