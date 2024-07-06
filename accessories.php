<?php
    session_start();
    error_reporting(0);
    include('connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Accessories</title>
    <!-- load stylesheets -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400">  <!-- Google web font "Open Sans" -->
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">                <!-- Font Awesome -->
    <link rel="stylesheet" href="css/bootstrap.min.css">                                      <!-- Bootstrap style -->
    <link rel="stylesheet" href="css/tooplate-style.css">              
</head>

<body style="background-color: #7409e8;">

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
                                <a class="nav-link current" href="./accessories.php">Accessories</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="./games.php">Games</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="./contact.php">Contact<span class="sr-only">(current)</span></a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>

            <row>
              <img src="./img/bg2.jpg" class="gif" />
              <img src="./img/bg4.jpg" class="gif" />
              <img src="./img/bg8.jpg" class="gif" />
            </row>

            <h1 align="center" style="margin-top:40px;letter-spacing:5px;" >PlayStation 5 Accessories</h1>

            <div class="container conm">

            <?php
                $ret=mysqli_query($con,"select * from accessory");
                while ($row=mysqli_fetch_array($ret)) { ?>
            
                <div class="card col-md-3 mr-1">
                <img src="admin/img/<?php echo $row['image']?>" class="card-img-top imgacc" alt="p1.jpg"/>
                <div class="card-body">
                    <h5 class="card-title"><?php  echo $row['name'];?></h5>
                    <p class="card-text"><?php  echo $row['description'];?></p>
                    <p class="card-text"><?php  echo $row['price'];?></p>
                    <a href="order.php?orderid=<?php  echo $row['id'];?>&type=a" class="btn btn-primary" style="margin-left:40%;">Buy</a>
                </div>
                </div>
            <?php } ?>   
            </div>
             <!-- load JS files -->
        <script src="js/jquery-1.11.3.min.js"></script>         <!-- jQuery (https://jquery.com/download/) -->
        <script src="https://www.atlasestateagents.co.uk/javascript/tether.min.js"></script> <!-- Tether for Bootstrap (http://stackoverflow.com/questions/34567939/how-to-fix-the-error-error-bootstrap-tooltips-require-tether-http-github-h) -->
        <script src="js/bootstrap.min.js"></script>             <!-- Bootstrap js (v4-alpha.getbootstrap.com/) -->
        <script src="js/jquery.singlePageNav.min.js"></script>  <!-- Single page nav (https://github.com/ChrisWojcik/single-page-nav) -->

</body>