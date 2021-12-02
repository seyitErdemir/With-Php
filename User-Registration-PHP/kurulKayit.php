<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous" />
    <title>Document</title>


</head>


<body>
<div class="container mt-4">



    <div class="row">
        <div class="col-6 " style="border: 1px solid green; padding: 1rem;">
            <h1><a href="kurulKayit.php"  style="text-decoration-line: none;"> Kayıt Sayfası</a></h1>
            <form action="" method="POST" enctype="multipart/form-data">

                <div class="form-group  my-2">
                    <label class="form-label" for="">Kullanılacak Resimi Seçiniz</label>
                    <input class="form-control" type="file" name="resim">
                </div>

                <div class="form-group my-2">
                    <label class="form-label" for=""> isim gir </label>
                    <input class="form-control" type="text" name="isim">


                </div>
                <div class="form-group my-2">
                    <label class="form-label" for=""> Linked Adresi </label>
                    <input  class="form-control" type="text" name="linked">


                </div>
                <div class="form-group my-2">
                    <label class="form-label" for=""> Mail Adresi</label>
                    <input  class="form-control" type="text" name="mail">

                </div>
                <input class="mt-3" style="margin: 0px auto;" type="submit" value="gönder">


            </form>
        </div>

    </div>


</div>

</body>

</html>
<?php


include("db.php");

if ($_POST) {
    $isim=$_POST["isim"];
    $linked=$_POST["linked"];
    $mail=$_POST["mail"];
    $resimAdi=$_FILES["resim"]["name"];

    
    if (!file_exists("resimler")) {
        mkdir("resimler");
    }
    if (!empty($isim) && !empty($linked) && !empty($mail) && !empty($resimAdi)) {
        $dizin="resimler/";
        $yuklenecekResim=$dizin.$resimAdi;
        if (move_uploaded_file($_FILES["resim"]["tmp_name"],$yuklenecekResim)) {
           
        }else{
            echo $_FILES["resim"]["error"];
        }
    
        $data = array(
            'isim'      =>$isim , 
            'linked'  =>$linked ,
            'mail'      =>$mail ,
            'resimAdresi'      =>$yuklenecekResim
            );
        
         $insert= $db->prepare("INSERT INTO kurul SET 
            isim=:isim,
            linked=:linked,
            mail=:mail,
            resimAdresi=:resimAdresi
         ");
        
         $result=$insert->execute($data);
         if ($result) {
            echo ' <div class=" mt-2 container">
        <div class="col-6">
             <div class="alert alert-success" role="alert">
             Kayıt Başarılı
            </div>
        </div>
    </div>';
    header("refresh:1;url=kurulKayit.php");
         } else{
            echo ' <div class=" mt-2 container">
            <div class="col-6">
                 <div class="alert alert-danger" role="alert">
                 Kayıt Başarısız
                </div>
            </div>
        </div>';
         }
    }else{
        echo ' <div class=" mt-2 container">
        <div class="col-6">
             <div class="alert alert-danger" role="alert">
             Eksik veri girişi
            </div>
        </div>
    </div>';
    }

}else{
    echo '
    <div class=" mt-2 container">
        <div class="col-6">
        <div class="alert alert-danger" role="alert">
    veri gelmiyor
  </div>
        </div>
    </div>
    ';
}


?>


<?php
include("db.php");

$rows=$db->query("SELECT * FROM kurul",PDO::FETCH_ASSOC);

?>
<div class="container mt-5" >
<h1 class="my-4">Kayıt Olanların Listesi</h1>

    <div class="row">
        <div class="col-md-12">
            <table class=" text-center table table-bordered   table-striped  table-hover">
                <thead>
                    <th class=" text-center">K.No</th>
                    <th class=" text-center">Resim Adresi</th>
                    <th class=" text-center">Ad</th>
                    <th class=" text-center">Email</th>
                    <th class=" text-center">LinkedIn</th>
                    <th class=" text-center">Durum</th>

                </thead>
                <tbody>
                    <?php $i=0;  ?>
                    <?php foreach ($rows as $row) { $i++; ?>
                    <tr>
                        <td> <?php  echo $i;  ?> </td>
                        <td> <?php  echo $row["resimAdresi"]; ?> </td>
                        <td> <?php  echo $row["isim"]; ?> </td>
                        <td> <?php  echo $row["mail"]; ?> </td>
                        <td> <?php  echo $row["linked"]; ?> </td>

                        <td>
                            <a href="sil.php?id=<?php echo $row["id"]; ?>" class="btn btn-danger">Sil</a>
                        </td>
                    </tr>
                    <?php    } ?>
                </tbody>
            </table>

        </div>
    </div>

</div>