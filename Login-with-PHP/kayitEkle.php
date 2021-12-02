<?php


try {
    $db= new PDO("mysql:host=localhost;dbname=login;charset=utf8","root","");

} catch (PDOException $e) {
    echo $e->getMessage();
}

if ($_GET) {
    $isim     = $_GET["isim"];
    $sifre = $_GET["sifre"];

    if (empty($_GET["isim"])==false)  { 

        if (empty($_GET["sifre"])==false)  {

            $data=array(
                'isim'      =>$isim , 
                'sifre'  =>$sifre 
            );
            $rows=$db->query("SELECT isim FROM login",PDO::FETCH_ASSOC);
            $i=0;
            foreach ($rows as $row) {
              
              if ($row["isim"]==$isim) { 
                  $i++;
              }
              
            }
            echo $i;
                if ($i==0) {      
            $insert=$db->prepare("INSERT INTO login SET 
            isim=:isim,
            sifre=:sifre" );
            $i=0;
            
            $result=$insert->execute($data);
            if ($result) { 
                
                header("refresh:0.1;url=index.html");
                $message = "Kayıt İşlemi Başarılı";
              echo "<script type='text/javascript'>alert('$message');</script>";
            } else{
               
                header("refresh:0.1;url=kayitEkle.php");
                $message = "Kayıt İşlemi Başarısız";
                  echo "<script type='text/javascript'>alert('$message');</script>";
            }  
                }else{
                    
                    
                    $message = "Bu Id ye sahip kullanıcı  bulunmakta";
                     echo "<script type='text/javascript'>alert('$message');</script>";
                     header("refresh:0.1;url=kayitEkle.php");
                }

         }else{
            header("refresh:0.1;url=kayitEkle.php");
            $message = "Kayıt Olmak İçin Bir Şifre Gerekli";
    echo "<script type='text/javascript'>alert('$message');</script>";
    
        }
    
    }else{
        header("refresh:0.1;url=index.html");
        $message = "Kayıt Olmak İçin Bir Id Gerekli";
echo "<script type='text/javascript'>alert('$message');</script>";

    }

}

    






   
?>