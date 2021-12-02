<?php 

try {
    $db= new PDO("mysql:host=localhost;dbname=php_todo;charset=utf8","root","");

} catch (PDOException $e) {
    echo $e->getMessage();
}

$kayitMesaj=' <div class=" mt-2 container">
<div class="col-5">
     <div class="alert alert-success" role="alert">
     Kayıt Başarılı...
    </div>
</div>
</div>';

$BosUyariMesaj=' <div class=" mt-2 container">
<div class="col-5">
     <div class="alert alert-danger" role="alert">
     Boş alan bırakmayınız...
    </div>
</div>
</div>';
?>