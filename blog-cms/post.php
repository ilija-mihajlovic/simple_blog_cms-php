<?php ob_start(); ?>
<?php include("includes/header.php")?>
</head>
<body>
<style>
    ul{
        grid-template-columns: 20% 71% 9%;
    }
</style>
<nav>
    <div class="container">
        <div>
            <ul>
                <li><a href="<?php
                if(isset($_SESSION['username'])){
                    echo "admin.php";
                }else{
                    echo "includes/login.php";
                }?>">Blog Managment</a></li>
             
                <li>
                    <button id="btn" class="loginbtn" style="float: right;" onclick="backToBlog()">Return to blog</button>
                </li>
                <li><button id="btn" class="loginbtn" style="float: right;" onclick="<?php
                if(isset($_SESSION['username'])){
                    echo "logoutbtn();";
                }else{
                    echo "loginbtn();";
                }
                
                ?>">
                
                <?php
                if(isset($_SESSION['username'])){
                    echo "Logout";
                }else{
                    echo "Login";
                }
                ?>

            </button></li>

            </ul>
            
        </div>
    </div>
</nav>
<?php

if(isset($_GET["post_id"])){

    $post_id = $_GET["post_id"];

    $query = "SELECT * FROM posts WHERE ID = $post_id";
    $select_all_posts_query = mysqli_query($connection,$query);

    while($row = mysqli_fetch_assoc($select_all_posts_query)) {
        $post_id = $row['ID'];
        $post_title = $row['title'];
        // $post_author = $row['user'];
        $post_date = $row['date'];
        $post_image = $row['imageURL'];
        $post_content = substr($row['content'],0,400);
        // $post_status = $row['post_status'];
        

?>


<!---------User Input------------->
<div class="container second">
    <div class="posts">
        <h1><?php echo $post_title?></h1>
        <p><?php echo $post_date?></p>
        <hr>
        <div class="image"><img style="max-height: 38vh; width:100%;" src="images/<?php echo $post_image?>" alt="Image"></div>
        <hr>
        <div class="content"><?php echo $post_content?></div>
        <hr>
    </div>
</div>
<?php } } //} ?>
</body>

<script>
    function loginbtn(){
        document.location.href= "includes/login.php"
    }
    function logoutbtn(){
        document.location.href= "includes/logout.php"
    }
    function adminRedirect(){
        document.location.href= "admin.php"
    }
</script>

</html>