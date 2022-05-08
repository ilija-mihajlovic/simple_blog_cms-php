<?php include("header.php")?>
<link rel="stylesheet" href="../css/style.css">

</head>

<body>

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
                    <a href="../index.php" id="log"><img src="images/Icon.png" alt="" id="icon">Return to blog</a> 
                </div>
            </div>
        </div>
        <!-- <div class="container">
            <div>
                <ul>
                    <li><a href="">Blog Managment</a></li>
                    <li><button id="btn" onclick="backToBlog()">Return to blog</button></li>
                </ul>
            </div>
        </div> -->
    </nav>
    <style>
        @media only screen and (max-width: 700px) {
  .container{
      width: 70%;
  }
}
    </style>

    <!---------User Input------------->
    <div class="container">
    <div style="width: 200px; height:100px; color:grey; background:lightgrey; margin:40px auto 0 auto;">
                <p style="padding-top: 15px;">Username: admin</p>
                <p style="margin: 0;">Password: admin</p>
            </div>
        <div class="wrapper" style="margin-top: 0;">
            <form action="login.php" method="post">
                <span style="
                color: red; 
                display:inline-block;
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
                max-width: 26ch;"><?php
                if(isset($_POST["submit"])){

                    $username = $_POST['username'];
                    $password = $_POST['password'];
            
                    $_SESSION['username'] = $username;
                    $_SESSION['password'] = $password;
            
                    $query = "SELECT * FROM users";
                    $select_all_users = mysqli_query($connection,$query);
            
                    while($row = mysqli_fetch_array($select_all_users)){
                    $db_username = $row['username'];
                    $db_password = $row['password'];
                    if($username == $db_username && $password == $db_password){
                       redirect("../admin.php");
                    }
                    else{
                        echo "Wrong username or password";
                        $_SESSION['username'] = Null;
                        $_SESSION['password'] = Null;
                    }
                }
            }
                
                
                ?></span><br>
                <label for="">Username</label><br>
                <input type="text" placeholder="Enter username" name="username" id="name"><br>
                <label for="" class="password">Password</label><br>
                <input type="password" placeholder="Enter password" name="password" id="password"><br>
                <input type="submit" name="submit" value="Proceed to login">



            </form>
        </div>
    </div>
</body>

<script>
function backToBlog() {
    document.location.href = "index.php"
}
</script>



</html>