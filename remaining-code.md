# Web-Project-MS-3
#####################################signup.php################
<?php
  include("signupphp.php");


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sign Up</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/signin.css" rel="stylesheet">

    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>

    <script src="js/ie-emulation-modes-warning.js"></script>
  </head>

  <body>

    <div class="container">

      <form class="form-signin" method="post">
        <h2 class="form-signin-heading">Sign Up</h2>

        <input name="name" type="text" id="inputPassword" class="form-control" placeholder="Full Name" required autofocus>

        <input name="username" type="text" id="inputusername" class="form-control" placeholder="User Name" required >

        <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
        
        <input name="confirm" type="password" id="inputusername" class="form-control" placeholder="Confirm Password" required >
        
        <label class="col-lg-2 control-label">Gender</label>
      <div class="col-lg-10">
        <div class="radio">
          <label>
            <input name="gender" id="optionsRadios1" value="male" checked="" type="radio">
            Male
          </label>
        </div>
        <div class="radio">
          <label>
            <input name="gender" id="optionsRadios2" value="female" type="radio">
            Female
          </label>
        </div>
      </div>

        <input name="age" type="text" id="inputusername" class="form-control" placeholder="Age" maxlength="2" required >
        
        <input name="city" type="text" id="inputPassword" class="form-control" placeholder="City" required>

        <input name="state" type="text" id="inputPassword" class="form-control" placeholder="State" required>
        
        <div class="checkbox">
          <label class="text-danger">
            <b>
              <?php echo "$error"?>
            </b>
          </label>
        </div>
        <button name="submit" class="btn btn-lg-2 btn-info pull-left" type="submit">SignUp</button>
        <button name="reset" class="btn btn-lg-2 btn-default pull-left" type="reset">Re-set</button>
        <div>

        </div>  
        
      </form>

      

    </div> 


  </body>
</html>

#####################################################signupphp.php##############################
<?php
	
	$error = "";
	

	if(isset($_POST["submit"]))
	{
		
		if( empty($_POST["name"]) || empty($_POST["username"]) || empty($_POST["password"]) || empty($_POST["age"]) || empty($_POST["gender"]) || empty($_POST["city"]) || empty($_POST["state"])) 
		{
			$error = "Fill All Fields!";	
		}
		else if ($_POST["confirm"] != $_POST["password"]) {
			$error = "Passwords Do not Match!";
		}
		else if (!(is_numeric($_POST["age"]))) {
			$error = "Enter the Correct(Integer) Age in Years";
		}
		else 
		{
			$fname = $_POST["name"]; 
			$username = $_POST["username"]; 
			$password = $_POST["password"];
			$confirm = $_POST["confirm"];
			$age = $_POST["age"];
			$gender = $_POST["gender"];
			$city = $_POST["city"];
			$state = $_POST["state"];
			

			
			
			if(!mysql_connect('sql302.freeweb.pk','webpk_16320557','ps123456789')||!mysql_select_db('webpk_16320557_store'))
			{
				die('Could Not Connect');	
			}

			$search = "SELECT * FROM login WHERE userID = '$username'";
			$qSearch = mysql_query($search); 

			if(mysql_num_rows($qSearch)==0){

				$q = "INSERT INTO login (userID, password, rank)VALUES ('$username', '$password', 'user')";
				$query = mysql_query($q);

				
				$q1 = "INSERT INTO profiles (uid, fName, gender, age, city, state)VALUES ( '$username', '$fname' , '$gender', '$age', '$city', '$state')";
				$query1 = mysql_query($q1);

				if($query && $query1){ 
					$error = "Enter Successfully!!";
					session_start();
					$_SESSION["login_user"] = $username;
					
						header('Location: profile.php');
						die();
				}
				else{
					$error = "Query Didn't Run!";
				} 
			}
			else {
				$error = "Please Select Another User Name <br > UserName is Already Taken!";
				
			}
		}
	}
	
?>
######################################################addproduct.php###############################
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
##############################################addproductphp.php###############################
<?php

 	$error = "";
	
	if(isset($_POST["submit"]))
	{
		
		if( empty($_POST["name"]) || empty($_POST["companyname"]) || empty($_POST["category"]) || empty($_POST["description"]) || empty($_POST["price"]) || empty($_POST["cost"]) || empty($_POST["units"]) || empty($_POST["imgadd"]) || empty($_POST["supplier"])) 
		{
			?>
			$error = "Fill All Fields!";	
			<?php
		}
		else 
		{
			
			$name = $_POST["name"]; 
			$cname = $_POST["companyname"]; 
			$category = $_POST["category"];
			$description = $_POST["description"];
			$price = $_POST["price"];
			$cost = $_POST["cost"];
			$units = $_POST["units"];
			$imgadd = $_POST["imgadd"];
			$supplier = $_POST["supplier"];
			
			
			if(!mysql_connect('sql302.freeweb.pk','webpk_16320557','ps123456789')||!mysql_select_db('webpk_16320557_store'))
			{
				die('Could Not Connect');	
			}
			
			$q1 = "SELECT MAX(pid) AS max FROM products";
			$res = mysql_query($q1);

			while($row = mysql_fetch_array($res)) {
				$maxid = $row['max'];
				
			}
			
			$maxid = $maxid+1;
			

			$q = "INSERT INTO products (pid, name, cname, category, description, price, cost, units, imgAdd, supplier)VALUES('$maxid', '$name', '$cname', '$category', '$description', '$price', '$cost', '$units','$imgadd', '$supplier')";

			$query = mysql_query($q);

			if($query){ 
				$error = "Successfully Entered the Product!";
			}
			else
			{
				$error = "Failed to Entered the Product!";
			} 			
		}
	}

?>
