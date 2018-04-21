<?php
/**
 * Created by PhpStorm.
 * User: thomas
 * Date: 21/04/18
 * Time: 16:10
 */

namespace Model;

//Connection a la table "Sauvegarde" en base de données

class SauvegardeManager extends EntityManager
{
    const TABLE = 'Sauvegarde';


    public function __construct()
    {
        parent::__construct(self::TABLE);
    }



}