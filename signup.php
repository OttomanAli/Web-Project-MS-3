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
