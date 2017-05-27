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
<?php
    if (isset($_POST['login']))
    {
        $user=$_POST['user'];
        $pass=$_POST['pass'];
        if(empty($user)||empty($pass) )
        {
            echo "Oops!! Cant leave any field blank";
        }
        else
        {
            $pass=md5($pass);
            $sql="SELECT username, password FROM customer WHERE username='$user' AND password='$pass' ";
            if($res=mysqli_query($conn,$sql))
            {
                $row=mysqli_num_rows($res);
                if($row==1)
                {   
                    $_SESSION["username"]=$user;
                    mysqli_free_result($res);
                    mysqli_close($conn);
                    header('Location: welcome.php');
                }
                else
                {
                     header('Location: wronguserpass.php');
                   
                }
            }
            else
            {
               die("Error in connection!!" . mysqli_connect_error()); 
            }
        }
    }
    else
    {
        echo "Not pressed";
    
    }
?>
<?php
    mysqli_close($conn);
?>