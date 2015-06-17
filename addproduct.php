<?php
session_start();
    include_once("addproductphp.php");

      if(!isset($_SESSION["login_user"]))
      {
        header("Location: login.php");
        exit();
      }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Add Product</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/signin.css" rel="stylesheet">

    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>

    <script src="js/ie-emulation-modes-warning.js"></script>
  </head>

  <body>
    <nav class="navbar navbar-default"> 
        <div class="container-fluid">        
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
          
                    <li><a href=""></a></li>
                    <li><a href=""></a></li>
                    <li class="active"><a href="#">Home <span class="sr-only">(current)</span></a></li>
                    <li><a href="#">Categories</a></li>
                    <li><a href="#">Brands</a></li>
                    <li class="dropdown">
                       <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown <span class="caret"></span></a>

                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li class="divider"></li>
                            <li><a href="#">Separated link</a></li>
                            <li class="divider"></li>
                            <li><a href="#">One more separated link</a></li>
                        </ul>
                    </li>
                    <li><a href=""></a></li>
                    <li><a href=""></a></li>
                    <li><a href=""></a></li>

          
                </ul>
                <form class="navbar-form navbar-left" role="search">
                
                    <div class="form-group">
                        <input class="form-control" placeholder="Search" type="text">
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                
                </form>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#">View Your Cart</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">

      <form class="form-signin" action="addproduct.php" method="post">
        <h2 class="form-signin-heading">Add Product</h2>

        <input name="name" type="text" id="inputpname" class="form-control" placeholder="Product Name" required autofocus>

        <input name="companyname" type="text" id="inputcname" class="form-control" placeholder="Company Name" required >

        <input name="category" type="text" id="inputcategory" class="form-control" placeholder="Category" required >
        
        <input name="description" type="text" id="inputdes" class="form-control" placeholder="Description" required>

        <input name="price" type="text" id="inputprice" class="form-control" placeholder="Price" required>

        <input name="cost" type="text" id="inputcost" class="form-control" placeholder="Cost" required>

        <input name="units" type="text" id="inputunits" class="form-control" placeholder="Units" required>
        
        <input name="imgadd" type="text" id="inputimgadd" class="form-control" placeholder="Image Address" required >

        <input name="supplier" type="text" id="inputsup" class="form-control" placeholder="Supplier Address" required >

        <div class="checkbox">
          <label class="text-danger">
            <b>
              <?php echo "$error"?>
            </b>
          </label>
        </div>
        <button name="submit" value="1" class="btn btn-lg-2 btn-info pull-left" type="submit">Submit</button>
        <button name="reset" class="btn btn-lg-2 btn-default pull-left" type="reset">Re-set</button>
        <div>

        </div>  
        
      </form>

      

    </div> 


  </body>
</html>
