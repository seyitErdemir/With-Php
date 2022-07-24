<?php

// src/Controller/UserController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class UserController extends AbstractController
{
    // ...
    /**
     * @Route("/names", name="app_user_user")
     */

    public function user(): Response
    {
        $myName = 'Seyit';
        $userNameList = [
            "1.kişi",
            "2.kişi",
            "3.kişi",
            "4.kişi",
            "5.kişi",
        ];

        // the template path is the relative file path from `templates/`
        return $this->render('user/userList.html.twig', [

            'myName' => $myName,
            'userNameList' => $userNameList,
        ]);
    }
}
