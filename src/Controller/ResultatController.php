<?php

namespace Controller;

use Model\TokenManager;
use Model\Token;
/**
 * Created by PhpStorm.
 * User: root
 * Date: 11/10/17
 * Time: 15:38
 */
class ResultatController extends AbstractController
{

    public function validateToken(int $key)
    {
        echo "rentre dans la fonction <br>";
        $TokenManager = new TokenManager();

       /* if ((isset($_GET['key'])) && (!empty($_GET['key']))){
            $key = intval($_GET['key']);
            var_dump($key);
        }*/

        $validation['validation'] = 1;
        $TokenManager->updateToken($key, $validation);
    }
}