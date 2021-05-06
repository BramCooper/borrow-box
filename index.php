<?php
    include_once(__DIR__ . "./classes/Item.php");
    include_once(__DIR__ . "./classes/User.php");

    $item = new Item();
    $availableItems = $item->getAllAvailable();
    $notAvailableItems = $item->getAllNotAvailable();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>inventory</title>
</head>
<body>
    <section class="header">
        "nav"
        <h1>inventory</h1>
    </section>

    <div class="search">
        <form action="" method="post">
            <input type="text" name="search" placeholder="look for an item in this box">
            <input type="submit">
        </form>
    </div>

    <section class="available">
        <?php foreach($availableItems as $i): ?>
        <div class="item">
            <img src="#" alt="profilepicture">
            <div class="info">
                <h3><?php echo $i["name"]; ?></h3>
                <p><?php echo $i["description"] ?></p>
            </div>
        </div>
        <?php endforeach; ?>
    </section>

    <section class="notAvailable">
        <?php foreach($notAvailableItems as $ni): ?>
        <div class="item">
            <img src="#" alt="profilepicture">
            <div class="info">
                <h3><?php echo $ni["name"]; ?></h3>
                <p><?php echo $ni["description"]; ?></p>
            </div>
        </div>
        <?php endforeach; ?>
    </section>

    <div class="plus">
        add button
    </div>

</body>
</html>