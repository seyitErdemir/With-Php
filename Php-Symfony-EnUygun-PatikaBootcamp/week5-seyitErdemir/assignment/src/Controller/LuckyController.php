<?php
// src/Controller/LuckyController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\MessageGenerator;
use App\Service\RandomNumber;

class LuckyController extends AbstractController
{
    /**
     * @Route("/lucky/number/{max}", name="app_lucky_number")
     */
 

 
    public function number(int $max , MessageGenerator $messageGenerator ): Response
    {   
       
        $randomNumber = new RandomNumber();    // RandomNumber servisimden bir nesne üretiyorum 
        $number = random_int(0, 20); //random sayı üretmekteyim

        $message = $messageGenerator->getHappyMessage(  $randomNumber );  //MessageGenerator servisime parametre olarak RandomNumber servisinden ürettiğim nesnemi veriyorum

        if($message == $number){
            $result = "Random üretilen sayılar birbirine eşit";
        }else{
            $result = "Random üretilen sayılar birbirine eşit değil";

        } //ürettiğim sayi ile gelen sayının eşit olup olmadığını kontrol edip  ekrana yazıyorum

        return new Response(
            '<html><body>Sonuç : ' .   $result . '</body></html>'
        );
    }
}
