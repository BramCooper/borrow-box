<?php
    include_once(__DIR__ . "./classes/Item.php");
    include_onde(__DIR__ . "./classes/User.php");
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
        <div class="item">
            <img src="#" alt="profilepicture">
            <div class="info">
                <h3>name</h3>
                <p>This is the description of this item. This will
                    say more about this item and tell the use of it.
                    There will be more information when you click on it.
                </p>
            </div>
        </div>
    </section>

    <section class="notAvailable">
        <div class="item">
            <img src="#" alt="profilepicture">
            <div class="info">
                <h3>name</h3>
                <p>This is the description of this item. This will
                    say more about this item and tell the use of it.
                    There will be more information when you click on it.
                </p>
            </div>
        </div>
    </section>

</body>
</html>