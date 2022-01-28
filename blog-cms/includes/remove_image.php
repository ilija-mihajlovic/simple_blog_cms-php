<?php
include("db.php");
include("functions.php");
if(isset($_GET['delete_image'])){
    $post_id = $_GET['delete_image'];
    $query = "UPDATE posts SET imageURL = 'default.jpg' WHERE ID = $post_id";
    $delete_image_query = mysqli_query($connection,$query);
    redirect("edit_post.php?post_id=$post_id");
}


?>