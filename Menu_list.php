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
    <link rel="stylesheet" href="Menu_list.css">
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
        <div class = "food-items">
          <?php
          $category = $_POST['catsubmit'];
          $query = "SELECT * FROM menu WHERE Category = '$category'";
          $query_run = mysqli_query($conn,$query);
          $count = mysqli_num_rows($query_run);
          
          while($rows=mysqli_fetch_array($query_run)){
            $_SESSION["orderimg"] = $rows["Order_img"];
            $_SESSION["ordername"] = $rows["Order_name"];
            $_SESSION["price"] = $rows["Price"];
            $_SESSION["category"] = $rows["Category"];
            
            // item 
            echo '<div class = "food-item featured">';
            echo '<div class = "food-img">';
            echo '<img src = '.$_SESSION['orderimg'],' alt = "food image">';
            echo '</div>';
            echo '<div class = "food-content">';
            echo '<h2 class = "food-name">'.$_SESSION['ordername'],'</h2>';
            echo '<div class = "line"></div>';
            echo '<h3 class = "food-price">$'.$_SESSION['price'],'</h3>';
            echo '<ul class = "rating">';
            echo '<li><i class = "fas fa-star"></i></li>';
            echo '<li><i class = "fas fa-star"></i></li>';
            echo '<li><i class = "fas fa-star"></i></li>';
            echo  '<li><i class = "fas fa-star"></i></li>';
            echo   '<li><i class = "far fa-star"></i></li>';
            echo    '</ul>';
            echo    '<p class = "category">Category: <span>'.$_SESSION['category'],'</span></p>';
            echo   '<a href="" class="addtocart"><img src="bag.png" width="20" height="20"></a>';
            echo '</div>';
            echo '</div>';
            // end of item
          }
          ?>

          <!-- item -->
          <div class = "food-item category">
            <div class = "food-img">
              <img src = "JavaChip.jpg" alt = "food image">
            </div>
            <div class = "food-content">
              <h2 class = "food-name">Java Chip Frapuccino</h2>
              <div class = "line"></div>
              <h3 class = "food-price">$20.00</h3>
              <ul class = "rating">
                <li><i class = "fas fa-star"></i></li>
                <li><i class = "fas fa-star"></i></li>
                <li><i class = "fas fa-star"></i></li>
                <li><i class = "fas fa-star"></i></li>
                <li><i class = "far fa-star"></i></li>
              </ul>
              <p class = "category">Category: <span>Frappes</span></p>
              <a href="" class="addtocart"><img src="bag.png" width="20" height="20"></a>
            </div>
          </div>
          <!-- end of item -->

          <!-- item -->
          <div class = "food-item new-arrival">
            <div class = "food-img">
              <img src = "Blueberry.jpg" alt = "food image">
            </div>
            <div class = "food-content">
              <h2 class = "food-name">Blueberry Cheesecake</h2>
              <div class = "line"></div>
              <h3 class = "food-price">$35.00</h3>
              <ul class = "rating">
                <li><i class = "fas fa-star"></i></li>
                <li><i class = "fas fa-star"></i></li>
                <li><i class = "fas fa-star"></i></li>
                <li><i class = "fas fa-star"></i></li>
                <li><i class = "far fa-star"></i></li>
              </ul>
              <p class = "category">Category: <span>Desserts</span></p>
              <a href="" class="addtocart"><img src="bag.png" width="20" height="20"></a>
            </div>
          </div>
          <!-- end of item -->


          <!-- item -->
          <div class = "food-item today-special">
            <div class = "food-img">
              <img src = "Coffee Frappe.jpg" alt = "food image">
            </div>
            <div class = "food-content">
              <h2 class = "food-name">Coffee Frappucino</h2>
              <div class = "line"></div>
              <h3 class = "food-price">$15.00</h3>
              <ul class = "rating">
                <li><i class = "fas fa-star"></i></li>
                <li><i class = "fas fa-star"></i></li>
                <li><i class = "fas fa-star"></i></li>
                <li><i class = "fas fa-star"></i></li>
                <li><i class = "far fa-star"></i></li>
              </ul>
              <p class = "category">Category: <span>Frappes</span></p>
              <a href="" class="addtocart"><img src="bag.png" width="20" height="20"></a>
            </div>
          </div>
          <!-- end of item -->

          <!-- item -->
          <div class = "food-item new-arrival">
            <div class = "food-img">
              <img src = "Strawberry.jpg" alt = "food image">
            </div>
            <div class = "food-content">
              <h2 class = "food-name">Strawberry Cheesecake</h2>
              <div class = "line"></div>
              <h3 class = "food-price">$10.00</h3>
              <ul class = "rating">
                <li><i class = "fas fa-star"></i></li>
                <li><i class = "fas fa-star"></i></li>
                <li><i class = "fas fa-star"></i></li>
                <li><i class = "fas fa-star"></i></li>
                <li><i class = "far fa-star"></i></li>
              </ul>
              <p class = "category">Category: <span>Desserts</span></p>
              <a href="" class="addtocart"><img src="bag.png" width="20" height="20"></a>
            </div>
          </div>
          <!-- end of item -->

          <!-- item -->
          <div class = "food-item today-special">
            <div class = "food-img">
              <img src = "Mocha Frappe.jpg" alt = "food image">
            </div>
            <div class = "food-content">
              <h2 class = "food-name">Mocha Frappucino</h2>
              <div class = "line"></div>
              <h3 class = "food-price">$29.00</h3>
              <ul class = "rating">
                <li><i class = "fas fa-star"></i></li>
                <li><i class = "fas fa-star"></i></li>
                <li><i class = "fas fa-star"></i></li>
                <li><i class = "fas fa-star"></i></li>
                <li><i class = "far fa-star"></i></li>
              </ul>
              <p class = "category">Category: <span>Frappes</span></p>
              <a href="" class="addtocart"><img src="bag.png" width="20" height="20"></a>
            </div>
          </div>
          <!-- end of item -->

          <!-- item -->
          <div class = "food-item new-arrival">
            <div class = "food-img">
              <img src = "Apple Pie.jpg" alt = "food image">
            </div>
            <div class = "food-content">
              <h2 class = "food-name">Apple Pie</h2>
              <div class = "line"></div>
              <h3 class = "food-price">$35.00</h3>
              <ul class = "rating">
                <li><i class = "fas fa-star"></i></li>
                <li><i class = "fas fa-star"></i></li>
                <li><i class = "fas fa-star"></i></li>
                <li><i class = "fas fa-star"></i></li>
                <li><i class = "far fa-star"></i></li>
              </ul>
              <p class = "category">Category: <span>Desserts</span></p>
              <a href="" class="addtocart"><img src="bag.png" width="20" height="20"></a>
            </div>
          </div>
          <!-- end of item -->


          <!-- item -->
          <div class = "food-item today-special">
            <div class = "food-img">
              <img src = "Caramel Frappe.jpg" alt = "food image">
            </div>
            <div class = "food-content">
              <h2 class = "food-name">Caramel Frappucino</h2>
              <div class = "line"></div>
              <h3 class = "food-price">$5.00</h3>
              <ul class = "rating">
                <li><i class = "fas fa-star"></i></li>
                <li><i class = "fas fa-star"></i></li>
                <li><i class = "fas fa-star"></i></li>
                <li><i class = "fas fa-star"></i></li>
                <li><i class = "far fa-star"></i></li>
              </ul>
              <p class = "category">Category: <span>Frappes</span></p>
              <a href="" class="addtocart"><img src="bag.png" width="20" height="20"></a>
            </div>
          </div>
          <!-- end of item -->

          <!-- item -->
          <div class = "food-item new-arrival">
            <div class = "food-img">
              <img src = "Cinnamon Roll.jpg" alt = "food image">
            </div>
            <div class = "food-content">
              <h2 class = "food-name">Cinnamon Roll</h2>
              <div class = "line"></div>
              <h3 class = "food-price">$11.00</h3>
              <ul class = "rating">
                <li><i class = "fas fa-star"></i></li>
                <li><i class = "fas fa-star"></i></li>
                <li><i class = "fas fa-star"></i></li>
                <li><i class = "fas fa-star"></i></li>
                <li><i class = "far fa-star"></i></li>
              </ul>
              <p class = "category">Category: <span>Dessert</span></p>
              <a href="" class="addtocart"><img src="bag.png" width="20" height="20"></a>
            </div>
          </div>
          <!-- end of item -->

          <!-- item -->
          <div class = "food-item today-special">
            <div class = "food-img">
              <img src = "Caramel Frappe.jpg" alt = "food image">
            </div>
            <div class = "food-content">
              <h2 class = "food-name">Caramel Frappucino</h2>
              <div class = "line"></div>
              <h3 class = "food-price">$12.00</h3>
              <ul class = "rating">
                <li><i class = "fas fa-star"></i></li>
                <li><i class = "fas fa-star"></i></li>
                <li><i class = "fas fa-star"></i></li>
                <li><i class = "fas fa-star"></i></li>
                <li><i class = "far fa-star"></i></li>
              </ul>
              <p class = "category">Category: <span>Frappes</span></p>
              <a href="" class="addtocart"><img src="bag.png" width="20" height="20"></a>
            </div>
          </div>
          <!-- end of item -->

          <!-- item -->
          <div class = "food-item new-arrival">
            <div class = "food-img">
              <img src = "Cookies.jpg" alt = "food image">
            </div>
            <div class = "food-content">
              <h2 class = "food-name">Chocolate Chip Cookies</h2>
              <div class = "line"></div>
              <h3 class = "food-price">$14.00</h3>
              <ul class = "rating">
                <li><i class = "fas fa-star"></i></li>
                <li><i class = "fas fa-star"></i></li>
                <li><i class = "fas fa-star"></i></li>
                <li><i class = "fas fa-star"></i></li>
                <li><i class = "far fa-star"></i></li>
              </ul>
              <p class = "category">Category: <span>Desserts</span></p>
              <a href="" class="addtocart"><img src="bag.png" width="20" height="20"></a>
            </div>
          </div>
          <!-- end of item -->

          <!-- item -->
          <div class = "food-item today-special">
            <div class = "food-img">
              <img src = "Green Tea.jpg" alt = "food image">
            </div>
            <div class = "food-content">
              <h2 class = "food-name">Green Tea Frappucino</h2>
              <div class = "line"></div>
              <h3 class = "food-price">$7.00</h3>
              <ul class = "rating">
                <li><i class = "fas fa-star"></i></li>
                <li><i class = "fas fa-star"></i></li>
                <li><i class = "fas fa-star"></i></li>
                <li><i class = "fas fa-star"></i></li>
                <li><i class = "far fa-star"></i></li>
              </ul>
              <p class = "category">Category: <span>Frappes</span></p>
              <a href="" class="addtocart"><img src="bag.png" width="20" height="20"></a>
            </div>
          </div>
          <!-- end of item -->

          <!-- item -->
          <div class = "food-item new-arrival">
            <div class = "food-img">
              <img src = "Carrot Cake.jpg" alt = "food image">
            </div>
            <div class = "food-content">
              <h2 class = "food-name">Carrot Cake</h2>
              <div class = "line"></div>
              <h3 class = "food-price">$26.00</h3>
              <ul class = "rating">
                <li><i class = "fas fa-star"></i></li>
                <li><i class = "fas fa-star"></i></li>
                <li><i class = "fas fa-star"></i></li>
                <li><i class = "fas fa-star"></i></li>
                <li><i class = "far fa-star"></i></li>
              </ul>
              <p class = "category">Category: <span>Desserts</span></p>
              <a href="" class="addtocart"><img src="bag.png" width="20" height="20"></a>
            </div>
          </div>
          <!-- end of item -->
          <div class="background">
          </div>
        </div>
      </div>
    </section>
    
    <script src="Menu.js"></script>

</body>
</html>