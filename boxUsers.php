<?php
    include_once(__DIR__ . "/classes/Box.php");
    include_once(__DIR__ . "/classes/User.php");

    session_start();
    $b = new Box();
    $u = new User();
    $boxId = $_SESSION["box_id"];
    $id = $_SESSION ["id"];
    $users = $b->loadUsers($boxId);
?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>box users</title>
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
    <h1>users of this box</h1>
</section>

    <section class="users">
        <?php foreach($users as $user): ?>
            <a href="profile.php?id=<?php echo $user['id']?>">
                <div class="user">
                    <img src="#" alt="profile pic">
                    <h3><?php echo $user["first_name"] ?></h3>
                    <p><?php echo $user["last_name"] ?></p>
                    <p><?php echo $user["email"] ?></p>
                </div>
            </a>
        <?php endforeach; ?>
    </section>
<script src="navigation.js"></script>
</body>
</html>