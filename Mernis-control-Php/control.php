<?php




include("db.php");


if ($_POST) {

    $tckn = $_POST['tc'];
    $ad = $_POST['ad'];
    $soyad = $_POST['soyad'];
    $dogumYili = $_POST['dogum'];

    $veriler = array(
        'TCKimlikNo' => $tckn,
        'Ad' => $ad,
        'Soyad' => $soyad,
        'DogumYili' => $dogumYili
    );

    $data = array(
        'tc' => $tckn,
        'ad' => $ad,
        'soyad' => $soyad,
        'yil' => $dogumYili
    );



    include("mernis.php");
  

    if ($sonuc->TCKimlikNoDogrulaResult) {

        $insert = $db->prepare("INSERT INTO mernis SET 
        ad=:ad,
        soyad=:soyad,
        tc=:tc,
        yil=:yil
     ");

        $query = $db->query("SELECT * FROM mernis WHERE tc = '{$tckn}'")->fetch();
        if ($query) {
            header("Refresh: 0.1; alert2.html");
            //  echo " bu kullanıcı bulunmakta";
        } else {
            $result = $insert->execute($data);
            if ($result) {
                header("Refresh: 0.1; award.html");

                // echo "kayit edildi";
            } else {
                echo ' <div class=" mt-2 container">
                <div class="col-6">
                     <div class="alert alert-danger" role="alert">
                     Kayıt Başarısız
                    </div>
                </div>
            </div>';

                // echo "kayit başarısız";
            }
        }
    } else {
        header("Refresh: 0.1; alert1.html");


        // echo "Girmiş olduğunuz kimlik bilgileri yanlıştır.";
    }
}

?>