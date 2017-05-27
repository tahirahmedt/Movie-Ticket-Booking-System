<?php
session_start();
?>
<?php  
$_SESSION["movie_name"]=$_POST['book'];
$_SESSION["movie_id"]=$_POST['id'];
?>
<?php 
    ini_set('max_execution_time', 300);
    $host="localhost";
    $dbuser="root";
    $password="";
    $dbname="movies";
    $conn=mysqli_connect($host,$dbuser,$password,$dbname);
    if(mysqli_connect_errno())
    {
        die("Connecttion Failed!! Check Whether apache is turned ON!!" . mysqli_connect_error());
    }
    else{
       //echo "connected";
    }
?>


<?php if( isset($_SESSION["username"]) && isset($_SESSION["movie_name"]) ):?>
<!DOCTYPE html>
<html>
    <head>
        <title>www.GetTickets.com</title>
        <style type="text/css">
            @font-face {
                font-family: Font;
                src: url(fonts/Mywriting.ttf);
            }
        </style>
        <link rel="stylesheet" type="text/css" href="styles/afterlogin.css">
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Chewy" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Prociono|Ubuntu" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="styles/booking.css">
    </head>
    
    <body style="background-color:#999999;">
       <div class="banner">
            <p style="font-family: Font;background-color:black;height:60px;text-align:left;margin:0px auto;
            font-size:50px;font-family: Font;color:#fff;padding:15px;width:1303px;">
                <b>www.GetTickets.com</b>
            </p>
       </div>
        <div class="outer-left">
            <div class="inner-left">
                <ul >
                    <li ><a href="welcome.php">Home</a></li>
                     <li ><a href="nowshowing-all.php">Now Showing</a></li>
                     <li ><a href="#contact">Coming Soon</a></li>
                     <li><a href="#about">About Us</a></li>
                     <p style="float:right;"><?php echo $_SESSION["username"]; ?>  |  <a href="homeapage.php" style="text-decoration:none;color:black;">Logout</a></p>
                </ul>
            </div>
            
        </div>
        <div class="outer-right">
            <center>
                <div class="container">
                    <div class="movie-title">
                        <?php
                            $movie=$_SESSION['movie_name'];
                            $query="SELECT * FROM movie where movie_name='$movie'";
                            $result=mysqli_query($conn,$query);
                            if(!$result){
                                die("Query Failed!!!". mysqli_error($conn));
                            }
                            if(empty($result))
                                echo "Problem";
                            
                        ?>
                        <div class="title">
                            <p>
                                <?php   
                                    $row=mysqli_fetch_assoc($result);$_SESSION["movieid"]=$row["movie_id"];
                                    echo $movie."( ".$row['language']." )"
                                ?>
                            </p>
                        </div>
                    </div>    
                    <?php
                        $query2="Select c.cinema_name,c.address from movie m,screens s, cinema c where m.movie_id=s.movie_id 
                        and s.cinema_id=c.cinema_id and m.movie_name='$movie'";
                        $res=mysqli_query($conn,$query2);
                        if(!$res)
                            die("Query Failed!!!". mysqli_error($conn));
                        if(empty($result))
                            echo "Problem";
                    ?>   
                    <div class="cinema-list">
                        <ul>
                            <?php while($r=mysqli_fetch_assoc($res)): ?>
                                <li>
                                    <a href="progress.php?cine=<?php echo $r['cinema_name'];  ?>">
                                        <p class="display-cinema-name" >
                                            <?php echo $r['cinema_name'] ;  ?>
                                        </p>  
                                    </a>        
                                        <p class="display-cinema-address">
                                            <?php echo $r['address']; ?> 
                                        </p>
                                </li>        
                            <?php endwhile; ?>
                        </ul>
                    </div>
                </div>
            </center>
        </div>
    </body>
</html>
<?php endif; ?>
<?php  if($_SESSION["username"]==""){
    header('Location:homeapage.php');
}    