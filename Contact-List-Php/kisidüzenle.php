
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <title>Document</title>
</head>
<body>
    <div class="container p-4">
        <div class="row p-4">
            <div class="col-md-12">
                <h2>Kişi Ekleme
                </h2>
            </div>
        </div>

                 <?php
                   include("db.php");
                     $id=$_GET["id"];
                    $select=$db->prepare("SELECT * FROM adress WHERE id=:id");
                    $select->bindParam(":id",$id,PDO::PARAM_INT);
                    $select->execute();
                    $row=$select->fetch(PDO::FETCH_ASSOC);
      
                ?>
                

        <div class="row ">
            <div class="col-md-4 p-4">
                <form method="get" action="update.php">
                    <input type="hidden" name="id" value="<?php echo $row["id"]; ?>" >
                    <div class="form-group">
                        <label>Adınız</label>
                        <input type="text" class="form-control" name="name"  value="<?php echo $row["name"]; ?>" placeholder="Adınızı Giriniz">
                    </div>
                    <div class="form-group">
                        <label>Soyadınız</label>
                        <input type="text" class="form-control" name="lastname" value="<?php echo $row["lastname"]; ?>" placeholder="Soyadınızı Giriniz">
                    </div>
                    <div class="form-group">
                        <label>Telefonunuz</label>
                        <input type="text" class="form-control" name="phone" value="<?php echo $row["phone"]; ?>"  placeholder="Telefon Numaranızı Giriniz">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" name="email" value="<?php echo $row["email"]; ?>" placeholder="email giriniz">
                    </div>
                    <div class="form-group">
                        <label>Web Siteniz</label>
                        <input type="text" class="form-control" name="web" value="<?php echo $row["web"]; ?>" placeholder="Web Siteniz giriniz">
                    </div>
                    <div class="form-group">
                        <label>Adresiniz</label>
                        <textarea rows="3" class="form-control" name="location" 
                            placeholder="Adresinizi Giriniz"><?php echo $row["location"]; ?></textarea>

                    </div>
                    
                    <button type="submit" class="btn btn-primary pull-right">Güncelle</button>
                    <a href="list.php" class="btn btn-default pull-left">Geri</a>
                </form>

            </div>
        </div>

    </div>
</body>
</html>


