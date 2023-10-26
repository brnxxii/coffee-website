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
            <li><a href="Contact.html">Contacts</a></li>
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
<a class="log" href="Login.html">logout</a></form></div><br>
<center>
<div class="conhead">
    <h3>CONTACTS</h3>
</div>
<div class="Contacts">
<div class="map-responsive" id="map">
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3870.144584680249!2d121.31194811508672!3d14.06863819014306!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33bd5d476219b2e5%3A0xf15927b3cdf39236!2sCaf%C3%A9Landia!5e0!3m2!1sen!2sph!4v1646015851052!5m2!1sen!2sph" 
width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
</div>

<div class="touchmemoredaddy">
    <h3>Get in Touch</h3>

<div class="getintouch">
<p class="indication"></p>
<input type="text" class="name" name="firstname" placeholder="Name*">
<p class="indication"></p>
<input type="text" class="email" name="lastname" placeholder="Email*">
<p class="indication"></p>
<input type="text" class="phone" name="username" placeholder="Phone">
<p class="indication"></p>
<textarea contenteditable="true" type="text" class="msg" name="email" placeholder="Message*"></textarea>
<br>
<button class="submitbtn">SEND MESSAGE</button>
</div>
</div></div>

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