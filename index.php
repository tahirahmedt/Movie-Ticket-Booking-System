<?php
session_start();
?>
<?php $_SESSION["username"]="";   ?>
<!DOCTYPE html>
<html>
<head>
    <title>www.GetTickets.com</title>
	<link rel="stylesheet" type="text/css" href="styles/stylehome.css">
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Tangerine">
	<link href="https://fonts.googleapis.com/css?family=Nova+Flat" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=PT+Sans" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Cuprum" rel="stylesheet">
    <style type="text/css">
            @font-face {
                font-family: Font;
                src: url(fonts/Mywriting.ttf);
            }
    </style> 
</head>
<body style="background-color:#F9F3F2;">
	<div id="top">
            <img src="images/banner1.jpg" />
        </div>
	<div id="left">
		<p>
            <form action="https://www.google.co.in/search?q=">
                <input type="text" placeholder="Search Movies..."  name="q" value="" style="height:.6cm;width:6cm;"/>
                <input type="submit" value="Search" id="btn2" style="height:.8cm;" />
            </form>  
			<b><h2 style="font-size: 52px;font-family: 'Nova Flat', cursive;text-shadow: 4px 4px 4px #aaa;">www.GetTickets.com</h2></b>
			<h3 style="font-family: 'Tangerine', serif;font-size: 45px;color:green"><i>One stop solution to book your Movie tickets</i></h3>
		<p/>
	</div>
	<div id="right">
		<div class="inner">
			<form action="sign_in.php" method="get">
				Already have an account?
				<br />
				<br />
				<input type="submit" name="Sign_in" value="Sign in" color="blue" id="btn"/>
			</form>
			<br /><br /><br />
			<form action="sign_up.php" method="get">
				New user?<br/>
				Create a new account
				<br /><br />
				<input type="submit" name="Sign_up" value="Sign up" id="btn">
			</form>
		</div>
	</div>
</body>