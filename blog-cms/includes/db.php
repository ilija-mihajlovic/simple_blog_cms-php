<?php

$db['db_host'] = "localhost";
$db['db_user'] = "id18363697_root";
$db['db_pass'] = "lHumb]y9D5Z)sELb";
$db['db_name'] = "id18363697_blog_db";

foreach($db as $key => $value){
define(strtoupper($key), $value);
}

$connection = mysqli_connect(DB_HOST, DB_USER,DB_PASS,DB_NAME);

// if($connection) {

// echo "We are connected";

// }

?>