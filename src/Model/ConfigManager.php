<?php
/**
 * Created by PhpStorm.
 * User: thomas
 * Date: 22/04/18
 * Time: 15:28
 */
namespace Model;

//Connection a la table "Config" en base de données

class ConfigManager extends EntityManager
{
    const TABLE = 'Config';


    public function __construct()
    {
        parent::__construct(self::TABLE);
    }



}