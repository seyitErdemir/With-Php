<?php
include("db.php");

if ($_GET) {
        $name      =$_GET["name"];
        $lastname  =$_GET["lastname"];

        $phone     =$_GET["phone"];
        $email     =$_GET["email"];
        $web  =$_GET["web"];

        $location  =$_GET["location"];
}

$data =array(
    'isim'=>$name,
    'soyisim'=>$lastname,
    'telefon'=>$phone,
    'mail'=>$email,
    'web'=>$web,

    'adres'=>$location,
);
$insert = $db->prepare("INSERT INTO adress set 
        name=:isim,
        lastname=:soyisim,
        phone=:telefon,
        email=:mail,
        web=:web,

        location=:adres
  ");
  $result = $insert->execute($data);
  if ($result) {
    header ("Location:list.php");
      # code...
  }

?>