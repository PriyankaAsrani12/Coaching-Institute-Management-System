<?php
session_start();
if(isset($_SESSION['id']) && isset($_SESSION['username'])){
    include("../../config/database.php");
    $id = $_SESSION['id'];
    $sid = $_SESSION['username'];
    $sql = "SELECT * FROM students WHERE sid = '$sid'";
    $result = mysqli_query($conn, $sql);
    $resultcheck = mysqli_num_rows($result);
    if($row = mysqli_fetch_assoc($result)){
        $fname= ucfirst($row['fname']);
        $lname = ucfirst($row['lname']);
        $center = $row['center'];
        $course = $row['course'];
        $batch = $row['batch'];
    }
    $ydate =date('Y-m-d');
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Change Password-Students-CIMS</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <style>
            input,button,select{
                padding: 5px;
                border: 2px solid blue;
                border-radius: 10px;
                margin: 2px;
            }
            input[type=submit],button{
                width: 200px;
                background-color:#5bc0de;
                color: white;
            }
            input:hover{
                background-color: lightblue;
            }
            input[type=submit]:hover{
                background-color: #0275d8;
                color: white;
            }
            body{
    background-image:url(https://i.pinimg.com/originals/3e/a2/ba/3ea2baa796599a53fef2133788f78c2d.jpg);
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
    hr{
        display: block; 
        height: 1px;
    border: 0; 
    border-top: 1px solid #ccc;
    margin: 1em 0; 
    padding: 0;
    }

        </style>
    </head>
    <body>
    <div class="header" style="background-color:white;">
        <span style="font-size:30px;cursor:pointer" class="logo" onclick="openNav()">&#9776; CIMS </span>
        <div class="header-right">
        <a href="profile.php">
            <?php echo strtoupper($fname). " " .strtoupper($lname). " (" . strtoupper($sid) . ")" ?></a>
        </div>
    </div>
    <div id="mySidenav" class="sidenav" style="background: #2193b0;  /* fallback for old browsers */
background: -webkit-linear-gradient(to top, #6dd5ed, #2193b0);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to top, #6dd5ed, #2193b0); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="index.php" class="logo"><span style="color:#ebf0fa; font-size:70px;">CIMS</span></a>
        <a href="profile.php">
            <?php echo $fname . " " . $lname . " (" . strtoupper($sid) . ")" ?></a>
        <a href="index.php">Home</a>
        <a href="attendance.php">Attendance</a>
        <a href="timetable.php">TimeTable</a>
        <a href="password_update.php">Update Password</a>
        <a href="../../logout.php">Logout</a>
    </div>
<div style="background-color:white;margin: auto;width: 50%; border-radius: 5px;padding: 10px; margin-top:20px;">
    <h4 style="text-align:center">Update Password -<span style="color: blue;"> <?php echo $sid?></span></h4>
    <hr>
    <form  method="post">
        <b style="padding-left:85px;padding-right:20px;">Old Password: </b><input type="password" name="oldpassword" placeholder="Enter Old Password" style="padding-left:20px; margin-left:51px;" required><br>
        <b style="padding-left:85px;padding-right:20px;">New Password: </b><input type="password" name="newpassword_one" placeholder="Enter New Password" style="padding-left:20px; margin-left:44px;" required><br>
        <b style="padding-left:85px;padding-right:20px;">New Password Again: </b><input type="password" name="newpassword_again" placeholder="Enter New Password Again" style="padding-left:20px;" required><br>
        <input type="submit" name="changepassword" value="Change Password" style="margin-left:250px; margin-top:10px;">
    </form>
</div>

    <?php
        if(isset($_POST['changepassword'])){
            $get_old_password=$_POST['oldpassword'];
            $get_new_password=$_POST['newpassword_one'];
            $get_new_password_again=$_POST['newpassword_again'];

            $searvh_pass = "SELECT * FROM users WHERE username='$sid' AND password='$get_old_password'";
            $searvh_pass_get = mysqli_query($conn,$searvh_pass);
            $searvh_pass_check = mysqli_num_rows($searvh_pass_get);
            if($searvh_pass_check > 0){
                if($get_new_password===$get_new_password_again){
                    $update_users = "UPDATE users SET password='$get_new_password' WHERE username='$sid' AND type='student'";
                    $update_users_q = mysqli_query($conn,$update_users);
                    if($update_users_q){
                        echo '<script>alert("Password Update Success")</script>';
                    }else{
                        echo '<script>alert("SomeThing Went Wrong. Try Again after some time")</script>';
                    }
                }else{
                    echo '<p align="center" style="color: red">*password and confirm password does not match</p>';
                }
            }else{
                echo '<p align="center" style="color: red">*old password is wrong</p>';
            }
        }
    ?>
    <script>
        function openNav() {
            document.getElementById("mySidenav").style.width = "250px";
        }

        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
        }
    </script>
    <style>
        input[type=date]{
            width: 15%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-top: 6px;
            margin-bottom: 16px;
            resize: vertical;
        }

        input[type=submit] {
            background-color:#5bc0de;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
        }

        input[type=submit]:hover {
            background-color: #0275d8;
        }

    </style>
    </body>
    </html>
    <?php
}else{
    header("Location: ../../index.php");
}
?>