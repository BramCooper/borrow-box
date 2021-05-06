<?php
    include_once(__DIR__ . "./classes/Box.php");
    include_once(__DIR__ . "./classes/User.php");

    $b = new Box();
    $u = new User();
    $boxId = $u->getBoxId();
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
    <header>
        "nav"
        <h1>users of this box</h1>
    </header>

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
</body>
</html>