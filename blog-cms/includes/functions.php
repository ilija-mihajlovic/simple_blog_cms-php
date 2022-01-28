<?php

function redirect($location){

    header("Location:" . $location);
    exit;

}

function isLoggedIn(){

    if(isset($_SESSION['username'])){
        return true;
    }
   return false;

}

function escape($string) {

global $connection;
return mysqli_real_escape_string($connection, trim($string));

}
