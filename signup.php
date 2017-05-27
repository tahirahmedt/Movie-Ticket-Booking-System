 <!DOCTYPE html>
<html>
<head>
	<title>Sign up</title>
	<link rel="stylesheet" type="text/css" href="styles/stylehome.css">
	<link href="https://fonts.googleapis.com/css?family=Ubuntu+Condensed" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Cuprum" rel="stylesheet">

</head>
<body style="background-color:#F9F3F2;">
	<div >
		<img src="images/banner1.jpg" />
	</div>
	<div id="mid">
		<center>
			<form>
				<table style="border: 3px solid black;border-radius:25px;background-color:#FEFEFE;text-align:left;font-family: 'Ubuntu Condensed', sans-serif;;" cellpadding="10" cellspacing="10">
					<tr>
					<th>First name:</th>
					<th><input type="text" name="fname" style="height:.8cm;width:6cm;"></th>
					</tr>
					<tr>
					<th>Last name:</th>
					<th><input type="text" name="lname" style="height:.8cm;width:6cm;"></th>
					</tr>
					<tr>
					<th>Password:</th>
					<th><input type="password" name="pass1" style="height:.8cm;width:6cm;"></th>
					</tr>
					<tr>
					<th>Retype Password:</th>
					<th><input type="password" name="pass2" style="height:.8cm;width:6cm;"></th>
					</tr>
					<tr>
					<th>Gender:</th>
					<th><input type="radio" name="gender" value="Male">Male <input type="radio" name="gender" value="Female">Female</th>
					</tr>
					<tr>
					<th>Email ID:</th>
					<th><input type="text" name="emailid" style="height:.8cm;width:6cm;"></th>
					</tr>
					<tr>
					<th>Phone Number:</th>
					<th><input type="text" name="phno" style="height:.8cm;width:6cm;"></th>
					</tr>
					<tr>
					<th><input type="checkbox"></th>
					<th>Agree To Terms & Conditions</th>
					</tr>
					<tr>
					<th></th>
					<th><input type="submit" name="login" value="Submit" id="btn"></th>
				</table>
			<form>
		</center>
	</div>
</body>
</html>