<?php ob_start(); ?>
<?php include("includes/header.php")?>

<style>
table {
    font-family: arial, sans-serif;
    width: 100%;
    border-collapse: collapse;

}

td,
th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 18px;

}

.border {
    border-radius: 20px;
}

thead tr :nth-child(1) {
    width: 70%;
    border-right: 0px;
}

thead tr :nth-child(2) {
    border-left: 0px;
    border-right: 0px;
}

thead tr :nth-child(3) {
    width: 15%;
    padding-right: 22px;
    border-left: 0px;
}

tbody tr :nth-child(1) {
    border-right: 0px;
}

tbody tr :nth-child(2) {
    border-right: 0px;
    border-left: 0px;
}

tbody tr :nth-child(3) {
    border-left: 0px;
}

.actions img {
    margin-right: 10px;
}

tfoot tr {
    height: 1px;
}

ul {
    grid-template-columns: 60% 31% 9%;
}

.button2 {
    margin: 0;
}

h2 {
    margin: 20px 0 20px 0;
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


<body>
    <?php


    if(isset($_POST['logout'])){
        redirect("./includes/logout.php");
    }
    if(isset($_POST['new_post'])){
        if(isset($_SESSION['username'])){
            redirect("admin.php");
        }else{
            redirect("login.php");
        }
    }
?>


    <nav>
    <div class="container">
            <div class="header">
                <a href="<?php
                            if (isset($_SESSION['username'])) {
                                echo "admin.php";
                            } else {
                                echo "login.php";
                            } ?>" class="logo">Blog Management</a>
                <div class="header-right">
                    <a class="active" href="
                    <?php if (isset($_SESSION['username'])) : ?>
                        includes/add_post.php
                    <?php else: ?>
                        includes/login.php
                    <?php endif; ?>
                    "><img src="images/Icon.png" alt="" id="icon"> New Blog Post</a>
                    <?php if (isset($_SESSION['username'])) : ?>
                        <a href="includes/logout.php" id="log">Logout</a>
                    <?php else : ?>
                        <a href="includes/login.php" id="log">Login</a>
                    <?php endif; ?>

                </div>
            </div>
        </div>
        <!-- <div class="container">
            <div>
                <ul style="
        <?php
            if(!isset($_SESSION['username'])){
                echo "grid-template-columns: 1fr 1fr;";
            }else{
                echo "";
            }
        ?>
        ">

                    <li><a href="index.php">Blog Managment</a></li>

                    <li><a href="includes/add_post.php"><button name="add_post" id="btn" class="button2"
                                style="background-color: #4ECE3D; text-align:right;"><img src="images/Icon.png" alt=""
                                    id="icon"> New Blog Post</button></a></li>
                                    
                    <?php if (isset($_SESSION['username'])): ?>
                    <li>
                        <form action="" method="post"><button type="submit" method name="logout" id="btn"
                                class="loginbtn" style="float: right;">Logout</button></form>
                    </li>
                    <?php endif; ?>


                </ul>
            </div>
        </div> -->
    </nav>

    <!---------User Input------------->
    <div class="container second">
        <div class="posts">
        <p id="msg" style="margin-top:0px; color:black; text-align:center; background-color:lightgreen;"></p>
            <h2>Blog posts list</h2>
            <table>
                <thead>
                    <tr>
                        <th>Title</th>
                        <th style="padding: 0 0 0 5px;">Date</th>
                        <th style="text-align: right; ">Actions</th>
                    </tr>
                </thead>
                <tbody>


                    <?php
    $query = "SELECT * FROM posts ORDER BY ID DESC";
    $select_all_posts_query = mysqli_query($connection,$query);

    while($row = mysqli_fetch_assoc($select_all_posts_query)) {
        
        $post_id = $row['ID'];
        $post_title = $row['title'];
        $post_date = $row['date'];
        $post_image = $row['imageURL'];
        $post_content = substr($row['content'],0,400);

?>
                    <tr>
                        <td><?php echo $post_title;?></td>
                        <td style="padding: 0 0 0 5px;"><?php echo $post_date;?></td>
                        <td class="actions" style="text-align: right; padding:0 5px 0 5px;">
                            <a href="post.php?post_id=<?php echo $post_id;?>"><img src="images/Globe.png" alt=""></a>
                            <a href="includes/edit_post.php?post_id=<?php echo $post_id;?>"><img
                                    src="images/edit_blue.png" alt=""></a>
                            <!-- <a href="includes/delete.php?delete=<?php echo $post_id;?>"><img src="images/Delete.png" alt="" style="margin-right: 5px;"></a> -->
                            <a onclick="delete_post(<?php echo $post_id;?>)"><img style="cursor:pointer;" src="images/Delete.png" alt=""></a>
                        </td>
                    </tr>
                    <?php }  //} ?>
                </tbody>
            </table>
        </div>
    </div>

</body>

<script>
function delete_post(post_id) {
    if (confirm("Are you sure you want to delete this post?")) {
        window.location.href = 'includes/delete.php?delete=' + post_id + '';
        return true
        
    }
}

</script>

</html>