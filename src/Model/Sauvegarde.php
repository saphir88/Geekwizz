<?php
/**
 * Created by PhpStorm.
 * User: thomas
 * Date: 21/04/18
 * Time: 16:05
 */

namespace Model;

/**
 * Class Sauvegarde
 * @package Model
 */
class Sauvegarde
{
    private $id;

    private $mail;

    private $genre;

    private $tranche_age;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * @param mixed $mail
     */
    public function setMail($mail)
    {
        $this->mail = $mail;
    }

    /**
     * @return mixed
     */
    public function getGenre()
    {
        return $this->genre;
    }

    /**
     * @param mixed $genre
     */
    public function setGenre($genre)
    {
        $this->genre = $genre;
    }

    /**
     * @return mixed
     */
    public function getTrancheAge()
    {
        return $this->tranche_age;
    }

    /**
     * @param mixed $tranche_age
     */
    public function setTrancheAge($tranche_age)
    {
        $this->tranche_age = $tranche_age;
    }

}