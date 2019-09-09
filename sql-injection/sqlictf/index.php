<?php
ob_start();
include("db_config.php");
ini_set('display_errors', 1);
?>



<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Bank of North Korea</title>

    <link href="./css/htmlstyles.css" rel="stylesheet">
	</head>

  <body>
  <div class="container-narrow">
		
		<div class="jumbotron">
			<p class="lead"><h2 style="color:white">
				Bank of North Korea
			</p>
        </div>
		
		<div class="searchheader">
			<p class="lead" style="color:black">
				Fetch the flag by logging in as the user with with admin privledges (is_admin is set to 'yes')
				
			</p>
        </div>
		
		<div class="response">
		<form method="POST" autocomplete="off">
			<p style="color:white">
				Username:  <input type="text" id="uid" name="uid" value="trump"><br /></br />
				Password: <input type="password" id="password" name="password">
			</p>
			<br />
			<p>
			<input type="submit" value="Submit"/> 
			<input type="reset" value="Reset"/>
			</p>
		</form>
        </div>
    
        
		<br />

<?php

if (!empty($_REQUEST['uid'])) {
session_start();
$username = ($_REQUEST['uid']);
$pass = $_REQUEST['password'];
//echo md5($pass)."<br />";

$q = "SELECT * FROM users where username='".$username."' AND (password = '".md5($pass)."')" ;//echo $q;
echo "<script>console.log('hint hint: " . $q . "' );</script>";

	if (!mysqli_query($con,$q))
	{
		die('Error: ' . mysqli_error($con));
	}
	
	$e = mysqli_get_warnings($con);
	if ($e){
	do { 
		echo "Warning: $e->errno: $e->message<br />"; 
	} while ($e->next()); }
	
	$result = mysqli_query($con,$q);
	$row = mysqli_fetch_array($result);
	
	if ($row){
	//$_SESSION["id"] = $row[0];
	$_SESSION["username"] = $row[1];
	$_SESSION["name"] = $row[3];
	//ob_clean();
	header('Location:home.php?user='.$row[1]);
	}
	else{
		echo "<font style=\"color:#FF0000\">Invalid password!</font\>";
	}
}
//}
?>

	
	  
	  <div class="footer">
		<p>Will Bowditch | @thickbill | will@enusec.org</p>
      </div>

	</div> <!-- /container -->
  
</body>
</html>