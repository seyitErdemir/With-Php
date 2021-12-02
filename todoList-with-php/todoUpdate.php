<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>

                <?php
                   include("db.php");
                     $id=$_GET["id"];
                    $select=$db->prepare("SELECT * FROM todo_table WHERE id=:id");
                    $select->bindParam(":id",$id,PDO::PARAM_INT);
                    $select->execute();
                    $row=$select->fetch(PDO::FETCH_ASSOC);
                ?>

<div class="container enDis">
        <form action="update.php" method="get">
            <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
            <div class="form-group row">
                <div class="col-4">
                    <label class="form-label" for="">To do Title</label>
                    <input class="form-control"  type="text" name="todo_title" value="<?php echo $row["todo_title"]; ?>" >
                </div>
                <div class="col-4">
                    <label class="form-label" for="">To do </label>
                    <input class="form-control" type="text" name="todo" value="<?php echo $row["todo"]; ?>">
                </div>
                <div class="col-4">
                    <label class="form-label" for="" >Status</label>
                    <select name="status" class="form-select"  aria-label="Default select example">
                        <option value="1">important</option>
                        <option value="2">insignificant</option>
                    </select>
                </div>
            </div>
            <div class=" col-12 text-center mt-3">
                <input class="btn btn-primary mx-auto"  type="submit" value="Update">
                 <a class="btn btn-danger" href="index.php" >Back</a>
                </div>
        </form>
    </div>
 
    
</body>
</html>