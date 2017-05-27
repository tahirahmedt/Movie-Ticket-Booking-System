<?php



/*include in all the docs at the beginiing using include() or require() functions*/
    $host="localhost";
    $dbuser="root";
    $password="";
    $dbname="movies";
    $conn=mysqli_connect($host,$dbuser,$password,$dbname);
    if(mysqli_connect_errno())
    {
        die("Connecttion Failed!! Check Whether apache is turned ON!!" . mysqli_connect_error());
    }
    {
       //echo "connected";
    }
 
?>

<html>
    <head>
        <title>Connecting</title>
    </head>
    <body>
    </body>
</html>

