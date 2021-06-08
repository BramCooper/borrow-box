<?php
    include_once(__DIR__ . '/classes/Item.php');
    include_once(__DIR__ . '/classes/Use_item.php');
    session_start();
    $id = $_SESSION['id'];
    $item = new Item();
    $u = new Use_item();
    $uses = $u->getUsesFromUser($id);

    if(!empty($_POST)){
        $u->removeUse($id, $_POST['item']);
        $item->setItemAvailable($_POST['item']);
    }

?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>return item</title>
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
        <h1>return item</h1>
    </section>

<section>
    <form action="" method="post">
        <label for="item">select the item you want to return</label>
        <select name="item" id="item">
            <?php foreach($uses as $u): ?>
            <option value="<?php $info = $item->getInfo($u["item_id"]); echo $u["item_id"]; ?>"><?php echo $info["name"]; ?></option>
            <?php endforeach; ?>
        </select>

        <label for="check">I return in this item in the state I got it</label>
        <input type="checkbox" name="state" id="check">

        <label for="description">If not, what is wrong with it?</label>
        <input type="text" name="description" id="description">

        <img src="#" alt="qr code">

        <input type="submit" value="return this item to the box" name="submit">
    </form>

</section>

</body>
</html>