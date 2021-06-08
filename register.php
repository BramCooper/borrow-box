<?php
    include_once(__DIR__ . "/classes/User.php");

    if(!empty($_POST)){
        $user = new User();
        $user ->setPassword($_POST["password"]);
        $user->setEmail($_POST["email"]);
        $user->setFirstname($_POST['firstname']);
        $user->setLastname($_POST['lastname']);
        $user->setStreetname($_POST['streetname']);
        $user->setCity($_POST['city']);

        $user->register();
        $_SESSION['email'] = $_POST['email'];
        var_dump($_SESSION);
        header("location: selectBox.php");
    }

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="logo">hier komt logo in</div>

    <a href="login.php">log in with existing account</a>
    <h3>or make a new account</h3>

    <form action="" method="post">
        <input type="text" name="firstname" placeholder="firstname">
        <input type="text" name="lastname" placeholder="lastname">
        <input type="text" name="email" placeholder="email">
        <input type="number" name="phonenumber" placeholder="phone number">
        <input type="text" name="streetname" placeholder="streetname">
        <input type="text" name="city" placeholder="city">
        <input type="password" name="password" placeholder="password">µ
        <input type="submit" value="next step">
    </form>

</body>
</html>