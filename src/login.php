<?php
session_start();
//require_once 'credentials.php';

if (isset($_GET['logout'])) {
    session_destroy();
}

if(isset($_SESSION['user']))
{
    header("Location: index.php");
    exit;
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Shorten Request Variables if they are set
    $username = isset($_POST['username']) ? trim($_POST['username']) : '';
    $password = isset($_POST['password']) ? trim($_POST['password']) : '';

    $valid_user = 'Mithun';
    $valid_hash = '$2y$10$3e33YDD3yTkedfDdR.WgA.MTCOpjeaPQy2E3858f96PJNVpVezAxS';

    if ($username == $valid_user && password_verify($password, $valid_hash)) {
        $_SESSION['user'] = $valid_user;
        header("Location: index.php");
        exit;
    }
    else {
        $msg="<span style='color:red'>Invalid Details</span>";
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Page</title>
    <link rel="stylesheet" type="text/css" href="css/styleLogin.css">
</head>
<body>
<div align="center">
    <h1>Login to Note App</h1>
<form action="#" method="POST">
    <div class="login">
        <input type="text" placeholder="Username" id="username" name="username">
        <input type="password" placeholder="password" id="password" name="password" >
        <input type="submit" value="Login">
        <?php if(isset($msg)){?>
            <h3><?php echo $msg;?></h3>
        <?php } ?>
    </div>
</form>
</div>

</body>
</html>