<?php
$udata = $this->session->userdata('UserLoginSession');
if (isset($_SESSION['movedImage'])) {
    $imageAdresi = $_SESSION['movedImage']['upload_data']['file_name'];
}
?>





<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>
    <div class="row p-5 m-4  ">
        <?php include_once('Partials/menu.php');    ?>
    </div>
    <div class="container p-1">
        <h1>Merhaba <b> <i> <?= $udata['name']; ?> </i></b> Hoşgeldin</h1>
    </div>
    <div class="container  text-center p-1">
        <h3 class="mt-5 p-3">Dosya Yükle</h3>
        <div class="row mt-1 p-3">
            <div class="col-6  mx-auto ">

                <?php if (isset($error)) { ?>
                    <hr>

                    <div class="alert alert-danger  mt-2  " role="alert">
                        <h5> <?php echo $error;  ?></h5>
                    </div>
                   

                    <hr>
                <?php   header("refresh:1;url=dashboard");  }  ?>


                <!-- <?php echo form_open_multipart('welcome/fileUpload'); ?> -->
                <form method="post" action="<?php echo base_url("fileUpload"); ?>" enctype="multipart/form-data">

                    <div class="input-group mb-3">
                        <input type="file" name="userfile" size="20" class="form-control" id="inputGroupFile02">
                        <label class="input-group-text" for="inputGroupFile02">Upload</label>
                    </div>
                    <div class="input-group mb-3">
                        <input type="submit" value="Gönder" class="form-control" id="inputGroupFile02">
                    </div>
                </form>
            </div>
        </div>
    </div>






    <div class="container">

        <div class="row">
            <div class="col-6 mx-auto text-center p-4">
                <?php if (isset($_SESSION['movedImage'])) {    ?>
                    <!-- <img width="200px" src="../../uploads/<?= $upload_data['file_name'] ?>" alt=""> -->
                    <img width="200px" src="<?php echo base_url("uploads") . "/" . $imageAdresi ?>" alt="">

                <?php  }    ?>
            </div>
        </div>

        <?php if (isset($upload_data)) { ?>

            <div class="alert alert-success  mt-2 mb-4 " role="alert">
                <h3>Resim kayıt işlemi başarılı.</h3>
            </div>


            <?php
            // silme işlemini yapıyor
            //  $file_name = FCPATH . "uploads/" . $upload_data['file_name'];
            // unlink($file_name);
            // echo $file_name;
            ?>

            <!-- <ul>

                <?php foreach ($upload_data as $item => $value) : ?>
                    <li><?php echo $item; ?>: <?php echo $value; ?></li>
                <?php endforeach; ?>
            </ul> -->



        <?php header("refresh:1;url=dashboard");
        } ?>
    </div>









    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>