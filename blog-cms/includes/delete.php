<?php ob_start(); ?>
<?php session_start(); ?>
<?php include("db.php"); ?>
<?php include("functions.php"); ?>
<?php 

if (isset($_GET['delete'])){
$delete_post_id = $_GET['delete'];
$query = "DELETE FROM posts WHERE ID = $delete_post_id";
$delete_query = mysqli_query($connection, $query);
redirect("../admin.php");
}

?>