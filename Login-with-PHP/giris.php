<?php

try {
    $db= new PDO("mysql:host=localhost;dbname=login;charset=utf8","root","");

} catch (PDOException $e) {
    echo $e->getMessage();
}


if ($_GET) {
    $isim     = $_GET["isim"];
    $sifre = $_GET["sifre"];

    
    $data=array(
    'isim'      =>$isim , 
    'sifre'  =>$sifre 
    );

    if (empty($_GET["isim"])==false)  { 

        if (empty($_GET["sifre"])==false)  { 


            $rows=$db->query("SELECT * FROM login WHERE isim='$isim'",PDO::FETCH_ASSOC);
            foreach ($rows as $row) {
                $gercekSifre= $row["sifre"];
                echo $gercekSifre;
                if ($gercekSifre) {
                    if ($gercekSifre==$sifre) {
                       // readfile("https://www.google.com/");
                        header("location:https://www.google.com/");
                    }else{
                        header("refresh:0.1;url=index.html");
                            $message = "Girdiginiz Şifre Yanlış";
                    echo "<script type='text/javascript'>alert('$message');</script>";
                    }
                }else{
                    echo "şifre bulunamadı";
                }
                
            }
              

        }else{
            header("refresh:0.1;url=index.html");
        $message = "Lütfen Bir Şifre Giriniz.";
        echo "<script type='text/javascript'>alert('$message');</script>";


        }


      
    }else{
        header("refresh:0.1;url=index.html");
        $message = "Lütfen Bir Id Giriniz.";
        echo "<script type='text/javascript'>alert('$message');</script>";

    }




}



?>