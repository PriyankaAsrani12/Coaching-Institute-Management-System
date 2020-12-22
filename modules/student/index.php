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
    $status = $row['status'];
}
if($status == 'yes' || $status == 'Yes') {
    ?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Students-CIMS</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
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
    table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
 background-color: #052b61;
  color: white;
}
body{
    background-color:#84CCFC;}

    </style>
</head>

<body>
    <div class="container">
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
    <hr>
    <div class="container" style="background-color: white;">
    <div style="float: left;background-color: white;width: 50%">
        <h1 style="text-align:center">Time Table</h1>
        <p style="text-align:center">
            <?php echo date("d-m-Y") . '<br>(' . date("l") . ')' ?>
        </p>
        <table cellpadding="5px">
            <tr>
                <th>S.No</th>
                <th>Timing</th>
                <th>Subject name</th>
                <th>Subject Teacher</th>
                <th>Teacher ID(EID)</th>
            </tr>
            <?php
            $day = date("l");
            $sql_time = "SELECT * FROM timetable WHERE center = '$center' AND batch = '$batch' AND course = '$course' AND day ='$day'";
            $sql_time_result = mysqli_query($conn, $sql_time);
            $sql_time_result_check = mysqli_num_rows($sql_time_result);
            $j = 0;
            while ($rown = mysqli_fetch_assoc($sql_time_result)){
            $j++;
            $time = $rown['timing'];
            $subject = $rown['subject'];
            $eid = $rown['eid'];

            $sql_teacher1 = "SELECT * FROM teachers WHERE eid = '$eid'";
            $sql_result1 = mysqli_query($conn, $sql_teacher1);
            $sql_result_teacher1 = mysqli_num_rows($sql_result1);
            while ($rowsn1 = mysqli_fetch_assoc($sql_result1)) {
                $teacherfname1 = $rowsn1['fname'];
                $teacherlname1 = $rowsn1['lname'];

            }

            ?>
            <tr>
                <td>
                    <?php echo $j; ?>
                </td>
                <td>
                    <?php echo $time; ?>
                </td>
                <td>
                    <?php echo $subject ?>
                </td>
                <td>
                    <?php echo $teacherfname1 . ' ' . $teacherlname1 ?>
                </td>
                <td>
                    <?php echo $eid ?>
                </td>
                <?php } ?>
        </table>
    </div>
    
    <div style="padding-left:20px; float: left;;background-color: white;width: 50%">
        <h1 align="center">Attendance</h1>
        <p align="center">Yesterday's Attendance<br>(
            <?php $ydate = date('Y-m-d', strtotime("-1 days"));
            echo date('d-m-Y', strtotime("-1 days")); ?>) </p>
        <table cellpadding="5px">
            <tr>
                <th>S.NO.</th>
                <th>Subject</th>
                <th>Timing</th>
                <th>Status</th>
                <th>Teacher</th>
                <th>Teacher ID (EID)</th>
            </tr>
            <?php
            $sqli = "SELECT * FROM attendance WHERE sid = '$sid' AND course = '$course' AND center = '$center' AND date = '$ydate'";
            $resulti = mysqli_query($conn, $sqli);
            $resultchecki = mysqli_num_rows($resulti);
            $i = 0;
            while ($rows = mysqli_fetch_assoc($resulti)) {
                $i++;
                $subject = $rows['subject'];
                $timing = $rows['timing'];
                $status = $rows['status'];
                $eid = $rows['eid'];
                if ($status == 'p' OR $status == 'P') {
                    $status = "Present";
                    $color = "#d3d3d3";
                } else if ($status == 'a' OR $status == 'A') {
                    $status = "Absent";
                    $color = "red";
                }
                $sql_teacher = "SELECT * FROM teachers WHERE eid = '$eid'";
                $sql_result = mysqli_query($conn, $sql_teacher);
                $sql_result_teacher = mysqli_num_rows($sql_result);
                while ($rowsn = mysqli_fetch_assoc($sql_result)) {
                    $teacherfname = $rowsn['fname'];
                    $teacherlname = $rowsn['lname'];

                }

                ?>
            <tr>
                <td>
                    <?php echo $i; ?>
                </td>
                <td>
                    <?php echo ucfirst($subject); ?>
                </td>
                <td>
                    <?php echo $timing; ?>
                </td>
                <td>
                    <?php echo $status; ?>
                </td>
                <td>
                    <?php echo $teacherfname . ' ' . $teacherlname ?>
                </td>
                <td>
                    <?php echo ucfirst($eid); ?>
                </td>
            </tr>
            <?php } ?>
        </table>
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
    </script>
</body>

</html>
<?php
}else{
    ?>
<h1>Your account is deactivated by admin due to some reasons. kindly contact Admin for further.</h1>
<?php
session_destroy();
header("Location: ../../index.php");
}
}else{
    header("Location: ../../index.php");
}

?>