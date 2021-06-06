<?php
    include_once(__DIR__ . "./classes/Box.php");

    $b = new Box();
    $boxes = $b->loadAll();
?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>select box</title>
</head>
<body>
    <section class="header">
        "nav"
        <h1>select a box</h1>
    </section>

    <div class="search__box">
        <form action="" method="post">
            <input type="text" name="search__box" placeholder="look for a box in your area">
            <input type="submit" value="search">
        </form>
    </div>

    <?php foreach($boxes as $b): ?>
        <section class="boxList">
            <a href="boxConfirm.php?id=<?php echo $b["id"]?>"
                <div class="box__<?php echo $b['id'];?>">
                    <h3 class="box__name"><?php echo $b["name"]; ?></h3>
                    <p class="box__adress"><?php echo $b["location"]; ?></p>
                </div>
            </a>

        </section>
    <?php endforeach; ?>
</body>
</html>