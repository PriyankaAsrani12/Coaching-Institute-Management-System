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
        </head>
        <style>
        .sidenav a {
        padding: 8px 8px 8px 32px;
        text-decoration: none;
        font-size: 25px;
        color: black;
        display: block;
        transition: 0.3s;
    }
    body{
    background-color:#84CCFC;}

    .sidenav a:hover {
        color: #ebf0fa;
    }
        </style>
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
            <!-- <a href="teachers.php">Teachers</a> -->
            <!-- <a href="teachersattendance.php">Teachers Attendance</a>-->
            <a href="add.php">Add TimeTable/batch</a> 
            <a href="update_password.php">Update Password</a>
            <a href="../../logout.php">Logout</a>
        </div>
        <hr>
        <br>
    


        <div align="center" style="background-color: white; padding: 10px;">
            <table cellpadding="10px">
                <tr>
                    <?php
                    $sql_find_batch = "SELECT count(batch) AS total_batch FROM batches WHERE center='$center' AND course='$course'";
                    $sql_find_batch_get=mysqli_query($conn,$sql_find_batch);
                    $sql_find_batch_total = mysqli_fetch_assoc($sql_find_batch_get);
                    ?>
                    <th><div style="background-color: blue; color: white; padding-left:20px;padding-right: 20px;padding-bottom: 1px;padding-top: 1px; border-radius: 15px 15px 15px 15px;"><h3>Total Batches</h3><p><?php echo $sql_find_batch_total['total_batch'];?></p></div></th>

                    <?php
                    $sql_find_sid = "SELECT count(sid) AS total_sid FROM students WHERE center='$center' AND course='$course'";
                    $sql_find_sid_get=mysqli_query($conn,$sql_find_sid);
                    $sql_find_sid_total = mysqli_fetch_assoc($sql_find_sid_get);
                    ?>
                    <th><div style="background-color:blue; color:white; padding-left:20px;padding-right: 20px;padding-bottom: 1px;padding-top: 1px; border-radius: 15px 15px 15px 15px;"><h3>Total Students</h3><p><?php echo $sql_find_sid_total['total_sid'];?></p></div></th>

                    <?php
                    $sql_find_mentor = "SELECT count(eid) AS total_mentor FROM teachers WHERE center='$center' AND course='$course' AND position='mentor'";
                    $sql_find_mentor_get=mysqli_query($conn,$sql_find_mentor);
                    $sql_find_mentor_total = mysqli_fetch_assoc($sql_find_mentor_get);
                    ?>
                    <th><div style="background-color:blue; color: white; padding-left:20px;padding-right: 20px;padding-bottom: 1px;padding-top: 1px; border-radius: 15px 15px 15px 15px;"><h3>Total Mentors</h3><p><?php echo $sql_find_mentor_total['total_mentor']; ?></p></div></th>
                    <?php
                    $sql_find_hod = "SELECT count(eid) AS total_hod FROM teachers WHERE center='$center' AND course='$course' AND position='hod'";
                    $sql_find_hod_get=mysqli_query($conn,$sql_find_hod);
                    $sql_find_hod_total = mysqli_fetch_assoc($sql_find_hod_get);
                    ?>
                    <th><div style="background-color: blue; color: white; padding-left:20px;padding-right: 20px;padding-bottom: 1px;padding-top: 1px;border-radius: 15px 15px 15px 15px;"><h3>Total HOD's</h3><p><?php echo $sql_find_hod_total['total_hod']?></p></div></th>
                    <?php
                    $sql_find_teacher = "SELECT count(eid) AS total_teacher FROM teachers WHERE center='$center' AND course='$course' AND position='teacher'";
                    $sql_find_teacher_get=mysqli_query($conn,$sql_find_teacher);
                    $sql_find_teacher_total = mysqli_fetch_assoc($sql_find_teacher_get);
                    ?>
                    <th><div style="background-color:blue; color: white; padding-left:20px;padding-right: 20px;padding-bottom: 1px;padding-top: 1px;border-radius: 15px 15px 15px 15px;"><h3>Total Teachers</h3><p><?php echo $sql_find_teacher_total['total_teacher']?></p></div></th>

                </tr>
            </table>
        </div>

        <div align="center" style="background-color: white; padding: 10px;">
            <h2 style="color: blue">Batch And Batch Mentors</h2>
            <table border="1" cellpadding="10px">
                <tr>
                    <th width="250px" style="background-color: #80bfff">Batches</th>
                    <th width="250px" style="background-color: #80bfff">Mentor Id</th>
                </tr>
                <?php
                    $get_batch_information = "SELECT * FROM batches where course='$course' AND center='$center'";
                    $get_batch_information_query = mysqli_query($conn,$get_batch_information);
                    while($rwo = mysqli_fetch_assoc($get_batch_information_query)){
                ?>
                        <tr>
                            <th><?php echo $rwo['batch']?></th>
                            <th><?php echo $rwo['mentor']?></th>
                        </tr>
                      <?php }  ?>
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