<?php

namespace Controller;

/**
 * Created by PhpStorm.
 * User: root
 * Date: 11/10/17
 * Time: 15:38
 */
class LoginController extends AbstractController
{
    protected $errors = [];

    public function login()
    {
        return $this->twig->render('Item/login.html.twig');
    }



    public function postlogin(){

        session_start();
        $myPseudo = 'admin';
        $myMdp = 'admin';

        if(isset($_POST['username']) && isset($_POST['password'])) {
            $pseudo = $_POST['username'];
            $mdp = $_POST['password'];
            if ($pseudo == $myPseudo && $mdp == $myMdp){
                $_SESSION['username'] = $pseudo;
                header("location:/admin");
            } else {
                $this->errors[] = "Identifiant ou mot de passe invalide";
                $error = true;
                return $this->twig->render("Item/login.html.twig", ['errors' => $this->errors,]);
            }
        } else {
            $this->errors[] = "Veuillez entrer vos identifiants";
            $error = true;
            return $this->twig->render("Item/login.html.twig", ['errors' => $this->errors,]);
        }
    }
}
