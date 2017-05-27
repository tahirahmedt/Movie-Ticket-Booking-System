<?php
session_start();
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
<?php

    $query="SELECT * FROM `movie` WHERE language='malayalam'";
    $result=mysqli_query($conn,$query);
    if(!$result){
        die("Query Failed!!!". mysqli_error($conn));
    }
    if(empty($result))
        echo "Problem";

?>





<?php if($_SESSION["username"]):?>
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
        <link rel="stylesheet" type="text/css" href="styles/custom.css">
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
                     <li ><a class="active" href="nowshowing-all.php">Now Showing</a></li>
                     <li ><a href="#contact">Coming Soon</a></li>
                     <li><a href="#about">About Us</a></li>
                     <p style="float:right;"><?php echo $_SESSION["username"]; ?>  |  <a href="homeapage.php" style="text-decoration:none;color:black;">Logout</a></p>
                </ul>
            </div>
            
        </div>
        
        <div class="outer-right">
            
            
               
                <div class="list" style="width:100%"; >
                    <ul style="float:left;background-color:black;color:white;text-align:center;">
                    
                        <li><a href="nowshowing-all.php" style="background-color:white;color:black;width:4cm;">All</a></li>
                        <li><a href="nowshowing-hindi.php" style="background-color:white;color:black;width:4cm;">Hindi</a></li>
                        <li><a href="nowshowing-kannada.php"  style="background-color:white;color:black;width:4cm;">Kannada</a></li>
                        <li><a href="nowshowing-malayalam.php" class="active" style="background-color:#FC0000;color:white;width:4cm;">Malayalam</a></li>
                        <li><a href="nowshowing-tamil.php" style="background-color:white;color:black;width:4cm;">Tamil</a></li>
                        <li><a href="nowshowing-telugu.php" style="background-color:white;color:black;width:4cm;">Telugu</a></li>
                    </ul>
                </div>
                
                
           
            <?php while($row=mysqli_fetch_assoc($result)): ?>    
             <div class="moviedisplay" style="border:3px solid black;position:relative;">   
                <?php 
                $image="images/movielist/".$row['image'] ;
                $mov=$row['movie_name'];
                $id=$row['movie_id'];
                ?>
                    
                    <div class="movieinfo">
                        <b id="1"> <?php        echo $row['movie_name']."(".$row['language'].")" ?></b>
                        <p class="display">
                            <span>Release Date : </span><?php        echo $row['release_date'] ?><br/>
                            <span>Genre : </span><?php        echo $row['genre'] ?><br/>
                            <span>Runtime : </span><?php        echo $row['runtime'] ?><br/>
                            <span>Director : </span><?php        echo $row['director'] ?><br/>
                            <span>Cast : </span><?php        echo $row['cast1']." ".$row['cast2']." ".$row['cast3'] ?><br/>
                            <span>Plot/Summary : </span><?php        echo $row['plot_summary'] ?><br/>
                        </p>
                        
                        
                        
                        <form action="booking.php" method="POST">
                            <center><input type="submit"  class="book-button" value="Book" name="book" >
                            <input type="hidden" name="book" value="<?php echo $mov ?>">
                             <input type="hidden" name="id" value="<?php echo $id ?>"></center>
                        </form>
                    </div>
                    <div class="moviepic">  
                        <center>
                            <img  src="<?php echo $image ?> " />   
                        </center>
                    </div>
                    
            </div>    
                
                <?php endwhile; ?>
                
               <!-- <div class="movieinfo" >
                    <p>Ae dil hai mushkil</p>
                </div>

             
                
                <div class="moviepic">  
                    <center>
                    <img  src="images/movielist/movie1.jpg" />   
                    </center>
                    
                </div>-->
                
                
            
        </div>
    </body>
</html>
<?php endif; ?>
<?php  if($_SESSION["username"]==""){
    header('Location:homeapage.php');
}    ?>
