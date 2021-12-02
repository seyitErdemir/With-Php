<?php
    include("db.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    
    <title>Document</title>
   
</head>

<body>
    <div class="container enDis">
        <h1>To do Record</h1>
        <form action="" method="get">
            <div class="form-group row">
                <div class="col-3">
                    <label class="form-label" for="">To Do Title</label>
                    <input class="form-control" type="text" name="todo_title">
                </div>
                <div class="col-4">
                    <label class="form-label" for="">To do</label>
                    <input class="form-control" type="text" name="todo">
                </div>
                <div class="col-4">
                    <label class="form-label" for="">Status</label>
                    <select name="status" class="form-select" aria-label="Default select example">
                        <option value="1">important</option>
                        <option value="2">insignificant</option>
                    </select>
                </div>
                <div class="col-1 text-center my-auto">
                    <input class="btn btn-secondary mt-4" type="submit" value="record">
                </div>
            </div>
        </form>
    </div>
    <?php
    if ($_GET) {
        if (!empty($_GET["todo"])&&!empty($_GET["status"])&&!empty($_GET["todo_title"])) {
            
       
         $todo=$_GET["todo"];
         $status=$_GET["status"];
         $todo_title=$_GET["todo_title"];


         $data =array(
        'todo_title'=>$todo_title,
        'todo'=>$todo,
        'status'=>$status
             );

        $insert=$db->prepare("INSERT INTO todo_table set
        todo=:todo,
        status=:status,
        todo_title=:todo_title
        ");
        
    $result=$insert->execute($data);
    if ($result) {
        echo $kayitMesaj;
    header("refresh:1;url=index.php");
    }
    }else {
        echo $BosUyariMesaj;
        header("refresh:1;url=index.php");

    }
     }
   
     $rows=$db->query("SELECT * FROM todo_table",PDO::FETCH_ASSOC);
    ?>

    <section>
        
        <div class="container mt-2 enDis">
            <h1>To do List</h1>
            <div class="row">
                <?php  foreach ($rows as $row) {  
                    if ($row["status"]==2) {   
                        $status="insignificant";
                        $bgcolor="green";
                    }else {
                        $status="important";  
                        $bgcolor="red";
                    }  ?>
                    
                <div class="col-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title p-2"><?php   echo $row["todo_title"];?>
                                <a style="color:<?php echo $bgcolor; ?>" class="delete" href="delete.php?id=<?php echo $row["id"]; ?>"><i class="fas fa-times-circle"></i></a>
                                <a  style="color:<?php echo $bgcolor; ?>" class="update" href="todoUpdate.php?id=<?php echo $row["id"]; ?>"><i class="fas fa-wrench"></i></i></a>
                            </h5>

                            <p class="card-text"><?php   echo $row["todo"];?></p>
                            <div class="card-footer" style=" color:white;  background:<?php  echo $bgcolor;?> ;">
                                <?php   echo $status;?></div>
                        </div>
                    </div>
                </div>
                <?php  }  ?>
            </div>


        </div>
    </section>


</body>

</html>