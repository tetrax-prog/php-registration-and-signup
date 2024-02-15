<?php

if ($_SERVER["REQUEST_METHOD"] === "POST"){
    $username = $_POST["username"];
    $pwd = $_POST["pwd"];

    try{
        require_once "dbh.inc.php";
        require_once "login_model.inc.php";
        require_once "login_contr.inc.php";

        // errors handlers
        $errors = [];
    if (is_input_empty($username, $pwd)){
        $errors["empty_input"] = "Fill in all fields dude";
    }
    $result = get_user($pdo, $username);

    if(is_username_wrong($result)){
        $errors["Login_incorrect"] = "incorrect login information";
    }
    if(is_username_wrong($result) && is_password_wrong($pwd, $result["pwd"])){
        $errors["Login_incorrect"] = "incorrect login information";
    }
    require_once "config_session.inc.php";

    if($errors){
        $_SESSION["errors_login"] = $errors;
        header("Location: ../index.php");
        die();
    }
    $newSessionid = session_create_id();
    $sessionid = $newSessionid . "_" . $result;
    session_id($sessionid);

    $_SESSION["user_id"] = $result["id"];
    $_SESSION["user_username"] = htmlspecialchars($result["username"]);

    $_SESSION["last_regeneration"] = time();

    header("Location: ../index.php?login=success");
    $pdo = null;
    die();
    } catch (PDOException $e) {
    die("Query Failed bro !" . $e->getMessage());
}

}else{
    header("Location: ../index.php");
    die();    
}