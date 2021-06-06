<?php
    include_once(__DIR__ . "./classes/Item.php");
    include_once(__DIR__ . "./classes/User.php");
    session_start();
    $id = $_SESSION['id'];
    $item = new Item();
    $boxId = $_SESSION['box_id'];
    $availableItems = $item->getAllAvailable($boxId);
    $notAvailableItems = $item->getAllNotAvailable($boxId);
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
        <div>
            <a href="#" id="navbar">
                <img src="./Hamburger_icon.svg%20(1).png" alt="hamburger icon">
            </a>
        </div>
        <section class="navItems">
            <a href="index.php">inventory</a>
            <a href="profile.php?id=<?php echo $id ?>">profile</a>
            <a href="boxInfo.php">box info</a>
        </section>
        <h1>inventory</h1>
    </section>

    <div class="search__item">
        <form action="" method="post">
            <input type="text" name="search" placeholder="look for an item in this box">
            <input type="submit" value="search">
        </form>
    </div>

    <section class="available">
        <?php foreach($availableItems as $i): ?>
        <div class="item">
            <a href="details.php?id=<?php echo $i['id']?>">
                <img src="#" alt="profilepicture">
                <div class="info">
                    <h3><?php echo $i["name"]; ?></h3>
                    <p><?php echo $i["description"] ?></p>
                </div>
            </a>
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

    <script src="navigation.js"></script>
</body>
</html>