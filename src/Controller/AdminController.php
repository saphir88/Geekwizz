<?php

namespace Controller;
use Model\ConfigManager;
use Model\SauvegardeManager;

use Model\QuestionManager;
/**
 * Created by PhpStorm.
 * User: root
 * Date: 11/10/17
 * Time: 15:38
 */
class AdminController extends AbstractController
{
    protected $introduction;
    public $titre;
    public $Resp1;
    public $Resp2;
    public $Resp3;
    public $Resp4;
    public $Img1;
    public $Img2;
    public $Img3;
    public $Img4;

    public function index()
    {
        //session_start();
        //if(isset($_SESSION['username'])) {
            $QuestionManager = new QuestionManager();
            $Quizz = $QuestionManager->findQuizz();

            $ConfigManager = new ConfigManager();
            $intro[] = $ConfigManager->findOneById(1);
            $introduction = $intro[0]["value"];
            return $this->twig->render('Admin/index.html.twig', ['Quizz' => $Quizz, 'introduction' => $introduction]);
        //}else{
        //    header('location:/login');
        //}
    }

    public function addQuestionAdmin()
    {

       if (isset($_POST['titre']) && isset($_POST['resp1']) && isset($_POST['resp2']) && isset($_POST['resp3']) && isset($_POST['resp4'])) {
            $titre = $_POST['titre'];
            $Resp1 = $_POST['resp1'];
            $Resp2 = $_POST['resp2'];
            $Resp3 = $_POST['resp3'];
            $Resp4 = $_POST['resp4'];
            $Image1 ='aucune image pour le moment';
            $Image2 ='aucune image pour le moment';
            $Image3 ='aucune image pour le moment';
            $Image4 ='aucune image pour le moment';


            $QuestionManager = new QuestionManager();
            $QuestionManager->insert($titre, $Resp1, $Resp2, $Resp3, $Resp4, $Image1, $Image2, $Image3, $Image4);

           header("location:/admin");

       }else {

           header("location:/admin");

        }

    }

    public function gestionQuest(){



        if (isset($_POST['supprimer'])){
            $id = $_POST['id'];

            $QuestionManager = new QuestionManager();
            $QuestionManager->deleteQuest($id);

            header("location:/admin");            
        }
        if (isset($_POST['valider'])){
            $id = $_POST['id'];

            var_dump($_POST);

        }



    }

    public function exportsvg()
    {
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="export_sauvegarde_geekwizz.csv"');
        $SauvegardeManager = new SauvegardeManager();
        $dataExport = $SauvegardeManager->findAll();
        echo "\"Id\";\"E-mail\";\"Genre\";\"Tranche d'âge\"";
        foreach($dataExport as $key => $value) {
            echo "\n".'"'.$value['id'].'";"'.$value['mail'].'";"'.$value['genre'].'";"'.$value['tranche_age'].'"';
        }
    }

    public function introQuizz()
    {
        $ConfigManager = new ConfigManager();
        $intro[] = $ConfigManager->findOneById(1);
        $introduction = $intro[0]["value"];
        return $this->twig->render("Item/quizz.html.twig", ['introduction' => $introduction]);
    }

    public function modifIntro()
    {
        $newintro['value'] = $_POST['intro'];
        var_dump($newintro);
        $ConfigManager= new ConfigManager();
        $ConfigManager->update(1, $newintro);
        header('location:/admin');

        //Valeur de base de l'intro : Tu veux savoir quel est ton profil geek ? À quelle tendance tu appartiens ? C'est simple ! Répond à ce test en moins de 2 minutes et nous te dirons qui tu es. À la fin du test partage ton résultat et défie tes amis.

    }
}
