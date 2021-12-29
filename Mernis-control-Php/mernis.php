<?php
    // class Mernis{
    //     function mernis($veriler){
    //         $baglan = new SoapClient("https://tckimlik.nvi.gov.tr/Service/KPSPublic.asmx?WSDL");
    //         $sonuc = $baglan->TCKimlikNoDogrula($veriler);
    //     }

    // }

    // $mernis = new Mernis();

    
 
    $baglan = new SoapClient("https://tckimlik.nvi.gov.tr/Service/KPSPublic.asmx?WSDL");
    $sonuc = $baglan->TCKimlikNoDogrula($veriler);
 

?>