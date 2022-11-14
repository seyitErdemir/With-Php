<?php

//database erişip oradan verileri alıyor  ve kutulara aktarıyor aynı zamanda bu kutular  responsive tasarıma uygundur.
include("db.php");

$rows= $db->query("SELECT * FROM kurul")->fetchAll(PDO::FETCH_ASSOC);
  
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <title>Document</title>

    <style>
        *{
            margin:0;
            padding: 0;
            box-sizing: border-box;
        }
    </style>
  
</head>

<body>
    <div class="container my-5">
        <div class="row">
            <div class="col-md-12">
                <h1  style="text-align: center; color: white; background: black; padding: 3rem;">Our Employees</h1>
            </div>
        </div>
    </div>
    <div class="container bg-light">

        <div class="row d-flex justify-content-around">
            <?php 
        foreach ($rows as $row ) {   ?>
            <div class="col-lg-3 col-md-6  my-2">
                <div class="card text-center" style="max-width: 540px">
                    <div class="card-body">
                        <img src="<?php echo $row["resimAdresi"]; ?>" class="img-fluid rounded-circle w-50 mb-3"
                            alt="..." />
                        <h5 class="card-title"><?php echo $row["isim"]; ?></h5>
                        <p class="card-text">Software Developer</p>
                        <div class="d-flex flex-row justify-content-center">
                            <div class="p-4">
                                <a href="mailto:<?php echo $row["mail"]; ?>"><i class="fab fa-google google-square"
                                        style="color: red"></i></a>
                            </div>
                            <div class="p-4">
                                <a href="<?php echo $row["linked"]; ?>" target="https://www.linkedin.com"><i
                                        class="fab fa-linkedin-in linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php }

  
        ?>
        </div>

    </div>
    <footer class="bg-dark p-5 text-center  mt-4 " style="color: white;" >
            <h1>Footer</h1>
    </footer>

</body>

</html>