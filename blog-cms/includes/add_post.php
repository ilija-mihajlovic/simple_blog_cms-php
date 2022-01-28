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
    <link rel="stylesheet" href="../css/style.css">
    <title>Blog</title>
</head>
<style>
.edit {
    display: grid;
    grid-template-columns: 75% 25%;
    grid-row-gap: 2%;
}

input[type=text] {
    width: 95%;
}

input[type=date] {
    width: 100%;
}

input[type="file"] {
    display: none;
}
.custom-file-upload {
    cursor: pointer;
    color: #2D9CDB;
}
ul{
    grid-template-columns: 1fr 1fr;
}
</style>
<?php

                if(!isset($_SESSION['username'])){
                    redirect("../login.php");
                }
            ?>
<nav>
    <div class="container">
        <div>
            <ul style="
            <?php

if(isset($_POST['logout'])){
    redirect("logout.php");
}

                if(!isset($_SESSION['username'])){
                    echo "grid-template-columns: 1fr 1fr;";
                }else{
                    echo "";
                }
            ?>
            ">

                <li><a href="<?php
                if(isset($_SESSION['username'])){
                    echo "../admin.php";
                }else{
                    echo "../login.php";
                }?>">Blog Managment</a></li>
                <?php if (isset($_SESSION['username'])): ?>
                <li>
                    <form action="" method="post"><button type="submit" method name="logout" id="btn" class="loginbtn"
                            style="float: right;">Logout</button></form>
                </li>
                <?php endif; ?>


            </ul>
        </div>
    </div>
</nav>

<?php

    if(isset($_POST['create_post'])){

        // if(empty($_POST['title']) && empty($_POST['date'])  && empty($_POST['content'])){
            
        // }

    $img_name = $_FILES['image']['name'];
    $img_size = $_FILES['image']['size'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $error = $_FILES['image']['error'];
    $post_title = $_POST['title'];
    $post_date = $_POST['date'];
    $post_content = $_POST['content'];

    if($error === 0) {
                if ($img_size > 1250000) {
                    $em = "Sorry, your file is too large.";
                    header("Location: edit_post.php?error=$em");
                }else {
                    $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                    $img_ex_lc = strtolower($img_ex);
        
                    $allowed_exs = array("jpg", "jpeg", "png"); 
        
                    if (in_array($img_ex_lc, $allowed_exs)) {
                        $new_img_name = 'post'.'uniqid()'.'.'.$img_ex_lc;
                        $img_upload_path = '../images/'.$new_img_name;
                        move_uploaded_file($tmp_name, $img_upload_path);
                        
                    }else {
                        $em = "You can't upload files of this type";
                        header("Location: edit_post.php?error=$em");
                    }
                    
                }
            }else {
                $new_img_name = 'default.jpg';
            }
        

        $sql = "INSERT INTO posts(imageURL, title, date, content) VALUES('$new_img_name', '{$post_title}', '{$post_date}', '{$post_content}')";
        mysqli_query($connection, $sql);
        echo '<p style="margin-top:0px; color:black; text-align:center; background-color:lightgreen;">Post Added, <a style="color:blue;" href="../admin.php">View All Posts</a></p>';
    }
    
?>


<!---------User Input------------->
<div class="container second">
    <div class="posts">
        <h1>Add New Post</h1>
        <form action="" class="edit" method="POST" enctype="multipart/form-data">
            <div>
                <label for="title">Title</label><br>
                <input name="title" type="text" value="" required>
            </div>
            <div>
                <label for="date">Date</label><br>
                <input name="date" type="date" value="" required>
            </div>
            <div>
                <label for="content">Content</label><br>
                <textarea name="content" id="" style="width: 95%;" rows="22" required></textarea>
            </div>
            <div>
                <label for="image">Featured Image</label><br>
                <image id="profileDisplay" onerror="this.src='../images/default.jpg'" style="width: 100%; max-height:250px;" src="" alt="image">
                    <div style="display: grid; grid-template-columns:50% 50%;">
                        <label class="custom-file-upload">
                            <input type="file" name="image" onChange="displayImage(this)" />
                            Select Image
                        </label>
                        <a  onclick="removeImage()" style="color: red; text-align:right; cursor:pointer;">Remove
                        Image</a>
                    </div>
            </div>
            <div></div>
            <div>
                <button id="btn" style="width:35%;">Cancel</button>
                <button value="Publish Post" name="create_post" type="submit" id="btn"
                    style="float: right; width:53%; background-color:#4ECE3D;">
                    <img src="../images/Icon.png" alt="">
                    Publish Post
                </button>

            </div>
        </form>

    </div>
</div>
<?php // }  //} ?>
</body>

<script>
function logoutbtn() {
    document.location.href = "includes/logout.php"
}

function removeImage(){
    document.getElementById("profileDisplay").src = "../images/default.jpg";
}

function triggerClick(e) {
  document.querySelector('#profileImage').click();
}
function displayImage(e) {
  if (e.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e){
      document.querySelector('#profileDisplay').setAttribute('src', e.target.result);
    }
    reader.readAsDataURL(e.files[0]);
  }
}


</script>

</html>