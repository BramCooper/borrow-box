<?php
    include_once(__DIR__ . "./classes/User.php");
    if(!empty($_POST)){
        $user = new User();
        $user->setEmail($_POST['email']);
        $user->setPassword($_POST['password']);

        try{
            if($user->canLogin()){
                session_start();
                $_SESSION['email'] = $_POST['email'];
                $_SESSION['id'] = $user->getId();
                $_SESSION["box_id"] = $user->getBoxId($_POST["email"]);
                header("location: index.php");
            }
        }catch(\Throwable $th){
            $error = $th->getMessage();
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login page</title>
</head>
<body>
    <div class="logo">hier komt logo in</div>

    <form action="" method="post">
        <input type="email" placeholder="email" name="email">
        <input type="password" placeholder="password" name="password">
        <input type="submit" name="login" value="login">
    </form>

    <?php if(!empty($error)): ?>
    <div class="error">
        <?php echo $error?>
    </div>
    <?php endif; ?>

</body>
</html>