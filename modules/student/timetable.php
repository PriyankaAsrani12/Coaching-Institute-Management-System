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
    <title>Time Table-Students-CIMS</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <style>
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
  background-color: #80bfff;
  color: white;
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
<div align="center" style="padding: 8px">

    <?php
    if(isset($_POST['submit'])){
        $ydate = $_POST['date'];
    }
    $timestamp = strtotime($ydate);
    $day = date('l', $timestamp);
    ?>
    <form action="timetable.php" method="post">
        <h3>Choose date (mm/dd/yyyy)</h3>
        <input type="date" name="date" value="<?php echo $ydate; ?>">
        <input type="submit" name="submit" value="submit">
    </form>
</div>
<div style="float: left;background-color: white;width: 100%">
    <h1 align="center">Time Table - <span style="color: blue"><?php echo $fname.' '.$lname; ?></span></h1>
    <p align="center"><?php echo $ydate.'<br>('.$day.')' ?></p>
    <table cellpadding="5px">
        <tr>
            <th>S.No</th>
            <th>Timing</th>
            <th>Subject name</th>
            <th>Subject Teacher</th>
            <th>Teacher ID(EID)</th>
        </tr>

        <?php
            $sql_time = "SELECT * FROM timetable WHERE center = '$center' AND batch = '$batch' AND course = '$course' AND day ='$day'";
            $sql_time_result = mysqli_query($conn, $sql_time);
            $sql_time_result_check = mysqli_num_rows($sql_time_result);
            $j=0;
            while($rown = mysqli_fetch_assoc($sql_time_result)){
                $j++;
                $time = $rown['timing'];
                $subject = $rown['subject'];
                $eid = $rown['eid'];
                $sql_teacher = "SELECT * FROM teachers WHERE eid = '$eid'";
                $sql_result = mysqli_query($conn, $sql_teacher);
                $sql_result_teacher = mysqli_num_rows($sql_result);
                while($rowsn = mysqli_fetch_assoc($sql_result)){
                    $teacherfname = $rowsn['fname'];
                    $teacherlname = $rowsn['lname'];

            }

        ?>
        <tr>
            <td><?php echo $j; ?></td>
            <td><?php echo $time; ?></td>
            <td><?php echo ucfirst($subject) ?></td>
            <td><?php echo ucfirst($teacherfname) . ' '. ucfirst($teacherlname) ?></td>
            <td><?php echo strtoupper($eid)  ?></td>

            <?php } ?>

    </table>
</div>
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
        background-color: #5bc0de;
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