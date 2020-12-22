<?php
include("config/database.php");
$successful = "false";
session_start();
$error = "";
if(isset($_POST['login'])){
    $error = "none";
    $username = mysqli_real_escape_string($conn, $_POST['username']);
     $password = mysqli_real_escape_string($conn, $_POST['password']);
    if(empty($username) || empty($password)){
        sleep(1);
        $error = "! Username Or password is empty";
    }
    else{
        $sql = "SELECT * FROM users WHERE username = '$username'";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        if($resultCheck < 1){
            sleep(1);
          $error = "! User does not exist";
        }else{
            if($row = mysqli_fetch_assoc($result)){
                if(!($password == $row['password'])){
                    sleep(1);
                    $error = "! Password is incorrect";
                }else if($password == $row['password']){
                        $_SESSION['id'] = $row['id'];
                        $_SESSION['username'] = $row['username'];

                        $successful = "done";
                        $error = "none";
                        sleep(7);
                        if($row['type']=="admin"){
                            header("Location: modules/admin/");
                            exit(0);
                        }
                        if($row['type']=="teacher"){
                            header("Location: modules/teacher/");
                            exit(0);
                        }
                        if($row['type']=="student"){
                            header("Location: modules/student/");
                            exit(0);
                        }
                }
            }
        }
    }
}
if(isset($_SESSION['id'])){
    $username1 = $_SESSION['username'];
    $sql = "SELECT * FROM users WHERE username = '$username1'";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);
    if($row['type']=="admin"){
        header("Location: modules/admin/");
        exit(0);
    }
    if($row['type']=="teacher"){
        header("Location: modules/teacher/");
        exit(0);
    }
    if($row['type']=="student"){
        header("Location: modules/student/");
        exit(0);
    }

}else{
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>CIMS</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        .sidenav {
    height: 100%;
    width: 0;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: #ebf0fa;
    overflow-x: hidden;
    transition: 0.5s;
    padding-top: 60px;
}

.sidenav a {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 25px;
    color: black;
    display: block;
    transition: 0.3s;
}

.sidenav a:hover {
    color: #ebf0fa;
}

.sidenav .closebtn {
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 36px;
    margin-left: 50px;
}

@media screen and (max-height: 450px) {
    .sidenav {
        padding-top: 15px;
    }
    .sidenav a {
        font-size: 18px;
    }
}
body .login_fields input[type='text']{
color: white;
}
body{
    background-color:#84CCFC;}
    </style>
</head>

<body>
<div class="container">
    <div class="header">
        <span style="font-size:30px;cursor:pointer;color:black;" class="logo" onclick="openNav()">&#9776; CIMS </span>
    </div>
    <div id="mySidenav" class="sidenav" style="background: #2193b0;  /* fallback for old browsers */
background: -webkit-linear-gradient(to top, #6dd5ed, #2193b0);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to top, #6dd5ed, #2193b0); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="index.php" class="logo"><span style="color:#ebf0fa; font-size:70px;">CIMS</span></a>
        <a href="homepage.php">Home</a>
        <!-- <a href="register.php">Register</a> -->
    </div>
    <?php if ($successful == "false") {
        ?>
    <div class='login' style="background:white; border-radius:10px; border:2px solid white;">
        <div class='login_title'>
            <span style="color:#008ae6; font-size:20px;">Login to your account</span><br>
            <span style="color:red">
                <?php echo $error; ?></span>
        </div>
        <div class='login_fields'>
            <form action="index.php" method="post">
                <div class='login_fields__user'>
                    <div class='icon'>
                        <img src='images/user_icon_copy.png'>
                    </div>
                    <input placeholder='Username' type='text' name="username" style="background-color: #052b61; border:2px solid black; font-weight:bold; margin-left:-2px;">
                    <div class='validation'>
                        <img src='images/tick.png'>
                    </div>
                    </input>
                </div>
                <div class='login_fields__password' style="margin-top:10px;">
                    <div class='icon'>
                        <img src='images/lock_icon_copy.png'>
                    </div>
                    <input placeholder='Password' type='password' name="password" style="background-color:#052b61; border:2px solid black; font-weight:bold; margin-left:-2px;">
                    <div class='validation'>
                        <img src='images/tick.png'>
                    </div>
                </div>
                <div class='login_fields__submit'>
                    <input type='submit' value='Log In' name="login" style="background-color:#052b61;color:white;font-weight:bold;">
                    <div class='forgot'>
                        <a href='#' style='color:#008ae6; font-weight:bold;'>Forgotten password?</a>
                    </div>
                </div>
            </form>
        </div>
        <!-- <div class='disclaimer'>
            <a href="register.php">Don't have an account?</a>
        </div> -->
    </div>
</div>
    <script>
    function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
    }
    </script>
    <?php } ?>
</body>

</html>
<?php } ?>