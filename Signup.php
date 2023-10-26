<?php

include_once 'sqlconn.php';
	if ($conn->connect_error) 
		{
			die("Connection failed: " . $conn->connect_error);
		} 

	$sql = "INSERT INTO account_tbl VALUES ('".$_POST["fname"]."','".$_POST["lname"]."',
			'".$_POST["Uname"]."','".$_POST["email"]."','".$_POST["pass"]."')";

    $username = mysqli_real_escape_string($conn, $_POST["Uname"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $check_duplicate_username = "SELECT username FROM account_tbl WHERE username = '$username'";
    $check_duplicate_email = "SELECT email FROM account_tbl WHERE email = '$email'";
    $res = mysqli_query($conn, $check_duplicate_email);
    $coun = mysqli_num_rows($res);
    $result = mysqli_query($conn, $check_duplicate_username);
    $count = mysqli_num_rows($result);

	if ($_POST['fname'] == "" || $_POST['lname'] == "" || $_POST['Uname'] == "" || $_POST['email'] == "" || $_POST['pass'] == "") 
		{
			$nan = 'Please fill out the form first!';
		}
        else if ($coun > 0)
		{
			$nan = 'Email already exists, please use a different email!';
		}
        else if ($count > 0)
		{
			$nan = 'Username already exists, please use a different Username!';
		}
        else if($conn->query($sql) === TRUE)
        {
			header('location: login.html');
        }

$conn->close();
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
    <script src="login_pass.js" defer></script>
</head>
<body>
    <center>
    <form action="Signup.php" method="post">
        <div class="signbox">
        <h1>Sign Up</h1> <br>
        <p class="signerr"><?php echo $nan ?></p>
                <p class="indication">First Name: </p>
                <input type="text" name="fname" class="fname">
                <p class="indication">Last Name: </p>
                <input type="text" name="lname" class="lname">
                <p class="indication">Username: </p>
                <input type="text" name="Uname" class="Uname">
                <p class="indication">Email: </p>
                <input type="email" name="email" class="email">
                <p class="indication">Password: </p>
                <input type="password" id="pass" name="pass" class="signpass">
                <i class="tog bi bi-eye-slash" id="togglePassword" ></i><br><br><br><br><br>
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
            <div class="signbtn">
                <button>Create Account!</button></div>

                <div class="login">
                    <p class="login">Already have an account? <span><a href="Login.html">Login!</a></span></p>
                </div>
        </div>
    </form>
</center>
</body>
</html>