# Web-Project-MS-3
<?
session_start();
if(!isset($_SESSION["login_user"]))
{
	header("Location: login.php");
	exit();
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Home Page</title>
	
	<link href="style.css" rel="stylesheet" type="text/css">

</head>
<body>
<div class="profile">

	<p><b id="welcome">Welcome : <i><?php echo $_SESSION["login_user"]; ?></i> <br />
	Here Is Your Profie!!</b></p>

	<?php
		if(!mysql_connect('sql302.freeweb.pk','webpk_16320557','ps123456789')||!mysql_select_db('webpk_16320557_store'))
		{
					die('Could Not Connect');	
		}
		$username = $_SESSION["login_user"];
			$q = "SELECT * FROM profiles WHERE uID = '$username'";
			$query = mysql_query($q);
			
			$row = mysql_fetch_array($query);

				$userid = $row['uID'];
				$fname = $row['fName'];
				$gender = $row['gender'];
				$age = $row['age'];
				$city = $row['city'];
				$state = $row['state'];

	?>
		<table id="profiletable">
			<thead>
				<tr>
					<td class="p_td">User ID</td>
		            <td class="p_td">Full Name</td>
		            <td class="p_td">Gender</td>
		            <td class="p_td">Age</td>
		            <td class="p_td">City</td>
		            <td class="p_td">State</td>
				</tr>
			</thead>
		<?php	
			echo "
	        <tr>
	            <td class=\"p_td\">$username</td>
	            <td class=\"p_td\">$fname</td>
	            <td class=\"p_td\">$gender</td>
	            <td class=\"p_td\">$age</td>
	            <td class=\"p_td\">$city</td>
	            <td class=\"p_td\">$state</td>
	        </tr>
	        ";
	    ?>
		</table>
	<!-- <input type="text" name="fname" value='$fname'  /> -->
	<a href="logout.php"><button id="logout">Log Out</button></a>
</div>
</body>
</html>
