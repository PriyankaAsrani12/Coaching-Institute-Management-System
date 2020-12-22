<?php
include("config/database.php");
$successful = "false";
session_start();
$error = "";
$type="student";

if(isset($_POST)){

$firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
$lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
$phonenumber = mysqli_real_escape_string($conn, $_POST['phonenumber']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password1 = mysqli_real_escape_string($conn, $_POST['psw']);
$password2 = mysqli_real_escape_string($conn, $_POST['psw-repeat']);
$address = mysqli_real_escape_string($conn, $_POST['address']);
$course = mysqli_real_escape_string($conn, $_POST['course']);
$username = mysqli_real_escape_string($conn, $_POST['username']);


$sql = "INSERT INTO register(firstname,lastname,mobileNo,email,password1,password2,address,course,username) VALUES('$firstname','$lastname','$phonenumber','$email','$password1','$password2','$address','$course','$username')";
$result = mysqli_query($conn, $sql);


$loginsql="SELECT username FROM users";
$loginsqlresult=mysqli_query($conn,$loginsql);
while ($row = $loginsqlresult->fetch_assoc()) {
  if($row['username']===$username){
    echo "User already exists";
  break;
  }else{
    $insertsql="INSERT INTO users(username,password,type) VALUES('$username','$password1','$type')";
    $insertsqlresult=mysqli_query($conn,$insertsql);
  break;
  }
}
}


?>
<!DOCTYPE html5>
<html>

<head>
    <title>Registration Page</title>
    <link rel="stylesheet" href="register_style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@600&display=swap" rel="stylesheet">
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
body{
    background-image:url(https://i.pinimg.com/originals/3e/a2/ba/3ea2baa796599a53fef2133788f78c2d.jpg);
}

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
            <a href="index.php">Login</a>
        </div>
        <div class='fform' style="background-color: white; padding-right:1px;padding-left: 1px;padding-bottom: 1px;padding-top: 1px;">
            <h1 style="text-align: center; color:#008ae6;">Register</h1>
            <hr>
            <form method="POST" action="register.php">
                <div class="name_details" style="padding-bottom:0px;">
                    <label for="firstname" class="firstname" style="color:#008ae6;"><b>First Name:</b></label>
                    <input type="text" placeholder="Enter First Name" name="firstname" id="firstname" required>
                    <br>
                    <label for="lastname" class="lastname" style="color:#008ae6;"><b>Last Name:</b></label>
                    <input type="text" placeholder="Enter Last Name" name="lastname" id="lastname" required>
                </div>
                <div class="phone" style="padding-bottom:10px;">
                    <label for="phonenumber" style="color:#008ae6;"><b>Mobile No:&nbsp</b></label>
                    <input type="text" placeholder="Enter Phone Number" size="10" name="phonenumber" id="phonenumber" required>
                    <br>
                    <label for="email" class="email" style="color:#008ae6;"><b>Email Id: &nbsp&nbsp&nbsp</b></label>
                    <input type="email" placeholder="Enter Email" name="email" id="email" required>
                </div>
                <div class="password" style="padding-bottom:10px;">
                    <label for=" psw" style="color:#008ae6;"><b>Password:&nbsp</b></label>
                    <input type="password" placeholder="Enter Password" name="psw" id="psw" required>
                    <br>
                    <label for="psw-repeat" class="psw-repeat" style="color:#008ae6;"><b>Re-Password:</b></label>
                    <input type="password" placeholder="Repeat Password" name="psw-repeat" id="psw-repeat" required>
                </div>
                <div class="address">
                    <label for="address" style="color:#008ae6;"><b>Address :&nbsp&nbsp&nbsp&nbsp </b></label>
                    <input type="text" placeholder="Enter Address" name="address" id="address" required>
                </div>
                <div class="courses" style="padding-bottom:10px;">
                    <label style="color:#008ae6;"><b>Choose Courses : </b></label>
                    <input type="text" placeholder="Course" name="course" id="course" required>
                </div>
                <div class="courses" style="padding-bottom:10px;">
                    <label style="color:#008ae6;"><b>Enter Username : </b></label>
                    <input type="text" placeholder="Username" name="username" id="username" required>
                </div>
                <hr>
                <div style="margin-top:5%;padding-bottom:2%">
                    <a href="index.php" type="submit" class="registerbtn" style="margin-left:43%;">Submit</a>
                    <!-- <input type="submit" class="registerbtn" value="Proceed to Pay" style="margin-left:45%"> -->
                </div>
            </form>
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
</body>

</html>
<style>
* {
    font-family: 'Arial', sans-serif;
}

/* nav bar styling*/
nav {
    background-color: white;
    height: 50px;
}

.links {
    color: black;
    font-size: 20px;
    text-decoration: none;
}

.links:hover {
    text-decoration: none;
    color: #5dbcd2;
}

/* dropdown styling*/
.dropdown {
    font-size: 20px;
    position: relative;
    display: inline-block;
}

.dropbtn {
    color: black;
    font-size: 20px;
    font-weight: bold;
}

.dropbtn:hover {
    color: #5dbcd2;
}


.dropdown:hover {
    color: #5dbcd2;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f1f1f1;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
    z-index: 1;
    font-weight: bold;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown-content a:hover {
    color: #5dbcd2;
}

.dropdown:hover .dropdown-content {
    display: block;
}


/* form styling*/

.fform {
    border-radius: 5px;
    background-image: url('register.jpg');
    padding: 10px;
    width: 70%;
    margin: 10px 10px 10px 200px;

}

.name_details {
    padding-left: 50px;
    font-size: 20px;


}

#firstname,
#lastname,
#psw,
#email,
#psw-repeat {
    width: 25%;
    padding: 7px;
    margin: 10px 0 10px 0;
    display: inline-block;
    border: none;
    background: #5a80f;

}



.phone {
    padding-left: 50px;
    font-size: 20px;
}

#phonenumber {
    width: 25%;
    padding: 7px;
    margin: 10px 0 20px 0;
    display: inline-block;
    border: none;
    background: #5a80f;
}

.address {
    padding-left: 50px;
    font-size: 20px;
}

#address {
    width: 70%;
    padding: 7px;
    margin: 10px 0 20px 0;
    display: inline-block;
    border: none;
    background: #5a80f;
}

.password {
    padding-left: 50px;
    font-size: 20px;


}


.courses {
    font-size: 20px;
    padding-left: 50px;
    display: inline-block;
}

.subjects {
    padding-left: 250px;
    font-size: 20px;
}

#subjects {
    width: 20%;
    padding: 7px;
    margin: 10px 0 20px 0;
    display: inline-block;
    border: none;
    background: #f1f1f1;
}

.payment {
    font-size: 20px;
    color: #5a80f;
    padding-left: 250px;

}

.container_signin {
    margin-left: 40%;
    font-size: 20px;
    color: #0080ff;
}

.registerbtn {
    background-color: white;
    color: black;
    border: 2px solid #008CBA;
    padding: 16px 32px;
    margin: 4px 2px;
    transition-duration: 0.4s;
    cursor: pointer;
    position: center;
    font-size: 16px;
}

.registerbtn:hover {
    background-color: #0073e6;
    color: white;
}


.image-preview {
    width: 300px;
    min-height: 100px;
    border: 2px solid #dddddd;
    margin-top: 15px;
    display: flex;
    color: #cccccc;
}
</style>