<?php ob_start(); ?>
<?php session_start()?>
<?php include("db.php")?>
<?php include("functions.php")?>
<?php //include("upload.php")?>
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
  margin: 0;
  padding-top: 25px;
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

.edit {
    display: grid;
    grid-template-columns: 75% 180px;
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
    grid-template-columns: 60% 31% 9%;
}
@media only screen and (max-width: 1000px) {
        .container {
            width: 70%;
        }
    }

    @media only screen and (max-width: 600px) {
        .edit {
            grid-template-columns: 1fr;
        }

        input[type=text] {
            width: 100%;
        }

        #txtarea {
            width: 100%;
        }
    }

    @media only screen and (max-width: 500px) {
        .container {
            width: 80%;
        }
    }
</style>

<nav>
<div class="container">
            <div class="header">
                <a href="<?php
                            if (isset($_SESSION['username'])) {
                                echo "../admin.php";
                            } else {
                                echo "login.php";
                            } ?>" class="logo">Blog Management</a>
                <div class="header-right">
                    <a class="active" href="
                    <?php if (isset($_SESSION['username'])) : ?>
                        add_post.php
                    <?php else: ?>
                        login.php
                    <?php endif; ?>
                    "><img src="images/Icon.png" alt="" id="icon"> New Blog Post</a>
                    <?php if (isset($_SESSION['username'])) : ?>
                        <a href="logout.php" id="log">Logout</a>
                    <?php else : ?>
                        <a href="login.php" id="log">Login</a>
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

                <li><a href="<?php
                if(isset($_SESSION['username'])){
                    echo "../admin.php";
                }else{
                    echo "../login.php";
                }?>">Blog Managment</a></li>
                <li>
                    <form action="" method="POST"><button name="new_post" id="btn" class="button2"
                            style="background-color: #4ECE3D;"><img src="images/Icon.png" alt="" id="icon"> New Blog
                            Post</button></form>
                </li>
                <?php if (isset($_SESSION['username'])): ?>
                <li>
                    <form action="" method="post"><button type="submit" method name="logout" id="btn" class="loginbtn"
                            style="float: right;">Logout</button></form>
                </li>
                <?php endif; ?>


            </ul>
        </div>
    </div> -->
</nav>
<!-- <p style="height:30px; margin:auto; background-color:lightgreen;" id="paragraf"></p> -->
<?php

// if(!isset($_GET['post_id'])){
//     redirect("add_post.php");
// }

if(isset($_GET['post_id'])){
    $the_post_id =  $_GET['post_id'];
    $_SESSION['id'] = $the_post_id;
}

$query = "SELECT * FROM posts WHERE ID = $the_post_id";
$select_posts_by_id = mysqli_query($connection,$query);  

while($row = mysqli_fetch_assoc($select_posts_by_id)) {

    $post_title         = $row['title'];
    $img_name           = $row['imageURL'];
    $post_content       = $row['content'];
    $post_date          = $row['date'];

}

$new_img_name = $img_name;

if(isset($_POST['update_post'])) {

    $post_title = $_POST['title'];
    $post_date = $_POST['date'];
    $post_content = $_POST['content'];

    if(isset($_FILES['image'])){

    $img_name = $_FILES['image']['name'];
    $img_size = $_FILES['image']['size'];
    $tmp_name = $_FILES['image']['tmp_name'];  
    $error = $_FILES['image']['error'];  

	if ($error === 0) {
		if ($img_size > 525000) {
			$em = "Sorry, your file is too large.";
		    header("Location: edit_post.php?error=$em");
		}else {
			$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
			$img_ex_lc = strtolower($img_ex);

			$allowed_exs = array("jpg", "jpeg", "png"); 

			if (in_array($img_ex_lc, $allowed_exs)) {
				$new_img_name = 'post'.$_SESSION['id'].'.'.$img_ex_lc;
				$img_upload_path = '../images/'.$new_img_name;
				move_uploaded_file($tmp_name, $img_upload_path);
                $id = $_SESSION['id'];
			}else {
				$em = "You can't upload files of this type";
		        header("Location: edit_post.php?error=$em");
			}
		}
	}else {
		$em = "Unknown error occurred!";
		header("Location: edit_post.php?error=$em");
	}
}else {
    $img_name = "default.jpg";
}
    $sql = "UPDATE posts SET imageURL = '$new_img_name', title = '{$post_title}', date = '{$post_date}', content = '{$post_content}'   WHERE ID = $the_post_id";
	mysqli_query($connection, $sql);
    redirect("edit_post.php?post_id=$the_post_id");
        }
        
        if(isset($_POST['logout'])){
            redirect("logout.php");
        }
        if(isset($_POST['new_post'])){
            if(isset($_SESSION['username'])){
                redirect("add_post.php");
            }else{
                redirect("login.php");
            }
        }
        

    ?>

<!---------User Input------------->
<div class="container second">
    <div class="posts">
        <h1>Edit Post</h1>
        <form action="" class="edit" method="POST" enctype="multipart/form-data">
            <div>
                <label for="title">Title</label><br>
                <input name="title" type="text" value="<?php echo $post_title;?>">
            </div>
            <div>
                <label for="date">Date</label><br>
                <input name="date" type="date" value="<?php echo $post_date;?>">
            </div>
            <div>
                <label for="content">Content</label><br>
                <textarea name="content" id="" style="width: 95%;" rows="22"><?php echo $post_content;?></textarea>
            </div>
            <div>
                <label for="image">Featured Image</label><br>
                    <img id="profileDisplay" style='width: 100%; max-height: 250px;'
                        src="../images/<?php echo $new_img_name;?>">
                <div style="display: grid; grid-template-columns:50% 50%;">
                    <label class="custom-file-upload">
                        <input type="file" name="image" onChange="displayImage(this)" />
                        Select Image
                    </label>
                    <a href="remove_image.php?delete_image=<?php echo $the_post_id;?>" style="color: red; text-align:right;">Remove
                        Image</a>
                </div>
            </div>
            <div></div>
            <div>
            <button id="btn" style="width:70px; padding:0;">Cancel</button>
                <button value="Update Post" name="update_post" type="submit" id="btn" style="float: right; width:105px; padding:0; background-color:#4ECE3D;">
                    <img src="../images/Icon.png" alt="">
                    Update Post
                </button>

            </div>
        </form>

    </div>
</div>
<?php // }  //} ?>
</body>

<script>

function logoutbtn() {
    document.location.href = "logout.php"
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