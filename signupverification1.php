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
</html>
<?php
    if (isset($_POST['submit']))
    {
        $first=$_POST['fname'];
        $last=$_POST['lname'];
        $user=$_POST['uname'];
        $gender=$_POST['gender'];
        $mail=$_POST['emailid'];
        $phno=$_POST['phno'];
        $year=$_POST['Year'];
        $month=$_POST['Month'];
        $day=$_POST['Day'];
        $dob=$year.'/'.$month.'/'.$day;
        $password2=$_POST['pass2'];
        $password1=$_POST['pass1'];
        $sql1="SELECT username FROM customer where username=$user";
        $query1=mysqli_query($conn,$sql1);
        if(empty($first)||empty($last)||empty($user)||empty($gender)||empty($mail)||empty($phno)||empty($year)||empty($month)||empty($day)||empty($password))
        {
            echo "Oops!! Cant leave any field blank";
        }
        else if(strlen($password1)<8||strlen($password2)<8)
        {
            echo "Password lenght too short";
        }
        else if($password1!=$password2 )
        {
            echo "The passwords dont match!!";
        }
        else if(mysql_num_rows($query1)>=1)
        {
            echo "The username already exists";
        }
        else
        {
            $sql2="INSERT INTO customer(fname,lname,username,gender,email,phoneno,dateofbirth,password)".
            "VALUES('$first','$last','$user','$gender','$mail','$phno','$dob',$password2')";
            $res=mysqli_query($conn,$sql2);
            if(!$res)
            {
                die("Query Failed!!!". mysqli_error($conn));
            }
            else
            {
                echo "Data insertion successful";
            }
        }
    }
    else
    {
        echo "Data Not submitted properly";
    }
?>
<?php
    mysqli_close($conn);
?>