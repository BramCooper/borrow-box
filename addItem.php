<?php
    include_once(__DIR__ . "/classes/Item.php");

    session_start();
    $id = $_SESSION['id'];
    if(!empty($_POST)){
        try {
            $i = new Item();
            $i->setDescription($_POST['description']);
            $i->setName($_POST['name']);
            $i->setQuality($_POST['quality']);

            $i->addItem();
        }catch(\throwable $th){
            $error = $th->getMessage();
        }

    }
?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>add an item</title>
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
    <h1>add an item</h1>
</section>

    <?php if(isset($error)): ?>
    <div class="error">
        <?php echo $error ?>
    </div>
    <?php endif; ?>

<section class="upload">
    <form action="" method="post">
        <label for="">item name</label>
        <input type="text" name="name">

        <label for="">item description</label>
        <input type="text" name="description">

        <label for="state">state of the item</label>
        <select name="quality" id="state">
            <option value="damaged">damaged</option>
            <option value="surface damage">surface damage</option>
            <option value="almost new">almost new</option>
            <option value="new">new</option>
        </select>

        <label for="">available till</label>
        <input type="date">

        <input type="submit" value="add item to borrow box">
    </form>
</section>
</body>
</html>