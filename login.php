<?php
    include_once(__DIR__ . "./classes/User.php");
    if(!empty($_POST)){
        $user = new User();
        $user->setEmail($_POST['email']);
        $user->setPassword($_POST['password']);

        try{
            if($user->canLogin()){
                session_start();
            }
        }catch(\Throwable $th){
            $error = $th->getMessage();
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login page</title>
</head>
<body>
    <form action="" method="post">
        <input type="email" placeholder="email" name="email">
        <input type="password" placeholder="password" name="password">
    </form>
</body>
</html>