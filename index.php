<?php
require_once "includes/config_session.inc.php";
require_once "includes/signup_view.inc.php";
require_once "includes/login_view.inc.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h2>Login</h2>
    <form action="includes/login.inc.php" method="post">
        <input type="text" name="username" placeholder="username">
        <input type="password" name="pwd"  placeholder="password">
        <button>Login</button>
    </form>
    <?php
    check_login_errors();
    ?>
    <h2>Register</h2>
    <form action="includes/signup.inc.php" method="post">
        <input type="text" name="username" placeholder="username">
        <input type="password" name="pwd" placeholder="password">
        <input type="email" name="email"  placeholder="email">
        <button>Register</button>
    </form>

    <?php 
    check_signup_error();
    ?>
    
</body>
</html>