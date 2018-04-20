<?php
/**
 * Created by PhpStorm.
 * User: sylvain
 * Date: 07/03/18
 * Time: 18:20
 */

namespace Model;


class ReponsePManager extends EntityManager
{
    const TABLE = 'R_Pertinentes';


    public function __construct()
    {
        parent::__construct(self::TABLE);
    }


}
