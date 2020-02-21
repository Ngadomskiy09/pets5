<?php

require_once ("config-pets.php");

class Database
{
    //Connection object
    private $_dbh;

    function __construct()
    {
        try{
            //Create a new PDO connection
            $this->_dbh = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
            echo "Connected";
        }catch (PDOException $e){
            echo $e->getMessage();
        }
    }

    function writePet($pet)
    {
        //1. Define the query
        $sql = "INSERT INTO pets VALUES (:id, :name, :color, :type)";

        //2. Prepare statement
        $statement = $this->_dbh->prepare($sql);

        //3. Bind the params
//        $statement->bindParam(':id',$pet->getId());
//        $statement->bindParam(':name',$pet->getName());
//        $statement->bindParam(':color',$pet->getColor());
//        $statement->bindParam(':type',$pet->getType());

        //4. Execute the statement
        $statement->execute();

        //5. Get the key of the last inserted row
        //$id = $this->_dbh->lastInsertId();
    }
}