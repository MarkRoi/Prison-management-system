<?php

$username="administrator";
$pass="administrator";

session_start();

if(isset($_SESSION["login"])){
    
    echo "<h1> Welcome". $_SESSION['username']."</h1>";
  
    echo "<a href='Dashboard.php'>Dashboard</a><br>";

    echo "<br><a href='logout.php'><input type='button' value="logout" name="logout"></a>";

}
else{
    if($_POST['username']==$username && $_POST['pass']==$pass){
        $_SESSION['username']=$username;

        echo "<script>location.href='welcome.php'</script>";
    }
    else{
        echo "<script>alert('username or password incorrect!')</script>";
        echo "<script>location.href='index.php'<script>";
    }
}



?>