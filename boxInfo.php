<?php
    include_once(__DIR__ . '/classes/Box.php');
    session_start();
    $box = new Box();
    $id = $_SESSION['id'];
    $boxId = $_SESSION['box_id'];
    $boxInfo = $box->getInfo($boxId);
    $boxAdress = $boxInfo["location"];

?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>box info</title>
</head>
<body>
<section class="header">
    <div>
        <a href="#" id="navbar">
            <img src="./Hamburger_icon.svg%20(1).png" alt="hamburger icon">
        </a>
    </div>
    <section class="navItems">
        <a href="index.php">inventory</a>
        <a href="profile.php?id=<?php echo $id ?>">profile</a>
        <a href="boxInfo.php">box info</a>
        <a href="logout.php">logout</a>
    </section>
    <h1>box info</h1>
</section>

    <a href="boxUsers.php">users of this box</a>
    <a href="returnItem.php">return item</a>
    <a href="addItem.php">add item</a>
    <a href="#">location of the box</a>

    <a href="#">switch from box</a>

<script src="navigation.js"></script>
</body>
</html>