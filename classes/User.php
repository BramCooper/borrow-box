<?php
     class User{
        private $firstname;
        private $lastname;
         private $email;
         private $password;
         private $streetname;
         private $housenumber;
         private $postalcode;
         private $city;
         private $picture;
         private $id;
         private $box;
         /**
          * @return mixed
          */
         public function getPicture()
         {
             return $this->picture;
         }

         /**
          * @param mixed $picture
          */
         public function setPicture($picture): void
         {
             $this->picture = $picture;
         }


         /**
          * @return mixed
          */
         public function getCity()
         {
             return $this->city;
         }

         /**
          * @param mixed $city
          */
         public function setCity($city): void
         {
             $this->city = $city;
         }


         /**
          * @return mixed
          */
         public function getPostalcode()
         {
             return $this->postalcode;
         }

         /**
          * @param mixed $postalcode
          */
         public function setPostalcode($postalcode): void
         {
             $this->postalcode = $postalcode;
         }


         /**
          * @return mixed
          */
         public function getHousenumber()
         {
             return $this->housenumber;
         }

         /**
          * @param mixed $housenumber
          */
         public function setHousenumber($housenumber): void
         {
             $this->housenumber = $housenumber;
         }
         /**
          * @return mixed
          */
         public function getStreetname()
         {
             return $this->streetname;
         }

         /**
          * @param mixed $streetname
          */
         public function setStreetname($streetname): void
         {
             $this->streetname = $streetname;
         }


         /**
          * @return mixed
          */
         public function getLastname()
         {
             return $this->lastname;
         }

         /**
          * @param mixed $lastname
          */
         public function setLastname($lastname): void
         {
             $this->lastname = $lastname;
         }


         /**
          * @return mixed
          */
         public function getBox()
         {
             return $this->box;
         }

         /**
          * @param mixed $box
          */
         public function setBox($box): void
         {
             $this->box = $box;
         }

         /**
          * @return mixed
          */
         public function getId()
         {
             session_start();
             $conn = new PDO('mysql:host=localhost;dbname=borrowbox_db', "root", "root");
             $statement = $conn->prepare("select id from user where email = :email");
             $statement->bindValue(':email', $_SESSION['email']);
             $statement->execute();
             $result = $statement->fetch();
             return $result['id'];
         }

         /**
          * @param mixed $id
          */
         public function setId($id): void
         {
             $this->id = $id;
         }

         /**
          * @return mixed
          */
         public function getFirstname()
         {
             return $this->firstname;
         }

         /**
          * @param mixed $firstname
          */
         public function setFirstname($firstname): void
         {
             $this->firstname = $firstname;
         }


         /**
          * @return mixed
          */
         public function getEmail()
         {
             return $this->email;
         }

         /**
          * @param mixed $email
          */
         public function setEmail($email): void
         {
             $this->email = $email;
         }


         /**
          * @return mixed
          */
         public function getPassword()
         {
             return $this->password;
         }

         /**
          * @param mixed $password
          */
         public function setPassword($password): void
         {
             $this->password = $password;
         }

         public function canLogin(){

             $conn = new PDO('mysql:host=localhost;dbname=borrowbox_db', "root", "root");
             $statement = $conn->prepare("select * from user where (email) = (:email)");
             $statement->bindValue(":email", $this->getEmail());
             $statement->execute();
             $result = $statement->fetch();

             $password = $this->getPassword();
             $hash = $result["password"];

             if(password_verify($password, $hash)){
                 return true;
             }else{
                 return false;
                 throw new Exception("password is not correct");
             }
         }

        public function register(){
             $options = [
                 "cost" => 14
             ];

             $password  = password_hash($this->getPassword(), PASSWORD_DEFAULT, $options);

             $conn = new PDO('mysql:host=localhost;dbname=borrowbox_db', "root", "root");
             $statement = $conn->prepare("insert into user (email, password, firstname, lastname, city, streetname) values (:email, :password, :firstname, :lastname, :city, :streetname)");
             echo "test het werkt denk ik";
             $statement->bindValue(":email", $this->getEmail());
             $statement->bindValue(":firstname", $this->getFirstname());
             $statement->bindValue(":lastname", $this->getLastname());
             $statement->bindValue(":city", $this->getCity());
             $statement->bindValue(":streetname", $this->getStreetname());
             $statement->bindValue(":password", $password);

             return $statement->execute();
        }

        public function getBoxId($email){
            $conn = new PDO('mysql:host=localhost;dbname=borrowbox_db', "root", "root");
            $statement = $conn->prepare("select box_id from user where email = :email");
            $statement->bindValue(":email", $email);
            $statement->execute();
            $result = $statement->fetch();
            return $result["box_id"];
        }

        public function getInfo($id){
            $conn = new PDO('mysql:host=localhost;dbname=borrowbox_db', "root", "root");
            $statement = $conn->prepare("select * from user where id = :id");
            $statement->bindValue(":id",$id);
            $statement->execute();
            $result = $statement->fetch();
            return $result;
        }

        public function getItems($id){
            $conn = new PDO('mysql:host=localhost;dbname=borrowbox_db', "root", "root");
            $statement = $conn->prepare("select * from item where posted_by = :id and report = 0");
            $statement->bindValue(":id", $id);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }

        public function linkBox($box_id, $user_id){
            $conn = new PDO('mysql:host=localhost;dbname=borrowbox_db', "root", "root");
            $statement = $conn->prepare("UPDATE user SET box_id = (:box_id) WHERE user.id = (:user_id)");
            $statement->bindValue(":box_id", $box_id);
            $statement->bindValue(":user_id", $user_id);
            $result = $statement->execute();
            var_dump($result);
            return $result;
        }


}