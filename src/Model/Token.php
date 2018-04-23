<?php
/**
 * Created by PhpStorm.
 * User: thomas
 * Date: 21/04/18
 * Time: 16:05
 */

namespace Model;

/**
 * Class Token
 * @package Model
 */
class Token
{
    private $id;
    private $validation;
    private $mail;
    private $genre;
    private $tranche_age;
    private $id_resultat;

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
    public function getValidation()
    {
        return $this->validation;
    }

    /**
     * @param mixed $validation
     */
    public function setValidation($validation)
    {
        $this->validation = $validation;
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

    /**
     * @return mixed
     */
    public function getIdResultat()
    {
        return $this->id_resultat;
    }

    /**
     * @param mixed $id_resultat
     */
    public function setIdResultat($id_resultat)
    {
        $this->id_resultat = $id_resultat;
    }




}