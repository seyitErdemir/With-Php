<?php 

include("db.php");

if ($_GET) {
    

    
    $id=$_GET["id"];
    $todo_title=$_GET["todo_title"];
    $todo=$_GET["todo"];
    $status=$_GET["status"]; 

$data=array(
    'id'=>$id,
    'todo_title'=>$todo_title,
    'todo'=>$todo,
    'status'=>$status,
);
$update=$db->prepare("UPDATE todo_table set 
        todo_title=:todo_title,
        todo=:todo,
        status=:status
        WHERE id=:id
    ");
    $result=$update->execute($data);
    if ($result) {
        header ("Location:index.php");
    }else {
        echo "işlem olmadu";
    }
}




?>