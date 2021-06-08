<?php
    include_once(__DIR__ . "/classes/Item.php");
    session_start();
    $id = $_SESSION['id'];
    $i = new Item();
    $info = $i->getInfo($_GET['id']);
    $owner = $i->getUser($info["posted_by"]);
?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $info['name']; ?></title>
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
    <h1><?php echo $info["name"]; ?></h1>
</section>

<section class="info">
    <p><span class="bold">specifications: </span><?php echo $info['name']?></p>
    <p><span class="bold">added by: </span><?php echo $owner ?></p>
    <p><span class="bold">description: </span><?php echo $info["description"]?></p>
    <p><span class="bold">available till: </span></p>

    <a href="useItem.php?id=<?php echo $_GET['id']; ?>">I want to use this item</a>
</section>
</body>
</html>