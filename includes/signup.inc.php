<?php

if ($_SERVER["REQUEST_METHOD"] === "POST"){
    $username = $_POST["username"];
    $pwd = $_POST["pwd"];
    $email = $_POST["email"];
try{
    require_once "dbh.inc.php";
    require_once "signup_contr.inc.php";
    require_once "signup_model.inc.php";

    // ERROR HANDERS
    $errors = [];
    if ( is_input_empty($username, $pwd, $email)){
        $errors["empty_input"] = "Fill in all fields dude";
    }
    if(is_email_invalid($email)){
        $errors["invalid_email"] = "Invalid email used bruh";
    }
    if (is_username_taken( $pdo, $email)){
        $errors["username_taken"] = "Username is taken bro";
    }
    if(get_email($pdo, $email)){
        $errors["email_used"] = "Email already registered boss";
    }

    require_once "config_session.inc.php";

    if($errors){
        $_SESSION["errors_signup"] = $errors;
        header("Location: ../index.php");
        die();
    }

    set_user($pdo,$pwd,$username,$email);  
    header("Location: ../index.php?signup=success");
    die(); 

    //$pdo = null;
    //$stmt = null;

} catch (PDOException $e) {
    die("Query Failed bro !" . $e->getMessage());
}

}else{
    header("Location: ../index.php");
    die();
}