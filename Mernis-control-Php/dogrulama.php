<?php
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
   
      $baglan = new SoapClient("https://tckimlik.nvi.gov.tr/Service/KPSPublic.asmx?WSDL");
      $sonuc = $baglan -> TCKimlikNoDogrula ($veriler);
   
      if ($sonuc->TCKimlikNoDogrulaResult) {
        // echo "Girmiş olduğunuz kimlik bilgileri doğrudur.";
        header("Refresh: 1; dogru.html");
 
      }
    // Bir yada bir kaçtanesi yanlış ise aşağıdaki mesaj son kullanıcıya gösterilir.
      else {
        header("Refresh: 1; yanlis.html");

        echo "Girmiş olduğunuz kimlik bilgileri yanlıştır.";
      }
        
}

?>
