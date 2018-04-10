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
     * @param $id
     * @return string
     */
    public function show(int $id)
    {
        $itemManager = new ItemManager();
        $item = $itemManager->findOneById($id);

        return $this->twig->render('Item/show.html.twig', ['item' => $item]);
    }

    /**
     * @param $id
     * @return string
     */
    public function edit(int $id)
    {
        // TODO : edit item with id $id
        return $this->twig->render('Item/edit.html.twig', ['item', $id]);
    }

    /**
     * @param $id
     * @return string
     */
    public function add()
    {
        // TODO : add a new item
        return $this->twig->render('Item/add.html.twig');
    }

    /**
     * @param $id
     * @return string
     */
    public function delete(int $id)
    {
        // TODO : delete the item with id $id
        return $this->twig->render('Item/index.html.twig');
    }
}
