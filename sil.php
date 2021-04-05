<?php
    include("db.php");
    $id=$_GET["id"];
   $delete= $db->prepare("DELETE FROM kurul where id=:id");
   $delete->bindParam(":id",$id,PDO::PARAM_INT);
   $result= $delete->execute();
    if ($result) {
        header ("Location:kurulKayit.php");
        # code...
    }

?>