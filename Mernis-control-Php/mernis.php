<?php
    class Mernis{

        public function __construct()
        {
        }


        function mernis($veriler){
            $baglan = new SoapClient("https://tckimlik.nvi.gov.tr/Service/KPSPublic.asmx?WSDL");
            $sonuc = $baglan->TCKimlikNoDogrula($veriler);

            return $sonuc;
        }

    }
    

    

?>