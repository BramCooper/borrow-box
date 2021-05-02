<?php
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

    }
?>