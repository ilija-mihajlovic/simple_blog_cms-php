<?php ob_start(); ?>
<?php session_start()?>
<?php include("db.php")?>
<?php include("functions.php")?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/style.css">
        <title>Blog</title>
        <style>
.header {
  overflow: hidden;
  padding: 0;
}

.header a {
  float: left;
  color: white;
  text-align: center;
  padding: 12px;
  text-decoration: none;
  line-height: 12px;
  border-radius: 4px;
  margin-top: 13px;
  font-size: 13px;
  
}

.header a.logo {
  font-size: 15px;
  padding-left: 0;
}


.header a.active {
  background-color: #4ECE3D;
  color: white;
}

.header-right {
  float: right;
}
#log{
    background-color: #4F4F4F;
    margin-left: 10px;
    color: white;
}

@media screen and (max-width: 685px) {
  .header a {
    float: none;
    display: block;
    text-align: left;
    color: black;
  }
  .header a.active{
    color: white; 
  }
  
  .header-right {
    float: none;
  }
  .header a.logo {
  color: white;
}
#log{
    margin: 5px 0 0 0;
}
.second{
    margin-top: 85px;
}
}
@media only screen and (max-width: 1000px) {
  .container{
      width: 70%;
  }
}
@media only screen and (max-width: 500px) {
  .container{
      width: 80%;
  }
}

</style>
</head>
    