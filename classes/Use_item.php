<?php
    include_once(__DIR__ . "/Item.php");
    include_once(__DIR__ . "/User.php");
    class Use_item{
    private $user_id;
    private $item_id;

        /**
         * @return mixed
         */
        public function getItemId()
        {
            return $this->item_id;
        }

        /**
         * @param mixed $item_id
         */
        public function setIteId($item_id): void
        {
            $this->item_id = $item_id;
        }

        /**
         * @return mixed
         */
        public function getUserId()
        {
            return $this->user_id;
        }

        /**
         * @param mixed $user_id
         */
        public function setUserId($user_id): void
        {
            $this->user_id = $user_id;
        }

        public function useItem($id, $itemId){
            $conn = new PDO('mysql:host=localhost;dbname=borrowbox_db', "root", "root");
            $statement = $conn->prepare("insert into use_item (user_id, item_id) values (:id, :item_id)");
            $statement->bindValue(":id", $id);
            $statement->bindValue(":item_id", $itemId);
            $result = $statement->execute();
            return $result;
        }

        public function removeUse($id, $itemId){
            $conn = new PDO('mysql:host=localhost;dbname=borrowbox_db', "root", "root");
            $statement = $conn->prepare("delete from use_item where (user_id, item_id) = (:id, :item_id)");
            $statement->bindValue(":id", $id);
            $statement->bindValue(":item_id", $itemId);
            $result = $statement->execute();
            return $result;
        }

        public function getUsesFromUser($id){
            $conn = new PDO('mysql:host=localhost;dbname=borrowbox_db', "root", "root");
            $statement = $conn->prepare("select * from use_item where user_id = :id");
            $statement->bindValue(":id", $id);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
}