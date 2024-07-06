<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Order</title>
    <!-- load stylesheets -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400">  <!-- Google web font "Open Sans" -->
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">                <!-- Font Awesome -->
    <link rel="stylesheet" href="css/bootstrap.min.css">                                      <!-- Bootstrap style -->
    <link rel="stylesheet" href="css/tooplate-style.css">                                   
</head>

<body>

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

            <?php
                include('connection.php');
                $oid =$_GET['orderid'];
                $type=$_GET['type'];
                if($type == 'a'){
                    $data=mysqli_query($con,"select * from accessory where id='$oid'");
                }else{
                    $data=mysqli_query($con,"select * from game where id='$oid'");
                }
                $row=mysqli_fetch_array($data);

                if(isset($_POST['sub'])){
                    $name=$_POST['contact_name'];
                    $email=$_POST['contact_email'];
                    $address=$_POST['contact_address'];
                    $ordno = 'od' .rand(100,500);
                    $pname = $row['name'];
                    $price = $row['price'];
                    $query=mysqli_query($con, "insert into orders value ('','$name','$email','$address','$ordno','$pname','$price')");
                    if ($query) {
                        echo "<script>window.location.href = 'ordersuccess.php'</script>";   
                    } else {
                        echo "<script>alert('Something Went Wrong. Please try again.');</script>";  	
                    }
                }
            ?>
            <div container>
                <div class="col-md-5">
                    <div class="tm-bg-black-translucent text-xs-left tm-textbox tm-2-col-textbox-2 tm-textbox-padding tm-textbox-padding-contact">
                        <h2 class="tm-section-title">Order</h2>
                        
                        <!-- contact form -->
                        <form method="post" class="tm-contact-form">

                            <div class="form-group">
                                <input type="text" id="contact_name" name="contact_name" class="form-control" placeholder="Your Name"  required/>
                            </div>
                
                            <div class="form-group">                                                        
                                <input type="email" id="contact_email" name="contact_email" class="form-control" placeholder="Your Email"  required/>
                            </div>                                                        
                            
                            <div class="form-group">
                                <textarea id="contact_address" name="contact_address" class="form-control" rows="5" placeholder="Address" required></textarea>
                            </div> 

                            <!-- <a href="./ordersuccess.php" type="submit" class="tm-submit-btn">Order</a>   -->
                            <input type="submit" name="sub" value="order" class="tm-submit-btn" />
                        </form>  
                        </div>
                </div>
                <div class="col-md-2" style="margin-top:20%;">
                    <img src="./img/g4.gif"/>
                </div>
                <div class="col-md-5">
                    <center>
                    <h2><?php echo $row['name']?></h2><br/>
                    <img src="admin/img/<?php echo $row['image'];?>" width="300" height="400" />
                    <h4 style="color:white;margin-top:20px;"><?php echo $row['price']?></h4>
                    </center>
                </div>
            </div>
             <!-- load JS files -->
        <script src="js/jquery-1.11.3.min.js"></script>         <!-- jQuery (https://jquery.com/download/) -->
        <script src="https://www.atlasestateagents.co.uk/javascript/tether.min.js"></script> <!-- Tether for Bootstrap (http://stackoverflow.com/questions/34567939/how-to-fix-the-error-error-bootstrap-tooltips-require-tether-http-github-h) -->
        <script src="js/bootstrap.min.js"></script>             <!-- Bootstrap js (v4-alpha.getbootstrap.com/) -->
        <script src="js/jquery.singlePageNav.min.js"></script>  <!-- Single page nav (https://github.com/ChrisWojcik/single-page-nav) -->

</body>