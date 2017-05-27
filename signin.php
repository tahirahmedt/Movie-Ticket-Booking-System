<!DOCTYPE html>
<html>
<head>
	<title>Sign in</title>
    <link rel="stylesheet" type="text/css" href="styles/sign_in.css">
	<link href="https://fonts.googleapis.com/css?family=Ubuntu+Condensed" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Cuprum" rel="stylesheet">
	<style type="text/css">

	</style>
</head>
<body style="background-color:#F9F3F2;">

	<div id="top">
		<img src="images/banner1.jpg" />
	</div>
	<div>
	<center>
        <p style="font-family: 'Roboto Slab', serif;font-size:30px;">Login</p>
		<form action="sigin_verify.php" method="POST">
			<table  id="table"  cellpadding="10" cellspacing="10">
				<tr></tr>
				<tr></tr>
				<tr>
					<th>Username:</th>
					<th><input type="text" placeholder="Username" style="height:.8cm;"></th>
				</tr>
				<tr></tr>
				<tr>
					<th>Password:</th>
					<th><input type="password" placeholder="Type in your password" style="height:.8cm;"></th>
				</tr>
				<tr></tr>				
				<tr>
					<th><input type="checkbox"></th>
					<th>Keep logged in</th>
				</tr>
				<tr>
					<th></th>
					<th><input type="submit" name="login" value="Login" id="btn"></th>
				</tr>
				<tr></tr>
				<tr></tr>
			</table>
			
		</form>
	</center>
	</div>

<html/>