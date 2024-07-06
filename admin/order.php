<?php
    session_start();
    error_reporting(0);
    include('connection.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order Page</title>
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
                                    <a class="nav-link" href="accessories.php">Accessories</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="games.php">Games</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link active" href="order.php">Order</a>
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
                                <h2 class="tm-block-title d-inline-block">Order</h2>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover table-striped tm-table-striped-even mt-3">
                                <thead>
                                    <tr class="tm-bg-gray">
                                        <th scope="col" class="text-center">Order No</th>
                                        <th scope="col" class="text-center">Product Name</th>
                                        <th scope="col" class="text-center">Price</th>
                                        <th scope="col" class="text-center">Name</th>
                                        <th scope="col" class="text-center">Email</th>
                                        <th scope="col" class="text-center">Address</th>
                                        <th scope="col">&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                         if($_GET['oid']) {
                                            $oid=$_GET['oid'];
                                    
                                            mysqli_query($con,"delete from orders where id ='$oid'");
                                            echo "<script>alert('Data Deleted');</script>";
                                            echo "<script>window.location.href='order.php'</script>";
                                        }
                                        $data=mysqli_query($con,"select * from orders");
                                        while ($row=mysqli_fetch_array($data)) {
                                    ?>
                                    <tr>
                                        <td class="text-center"><?php echo $row['order_no'];?></td>
                                        <td class="tm-product-name"><?php echo $row['pname'];?></td>
                                        <td class="text-center"><?php echo $row['price'];?></td>
                                        <td class="text-center"><?php echo $row['name'];?></td>
                                        <td><?php echo $row['email'];?></td>
                                        <td><?php echo $row['address'];?></td>
                                        <td><a href="order.php?oid=<?php echo $row['id'];?>">
                                            <i class="fas fa-trash-alt tm-trash-icon"></i></a></td>
                                    </tr>
                                    <?php } ?>
                                    
                                </tbody>
                            </table>
                        </div>

                    
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
</body>

</html>