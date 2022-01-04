<?php 

include("db.php");

if ($_GET) {
    $id=$_GET["id"];
    $name=$_GET["name"];
    $lastname=$_GET["lastname"];
    $phone=$_GET["phone"];
    $email=$_GET["email"];
    $web=$_GET["web"];

    $location=$_GET["location"];
}
$data=array(
    'id'=>$id,
    'isim'=>$name,
    'soyisim'=>$lastname,
    'phone'=>$phone,
    'email'=>$email,
    'web'=>$web,

    'adres'=>$location
);
$update=$db->prepare("UPDATE adress set 
        name=:isim,
        lastname=:soyisim,
        phone=:phone,
        email=:email,
        web=:web,
        location=:adres 
        WHERE id=:id
    ");
    $result=$update->execute($data);
    if ($result) {
        header ("Location:list.php");
    }else {
        echo "işlem olmadu";
    }



?>