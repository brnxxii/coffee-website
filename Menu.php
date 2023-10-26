<?php
include_once "sqlconn.php";
session_start();
if(!isset($_SESSION["username"])){
	echo "<script>location.href'Login.html'</script>";
}
$category = "SELECT * FROM menu GROUP BY Category";
$category_run = mysqli_query($conn,$category);
$catcount = mysqli_num_rows($category_run);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="Menu.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
</head>
<body>
<div class="top">
      <img class="Logo" src="LOGOOOOO.png" alt="Logo" width="150" height="150">
      <p>Coffee Yarn?</p>
      <ul class="navcon">
          <li class="list"><a class="list" href="Main_Page.php">Home</a></li>
          <li class="list"><a class="list" href="Menu.php">Products</a></li>
          <li class="list"><a class="list" href="Contact.php">Contacts</a></li>
          <li class="list"><a  href="" class="bag"><img src="bag.png" alt="cart" width="35" height="35"></a></li>
          <li class="list"><a class="user" onclick="logout()"><img src="user.png" alt="user" width="35" height="35"></a></li>
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

<section class = "menu">
      <div class = "menu-container">
        <div class = "menu-head">
          <h2>Menu yarn?</h2>
          <p>Coffee now, palpitate later!</p>
        </div>
        <div class = "menu-btns">
        <?php
          while($catrow=mysqli_fetch_array($category_run)){
            $_SESSION['cat'] = $catrow['Category'];
            echo '<form action="Menu_list.php" method="post">';
            echo '<button name="catsubmit" class="menu-btn active-btn" value='.$_SESSION['cat'],' id="featured">'.$_SESSION['cat'],'</button>';
            echo '</form>';
        }
      ?>
      </div>
      </div>
    </section>
    
    <script src="Menu.js"></script>

</body>
</html>