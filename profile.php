<?php
    include_once(__DIR__ . "./classes/User.php");

    $id = $_GET['id'];
    $u = new User();
    $info = $u->getInfo($id);
    $items = $u->getItems($id);
    var_dump($info["email"]);
?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>profile</title>
</head>
<body>
    <header>
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
        <h1>profile</h1>
    </header>

<section class="info">
    <img src="#" alt="profile picture">
    <h3>name</h3>

    <p><span class="bold">adress: </span><?php echo $info['street']; ?> <?php echo $info['housenumber'];?> <?php echo $info['city'] ?></p>
    <p><span class="bold">email: </span><?php echo $info["email"] ?></p>
    <p><span class="bold">telephone number: </span>12345132</p>
    <p><span class="bold">age: </span>20 years</p>
</section>

<section class="itemsUsed">
    <?php foreach($items as $item): ?>
    <div class="item">
        <h3><?php echo $item["name"]; ?></h3>
        <p><?php echo $item["description"]; ?></p>
    </div>
    <?php endforeach; ?>
</section>
    <script src="navigation.js"></script>
</body>
</html>