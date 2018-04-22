<?php

namespace Controller;
use Model\ConfigManager;
use Model\SauvegardeManager;

/**
 * Created by PhpStorm.
 * User: root
 * Date: 11/10/17
 * Time: 15:38
 */
class AdminController extends AbstractController
{
    protected $introduction;

    public function index()
    {
        return $this->twig->render('Admin/index.html.twig');
    }

    public function addQuestionAdmin()
    {
        return header('Location:/admin');
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
        $newintro = $_POST['intro'];
        var_dump($newintro);
        $ConfigManager= new ConfigManager();
        $newintro[] = $ConfigManager->update(1, $newintro);

    }
}
