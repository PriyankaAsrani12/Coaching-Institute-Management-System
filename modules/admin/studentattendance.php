<?php


session_start();
if(isset($_SESSION['id']) && isset($_SESSION['username'])){
include("../../config/database.php");
$id = $_SESSION['id'];
$eid = $_SESSION['username'];
$sql = "SELECT * FROM teachers WHERE eid = '$eid'";
$result = mysqli_query($conn, $sql);
$resultcheck = mysqli_num_rows($result);
if($row = mysqli_fetch_assoc($result)){
    $fname= ucfirst($row['fname']);
    $lname = ucfirst($row['lname']);
    $center = $row['center'];
    $course = $row['course'];
    $status = $row['status'];
}
if($status == 'yes' || $status == 'Yes') {
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin-CIMS</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <style>
        .linking{
            background-color: #ddffff;
            padding: 7px;
            text-decoration: none;
        }
        .linking:hover{
            background-color: blue;
            color: white;
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

        input,button,select{
            padding: 5px;
            border: 2px solid blue;
            border-radius: 10px;
            margin: 2px;
        }
        input[type=submit],button{
            width: 200px;
        }
        input:hover{
            background-color: lightblue;
        }
        input[type=submit]:hover{
            background-color: green;
            color: white;
        }
        body{
    background-color:#84CCFC;}
input[type=submit] {
            background-color:#5bc0de;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            font-weight:bold;
            font-size:15px;
        }

        input[type=submit]:hover {
            background-color: #0275d8;
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


    </style>
</head>
<body>

<div class="header" style="background-color:white;">

    <span style="font-size:30px;cursor:pointer" class="logo" onclick="openNav()">&#9776; CIMS  </span>

    <div class="header-right">
        <a href="profile.php">
            <?php echo $fname . " " . $lname . " (" . strtoupper($eid) . ")" ?></a>
    </div>
</div>
<div id="mySidenav" class="sidenav" style="background: #2193b0;  /* fallback for old browsers */
background: -webkit-linear-gradient(to top, #6dd5ed, #2193b0);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to top, #6dd5ed, #2193b0); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="index.php" class="logo"><span style="color:white;font-size:70px">CIMS</span></a>
    <a href="profile.php"><?php echo $fname . " " . $lname . " (" . strtoupper($eid) . ")" ?></a>
    <a href="index.php">Home</a>
    <a href="student.php">Student</a>
    <a href="studentattendance.php">Student Attendance</a>
    <!-- <a href="teachers.php">Teachers</a>
    <a href="teachersattendance.php">Teachers Attendance</a> -->
    <a href="add.php">Add TimeTable/batch</a>
    <!-- <a href="complaint.php">Complaint</a>
    <a href="incomingcomplaint.php">Incoming Complaint</a> -->
    <a href="update_password.php">Update Password</a>
    <a href="../../logout.php">Logout</a>
</div>
<div align="center" style="padding: 8px ">
    <form method="post">
        <h2>Update Student Attendance</h2>
        <input type="text" name="stid" placeholder="Enter Student ID(SID)" required>
       | Date Of attendance: <input type="date" name="dateofatt" required>
        <input type="submit" name="search" style="background-color:#052b61">
    </form>
</div>
    <?php if(isset($_POST['search'])){ ?>
<div align="center" style="padding: 8px; background-color: white;width: 100%">
    <h2>Update Student Attendance for <span style="color: blue"><?php echo $_POST['stid'];?></span></h2>
    <table border="2px" cellpadding="10px">
        <tr>
            <th>Subject</th>
            <th>Timing</th>
            <th>Status</th>
            <th>EID</th>
            <th>Action</th>
        </tr>
        <?php
            $sid_get = mysqli_real_escape_string($conn,$_POST['stid']);
            $st_get_date = $_POST['dateofatt'];
            $get_attendance = "SELECT * FROM attendance WHERE sid='$sid_get' AND date='$st_get_date' AND center='$center' AND course='$course'";
            $get_attendance_check = mysqli_query($conn,$get_attendance);
            while($get_attendance_rows=mysqli_fetch_assoc($get_attendance_check)){ ?>
                <tr>
                    <td><?php echo $get_attendance_rows['subject']; ?></td>
                    <td><?php echo $get_attendance_rows['timing']; ?></td>
                    <td><?php echo $get_attendance_rows['status']; ?></td>
                    <td><?php echo $get_attendance_rows['eid']; ?></td>
                    <td><a href="studentattendance.php?attendanceid=<?php echo $get_attendance_rows['id']; ?>">Update</a></td>
                </tr>
            <?php }
        }
        ?>

    </table>
</div>

<?php
    if(isset($_GET['attendanceid'])){
        $get_stid = (int)$_GET['attendanceid'];
        $sql_get_details = "SELECT * FROM attendance WHERE id='$get_stid' AND center='$center' AND course='$course'";
        $sql_get_details_check = mysqli_query($conn,$sql_get_details);
        $war = mysqli_fetch_assoc($sql_get_details_check);?>
        <div align="center">
            <table border="2px" cellpadding="10px">
                <tr>
                    <th>subject</th>
                    <th>Timing</th>
                    <th>Eid</th>
                    <th>Previous Status</th>
                    <th>New Status</th>
                    <th colspan="2">Upadate/Cancel</th>
                </tr>
                <tr>
                    <td><?php echo $war['subject']?></td>
                    <td><?php echo $war['timing']?></td>
                    <td><?php echo $war['eid']?></td>
                    <td align="center"><?php echo $war['status']?></td>
                    <form method="post">
                    <td>
                        <select name="updatestatus">
                            <option value="p">Present</option>
                            <option value="a">Absent</option>
                        </select>
                    </td>
                        <td><input type="submit" name="update"></td>
                    </form>
                    <td><a href="studentattendance.php">Cancel Update</a> </td>
                </tr>
            </table>
        </div>

    <?php
        if(isset($_POST['update'])){
            $newstatus = mysqli_real_escape_string($conn,$_POST['updatestatus']);
            $sql_updat_status = "UPDATE attendance SET status='$newstatus' WHERE id='$get_stid' AND center='$center' AND course='$course'";
            $sql_updat_status_query = mysqli_query($conn,$sql_updat_status);
            if($sql_updat_status_query){
                echo '<script>alert("Successfully done")</script>';
                echo '<script>location.href="studentattendance.php"</script>';
            }else{
                echo '<script>alert("Failed Try Again")</script>';
                echo '<script>location.href="studentattendance.php"</script>';
            }
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
</body>
    </html>
    <?php
}else{
    ?>
    <h1>Your account is deactivated by admin due to some reasons. kindly contact Admin for further.</h1>
    <?php
}
}else{
    header("Location: ../../index.php");
}

?>