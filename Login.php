<?php

include_once 'sqlconn.php';

session_start();

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $username=$_POST['username'];
    $password=$_POST['password'];
    $sql = "SELECT * FROM account_tbl WHERE username = '$username' and password = '$password'";
    $run_query = mysqli_query($conn,$sql);
	$count = mysqli_num_rows($run_query);
    
    if($count === 0){
        $nan = "Invalid Username and Password!";
    }
   else if ($count ===1){
       $row = mysqli_fetch_array($run_query);
       $_SESSION["fname"] = $row["firstname"];
        $_SESSION["username"] = $row["username"];
        header('location: Main_Page.php');
   }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Login.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <script>
        function validateForm() {
          var a = document.forms["Form"]["username"].value;
          var b = document.forms["Form"]["password"].value;
          if (a == null || a == "", b == null || b == "") {
            document.getElementById('error').innerHTML="Input Username and Password First!"
            return false;
          }
        }
      </script>
</head>
<body>
    <center>
        <div class="logbox">
                <h1>Log In</h1>
                <h1>Hatnog</h1><br><br>
                <p class="error"><?php echo $nan ?></p>
                <form name="Form" action="Login.php" method="POST" onsubmit="return validateForm()">
                <p>Username: </p>
                <input type="text" name="username" class="email1"><br><br><br><br>
                <p>Password: </p>
                <input type="password" name="password" id="pass" class="pass">
                <i class="tog bi bi-eye-slash" id="togglePassword" >
                <script> const togglePassword = document.querySelector("#togglePassword");
                  const password = document.querySelector("#pass");
          
                  togglePassword.addEventListener("click", function () {
                      // toggle the type attribute
                      const type = password.getAttribute("type") === "password" ? "text" : "password";
                      password.setAttribute("type", type);
                      
                      // toggle the icon
                      this.classList.toggle("bi-eye");
                  });
                  </script>
                </i><br><br><br><br><br>

                <button name="login">Login</button>
            </form>

                <div class="sign-up">
                    <p class="sign-up">Don't have an account? <span><a href="Signup.html">Sign Up!</a></span></p>
                </div>
        </div>
</center>
</body>
</html>
