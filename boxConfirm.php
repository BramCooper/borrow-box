<?php
    session_start();
    include_once(__DIR__ . "/classes/Box.php");
    include_once(__DIR__ . "/classes/User.php");

    $u = new User();
    $b = new Box();
    $userId = $u->getId();
    $boxId = $_GET["id"];
    $info = $b->getInfo($boxId);
    var_dump($_SESSION);
    if(!empty($_POST)){
        echo "post niet leeg";
        $u->linkBox($boxId, $userId);
        //header("location: login.php");
    }

?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>box detail</title>
</head>
<body>
    <form action="" method="post">
        <h1><?php echo $info['name'] ?></h1>
        <h2><?php echo $info['location'] ?></h2>
        <label for="useBox">Are you sure you want to use this box?</label>
        <input type="submit" value="use this box!" id="useBox" name="submit">
    </form>
</body>
</html>