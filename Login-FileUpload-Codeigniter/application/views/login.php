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
    <div class="container mt-5 p-5">
        <h1>Login</h1>

        <div class="  col-4">
            <form method="post" autocomplete="off" action="<?= base_url('welcome/loginNow') ?>">

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email </label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                </div>

                <button type="submit" class="btn btn-primary">Giriş Yap</button>
                <?php
                if ($this->session->flashdata('error')) {  ?>

                    <p class="text-danger p-3"> <?= $this->session->flashdata('error') ?></p>

                <?php  } ?>


            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>