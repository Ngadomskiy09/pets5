<?php

require_once "config-pets.php";

class Database
{
    //Connection object
    private $_dbh;

    function __construct()
    {
        /*try{
            //Create a new PDO connection
            $this->_dbh = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
            echo "Connected";
        }catch (PDOException $e){
            echo $e->getMessage();
        }*/
        $this->_dbh = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
    }

    function addPet($name, $color, $type)
    {
        //1. Define the query
        $sql = "INSERT INTO pets VALUES (DEFAULT, :name, :color, :type)";

        //2. Prepare statement
        $statement = $this->_dbh->prepare($sql);

        //3. Bind the params
        $statement->bindParam(':type',$type);
        $statement->bindParam(':name',$name);
        $statement->bindParam(':color',$color);
//        $statement->bindParam(':type',$pet->getType());

        //4. Execute the statement
        $statement->execute();

        //5. Get the key of the last inserted row
        //$id = $this->_dbh->lastInsertId();
    }

    function getPet()
    {

        $sql = "SELECT * FROM pets";

        $statement = $this->_dbh->prepare($sql);

        $statement->execute();

        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }
}