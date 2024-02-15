<?php
ini_set("session.use_only_cookies",1);
ini_set("session.use_strict_mode",1);

session_set_cookie_params([
    'lifetime' => 1800,
    'domain' => 'localhost',
    'path'=> '/',
    'secure'=> 'true',
    'httponly'=> 'only',
]);
session_start();
// creates session in php

if(isset($_SESSION['user_id'])){
    if(!isset($_SESSION['last_regeneration'])){
        regenerate_session_id();
    }else{
        $interval = 60 * 30;
        if(time() - $_SESSION['last_regeneration'] >= $interval){
        regenerate_session_id();
        }
    }
    }else{
        if(!isset($_SESSION['last_regeneration'])){
            regenerate_session_id_loggedin();
        }else{
            $interval = 60 * 30;
            if(time() - $_SESSION['last_regeneration'] >= $interval){
            regenerate_session_id_loggedin();
            }
        }
    }
function regenerate_session_id_loggedin(){
        session_regenerate_id();

    $user_id = $_SESSION["user_id"];
    $newSessionid = session_create_id();
    $sessionid = $newSessionid . "_" . $user_id;
    session_id($sessionid);
        $_SESSION["last_regeneration"] = time();
    }
function regenerate_session_id(){
    session_regenerate_id();
    $_SESSION["last_regeneration"] = time();
}