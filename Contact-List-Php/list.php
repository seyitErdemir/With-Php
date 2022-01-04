<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <script src="js/jquery-3.5.1.min.js"></script>

    <script src="js/bootstrap.min.js"></script>
    <title>Kişi Listesi</title>
</head>

<?php
include("db.php");

$rows = $db->query("SELECT * FROM adress", PDO::FETCH_ASSOC);

?>

<body>
    <div class="container  p-4   ">
        <div class="row  p-4 ">
            <div class="col-md-12  p-4">
                <h2>Kişi Listesi <a href="kisiekle.html"> <span class="glyphicon glyphicon-plus" style="font-size: 25px; color:red;" aria-hidden="true"></span> </a> </h2>

            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class=" text-center table table-bordered   table-striped  table-hover">
                    <thead>
                        <th class=" text-center">K.No</th>
                        <th class=" text-center">Ad</th>
                        <th class=" text-center">Soyad</th>
                        <th class=" text-center">Telefon</th>
                        <th class=" text-center">Email</th>
                        <th class=" text-center">Web Sitesi</th>
                        <th class=" text-center">Adres</th>
                        <th class=" text-center">İşlemler</th>
                    </thead>
                    <tbody>
                        <?php foreach ($rows as $row) {  ?>
                            <tr>
                                <td> <?php echo $row["id"]; ?> </td>
                                <td> <?php echo $row["name"]; ?> </td>
                                <td> <?php echo $row["lastname"]; ?> </td>
                                <td> <?php echo $row["phone"]; ?> </td>
                                <td> <?php echo $row["email"]; ?> </td>
                                <td> <?php echo $row["web"]; ?> </td>
                                <td> <?php echo $row["location"]; ?> </td>
                                <td>
                                    <a href="kisidüzenle.php?id=<?php echo $row["id"]; ?>" class="btn btn-primary">Düzenle</a>
                                    <a href="sil.php?id=<?php echo $row["id"]; ?>" class="btn btn-danger">Sil</a>
                                </td>
                            </tr>
                        <?php  } ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>

</body>

</html>