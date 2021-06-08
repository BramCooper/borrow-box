<?php
    include_once(__DIR__ . "/classes/Item.php");
    session_start();
    $id = $_SESSION['id'];
    $i = new Item();
    $info = $i->getInfo($_GET['id']);

    if(!empty($_POST)){
        $i->reportItem($_GET['id']);
    }

?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>report item</title>
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
        <h1>report item</h1>
    </section>

<section>
    <h2><?php echo $info["name"]; ?></h2>
    <form action="" method="post">
        <label for="">what is wrong with the item?</label>
        <input type="text" name="description">
        <input type="submit" value="report item" name="submit">
    </form>
</section>


</body>
</html>