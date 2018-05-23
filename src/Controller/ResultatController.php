<?php

namespace Controller;

use Model\TokenManager;
use Model\SauvegardeManager;
use Model\ResultatManager;

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

        $check = $SauvegardeManager->findOneByMail($mail);

        if(!isset($check['mail'])) {
            $SauvegardeManager->insertSauvegarde($mail, $genre, $tranche_age);
        }

        $ResultatManager = new ResultatManager();
        $profil1 = $ResultatManager->findOneById(1);
        $profil2 = $ResultatManager->findOneById(2);
        $profil3 = $ResultatManager->findOneById(3);
        $profil4 = $ResultatManager->findOneById(4);

        $id_resultat= $data['id_resultat'];

        switch ($id_resultat) {
            case 1:
                return $this->twig->render('Item/resultat.html.twig', ['profil' => $profil1, 'key'=>$key]);
                break;
            case 2:
                return $this->twig->render('Item/resultat.html.twig', ['profil' => $profil2, 'key'=>$key]);
                break;
            case 3:
                return $this->twig->render('Item/resultat.html.twig', ['profil' => $profil3, 'key'=>$key]);
                break;
            case 4:
                return $this->twig->render('Item/resultat.html.twig', ['profil' => $profil4, 'key'=>$key]);
                break;
        }

    }
}