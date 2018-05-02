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
        session_start();
        if(isset($_SESSION['username'])) {
            $QuestionManager = new QuestionManager();
            $Quizz = $QuestionManager->findQuizz();

            $ConfigManager = new ConfigManager();
            $intro[] = $ConfigManager->findOneById(1);
            $introduction = $intro[0]["value"];
            return $this->twig->render('Admin/index.html.twig', ['Quizz' => $Quizz, 'introduction' => $introduction]);
        }else{
            header('location:/login');
        }
    }

    public function addQuestionAdmin()
    {

       if (isset($_POST['titre']) && isset($_POST['resp1']) && isset($_POST['resp2']) && isset($_POST['resp3']) && isset($_POST['resp4']) && $_FILES['file1']['name']!='' && $_FILES['file2']['name']!='' && $_FILES['file3']['name']!='' && $_FILES['file4']['name']!='') {
           $titre = $_POST['titre'];
           $Resp1 = $_POST['resp1'];
           $Resp2 = $_POST['resp2'];
           $Resp3 = $_POST['resp3'];
           $Resp4 = $_POST['resp4'];
           $Image1 = $_FILES['file1'];
           $Image2 = $_FILES['file2'];
           $Image3 = $_FILES['file3'];
           $Image4 = $_FILES['file4'];
           $destImage1= "assets/images/img_quizz/". uniqid() . $_FILES['file1']['name'];
           move_uploaded_file($Image1['tmp_name'], $destImage1);
           $destImage2= "assets/images/img_quizz/". uniqid() . $_FILES['file2']['name'];
           move_uploaded_file($Image2['tmp_name'], $destImage2);
           $destImage3= "assets/images/img_quizz/". uniqid() . $_FILES['file3']['name'];
           move_uploaded_file($Image3['tmp_name'], $destImage3);
           $destImage4= "assets/images/img_quizz/". uniqid() . $_FILES['file4']['name'];
           move_uploaded_file($Image4['tmp_name'], $destImage4);

           $QuestionManager = new QuestionManager();
           $QuestionManager->insert($titre, $Resp1, $Resp2, $Resp3, $Resp4, $destImage1, $destImage2, $destImage3, $destImage4);

           header("location:/admin");

       }else {

           header("location:/admin");

        }

    }

    public function gestionQuest(){

        if (isset($_POST['supprimer'])){
            $id = $_POST['id'];
            $direction = "assets/images/img_quizz/";
            $scanUploads = scandir($direction);
            unset($scanUploads[array_search('.', $scanUploads)]);
            unset($scanUploads[array_search('..', $scanUploads)]);
            $deleteResp1 = $_POST['img_old_1'];
            unlink($deleteResp1);
            $deleteResp2 = $_POST['img_old_2'];
            unlink($deleteResp2);
            $deleteResp3 = $_POST['img_old_3'];
            unlink($deleteResp3);
            $deleteResp4 = $_POST['img_old_4'];
            unlink($deleteResp4);

            $QuestionManager = new QuestionManager();
            $QuestionManager->deleteQuest($id);

            header("location:/admin");            
        }

        $direction = "assets/images/img_quizz/";
        $scanUploads = scandir($direction);
        unset($scanUploads[array_search('.', $scanUploads)]);
        unset($scanUploads[array_search('..', $scanUploads)]);


        if (isset($_POST['modifier'])){
            $id = $_POST['id'];
            $newintro['reponse1'] = $_POST['resp1'];
            $newintro['reponse2'] = $_POST['resp2'];
            $newintro['reponse3'] = $_POST['resp3'];
            $newintro['reponse4'] = $_POST['resp4'];

            if(!empty($_FILES['file1']['name'])) {
                $Image1 = $_FILES['file1'];
                $destImage1= "assets/images/img_quizz/". uniqid() . $_FILES['file1']['name'];
                move_uploaded_file($Image1['tmp_name'], $destImage1);
                $deleteResp1 = $_POST['img_old_1'];
                unlink($deleteResp1);
            } else {
                $destImage1=$_POST['img_old_1'];
            }

            if(!empty($_FILES['file2']['name'])) {
                $Image2 = $_FILES['file2'];
                $destImage2= "assets/images/img_quizz/"."img". uniqid() . $_FILES['file2']['name'];
                move_uploaded_file($Image2['tmp_name'], $destImage2);
                $deleteResp2 = $_POST['img_old_2'];
                unlink($deleteResp2);
            } else {
                $destImage2=$_POST['img_old_2'];
            }

            if(!empty($_FILES['file3']['name'])) {
                $Image3 = $_FILES['file3'];
                $destImage3= "assets/images/img_quizz/". uniqid() . $_FILES['file3']['name'];
                move_uploaded_file($Image3['tmp_name'], $destImage3);
                $deleteResp3 = $_POST['img_old_3'];
                unlink($deleteResp3);
            } else {
                $destImage3=$_POST['img_old_3'];
            }

            if(!empty($_FILES['file4']['name'])) {
                $Image4 = $_FILES['file4'];
                $destImage4= "assets/images/img_quizz/". uniqid() . $_FILES['file4']['name'];
                move_uploaded_file($Image4['tmp_name'], $destImage4);
                $deleteResp4 = $_POST['img_old_4'];
                unlink($deleteResp4);
            } else {
                $destImage4=$_POST['img_old_4'];
            }

            $newintro['image1'] = $destImage1;
            $newintro['image2'] = $destImage2;
            $newintro['image3'] = $destImage3;
            $newintro['image4'] = $destImage4;

            $ConfigManager= new QuestionManager();
            $ConfigManager->update($id, $newintro);
            header("location:/admin");
        }



    }

    public function exportsvg()
    {
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="export_sauvegarde_geekwizz.csv"');
        $SauvegardeManager = new SauvegardeManager();
        $dataExport = $SauvegardeManager->findAll();
        echo "E-mail;Genre;Tranche d'âge";
        foreach($dataExport as $key => $value) {
            echo "\n".'"'.$value['mail'].'";"'.$value['genre'].'";"'.$value['tranche_age'].'"';
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

        $ConfigManager= new ConfigManager();
        $ConfigManager->update(1, $newintro);
        header('location:/admin');

    }

    public function deconnexion(){
        session_start();
        session_destroy();
        header('location: /');
    }
}
