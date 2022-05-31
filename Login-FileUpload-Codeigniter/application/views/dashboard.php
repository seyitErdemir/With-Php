<?php
if ($this->session->userdata('UserLoginSession')) {

    $udata = $this->session->userdata('UserLoginSession');
    echo 'welcome      '  . $udata['name'];
} else {
    redirect(base_url('welcome/login'));
}

?>


<?php
if ($this->session->userdata('UserLoginSession')) {

    $image = $this->session->userdata('getImage');
    echo $image;
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
        <ul class="d-flex ">
            <li class="p-3 list-group-item  "> <a href="<?= base_url('welcome/login') ?>">
                    <h1>Login</h1>
                </a>
            </li>
            <li class="p-3 list-group-item  "> <a href="<?= base_url('welcome/registerNow') ?>">
                    <h1>Register</h1>
                </a>
            </li>
            <li class="p-3 list-group-item  "> <a href="<?= base_url('welcome/logout') ?>">
                    <h1>Çıkış Yap</h1>
                </a>
            </li>
        </ul>
    </div>
    <div class="container  p-2">
        <h1 class="mt-5 p-3">Dosya Yükle</h1>
        <div class="row mt-1 p-5">
            <div class="col-12">
                <hr>
                <?php if (isset($error)) {

                    echo $error;
                }  ?>
                <hr>



                <!-- <?php echo form_open_multipart('welcome/fileUpload'); ?> -->
                <form method="post" action="<?php echo base_url("welcome/fileUpload"); ?>" enctype="multipart/form-data">

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
        <?php if (isset($upload_data)) { ?>
            <div class="row">
                <div class="col-6 mx-auto text-center p-4">
                    <!-- <img width="200px" src="../../uploads/<?= $upload_data['file_name'] ?>" alt=""> -->
                    <img width="200px" src="<?php echo base_url("uploads") . "/" . $upload_data['file_name'] ?>" alt="">

                </div>
            </div>

            <h3>Resim kayıt işlemi başarılı.</h3>



            <?php
            // silme işlemini yapıyor
            //  $file_name = FCPATH . "uploads/" . $upload_data['file_name'];
            // unlink($file_name);
            // echo $file_name;
            ?>

            <ul>

                <?php foreach ($upload_data as $item => $value) : ?>
                    <li><?php echo $item; ?>: <?php echo $value; ?></li>
                <?php endforeach; ?>
            </ul>

            <p><?php echo anchor('upload', 'Upload Another File!'); ?></p>

        <?php  } ?>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>