<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 11/10/17
 * Time: 16:07
 */

namespace Controller;

use Model\Question;
use Model\QuestionManager;
use Model\ReponsePManager;

/**
 * Class ItemController
 * @package Controller
 */
class QuestionController extends AbstractController
{

    /**
     * @return string
     */
    public function index()
    {
        $QuestionManager = new QuestionManager();
        $items = $QuestionManager->findAll();

        return $this->twig->render('Item/index.html.twig', ['items' => $items]);
    }

    /**
     * @return string
     */
    public function mentions_legales()
    {
        $QuestionManager = new QuestionManager();
        $items = $QuestionManager->findAll();

        return $this->twig->render('Item/mentions_legales.html.twig', ['items' => $items]);
    }

    /**
     * @return string
     */
    public function resultat()
    {
        $QuestionManager = new QuestionManager();
        $items = $QuestionManager->findAll();

        return $this->twig->render('Item/resultat.html.twig', ['items' => $items]);
    }

    /**
     * @return string
     */
    /*public function quizz()
    {
        $QuestionManager = new QuestionManager();
        $items = $QuestionManager->findAll();

        return $this->twig->render('Item/quizz.html.twig', ['items' => $items]);
    }*/

    /**
     * @return string
     */
    public function questions()
    {
        //récupération de la base de données pour la création du quizz
        $QuestionManager = new QuestionManager();
        $Quizz = $QuestionManager->findQuizz();
        return $this->twig->render('Item/questions.html.twig', ['Quizz' => $Quizz]);
    }

    /**
     * @return string
     */
    public function randomQuizz()
    {
        //récupération de la base de données pour l'affichage du quizz aléatoire
        $QuestionManager = new QuestionManager();
        $Quizz = $QuestionManager->findQuizz();

        //Créer un nouveau tableau questions funs et exclure les questions pertinentes
        foreach ($Quizz as $key => $value){
            if (($key === 0) || ($key === 1)){
                continue;
            }
            $selectFuns[] = $value;
        }

        //Mélanger l'ordre des questions funs
        shuffle($selectFuns);

        /*Créer un nouveau tableau qui sélectionne 10 questions - 1ere et dernière question pertinentes - Résultat du shuffle pour les autres questions*/
        $selectQuizz[] = $Quizz[0];
        for ($i = 0; $i < 8; $i++){
            $selectQuizz[] = $selectFuns[$i];
        }
        $selectQuizz[] = $Quizz[1];
        //var_dump($selectQuizz);

        return $this->twig->render('Item/questions.html.twig', ['Quizz' => $selectQuizz]);
    }
}
