<?php
    include_once(__DIR__ . "/classes/Item.php");
    include_once(__DIR__ . "/classes/Use_item.php");
    session_start();
    $i = new Item();
    $u = new Use_item();
    $itemId = $_GET['id'];
    $info = $i->getInfo($itemId);
    $id = $_SESSION['id'];

    if (!empty($_POST)){
        $i->setUnavailable($itemId);
        $u->UseItem($id, $itemId);
    }

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
    <p><span class="bold">item I want to use: </span><?php echo $info['name']; ?></p>
    <p><span class="bold">use till: </span>hier nog iets invullen!!!!</p>

    <img src="#" alt="QR-code">
    <form action="" method="post">
        <input type="submit" value="confirm" name="submit">
    </form>
</section>
</body>
</html>