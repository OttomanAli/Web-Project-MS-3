<?php
     
     
    // session_start();
    // if(!isset($_SESSION["login_user"]))
    // {
    //  header("Location: login.php");
    //  exit();
    // }   

    if(isset($_GET["q"])){
        $id = $_GET["q"];

        if(!mysql_connect('sql302.freeweb.pk','webpk_16320557','ps123456789')||!mysql_select_db('webpk_16320557_store'))
        {
            die('Could Not Connect');   
        }

        $query = "SELECT * FROM products WHERE pid='$id'";
        $result = mysql_query($query);

        $row = mysql_fetch_array($result);
            $id = $row["pid"];
            $name = $row["name"];
            $cate = $row["category"];
            $vendor = $row["cname"];
            $des = $row["description"];
            $price = $row["price"];          
            $img = $row["imgAdd"];
    }





?>




<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title><?php echo $name;?></title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/modern-business.css" rel="stylesheet">

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">E-Store</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <form class="navbar-form navbar-left" role="search" method="POST" action="products.php">
                            <div class="form-group">
                                <input name="toSearch" type="text" class="form-control" placeholder="Search">
                            </div>
                            <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                        </form>
                        
                    </li>
                    <li>
                        <a href="index.php">HOME</a>
                    </li>

                    <li class="dropdown active">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Categories <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="products.php?q=Mobile">Mobile</a>
                            </li>
                            <li>
                                <a href="products.php?q=Laptop">Laptop</a>
                            </li>
                            <li>
                                <a href="products.php?q=Tablet">Tablets</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Blog <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="blog-home-1.html">Blog Home 1</a>
                            </li>
                            <li>
                                <a href="blog-home-2.html">Blog Home 2</a>
                            </li>
                            <li>
                                <a href="blog-post.html">Blog Post</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Price Range<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="products.php?p=1"><5000</a>
                            </li>
                            <li>
                                <a href="products.php?p=2">5001-10,000</a>
                            </li>
                            <li>
                                <a href="products.php?p=3">10,001-15,000</a>
                            </li>
                            <li>
                                <a href="products.php?p=4">15,001-20,000</a>
                            </li>
                            <li>
                                <a href="products.php?p=5">20,000+</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">View Cart</a>
                    </li>
                    <li>
                        <a href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><?php echo $name; ?>

                </h1>
            </div>
        </div>
        <!-- /.row -->

        <!-- Portfolio Item Row -->
        <div class="row">

            <div class="col-md-5">
                
                    <ol class="carousel-indicators">
                        <li class="active"></li>
                    </ol>

                    <!-- Wrapper for slides -->
                    <div >
                        <div class="item active">
                            <img class="img-responsive" src="<?php echo $img; ?>" alt="">
                        </div>
                    </div>
                
            </div>

            <div class="col-md-7">
                <h3><?php echo $name;?></h3>
                <h3>Details</h3>
                <ul>
                    <li><?php echo $price;?><sup>PKR</sup></li>
                    <li><?php echo $vendor;?></li>
                    <li><?php echo $cate;?></li>
                </ul>
                <p><?php echo $des;?></p>
            </div>

        </div>
        <!-- /.row -->

        <?php 
        $query = "SELECT pid, name, price, imgAdd 
                  FROM products 
                  WHERE price<'$price'+5000 and category= '$cate' 
                  ORDER BY price DESC
                  LIMIT 5";
        $result = mysql_query($query);

        ?>

        <!-- Related Projects Row -->
        <div class="row">

            <div class="col-lg-12">
                <h3 class="page-header">Related Products</h3>
            </div>
            <?php 
            while ($row = mysql_fetch_array($result)) {
                $sid = $row["pid"];
                $sname = $row["name"];
                $sprice = $row["price"];          
                $simg = $row["imgAdd"];
                
                if($sid!=$id){
            ?>
            <div class="col-sm-3 col-xs-6">
                <a href="<?php echo "product.php?q=$sid"; ?>">
                    <img class="img-responsive img-hover img-related" src="<?php echo $simg; ?>" alt="">
                    <p><?php echo "$sname"; ?></p>
                </a>
                    <h4><?php echo "$sprice"; ?><sup>PKR</sup></h4>


            </div>
            <?php 
                }
            }
            ?>
        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Reserved 2015</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
