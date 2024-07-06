<?php
session_start();
error_reporting(1);
include('connection.php');

if (strlen($_SESSION['aid'])==0) {
    header('location:login.php');
} else {
    if(isset($_POST['sub'])) {
        $product_name=$_POST['name'];
        $product_desc=$_POST['description'];
        $product_price=$_POST['price'];
        $image=$_FILES["image"]["name"];
		
            $query=mysqli_query($con, "insert into foodlist(img,Name,Description,Price) value('$image','$product_name','$product_desc','$product_price')");

            if ($query) {
                move_uploaded_file($_FILES["image"]["tmp_name"],"img/".$image);
                echo "<script>alert('Product has been added.');</script>"; 
                echo "<script>window.location.href = 'games.php'</script>";   
            } else {
                echo "<script>alert('Something Went Wrong. Please try again.');</script>";  	
            }
        }
    }
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Games Page</title>
    <!--

    Template 2108 Dashboard

	http://www.tooplate.com/view/2108-dashboard

    -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600">
    <!-- https://fonts.google.com/specimen/Open+Sans -->
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="jquery-ui-datepicker/jquery-ui.min.css" type="text/css" />
    <!-- http://api.jqueryui.com/datepicker/ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="css/tooplate.css">
</head>

<body class="bg02">
    <div class="container">
        <div class="row">
            <div class="col-12">
            <nav class="navbar navbar-expand-xl navbar-light bg-light">
                        <a class="navbar-brand" href="./index.php">
                            <img src="./img/ps-5-logo.png" width="100"/>
                            <h1 class="tm-site-title mb-0">PlayStation</h1>
                        </a>
                        <button class="navbar-toggler ml-auto mr-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav mx-auto">
                                <li class="nav-item">
                                    <a class="nav-link" href="index.php">Dashboard</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="accessories.php">Accessories</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link active" href="games.php">Games</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="order.php">Order</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="feedback.php">Feedback</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="accounts.php">Accounts</a>
                                </li>
                            </ul>
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link d-flex" href="logout.php">
                                        <i class="far fa-user mr-2 tm-logout-icon"></i>
                                        <span>Logout</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </nav>
            </div>
        </div>
        <!-- row -->

        <div class="row tm-mt-big">
            <div class="col-xl-2"></div>
            <div class="col-xl-8 col-lg-10 col-md-12 col-sm-12" style="margin-bottom:50px;">
                <div class="bg-white tm-block">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="tm-block-title d-inline-block">Add Game</h2>
                        </div>
                    </div>
                    <div class="row mt-4 tm-edit-product-row">
                        <div class="col-xl-7 col-lg-7 col-md-12">
                            <form method="post" class="tm-edit-product-form" enctype="multipart/form-data">
                                <div class="input-group mb-3">
                                    <label for="name" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Game Name</label>
                                    <input id="name" name="name" type="text" class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7" required>
                                </div>
                                <div class="input-group mb-3">
                                    <label for="description" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 mb-2">Description</label>
                                    <textarea class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7" name="description" rows="3" required name="des"></textarea>
                                </div>
                                <div class="input-group mb-3">
                                    <label for="price" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Game Price</label>
                                    <input id="price" name="price" type="text" class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7" required>
                                </div>
                                <div class="input-group mb-3">
                                    <label for="image" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Game Image</label>
                                    <input id="image" name="image" type="file" class="form-control col-xl-9 col-lg-8 col-md-8 col-sm-7" required>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="ml-auto col-xl-8 col-lg-8 col-md-8 col-sm-7 pl-0">
                                    <button type="submit" class="btn btn-primary" name="sub">Add Game
                                    </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="jquery-ui-datepicker/jquery-ui.min.js"></script>
    <!-- https://jqueryui.com/download/ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
</body>

</html>
