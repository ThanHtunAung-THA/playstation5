<?php
session_start();
error_reporting(0);
include('connection.php');

if (strlen($_SESSION['aid'])==0) {
    header('location:login.php');
} else {
    if($_GET['pid']) {
        $pid=$_GET['pid'];

        mysqli_query($con,"delete from accessory where id ='$pid'");
        echo "<script>alert('Data Deleted');</script>";
        echo "<script>window.location.href='accessories.php'</script>";
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View Accessories Page</title>
    <!--

    Template 2108 Dashboard

	http://www.tooplate.com/view/2108-dashboard

    -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600">
    <!-- https://fonts.google.com/specimen/Open+Sans -->
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="css/tooplate.css">
</head>

<body id="reportsPage" class="bg02">
    <div class="" id="home">
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
                                    <a class="nav-link active" href="accessories.php">Accessories</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="games.php">Games</a>
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
            <div class="row tm-content-row tm-mt-big">
                <div class="col-xl-12 col-lg-12 tm-md-12 tm-sm-12 tm-col">
                    <div class="bg-white tm-block h-100">
                        <div class="row">
                            <div class="col-md-8 col-sm-12">
                                <h2 class="tm-block-title d-inline-block">Accessories</h2>

                            </div>
                            <div class="col-md-4 col-sm-12 text-right">
                                <a href="add-accessory.php" class="btn btn-small btn-primary">Add New Accessory</a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover table-striped tm-table-striped-even mt-3">
                                <thead>
                                    <tr class="tm-bg-gray">
                                        <th scope="col" class="text-center">No.</th>
                                        <th scope="col" class="text-center">Image</th>
                                        <th scope="col" class="text-center">Accessories Name</th>
                                        <th scope="col" class="text-center">Description</th>
                                        <th scope="col" class="text-center">Price</th>
                                        <th scope="col">&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $ret=mysqli_query($con,"select * from accessory");
                                        $cnt=1;

                                        while ($row=mysqli_fetch_array($ret)) {
                                        ?>
                                            <tr>
                                                <td class="text-center"><?php echo $cnt; ?></td>
                                                <td class="text-center"><img src="img/<?php echo $row['image']?>" width="100" height="100"/></td>
                                                <td class="text-center tm-product-name"><?php  echo $row['name'];?></td>
                                                <td class="text-center des-text"><?php  echo $row['description'];?></td>
                                                <td class="text-center"><?php  echo $row['price'];?></td>
                                                <td class="text-center">
                                                <a href="edit-accessory.php?editid=<?php echo $row['id'];?>" class="btn btn-primary link-view">Edit</a>

                                                <a href="accessories.php?pid=<?php echo $row['id'];?>" class="btn btn-danger" onClick="return confirm('Are you sure you want to delete?')">Delete</a>
                                                </td>
                                            </tr>
                                            <?php 
                                            $cnt=$cnt+1;
                                    }?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php }; ?>
    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
    <script>
        $(function () {
            $('.tm-product-name').on('click', function () {
                window.location.href = "edit-accessory.php";
            });
        })
    </script>
</body>

</html>
