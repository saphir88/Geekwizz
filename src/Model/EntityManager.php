<?php
/**
 * Created by PhpStorm.
 * User: sylvain
 * Date: 07/03/18
 * Time: 20:52
 */

namespace Model;


abstract class EntityManager
{
    protected $conn; //variable de connexion

    protected $table;

    public function __construct($table)
    {
        $db = new Connection();
        $this->conn = $db->getPdo();
        $this->table = $table;
    }

    /**
     * @return array
     */
    public function findAll()
    {
        return $this->conn->query('SELECT * FROM ' . $this->table, \PDO::FETCH_ASSOC)->fetchAll();
    }

    /**
     * @param $id
     * @return array
     */
    public function findOneById(int $id)
    {
        // prepared request
        $statement = $this->conn->prepare("SELECT * FROM $this->table WHERE id=:id");
        $statement->bindValue('id', $id, \PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetch(\PDO::FETCH_ASSOC);
    }

    /**
     * @param int $confirmkey
     * @return array
     */
    public function findOneByConfirmkey(int $confirmkey)
    {
        // prepared request
        $statement = $this->conn->prepare("SELECT * FROM $this->table WHERE confirmkey=:confirmkey");
        $statement->bindValue('confirmkey', $confirmkey, \PDO::PARAM_STR);
        $statement->execute();

        return $statement->fetch(\PDO::FETCH_ASSOC);
    }

    public function findOneByMail($mail)
    {
        // prepared request
        $statement = $this->conn->prepare("SELECT mail FROM $this->table WHERE mail=:mail");
        $statement->bindValue('mail', $mail, \PDO::PARAM_STR);
        $statement->execute();

        return $statement->fetch(\PDO::FETCH_ASSOC);
    }

    /**
     * @param $confirmkey
     * @param $data
     */
    public function updateToken($confirmkey, $data)
    {
        foreach($data as $key => $value) {
            $statement = $this->conn->prepare("UPDATE $this->table SET $key = \"$value\" WHERE confirmkey=:confirmkey");
            $statement->bindValue(':confirmkey', $confirmkey, \PDO::PARAM_STR);
            $statement->execute();
        }
    }


    public function findQuizz()
    {
        return $this->conn->query('SELECT * FROM ' . $this->table, \PDO::FETCH_ASSOC)->fetchAll();
    }

/*  select titre, Resp.reponse, Resp.image from Q_Pertinentes AS Quest RIGHT JOIN R_Pertinentes AS Resp ON Quest.id = Resp.id_q_pertinentes;      */

    /*public function findReponse()
    {
        return $this->conn->query('SELECT * FROM ' . $this->table, \PDO::FETCH_ASSOC)->fetchAll();
    }*/


    /**
     * @param $id
     */
    public function deleteQuest($id)
    {
            $statement = $this->conn->prepare("DELETE FROM $this->table WHERE id = :id ");
            $statement->bindValue(':id', $id, \PDO::PARAM_INT);
            $statement->execute();
    }

    public function updateQuest(){

        $statement = $this->conn->prepare("UPDATE $this->table SET  WHERE id=:id");
        $statement->bindValue(':id', $id, \PDO::PARAM_INT);
        $statement->execute();
    }

    /**
     * @param $titre
     * @param $Resp1
     * @param $Resp2
     * @param $Resp3
     * @param $Resp4
     * @param $Img1
     * @param $Img2
     * @param $Img3
     * @param $Img4
     */
    public function insert($titre, $Resp1, $Resp2, $Resp3, $Resp4, $Img1, $Img2, $Img3, $Img4)
    {

            $statement = $this->conn->prepare("INSERT INTO $this->table(titre, reponse1, reponse2, reponse3, reponse4, image1, image2, image3, image4) VALUES (:titre, :reponse1, :reponse2, :reponse3, :reponse4, :image1, :image2, :image3, :image4)");

            $statement->bindValue(':titre', $titre, \PDO::PARAM_STR);
            $statement->bindValue(':reponse1', $Resp1, \PDO::PARAM_STR);
            $statement->bindValue(':reponse2', $Resp2, \PDO::PARAM_STR);
            $statement->bindValue(':reponse3', $Resp3, \PDO::PARAM_STR);
            $statement->bindValue(':reponse4', $Resp4, \PDO::PARAM_STR);
            $statement->bindValue(':image1', $Img1, \PDO::PARAM_STR);
            $statement->bindValue(':image2', $Img2, \PDO::PARAM_STR);
            $statement->bindValue(':image3', $Img3, \PDO::PARAM_STR);
            $statement->bindValue(':image4', $Img4, \PDO::PARAM_STR);
            $statement->execute();

    }

    /**
     * @param $mail
     * @param $genre
     * @param $tranche_age
     */
    public function insertSauvegarde($mail, $genre, $tranche_age)
    {

        $statement = $this->conn->prepare("INSERT INTO $this->table(mail, genre, tranche_age) VALUES (:mail, :genre, :tranche_age)");

        $statement->bindValue(':mail', $mail, \PDO::PARAM_STR);
        $statement->bindValue(':genre', $genre, \PDO::PARAM_STR);
        $statement->bindValue(':tranche_age', $tranche_age, \PDO::PARAM_STR);
        $statement->execute();

    }


    /**
     * @param $id
     * @param $data
     */
    public function update($id, $data)
    {
        foreach($data as $key => $value) {
            $statement = $this->conn->prepare("UPDATE $this->table SET $key = \"$value\" WHERE id=:id");
            $statement->bindValue('id', $id, \PDO::PARAM_INT);
            $statement->execute();
        }
    }

    /**
     * @param $validation
     * @param $mail
     * @param $genre
     * @param $tranche_age
     * @param $id_resultat
     * @param $confirmkey
     */
    public function insertToken($validation, $mail, $genre, $tranche_age, $id_resultat, $confirmkey)
    {
        $statement = $this->conn->prepare("INSERT INTO $this->table(validation, mail, genre, tranche_age, id_resultat, confirmkey) VALUES (:validation, :mail, :genre, :tranche_age, :id_resultat, :confirmkey)");

        $statement->bindValue(':validation', $validation, \PDO::PARAM_STR);
        $statement->bindValue(':mail', $mail, \PDO::PARAM_STR);
        $statement->bindValue(':genre', $genre, \PDO::PARAM_STR);
        $statement->bindValue(':tranche_age', $tranche_age, \PDO::PARAM_STR);
        $statement->bindValue(':id_resultat', $id_resultat, \PDO::PARAM_STR);
        $statement->bindValue(':confirmkey', $confirmkey, \PDO::PARAM_STR);
        $statement->execute();
    }
}