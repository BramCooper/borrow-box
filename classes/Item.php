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



    }
?>