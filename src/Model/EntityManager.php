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
     *
     */
    public function deleteQuest($id)
    {
            $statement = $this->conn->prepare("DELETE FROM $this->table WHERE id = :id ");
            $statement->bindValue(':id', $id, \PDO::PARAM_INT);
            $statement->execute();
    }

    /**
     *
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
     *
     */
    public function insertToken($validation, $mail, $genre, $tranche_age)
    {
        $statement = $this->conn->prepare("INSERT INTO $this->table(validation, mail, genre, tranche_age) VALUES (:validation, :mail, :genre, :tranche_age)");

        $statement->bindValue(':validation', $validation, \PDO::PARAM_STR);
        $statement->bindValue(':mail', $mail, \PDO::PARAM_STR);
        $statement->bindValue(':genre', $genre, \PDO::PARAM_STR);
        $statement->bindValue(':tranche_age', $tranche_age, \PDO::PARAM_STR);
        $statement->execute();
    }


}