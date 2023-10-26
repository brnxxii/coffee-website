<?php
include_once "sqlconn.php";
session_start();
if(!isset($_SESSION["username"])){
	echo "<script>location.href'Login.html'</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="Main_page.css">
</head>
<body>
    <div class="top">
        <img class="Logo" src="LOGOOOOO.png" alt="Logo" width="150" height="150">
        <p>Coffee Yarn?</p>
    
        <ul class="navcon">
            <li><a href="Main_Page.php">Home</a></li>
            <li><a href="Menu.php">Products</a></li>
            <li><a href="Contact.php">Contacts</a></li>
            <a href="" class="bag"><img src="bag.png" alt="cart" width="35" height="35"></a>
            <a class="user" onclick="logout()"><img src="user.png" alt="user" width="35" height="35"></a>
        </ul>
         <script>
            function logout(){
                var x = document.getElementById('log');

                if(x.style.display == "none"){
                    x.style.display = "block";
                }
                else{
                    x.style.display = "none";
                }
            }
        </script>
</div>
<div id="log" class="logout">
<form action="Logout.php">
<a><span class="session"><?php echo "Hi, ".$_SESSION["fname"]; ?></span></a><br><br>
<a class="log" href="Login.html">logout</a></form></div>

<div class="main">
    <img class="slide" src="pexels-burst-373888.jpg" alt="" width="1920" height="1080">
    <img class="slide" src="pexels-cats-coming-365459.jpg" alt="" width="1920" height="1080">
    <img class="slide" src="pexels-chevanon-photography-302899.jpg" alt="" width="1920" height="1080">
</div>
<script>
    var myIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("slide");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}    
  x[myIndex-1].style.display = "block";  
  setTimeout(carousel, 5000);
}
</script>
<div class="head">
<div class="header"> 
    <h1>Coffee Yarn?</h1>
    <p class="cont">Experience the best and delicious coffee and desserts!</p>
    
</div></div>
<a class="orderbtn" href="Menu.html">Order Now!</a>

<div class="category">
    <div class="cell"></div>
    <div class="cell"></div>
    <div class="cell"></div>
</div>
<center>
<div class="parent">
    <h2>We get people saying</h2>
<div class="slider">
<div class="hehe">
    <img class="prof" src="pexels-adrienn-1542085.jpg" alt="" width="130" height="130">
    <p class="profname">NAME SAMPLE</p>
    <p class="revcon">"Sample Review Text"</p>
</div>
<div class="hehe">
    <img class="prof" src="pexels-pixabay-220453.jpg" alt="" width="130" height="130">
    <p class="profname">NAME SAMPLE</p>
    <p class="revcon">"Sample Review Text"</p>
</div>
<div class="hehe">
    <img class="prof" src="pexels-jasmin-chew-10990411.jpg" alt="" width="130" height="130">
    <p class="profname">NAME SAMPLE</p>
    <p class="revcon">"Sample Review Text"</p>
</div>
</div>
</div>
<script>
    var Index = 0;
slider();

function slider() {
  var i;
  var a = document.getElementsByClassName("hehe");
  for (i = 0; i < a.length; i++) {
    a[i].style.display = "none";  
  }
  Index++;
  if (Index > a.length) {Index = 1}    
  a[Index-1].style.display = "block";  
  setTimeout(slider, 10000);
}
</script>

    <hr>
<div class="cat">
    <a class="link" href="Main_Page.html">Home</a>
    <a class="link" href="">Products</a>
    <a class="link" href="">Contacts</a>
    <a class="link" href="">Cart</a>
</div>
<hr>



<footer>
        <div class="row1">
            <img src="LOGOOOOO.png" alt="" width="100" height="100">
            <p>Coffee Yarn?</p>
        </div>
        <div class="row2">
            <a class="fa fa-facebook" href=""></a>
            <a class="fa fa-twitter" href="" ></a>
            <a class="fa fa-instagram" href=""></a>
            <a class="fa fa-google" href=""></a>
            <a class="fa fa-youtube-play" href=""></a>
            <p>© 2021 Coffee Yarn? All Rights Reserved.</p>
        </div>
        <div class="row3">
            <h2>OUR LOCATION</h2>
            <p>San Pablo Laguna</p>
        </div>
        <div class="row3">
            <h2>Contact</h2>
            <p>+63975654325</p>
        </div>
        <div class="row3">
            <h2>Store Hours</h2>
            <p>10:00 AM - 8:00 PM</p>
        </div>
</footer>
</center>

</body>
</html>