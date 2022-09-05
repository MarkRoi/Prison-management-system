<?php
    
    session_start();
    $con = mysqli_connect("localhost","root","","prison_system");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="../CSS/Login_page.css">
    <title>Login page</title>

    <!--Css for registration form-->
    <style>
        input #popinput{
            color: rgb(56, 54, 54);
            font-size: medium;
        }

        .content input[type="submit"],input[type="reset"]{
    border: none;
    outline: none;
    height: 40px;
    background: red;
    color: #fff;
    font-size: 18px;
    border-radius: 20px;
    width: 120px;
}

.content input[type="submit"]:hover,input[type="reset"]:hover{
    cursor: pointer;
    background: yellow;
    color: #000;
}
    </style>
</head>
<body>
    <!-- login form -->
    <div id="error" style="color: #fff;text-align: center;"></div>
    <div class="loginbox">
        <img src="../IMAGES/avatar.jfif" alt="Avatar" class="avatar">
        <h1>Login Here</h1>
        <form action="" method="post" id="form">
            <p>Username</p>
            <input type="text" name="username" placeholder="Enter Username" id="username" required>
            <p>Password</p>
            <input type="password" name="pass" placeholder="Enter Password" id="password" required> 
            <input type="submit" name="login" value="Login">
            <a href="#">Lost your password?</a><br>
            <a href="#" id="create_account">Dont have an account?</a>
        </form>
        
    </div>

        <!-- account creation form -->
    <div class="box" id="popup" style="background:black;display: none; align-items: center;border: 1px solid red; padding: 30px;top: 50%;
    left: 50%;position: absolute;transform: translate(-50%,-50%);box-sizing: border-box;" >
    <div class="close-btn" style="background: white;border-radius: 50%;margin-top: -110%; padding: 10px;">X</div>
        <div  class="content" style="position: relative;">
            <form action="" id="entry-form" style="line-height: 50px; color: white;" method="post">
                <table class="entry-table">
                    <caption style="background: red;padding: 30px;">ACCOUNT REGISTRATION</caption>
                <tr>
                    <td>FULL NAME: </td>
                    <td><input type="text" name="fullname" id="popinput"></td>                                         
                </tr>
                <tr>
                    <td>USERNAME: </td>
                    <td><input type="text" name="username" id="popinput"></td>  
                </tr>
                <tr>
                    <td>EMAIL: </td>
                    <td><input type="text" name="email" id="popinput"></td> 
                </tr>
                <tr>
                    <td>PASSWORD: </td>
                    <td><input type="password" name="pass" id="popinput"></td> 
                </tr>
                <tr>
                    <td>VERIFY PASSWORD </td>
                    <td><input type="password" name="verpass" id="popinput"></td> 
                </tr>
                <tr>
                    <td><input type="submit" value="submit" name="submit" id="buttons"></td>
                    <td><input type="reset" value="reset" name="reset" id="buttons"></td>
                </tr>
                </table>                           
            </form>
        </div>                 
                        
                       
    </div>

    <?php
$con = mysqli_connect("localhost","root","","prison_system");
if(!$con){
    die("Could not connect: ". mysqli_connect_error());
}else{
   echo "successful connected";
}
if(isset($_POST['login'])){
    $username=$_POST['username'];
    $pass=$_POST['pass'];

    $result="SELECT * FROM prisonmanager WHERE username='$username' AND pass='$pass'";
    $display=mysqli_query($con,$result);
        $row=mysqli_fetch_assoc($display);

   //  creating functions to compare data in the database
   if($row){
       $_SESSION["username"]=$row['username'];
       $_SESSION["pass"]=$row['pass'];
   }else{
       echo '<script type="text/javascript">';
       echo 'alert("Invalid Username or Password!");';
       echo 'window.location.href="index.php"';
       echo '</script>';
       
   }
}
//  if user input is correct, it will redirect Dashboard.php
if(isset($_SESSION["username"])){

    header("location:Dashboard.php");
}


// Inserting new login info into database

if(isset($_POST["submit"])){
    $fullname= $_POST["fullname"];
    $username= $_POST["username"];
    $email= $_POST["email"];
    $pass= $_POST["pass"];
    $verpass= $_POST["verpass"];

    
    
    $sql = "INSERT INTO prisonmanager(fullname, username, email,pass,verpass)VALUE('$fullname','$username', '$email', '$pass','$verpass')";
    
    //echo $sql;
    
    if(mysqli_query($con,$sql)){
    
    ?>
    
    <script type="text/javascript">
        alert("Account Successfully Registered");
        window.location= "index.php";
    </script>
    <?php 
    }else{
    echo mysqli_error($con);
    }
    
    }
    ?>
        <!-- login validation -->
    <script>
        var name=document.getElementById('username')
        var password=document.getElementById('password')
        var form=document.getElementById('form')
        var errorElement = document.getElementById('error')

        form.addEventListener('submit',(e)=>{
            let messages = []
            if(username.value===''|| username.value==null){
                messages.push('username is required')
            }

            if(password.value.length <= 6){
                messages.push('Password must be longer than 6 characters')
            }

            if(password.value.length >= 20){
                messages.push('Password must not be longer than 20 characters')
            }

            if(messages.length>0){
             e.preventDefault() 
             errorElement.innerText =messages.join(',')
            }
            
        } )

        //popup account registration javascript
        document.getElementById("create_account").addEventListener("click",function(){
                document.querySelector(".box").style.display= "flex";
                
            })

            document.querySelector(".close-btn"). addEventListener("click",function(){
                document.querySelector(".box").style.display= "none";
                
            })
    </script>

    
     
    
</body>
</html>