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
    $cus=$_SESSION["username"];
    $query="SELECT * FROM customer where username='$cus'";
    $result=mysqli_query($conn,$query);
    if(!$result){
        die("Query Failed!!!". mysqli_error($conn));
    }
    if(empty($result))
        echo "Problem";
    $row=mysqli_fetch_assoc($result);
    $_SESSION["cusid"]=$row['customer_id'];
?>



<?php if(isset($_SESSION["username"]) && isset($_SESSION["cusid"] ) ):?>
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
        <link href="https://fonts.googleapis.com/css?family=Rancho" rel="stylesheet">        
    </head>
    
    <body style="background-color:#F9F3F2;">
        <div class="banner">
            <p style="font-family: Font;background-color:black;height:60px;text-align:left;margin:0px auto;
            font-size:50px;font-family: Font;color:#fff;padding:15px;">
                <b>www.GetTickets.com</b>
            </p>
            
        </div>
        
        
        <div class="outer-left">
            <div class="inner-left">
                <ul>
                    <li><a class="active" href="welcome.php">Home</a></li>
                    <li><a href="nowshowing-all.php">Now Showing</a></li>
                    <li><a href="#contact">Coming Soon</a></li>
                    <li><a href="#about">About Us</a></li>
                    <p style="float:right;"><?php echo $_SESSION["username"]; ?>  |   
                    <a href="homeapage.php" style="text-decoration:none;color:black;hover:lightblue;">Logout</a></p>
                </ul>
            </div>
            
        </div>
        
        <div class="outer-right">
            <div class="inner-right" style="background-color:#999999;">
                <b>Popular movies</b>
                <div class="slideshow-container">
                    <div class="mySlides fade">
                        <div class="numbertext"></div>
                            <img src="images/img3.jpg" style="width:100%">
                        <div class="text"></div>
                    </div>
                    
                    <div class="mySlides fade">
                        <div class="numbertext"></div>
                            <img src="images/img1.jpg" style="width:100%">
                        <div class="text"></div>
                    </div>

                    <div class="mySlides fade">
                        <div class="numbertext"></div>
                            <img src="images/img2.jpg" style="width:100%">
                        <div class="text"></div>
                    </div>

                    

                    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                    <a class="next" onclick="plusSlides(1)">&#10095;</a>
                </div>
                    <br>

                <div style="text-align:center">
                    <span class="dot" onclick="currentSlide(1)"></span> 
                    <span class="dot" onclick="currentSlide(2)"></span> 
                    <span class="dot" onclick="currentSlide(3)"></span> 
                </div>  
            
                <script>
                    var slideIndex = 1;
                    showSlides(slideIndex);

                    function plusSlides(n) {
                        showSlides(slideIndex += n);
                    }

                    function currentSlide(n) {
                        showSlides(slideIndex = n);
                    }

                    function showSlides(n) {
                        var i;
                        var slides = document.getElementsByClassName("mySlides");
                        var dots = document.getElementsByClassName("dot");
                        if (n > slides.length) {slideIndex = 1}
                        if (n < 1) {slideIndex = slides.length}
                        for (i = 0; i < slides.length; i++) {
                            slides[i].style.display = "none";
                        }
                        for (i = 0; i < dots.length; i++) {
                            dots[i].className = dots[i].className.replace(" active", "");
                        }
                        slides[slideIndex-1].style.display = "block";
                        dots[slideIndex-1].className += " active";
                }
                </script>
            </div>
        </div>
    </body>
    
</html>
<?php endif; ?>
<?php  if($_SESSION["username"]==""){
    header('Location:homeapage.php');
}    ?>
