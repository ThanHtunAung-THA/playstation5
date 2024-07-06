<?php
    session_start();
    error_reporting(0);
    include('connection.php');

    if (isset($_POST['sub'])) {
        $email = $_POST['email'];
        $password = $_POST['password']; // Note: Using MD5 for hashing is not secure. Consider using stronger hashing algorithms like bcrypt.
    
        $query = mysqli_query($con, "SELECT * FROM user WHERE email='$email' AND password='$password'");
        $result = mysqli_fetch_assoc($query);
    
        if ($result) {
            // User exists, create session variables and redirect to games.php
            $_SESSION['uid'] = $result['id']; // Assuming you have an 'id' field in your 'user' table
            $_SESSION['un'] = $result['name'];
            $_SESSION['email'] = $result['email'];
            $_SESSION['phone'] = $result['phone']; // Assuming you have a 'phone' field in your 'user' table
            header("Location: index.php");
            exit();
        } else {
            echo "<script>alert('Invalid email or password. Please try again.');</script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Zipper - Responsive HTML Template</title>
<!--

Template 2084 Zipper

http://www.tooplate.com/view/2084-zipper

-->
    <!-- load stylesheets -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400">  <!-- Google web font "Open Sans" -->
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">                <!-- Font Awesome -->
    <link rel="stylesheet" href="css/bootstrap.min.css">                                      <!-- Bootstrap style -->
    <link rel="stylesheet" href="css/tooplate-style.css">                                   <!-- Templatemo style -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
          <![endif]-->
</head>

    <body>

        <div class="container-fluid">
            <!-- Navigation -->        
            <div class="tm-nav navfixed">
                <nav class="navbar">

                    <button class="navbar-toggler hidden-md-up" type="button" data-toggle="collapse" data-target="#tmNavbar"></button> <!-- &#9776; ☰ -->
                    <div class="collapse navbar-toggleable-sm text-xs-center tm-navbar" id="tmNavbar">
                        <ul class="nav navbar-nav">
                            <li class="nav-item active selected">
                                <a class="nav-link current" href="./index.php">Home <span class="sr-only">(current)</span></a>
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
            
            <section class="tm-section tm-section-home tm-flex-center" id="home" style="min-height: 800px;">                
                
                <div class="tm-hero">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="text-uppercase tm-hero-title">Play Station 5</h1>
                            <p class="tm-hero-subtitle">PLAY LIKE NEVER BEFORE®</p>
                        </div>
                        <img src="./img/g1.gif"/> 
                        <center>
                            <?php 
                             if(strlen($_SESSION['uid'])==0){
                                ?>
                              <div class="tm-bg-black-translucent" style="padding:5px;color:white;">
                            <h3>Login</h3>
                            <form method="post" class="tm-contact-form">
                                <input type="email" name="email" placeholder="Email" class="form-control2" /><br/><br/>
                                <input type="password" name="password" placeholder="Password" class="form-control2" /><br/><br/>
                                <span>Create New Account.</span><a href="./register.php">Register</a><br/>
                                <div class="col-12">
                                    <input type="submit" name="sub"  value="LOGIN" class="submit_button btn btn-primary mt-2" />
                                </div>
                            </form>
                        </div>   
                            <?php
                            }else{
                                echo "<h3 style='padding:5px;color:white;'>Welcome ".$_SESSION['un']."</h3><br/>";
                                echo "<h3 style='padding:5px;color:white;'><a href='logout.php'>Logout</a></h3>";
                            }
                          ?>
                    </center>
                    </div>                    
                </div>             
            </section>
            
            <!-- Section 2 -->
            <section class="tm-section tm-section-accessories" id="about">

                <div class="tm-page-content-width">
                    <div class="tm-bg-black-translucent tm-content-box tm-content-box-right tm-flex-center">
                        <div class="tm-content-box-inner">
                            <h2 class="tm-section-title">PlayStation® accessories</h2>
                            <p>Build your perfect gaming setup with controllers, headsets and other accessories for your PS5® or PS4™ console.</p>
                            <img src="./img/g2.gif"/>                     
                        </div>                        
                    </div>                    
                </div>
                
            </section>
            
            <!-- Section 3 -->
            <section class="tm-section tm-section-services" id="services">

                <div class="tm-page-content-width">
                    <div class="tm-bg-black-translucent tm-content-box tm-flex-center">
                        <div class="tm-content-box-inner">
                            <h2 class="tm-section-title">DualSense® wireless controller</h2>
                            <p>Discover a deeper gaming experience1 with the innovative PS5® controller.</p>
                            <p>The DualSense wireless controller for PS5 consoles offers immersive haptic feedback2, dynamic adaptive triggers2 and a built-in microphone, all integrated into an iconic design.</p>
                        </div>   
                    </div> 
                </div>                
            </section>

            <!-- Section 4 -->
            <section class="tm-section tm-section-testimonials" id="testimonials">
                <div class="tm-page-content-width">
                    <h2 class="tm-section-title tm-section-title-big text-xs-center">Games</h2>
                    <div class="row">
                        <div class="tm-3-col-container">                                        
                            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 tm-3-col-textbox">
                                <div class="text-xs-left tm-textbox tm-textbox-padding tm-bg-black-translucent tm-3-col-textbox-inner">
                                    <i class="fa fa-4x fa-solid fa-gamepad tm-fa"></i>
                                                                               
                                    <p class="tm-text tm-margin-b-0">
                                    <b>Play 4,000+ PS4 games on your PS5 console.</b><br/>
                                    Get access to a massive collection of legendary PlayStation games via backwards compatibility.</p>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 tm-3-col-textbox">
                                <div class="text-xs-left tm-textbox tm-textbox-padding tm-bg-black-translucent tm-3-col-textbox-inner">
                                    
                                    <p class="tm-text tm-margin-b-0">
                                        <b>Game boost. </b><br/>
                                        The PS5 console's Game Boost technology gives PS4 games access to more power. Enjoy faster and smoother frame rates in some of the PS4 console’s greatest games.</p>
                                </div>          
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 tm-3-col-textbox">
                                <div class="text-xs-left tm-textbox tm-textbox-padding tm-bg-black-translucent tm-3-col-textbox-inner">
                                    
                                    <p class="tm-text tm-margin-b-0">
                                        <b>Upgraded for PS5.</b><br/>
                                        Whether they're already part of your library or you're jumping in for the first time, these PS4 games can be upgraded into PS5 versions that have major enhancements.</p>
                                </div>          
                            </div>                                        
                        </div>
                    </div>
                </div>                
            </section>

        </div>
        
        <!-- load JS files -->
        <script src="js/jquery-1.11.3.min.js"></script>         <!-- jQuery (https://jquery.com/download/) -->
        <script src="https://www.atlasestateagents.co.uk/javascript/tether.min.js"></script> <!-- Tether for Bootstrap (http://stackoverflow.com/questions/34567939/how-to-fix-the-error-error-bootstrap-tooltips-require-tether-http-github-h) -->
        <script src="js/bootstrap.min.js"></script>             <!-- Bootstrap js (v4-alpha.getbootstrap.com/) -->
        <script src="js/jquery.singlePageNav.min.js"></script>  <!-- Single page nav (https://github.com/ChrisWojcik/single-page-nav) -->

</body>
</html>