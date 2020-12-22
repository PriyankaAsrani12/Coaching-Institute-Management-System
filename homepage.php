<!DOCTYPE html>
<html>

<head>
    <title>Homepage</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="homepage.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
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
    
    </style>
</head>

<body>
    <!-- navbar -->
    <div class="header">
        <span style="font-size:30px;cursor:pointer;color:black;" class="logo" onclick="openNav()">&#9776; CIMS </span>
    </div>
    <div id="mySidenav" class="sidenav" style="background: #2193b0;  /* fallback for old browsers */
background: -webkit-linear-gradient(to top, #6dd5ed, #2193b0);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to top, #6dd5ed, #2193b0); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="index.php" class="logo"><span style="color:#ebf0fa; font-size:70px;">CIMS</span></a>
        <a href="#about">About Us</a>
        <a href="index.php">Login</a>
        <!-- <a href="register.php">Register</a> -->
    </div>
    <!-- carousel -->
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="https://www.educationmattersmag.com.au/wp-content/uploads/2015/09/shutterstock-student-exam-test-1024x683.gif" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="https://img.jakpost.net/c/2019/03/02/2019_03_02_66706_1551461528._large.jpg" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="https://s31450.pcdn.co/wp-content/uploads/2016/06/iStock_94825851_MEDIUM.160622.jpg" alt="Third slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!-- cards for current offers -->
    <div class="container">
        <h1 style="text-align: center; color:#5dbcd2; margin-top: 60px;">Current Offers!</h1>
        <hr>
        <div class="row">
            <div class="column card onethird" style="margin-right: 3px;">
                <img src="https://img.freepik.com/free-photo/education-concept-student-studying-brainstorming-campus-concept-close-up-students-discussing-their-subject-books-textbooks-selective-focus_1418-627.jpg?size=626&ext=jpg" alt="Avatar" style="width:100%">
                <div class="container">
                    <h5 style="padding-top: 8px;">Free NEET Mock Test</h5>
                    <hr>
                    <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old...<a href="#">Read More</a></p>
                    <hr>
                    <small class="text-muted">Last updated 10 hours ago</small>
                </div>
            </div>
            <div class="column card onethird" style="margin-right: 3px;">
                <img src="https://assets.entrepreneur.com/content/3x2/2000/20191219170611-GettyImages-1152794789.jpeg" alt="Avatar" style="width:100%">
                <div class="container">
                    <h5 style="padding-top: 8px;">Free JEE Mock Test</h5>
                    <hr>
                    <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old...<a href="#">Read More</a></p>
                    <hr>
                    <small class="text-muted">Last updated 3 mins ago</small>
                </div>
            </div>
            <div class="column card onethird" style="margin-right: 3px;">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQqT4WwGCait7eyL0FuAsfA_wm3fuUgtoJQ_g&usqp=CAU" alt="Avatar" height=250px style="width:100%">
                <div class="container">
                    <h5 style="padding-top: 8px;">Get upto 75% Scholarship</h5>
                    <hr>
                    <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old...<a href="#">Read More</a></p>
                    <hr>
                    <small class="text-muted">Last updated 50 mins ago</small>
                </div>
            </div>
        </div>
    </div>
    <!-- News Section -->
    <div class="container">
        <h1 style="text-align: center; color:#5dbcd2; margin-top: 60px;">News</h1>
        <hr>
        <section class="container">
            <div class="row">
                <div class="column newscol1">
                    <img class="img-fluid" src="https://english.cdn.zeenews.com/sites/default/files/2020/09/11/885121-result-970.jpg">
                </div>
                <div class="column newscol2">
                    <div class="container" style="padding-top: 100px; text-align: center;">
                        <h2>CBSE results declared</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                            quis nostrud exercitation ullamco laboris nisi ut aliqui
                            conseq...<a href="#">Read more</a></p>
                    </div>
                </div>
            </div>
        </section>
        <section class="container">
            <div class="row">
                <div class="column newscol2">
                    <div class="container" style="padding-top: 100px; text-align: center;">
                        <h2>JEE Results Declared</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                            quis nostrud exercitation ullamco laboris nisi ut aliqui
                            conseq...<a href="#">Read more</a></p>
                    </div>
                </div>
                <div class="column newscol1">
                    <img class="img-fluid" src="https://previews.123rf.com/images/kchung/kchung1610/kchung161000993/64507515-results-written-by-hand-hand-writing-on-transparent-board-photo.jpg">
                </div>
            </div>
        </section>
    </div>
    <!-- Event section -->
    <div class="container">
        <section class="destination">
            <h1 style="text-align: center; color:#5dbcd2; margin-top: 50px;">Events</h1>
            <hr>
            <ul class="grid">
                <li class="small" style="background-image: url(https://previews.123rf.com/images/garagestock/garagestock1606/garagestock160613784/59050746-workshop-written-on-sticky-note-pinned-on-pinboard.jpg);">
                </li>
                <li class="large" style="background-image: url(https://www.alphagamma.eu/wp-content/uploads/2015/12/13-must-attend-business-student-events-in-2016.jpg);">
                </li>
                <li class="large" style="background-image: url(https://minmahawschool.org/wp-content/uploads/2015/04/Image00007.jpg);"></li>
                <li class="small" style="background-image: url(https://mir-s3-cdn-cf.behance.net/project_modules/max_1200/70a62149364311.5a89ec0390dce.jpg);"></li>
            </ul>
        </section>
    </div>
    <!-- about us section -->
    <div class="container">
        <h1 style="text-align: center;color:#5dbcd2; margin-top: 50px" id="about">About Us</h1>
        <hr>
        <div class="row">
            <p class="column newscol1" style="text-align: center; padding-right: 10px;">CIMS Coaching classes is one of the leading educational institutes in the vicinity of Kurla and Sakinaka where we believe in quality education. We believe that good teachers and good technology is the best combination for success and hence we provide best faculties who do their best in teaching coupled with advanced technology in the market of education which is used by our faculty. In a very short span of time we have become leaders in the field of education and coaching due to our effective teaching techniques and personal attention to every student. Many have experienced the change that we can make in a student and we are looking to do the same for many others who come. So WELCOME TO CIMS COACHING CLASSES</p>
            <div class="column newscol2">
                <img src="https://s31450.pcdn.co/wp-content/uploads/2018/04/teacher-assisting-student-during-lecture-id490357692-180409.jpg" height=300px width=500px>
            </div>
        </div>
        <div class="row" style="padding-top: 20px; padding-left: 65px;">
            <div class="column onefourth">
                <div class="card successNum">
                    <p><i class="far fa-edit"></i></p>
                    <h3>6</h3>
                    <p>Centers</p>
                </div>
            </div>
            <div class="column onefourth">
                <div class="card successNum">
                    <p><i class="fa fa-check"></i></p>
                    <h3>20+</h3>
                    <p>Batches passed</p>
                </div>
            </div>
            <div class="column onefourth">
                <div class="card successNum">
                    <p><i class="fas fa-book"></i></p>
                    <h3>1000+</h3>
                    <p>Students in IIT</p>
                </div>
            </div>
            <div class="column onefourth">
                <div class="card successNum">
                    <p><i class="fa fa-user"></i></p>
                    <h3>30+</h3>
                    <p>Faculty Members</p>
                </div>
            </div>
        </div>
    </div>
    <!-- footer -->
    <div class="container" style="padding-top: 30px;">
        <hr>
        <div class="row">
            <div class="column newscol1" style="padding-top: 5px;">
                <p class="copyright-text">Copyright &copy; 2020 All Rights Reserved by
                    <a href="#">Classes</a>.
                </p>
            </div>
            <div class="column newscol1" style="padding-left: 300px;">
                <ul class="social-icons">
                    <li><a class="phone" href="#"><i class="fas fa-phone"></i></a></li>
                    <li><a class="whatsapp" href="#"><i class="fab fa-whatsapp"></i></a></li>
                    <li><a class="map" href="#"><i class="fas fa-map-pin"></i></a></li>
                    <li><a class="linkedin" href="#"><i class="fab fa-linkedin"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script>
    function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
    }
    </script>
</body>
<style>
* {
    scroll-behavior: smooth;
    font-family: 'Nunito', sans-serif;
}

nav {
    background-color: white;
    height: 70px;
}

.links {
    color: black;
}

.links:hover {
    text-decoration: none;
    color: #5dbcd2;
}

.carousel-item {
    width: 100%;
    height: 605px;
}

ul {
    list-style: none;
}

.grid {
    width: 100%;
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
}

.destination .grid li {
    height: 350px;
    padding: 20px;
    background-clip: content-box;
    background-size: cover;
    background-position: center;
}

.destination .grid li.small {
    flex-basis: 30%;
}

.destination .grid li.large {
    flex-basis: 70%;
}

.newscol1 {
    flex-basis: 50%
}

.newscol2 {
    flex-basis: 50%;
}

.onefourth {
    flex-basis: 25%;
}

.onethird {
    flex-basis: 33%;
}

.successNum {
    align-items: center;
    height: 150px;
    width: 150px;
    border-radius: 50%;
    background-color: #b8dbde
}

.dropbtn {
    font-size: 16px;
    border: none;
}

.dropdown {
    font-size: 20px;
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f1f1f1;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
    z-index: 1;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    font-weight: bold;

}

.dropdown-content a:hover {
    color: #5dbcd2
}

.dropdown:hover .dropdown-content {
    display: block;
}

.social-icons li {
    display: inline-block;
}

.social-icons a {
    background-color: #eceeef;
    color: #5dbcd2;
    font-size: 16px;
    display: inline-block;
    line-height: 44px;
    width: 44px;
    height: 44px;
    text-align: center;
    margin-right: 8px;
    border-radius: 100%;
}

.social-icons a:hover {
    background-color: #5dbcd2;
    color: white;
}

.card {
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    transition: 0.3s;
}

.card:hover {
    box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
}
</style>

</html>