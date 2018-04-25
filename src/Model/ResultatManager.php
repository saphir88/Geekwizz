<?php
/**
 * Created by PhpStorm.
 * User: thomas
 * Date: 21/04/18
 * Time: 16:10
 */

namespace Model;

//Connection a la table "Token" en base de données

class ResultatManager extends EntityManager
{
    const TABLE = 'Token';

    public function __construct()
    {
        parent::__construct(self::TABLE);
    }
}