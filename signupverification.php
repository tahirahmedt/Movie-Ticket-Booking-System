<?php
session_start();
?>
<?php
    $host="localhost";
    $dbuser="root";
    $password="";
    $dbname="movies";
    $conn=mysqli_connect($host,$dbuser,$password,$dbname);
    if(mysqli_connect_errno())
    {
        die("Connecttion Failed!! Check Whether apache is turned ON!!" . mysqli_connect_error());
    }
?>
<html>
    <head>
            <title>Sign up verification</title>
    </head>
    <body>
    </body>
</html
<?php function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<?php 
    if(isset($_POST['signup']))
    {
        $first=$_POST['fname'];
        $last=$_POST['lname'];
        $user=$_POST['uname'];
        $gender=$_POST['gen'];
        $mail=$_POST['emailid'];
        $phno=$_POST['phno'];
        $year=$_POST['Year'];
        $month=$_POST['Month'];
        $day=$_POST['Day'];
        if(checkdate($month,$day,$year))
        {
            echo "Invalid Date<br />";
        }
        $dob=$year.'/'.$month.'/'.$day;
        $password2=test_input($_POST['pass2']);
        $password1=test_input($_POST['pass1']);
        $user=test_input($user);
        if(empty($first)||empty($last)||empty($user)||empty($gender)||empty($mail)||empty($phno)||
            empty($year)||empty($month)||empty($day)||empty($password1)||empty($password2)){
            echo "Oops!! Cant leave any field blank<br/>"; 
        }
        else if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            echo "Invalid email "; 
        }
    
        
        else if(strlen($password1)<8||strlen($password2)<8){
            echo "Password Too short!!";
        }
        else if($password1!=$password2 ){
            echo "The passwords dont match!!<br/>";  
        }
        else if(!(strlen($phno)==10)){
            echo "enter a valid phone number<br/>";
        }
        else
        {
            $sql="SELECT username FROM customer where username=$user";
            $result=mysqli_query($conn,$sql);
            if($result=mysqli_query($conn,$sql))
            {
                $row=mysqli_num_rows($result);
                if($row>=1)
                    echo "The username already exists<br/>";
                
                mysqli_free_result($result);
            } 
            $_SESSION["username"]=$user;
            $password2=md5($password2);
            $sql2=" INSERT INTO customer(fname,lname,username,gender,email,phoneno,dateofbirth,password) ".
            "VALUES('$first' , '$last' , '$user' , '$gender' , '$mail' , '$phno' , '$dob' , '$password2' ) ";
            $res=mysqli_query($conn,$sql2);
            if(!$res)
            {
                die("Query Failed!!!<br />". mysqli_error($conn));
            }
            else
            {
                mysqli_close($conn);
                header('Location: welcome.php');
            }
        }
    }
    else{
        echo "Data Not submitted properly<br />";
    }
?>
<?php
    mysqli_close($conn);
?>