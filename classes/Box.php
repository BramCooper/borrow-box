<?php
    include_once(__DIR__ . "./Item.php");
    include_once(__DIR__ . "./User.php");

   class Box{
    private $items;
    private $users;
    private $location;
    private $id;

    public function loadUsers($id){
        $conn = new PDO('mysql:host=localhost;dbname=borrowbox_db', "root", "root");
        $statement = $conn->prepare("select name from user where box_id = :box_id");
        $statement->bindValue(":box_id", $id);
        $statement->execute();
        $result = $statement->fethAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function loadAll(){
        $conn = new PDO('mysql:host=localhost;dbname=borrowbox_db', "root", "root");
        $statement = $conn->prepare("select * from box");
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getInfo($id){
        $conn = new PDO('mysql:host=localhost;dbname=borrowbox_db', "root", "root");
        $statement = $conn->prepare("select * from box where id = :id");
        $statement->bindValue(":id", $id);
        $statement->execute();
        $result = $statement->fetch();

        return $result;
    }

}