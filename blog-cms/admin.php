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
    margin-right: 20px;
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
        </div>
    </nav>

    <?php

// $per_page = 10;

// if(isset($_GET['page'])) {

// $page = $_GET['page'];

// } else {
//     $page = "";
// }

// if($page == "" || $page == 1) {
//     $page_1 = 0;
// } else {
//     $page_1 = ($page * $per_page) - $per_page;
// }

// if(isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'admin' ) {

//     $post_query_count = "SELECT * FROM posts";

// } else {

// $post_query_count = "SELECT * FROM posts WHERE post_status = 'published'";

// }   

// $find_count = mysqli_query($connection,$post_query_count);
// $count = mysqli_num_rows($find_count);

// if($count < 1) {

// echo "<h1 class='text-center'>No posts available</h1>";

// } else {

//     $count  = ceil($count /$per_page);

   ?>
    <?php 

?>
    <!---------User Input------------->
    <div class="container second">
        <div class="posts">
        <p id="msg" style="margin-top:0px; color:black; text-align:center; background-color:lightgreen;"></p>
            <h2>Blog posts list</h2>
            <table>
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Date</th>
                        <th style="text-align: right; ">Actions</th>
                    </tr>
                </thead>
                <tbody>


                    <?php
    $query = "SELECT * FROM posts";
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
                        <td><?php echo $post_date;?></td>
                        <td class="actions" style="text-align: right;">
                            <a href="post.php?post_id=<?php echo $post_id;?>"><img src="images/Globe.png" alt=""></a>
                            <a href="includes/edit_post.php?post_id=<?php echo $post_id;?>"><img
                                    src="images/edit_blue.png" alt=""></a>
                            <!-- <a href="includes/delete.php?delete=<?php echo $post_id;?>"><img src="images/Delete.png" alt="" style="margin-right: 5px;"></a> -->
                            <a onclick="delete_post(<?php echo $post_id;?>)"><img src="images/Delete.png" alt=""
                                    style="margin-right: 5px;"></a>
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

function logoutbtn() {
    document.location.href = "includes/logout.php"
}
</script>

</html>