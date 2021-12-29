<?php
//     class Db{
//          function db(){
//             try {
//                 $db = new PDO("mysql:host=localhost;dbname=mernis;charset=utf8", "root", "");
//             } catch (PDOException $e) {
//                 echo $e->getMessage();
//             }
//         }
//     }

// $database = new Db();
    
// $database->db();
   
try {
    $db = new PDO("mysql:host=localhost;dbname=mernis;charset=utf8", "root", "");
} catch (PDOException $e) {
    echo $e->getMessage();
}
 


?>