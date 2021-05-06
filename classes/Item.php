<?php
    include_once(__DIR__ . "./User.php");
    class Item{
        private $name;
        private $description;
        private $owner;
        private $available;
        private $quality;

        /**
         * @return mixed
         */
        public function getAvailable()
        {
            return $this->available;
        }

        /**
         * @param mixed $available
         */
        public function setAvailable($available): void
        {
            $this->available = $available;
        }

        /**
         * @return mixed
         */
        public function getOwner()
        {
            return $this->owner;
        }

        /**
         * @param mixed $owner
         */
        public function setOwner($owner): void
        {
            $this->owner = $owner;
        }


        /**
         * @return mixed
         */
        public function getQuality()
        {
            return $this->quality;
        }

        /**
         * @param mixed $quality
         */
        public function setQuality($quality): void
        {
            $this->quality = $quality;
        }

        /**
         * @return mixed
         */
        public function getDescription()
        {
            return $this->description;
        }

        /**
         * @param mixed $description
         */
        public function setDescription($description): void
        {
            $this->description = $description;
        }


        /**
         * @return mixed
         */
        public function getName()
        {
            return $this->name;
        }

        /**
         * @param mixed $name
         */
        public function setName($name): void
        {
            $this->name = $name;
        }

        public function getAllAvailable(){
            $conn = new PDO('mysql:host=localhost;dbname=borrowbox_db', "root", "root");
            $statement = $conn->prepare("select * from items where (available) = (true)");
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }

        public function getAllNotAvailable(){
            $conn = new PDO('mysql:host=localhost;dbname=borrowbox_db', "root", "root");
            $statement = $conn->prepare("select * from items where (available) = (false)");
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }

        public function addItem(){

            session_start();
            $conn = new PDO('mysql:host=localhost;dbname=borrowbox_db', "root", "root");
            $statement = $conn->prepare("insert into item (name, description, posted_by, quality, available) values (:name, :description, :posted_by, :quality, true)");
            $statement->bindValue("name", $this->getName());
            $statement->bindValue(":description", $this->getDescription());
            $statement->bindValue(':posted_by', $_SESSION['id']);
            $statement->bindValue(":quality", $this->getQuality());
            $result = $statement->execute();

            if ($result){
                return $result;
            }else{
                throw new Exception("something went wrong while adding your item");
            }
        }

    }
?>