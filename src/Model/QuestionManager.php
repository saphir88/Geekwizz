<?php
/**
 * Created by PhpStorm.
 * User: sylvain
 * Date: 07/03/18
 * Time: 18:20
 */

namespace Model;

//Connection a la table "Quizz" en base de données

class QuestionManager extends EntityManager
{
    const TABLE = 'Quizz';


    public function __construct()
    {
        parent::__construct(self::TABLE);
    }



}