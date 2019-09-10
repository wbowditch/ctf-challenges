<html>
<head>
  <title>
    PPower+2 Control
  </title>
  <style>
.center {
	margin: auto;
	width: 50%;
	fill: red;
	border: 3px solid black;
	padding: 10px;
	background-color: lightblue;
}

.button {
  background-color: red; /* not Green */
  border: 1px solid black;;
  border-radius: 5px;
  color: black;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
}

.row:after {
	content: "";
	display: table;
	clear: both;
}

progress {
	border: 2px solid black;
	width: 250px;
	height: 60px;
	background: crimson;
}

progress{
	color: red;
}

progress::-webkit-progress-value {
	background: lightblue;
}

progress::-moz-progress-bar {
	background: lightcolor;
}

progress::-webkit-progress-value {
	background: linear-gradient(to left, red, yellow);
}

progress::-webkit-progress-bar {
	background: white;
}
  </style>
</head>
<body background="images/powerPlant.jpg">
  <div align="center">
    <h1>PPower+ Control System</h1>
    </div>
    <div class="center">
    <div class="row">
        <div class="column">
        <form id="myform" action="" method="POST" hidden>
          Command: <input type="text" name="amount">
          <input type="submit" value="sumbit">
        </form>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL); 
include("key.php");
session_name("system");
session_start();

if(isset($_SESSION["amount"])){
	$final_amount = $_SESSION["amount"]; // The amount we are aiming for
	//print("<br>Current amount " . $final_amount . "<br>");
}
else{
	$_SESSION["amount"] = 0;
	writeToken(2000);
	die("<center><button class='button' onclick=window.location.reload()>Click Here to get started</button><center>");
}

print("<script>document.getElementById('myform').hidden = false;</script>");
print("<div class='target'>Maximum Temperature: " . $total . "</div>");
if(isset($_COOKIE["token"])){
	$user_amount = verifyToken($_COOKIE["token"]);
}
else{
	$user_amount = 0;
}

if(isset($_POST["amount"])){
	$amount = $_POST["amount"]; //Amount to be transfered
	//print("User amount = " . $user_amount);
	//print("Amount = " . $amount);
	if((($user_amount - $amount) < 0)||($amount < 0)){
		print("<br>Cannot transfer that amount");
		die();
	}
}
else{
	$amount = 0;
}

$_SESSION["amount"] = $final_amount + $amount;
print("<br><div class='amount'>Current Temperature: " . $_SESSION["amount"] . "<br><progress id='progress' value='" . $_SESSION["amount"] . "' max=50000></progress></div>");

writeToken($user_amount - $amount);
print("<br><div class='balance'>Temperature Allowance: " . ($user_amount - $amount) . "</div>");

if(($final_amount + $amount) >= $total){
	header("Location: 8ed429600068c0a224ec9928c9972cf7.php");
}
?>
	</div>
      </div>
    </div>
  </div>
</body>
</html>
