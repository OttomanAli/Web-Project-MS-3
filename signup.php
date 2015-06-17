# Web-Project-MS-3
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
