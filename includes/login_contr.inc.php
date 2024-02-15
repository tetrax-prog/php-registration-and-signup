<?php 
// declare(strict_types=0);

// checks if input is empty
function is_input_empty(string $username,string $pwd){
    if (empty($username) || empty($pwd)){
        return true;
    }else{
        return false;
    }
 }
// checks if username is wrong
 function is_username_wrong(array|bool $result){
   if(!$result) {
    return true;
   }else{
    return false;   
   }
}

// checks if password is wrong
function is_password_wrong(string $pwd, string $hashedPwd){
    if(!password_verify($pwd,$hashedPwd)) {
     return true;
    }else{
     return false;   
    }
 }