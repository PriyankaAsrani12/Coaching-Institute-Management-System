<?php

session_start();
include ("../../config/database.php");
if(isset($_SESSION['id']) && isset($_SESSION['username'])){
$id = $_SESSION['id'];
$sid = $_SESSION['username'];
$sql_profile = "SELECT * FROM students WHERE sid = '$sid'";
$sql_profile_check = mysqli_query($conn, $sql_profile);
$sql_profile_check_result = mysqli_num_rows($sql_profile_check);
while($rows = mysqli_fetch_assoc($sql_profile_check)){
    $fname = $rows['fname'];
    $lname = $rows['lname'];
    $email = $rows['email'];
    $mobile = $rows['phone'];
    $address = $rows['address'];
    $city = $rows['district'];
    $state = $rows['state'];
    $postal_code = $rows['postalcode'];
    $fees = $rows['fee'];
    $scholarship = $rows['scholarship'];
    $paid_fees = $rows['paidfee'];
    $pid = $rows['pid'];
    $status = $rows['status'];
    $center = $rows['center'];
    $course = $rows['course'];
    $batch = $rows['batch'];
    $class = $rows['class'];
    $fathername = $rows['fathername'];
    $fathermob = $rows['fathermob'];
    $fatheroccu = $rows['fatheroccu'];
    $mothername = $rows['mothername'];
    $mothermob = $rows['mothermob'];
    $motheroccu = $rows['motheroccu'];
    if(isset($rows['10mark'])){
    $mark10 = $rows['10mark'];
    }
    if(isset($rows['12mark'])){
    $mark12 = $rows['12mark'];
    }
    $pre_exam = $rows['preexam'];
    $pre_exam_marks = $rows['preexammarks'];
    $mentor = $rows['mentor'];
    $timing = $rows['timing'];
    $date_of_joinig = $rows['dateofreg'];
    $pre_exam_year = $rows['preexamyear'];
}

?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo $fname.' '.$lname ?>-Students-CIMS</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <style>
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
        a{
            text-decoration: none;
        }
        a:hover{
            text-decoration: none;
        }
        ul {
    list-style-type: none;
}
body{
    background-color:#84CCFC;}
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
            <?php echo strtoupper($fname). " " .strtoupper($lname). " (" . strtoupper($sid) . ")" ?></a>
        <a href="index.php">Home</a>
        <a href="attendance.php">Attendance</a>
        <a href="timetable.php">TimeTable</a>
        <a href="password_update.php">Update Password</a>
        <a href="../../logout.php">Logout</a>
    </div>
<div class="container">
    <div class="jumbotron" style="background-color:white;margin-top:5px;">
        <div class="row">
            <div class="col-md-4 col-xs-12 col-sm-6 col-lg-4">
                <img src="images/default_pic.png" alt="stack photo" class="img">
            </div>
            <div class="col-md-8 col-xs-12 col-sm-6 col-lg-8">
                <div class="container" style="border-bottom:1px solid black">
                    <h2><?php echo strtoupper($fname).' '.strtoupper($lname).' ( Mentor ID : '.$mentor.')'; ?></h2>
                </div>
                <hr>
                <ul class="container details">
                    <li><p><span class="glyphicon glyphicon-ok-sign" style="width:50px;"></span><?php echo $sid.' ( PID:'.$pid.')'; ?></p></li>
                    <li><p><span class="glyphicon glyphicon-earphone one" style="width:50px;"></span><?php echo '+91 '.$mobile; ?></p></li>
                    <li><p><span class="glyphicon glyphicon-envelope one" style="width:50px;"></span><?php echo $email; ?></p></li>
                    <li><p><span class="glyphicon glyphicon-map-marker one" style="width:50px;"></span><?php echo ucfirst($center).'('.strtoupper($course).')' ?></p></li>
                    <li><p><span class="glyphicon glyphicon-tower" style="width:50px;"></span><?php echo $batch.' ('.strtoupper($timing).')'; ?></p></li>
                    <button onclick="showsome()" class="btn btn-primary">Update Details</button>
                </ul>
            </div>
        </div>
    </div>
    <script>
        function openNav() {
            document.getElementById("mySidenav").style.width = "250px";
        }

        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
        }

        function showsome() {
            alert("To Update Details Kindly Contact Your Class Mentor.");
        }
    </script>
</body>
</html>
<?php } ?>