<?php
    include_once(__DIR__ . "./classes/Item.php");

?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>use item</title>
</head>
<body>
    <header>
        "nav"
        <h1>use item</h1>
    </header>

<section>
    <p><span class="bold">item I want to use: </span><?php echo $_GET['name']; ?></p>
    <p><span class="bold">use till: </span>hier nog iets invullen!!!!</p>

    <img src="#" alt="QR-code">
</section>
</body>
</html>