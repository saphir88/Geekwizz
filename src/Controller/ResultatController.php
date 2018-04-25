<?php

namespace Controller;

use Model\TokenManager;
use Model\SauvegardeManager;
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
        $TokenManager = new TokenManager();

        //passe la validation du token à 1
        $validation['validation'] = 1;
        $TokenManager->updateToken($key, $validation);

        //met les données (mail, genre et tranche_age) dans $data
        $data = $TokenManager->findOneByConfirmkey($key);

        //met les données de data dans la table 'Sauvegarde'
        $SauvegardeManager = new SauvegardeManager();
        $mail = $data['mail'];
        $genre = $data['genre'];
        $tranche_age= $data['tranche_age'];
        $SauvegardeManager->insertSauvegarde($mail, $genre, $tranche_age);

    }
}