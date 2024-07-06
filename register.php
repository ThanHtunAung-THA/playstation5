<?php
    session_start();
    error_reporting(0);
    include('connection.php');

    if(isset($_POST['sub']))
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $phone = $_POST['phone'];

        $ret = mysqli_query($con, "SELECT email FROM user WHERE email='$email'");
        $result = mysqli_fetch_array($ret);

        if($result != null) {
            echo "<script>alert('This email is already associated with another account!');</script>";
        } else {
            $query = mysqli_query($con, "INSERT INTO user(name, email, password, phone) VALUES ('$name', '$email', '$password', '$phone')");
            
            if ($query) {
                echo "<script>alert('You have successfully registered.'); window.location.href = 'index.php';</script>";
            } else {
                echo "<script>alert('Something went wrong. Please try again.');</script>";
            }
        }
    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Register</title>
    <!-- load stylesheets -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400"> <!-- Google web font "Open Sans" -->
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css"> <!-- Font Awesome -->
    <link rel="stylesheet" href="css/bootstrap.min.css"> <!-- Bootstrap style -->
    <link rel="stylesheet" href="css/tooplate-style.css">
</head>

<body background="./img/ps5regi.jpg" style="background-size:cover;">

    <!-- Navigation -->
    <div class="tm-nav">
        <nav class="navbar">

            <button class="navbar-toggler hidden-md-up" type="button" data-toggle="collapse" data-target="#tmNavbar"></button> <!-- &#9776; ☰ -->
            <div class="collapse navbar-toggleable-sm text-xs-center tm-navbar" id="tmNavbar">
                <ul class="nav navbar-nav">
                    <li class="nav-item active selected">
                        <a class="nav-link" href="./index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./accessories.php">Accessories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./games.php">Games</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./contact.php">Contact</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>

    <div class="tm-page-content-width" id="contact" style="margin-top:10px;">
        <div class="tm-bg-black-translucent text-xs-left tm-textbox tm-2-col-textbox-2 tm-textbox-padding tm-content-box">
            <center>
                <h2 class="tm-section-title">Register</h2>
                <!-- contact form -->
                <form method="post" name="register" onsubmit="return checkpass();" class="tm-contact-form">

                    <div class="form-group">
                        <input type="name" id="register_name" name="name" class="form-control" placeholder="Your Name" required />
                    </div>

                    <div class="form-group">
                        <input type="email" id="register_email" name="email" class="form-control" placeholder="Your Email" required />
                    </div>

                    <div class="form-group">
                        <input type="password" id="register_password" name="password" class="form-control" placeholder="Your Password" required />
                    </div>
                    <div class="form-group">
                        <input type="phone" id="register_phone" name="phone" class="form-control" placeholder="Your Phone" required />
                    </div>
                    <div>
                        <input type="submit" name="sub" id="submit" value="Register" class="submit_button btn btn-warning px-3" />
                    </div>

                    <img src="./img/g8.gif" />
            </center>
            </form>
        </div>
    </div>

    <!-- load JS files -->
    <script src="js/jquery-1.11.3.min.js"></script> <!-- jQuery (https://jquery.com/download/) -->
    <script src="https://www.atlasestateagents.co.uk/javascript/tether.min.js"></script> <!-- Tether for Bootstrap (http://stackoverflow.com/questions/34567939/how-to-fix-the-error-error-bootstrap-tooltips-require-tether-http-github-h) -->
    <script src="js/bootstrap.min.js"></script> <!-- Bootstrap js (v4-alpha.getbootstrap.com/) -->
    <script src="js/jquery.singlePageNav.min.js"></script> <!-- Single page nav (https://github.com/ChrisWojcik/single-page-nav) -->

</body>