<?php ob_start(); ?>
<?php include("includes/header.php")?>
</head>

<body>
    <?php

   
       ?>
    <style>
    ul {
        grid-template-columns: 1fr 1fr;
    }

    #btn {
        float: right;
    }
    </style>

    <nav>
        <div class="container">
            <div>
                <ul>
                    <li><a href="">Blog Managment</a></li>
                    <li><button id="btn" onclick="backToBlog()">Return to blog</button></li>
                </ul>
            </div>
        </div>
    </nav>

    <!---------User Input------------->
    <div class="container">
        <div class="wrapper">
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
                       redirect("admin.php");
                    }
                    else{
                        echo "Wrong username or password";
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