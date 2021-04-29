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
             $statement = $conn->prepare("selectg * from users where (email) = (:email)");
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
             $statement = $conn->prepare("insert into user (email, password) values (:email, :password)");
             echo "test het werkt denk ik";
             $statement->bindValue(":email", $this->getEmail());
             $statement->bindValue(":password", $password);

             return $statement->execute();

        }




}