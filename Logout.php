<?php

session_start();

if (isset($_SESSION['username'])){
    session_destroy();
    echo "<script>location.href'Login.html'</script>";
}
else{
    session_destroy();
    echo "<script>location.href'Login.html'</script>";
}


?>