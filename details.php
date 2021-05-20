<?php
    include_once(__DIR__ . "./classes/Item.php");
    session_start();
    $i = new Item();
    $info = $i->getInfo($_GET['id']);
    $owner = $i->getUser($info["posted_by"]);
    var_dump($owner);
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
    <header>
        "nav"
        <h1><?php echo $info['name']; ?></h1>
    </header>

<section class="info">
    <p><span class="bold">specifications: </span><?php echo $info['name']?></p>
    <p><span class="bold">added by: </span><?php echo $owner ?></p>
    <p><span class="bold">description: </span><?php echo $info["description"]?></p>
    <p><span class="bold">available till: </span></p>

    <a href="useItem.php?name=<?php $info['name']; ?>">I want to use this item</a>
</section>
</body>
</html>