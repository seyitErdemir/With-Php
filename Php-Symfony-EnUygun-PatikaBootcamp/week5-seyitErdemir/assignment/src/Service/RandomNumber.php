<?php 

// src/Service/RandomNumber.php
namespace App\Service;

class RandomNumber
{
    public function getRandomNumber() 
    {
        $number = [
            rand(0,20),
            rand(0,20),
            rand(0,20),
        ];

        return $number ; //3 adet random sayı üreten servisim  bu sayıları döndürmekte

    }
}

?>