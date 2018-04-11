<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 11/10/17
 * Time: 16:07
 */

namespace Controller;

use Model\Item;
use Model\ItemManager;

/**
 * Class ItemController
 * @package Controller
 */
class ItemController extends AbstractController
{

    /**
     * @return string
     */
    public function index()
    {
        $itemManager = new ItemManager();
        $items = $itemManager->findAll();

        return $this->twig->render('Item/index.html.twig', ['items' => $items]);
    }

    /**
     * @return string
     */
    public function mentions_legales()
    {
        $itemManager = new ItemManager();
        $items = $itemManager->findAll();

        return $this->twig->render('Item/mentions_legales.html.twig', ['items' => $items]);
    }

    /**
     * @return string
     */
    public function resultat()
    {
        $itemManager = new ItemManager();
        $items = $itemManager->findAll();

        return $this->twig->render('Item/resultat.html.twig', ['items' => $items]);
    }

    /**
     * @return string
     */
    public function quizz()
    {
        $itemManager = new ItemManager();
        $items = $itemManager->findAll();

        return $this->twig->render('Item/quizz.html.twig', ['items' => $items]);
    }

    /**
     * @return string
     */
    public function questions()
    {
        $itemManager = new ItemManager();
        $items = $itemManager->findAll();

        return $this->twig->render('Item/questions.html.twig', ['items' => $items]);
    }

    /**
     * @return string
     */
    public function mail()
    {
        $itemManager = new ItemManager();
        $items = $itemManager->findAll();

        return $this->twig->render('Item/mail.html.twig', ['items' => $items]);
    }
}
