<?php
    include_once(__DIR__ . "/classes/Box.php");
    include_once(__DIR__ . "/classes/User.php");
    session_start();
    $id = $_SESSION['id'];

    $b = new Box();
    $u = new User();

    $boxes = $b->loadAll();
    if(!empty($_POST)){
        $u->linkBox($id, $_GET['id']);
        header("location: index.php");
    }

?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>switch from box</title>
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
    <h1>switch from box</h1>
</section>

<?php foreach($boxes as $b): ?>
    <section class="boxList">
        <a href="boxConfirm.php?id=<?php echo $b["id"]?>"
        <div class="box__<?php echo $b['id'];?>">
            <h3 class="box__name"><?php echo $b["name"]; ?></h3>
            <p class="box__adress"><?php echo $b["location"]; ?></p>
        </div>
        </a>

    </section>
<?php endforeach; ?>
</body>
</html>