<?php

 

session_start();
include ("../../config/database.php");
if(isset($_SESSION['id']) && isset($_SESSION['username'])){
    $id = $_SESSION['id'];
    $eid = $_SESSION['username'];
    $sql_profile = "SELECT * FROM teachers WHERE eid = '$eid'";
    $sql_profile_check = mysqli_query($conn, $sql_profile);
    $sql_profile_check_result = mysqli_num_rows($sql_profile_check);
    while($rows = mysqli_fetch_assoc($sql_profile_check)){
        $fname = $rows['fname'];
        $lname = $rows['lname'];
        $email = $rows['email'];
        $mobile = $rows['mobile'];
        $address = $rows['address'];
        $city = $rows['city'];
        $state = $rows['state'];
        $postal_code = $rows['postalcode'];
        $salary = $rows['salary'];
        $position = $rows['position'];
        $subject = $rows['subject'];
        $status = $rows['status'];
        $center = $rows['center'];
        $course = $rows['course'];
        if(isset($rows['highestqualification'])){
            $qual = $rows['highestqualification'];
            $mark = $rows['highestqualificationmarks'];
        }
        $date_of_joinig = $rows['dateofjoining'];
        $exp = $rows['experience'];
    }

    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title><?php echo $fname.' '.$lname ?>-Hod's-CIMS</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
        <style>
            a{
                text-decoration: none;
            }
            a:hover{
                text-decoration: none;
            }
            body{
    background-color:#84CCFC;}
    </style>
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
    background-image:url(https://i.pinimg.com/originals/3e/a2/ba/3ea2baa796599a53fef2133788f78c2d.jpg);
}
    </style>
    </head>
    <body>
    <!-- <h2 align="center" style="color: blue"><?php echo ucfirst($center) . ' (' . strtoupper($course) . ')' ?></h2> -->
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
        <a href="index.php"  class="logo"><span style="color:#ebf0fa; font-size:70px;">CIMS</span></a>
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
    <div class="container">
        <div class="jumbotron" style="background-color:white;margin-top:5px;">
            <div class="row">
                <div class="col-md-4 col-xs-12 col-sm-6 col-lg-4">
                    <img src="images/default_pic.png" alt="stack photo" class="img">
                </div>
                <div class="col-md-8 col-xs-12 col-sm-6 col-lg-8">
                    <div class="container" style="border-bottom:1px solid black">
                        <h2><?php echo $fname.' '.$lname.' ('.ucfirst($position).':'.ucfirst($center).')'; ?></h2>
                    </div>
                    <hr>
                    <ul class="container details">
                        <li><p><span class="glyphicon glyphicon-ok-sign" style="width:50px;"></span><?php echo $eid.' (Admin)'; ?></p></li>
                        <li><p><span class="glyphicon glyphicon-earphone one" style="width:50px;"></span><?php echo '+91 '.$mobile; ?></p></li>
                        <li><p><span class="glyphicon glyphicon-envelope one" style="width:50px;"></span><?php echo $email; ?></p></li>
                        <li><p><span class="glyphicon glyphicon-map-marker one" style="width:50px;"></span><?php echo ucfirst($center).'('.strtoupper($course).')' ?></p></li>
                        <li><p><span class="glyphicon glyphicon-tower" style="width:50px;"></span><?php echo "Date Of Joining: ".$date_of_joinig; ?></p></li>
                        <p><button onclick="showsome()"class="btn btn-primary" >Update Details</button></p>
                    </ul>
                </div>
            </div>
        </div>
        <div align="center">
            <!-- <p><b><i>Address:</i></b><?php echo $address.', '. $city.', '.$state.', '.$postal_code ?></p>
            <p><b><i>Total Salery Per Month:</i></b><?php echo $salary; ?></p>
            <p><b><i>Qualification: </i></b><?php echo ucfirst($qual); ?> &nbsp; &nbsp; <?php if(isset($mark)){echo '<b><i>Marks Get in '.$qual.': </i></b>'.$mark; } ?></p>
            <p><b><i>Experiance: </i></b><?php echo ucfirst($exp); ?> </p> -->
           
        </div>
        <script>
            function openNav() {
                document.getElementById("mySidenav").style.width = "250px";
            }

            function closeNav() {
                document.getElementById("mySidenav").style.width = "0";
            }

            function showsome() {
                alert("To Update Details Kindly Contact To Your Branch Admin.");
            }
        </script>
    </body>
    </html>
<?php } ?>