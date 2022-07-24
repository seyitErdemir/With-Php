<?php

// src/Service/MessageGenerator.php
namespace App\Service;

use Psr\Log\LoggerInterface;
use App\Service\RandomNumber;

class MessageGenerator
{
    private $logger;

    public function __construct(LoggerInterface $logger  , )
    {
        $this->logger = $logger;
    }

    public function getHappyMessage( RandomNumber  $randomNumber ): string
    {
        $messages = $randomNumber->getRandomNumber(); //sayi dizisini RandomNumber servisimden almakta 
        $this->logger->info('About to find a happy message!');
        $index = array_rand($messages);

        return $messages[$index];
    }
}
