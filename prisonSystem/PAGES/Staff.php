<?php

session_start();
// if the variable is empty, the user is redirected to the login page to log in
if (!$_SESSION['username']){
    header ('location:index.php');
}

$con = mysqli_connect("localhost","root","","prison_system");

                $result =" SELECT * FROM staff " ;
                $display=mysqli_query($con, $result);
              
?>


<html>
    <head>
        <link rel="stylesheet" href="../CSS/prisoner_style.css">
        <title>Staffs</title>

        <style>
           .table-view th,.table-view td{
                padding: 20px;
                background: rgb(22, 21, 21);
                color: white;
            }

            .table-view th{
                color:red;
            }
            

            .scroll-bar{
                height: 75%;
                width: 75%;
                border: 1px solid grey;
                overflow: auto;
                white-space: nowrap;
            }
            
        </style>
    </head>
    <body>
        <div class="container">
            <div class="header">
                <img src="../IMAGES/Logo.png" alt="" id="logo">
                <h1>PRISON MANAGEMENT SYSTEM</h1>
                <a href="#"><img src="../IMAGES/drop-down.jpg" alt="drop-down icon" id="dropdown"></a>
            </div>

            <!-- logout popup -->
            <div id="logout" class="logout" style="display:none;width=30px;padding:10px;background:black;position:absolute;left:92%;top:10%">
                 <a href="logout.php" style="color:white;">LOGOUT</a>
            </div>
            <!-- popup script -->
            <script>
                document.getElementById("dropdown").addEventListener("click",function(){
                document.querySelector(".logout").style.display= "flex";
                
            })

            document.querySelector(".column2"). addEventListener("click",function(){
                document.querySelector(".logout").style.display= "none";
                
            })
            </script>

            <div class="column1">
                <div class="side_menu">
                    <img src="../IMAGES/dashboard_icon.png" alt="" id="icon">
                    <a href="../PAGES/Dashboard.php">Dashboard</a>
                </div>

                <div class="side_menu">
                    <img src="../IMAGES/staff_icon.jpg" alt="" id="icon">
                    <a href="#">Staff records</a>
                </div>

                <div class="side_menu">
                    <img src="../IMAGES/prisoner_icon.png" alt="" id="icon">
                    <a href="../PAGES/Prisoner.php">Prisoner records</a>
                </div>

                <div class="side_menu">
                    <img src="../IMAGES/visitor_icon.jpg" alt="" id="icon">
                    <a href="../PAGES/Visitor.php">Visitors</a>
                </div>

            </div>

            <div class="column2">
                <h1>Staffs</h1>
                    <div class="scroll-bar" style="position: absolute;">
                        <table border="1" style="border-collapse:collapse;" class="table-view" width="100%">                   
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Age</th>
                                <th>Gender</th>
                                <th>NIN</th>
                                <th>Email</th>
                                <th>Contact</th>
                                <th>Residence</th>
                                <th>Nationality</th>
                                <th>Duty</th>
                                <th>Photo</th>
                                <th>DOB</th>
                                <th>PM ID</th>
                                <th>Admin Email</th>
                                <th colspan='2'>Operations</th>
                            </tr>

                            <?php
                            // fetching data from the database into a table using php
                
                while ( $row=mysqli_fetch_assoc($display)) {
                    ?>
                        <tr>
                            <td > <?php echo $row['staffid'];  ?> </td >
                            <td > <?php echo $row['fullname'];  ?> </td >
                            <td > <?php echo $row['age'];  ?> </td >
                            <td > <?php echo $row['gender'];  ?> </td >
                            <td > <?php echo $row['nin'];  ?> </td >
                            <td > <?php echo $row['email'];  ?> </td >
                            <td > <?php echo $row['contact'];  ?> </td >
                            <td > <?php echo $row['residence'];  ?> </td >
                            <td > <?php echo $row['nationality'];  ?> </td >
                            <td > <?php echo $row['duty'];  ?> </td >
                            <td > <img height="70px" width="70px" src="../ANIME/<?php echo $row['photo'];  ?>"></td >
                            <td > <?php echo $row['dob'];  ?> </td >
                            <td > <?php echo $row['pmId'];  ?> </td >
                            <td > <?php echo $row['ADemail'];  ?> </td >
                            <!--Update area which links to the upstaff.php file -->
                            <td> <a style="color:blue" href="upstaff.php?a=<?php echo $row['staffid'];?>"> UPDATE</a></td>
                            <!--Delete area which links to the delstaff.php file -->
                            <td> <a style="color:red" href="delstaff.php?sd=<?php echo $row['staffid'];?>"> DELETE</a></td>
                                </tr >
                            <?php    }?>
                            
                        </table>  
                    </div>                        
            </div>
        </div>
        <div class="footer">
            <p>&copy;Prison 2021</p>
        </div>   
        
                    <!--pop-up data entry form -->
        <a href="#" class="button" id="button">ADD NEW</a>

        <div class="box" id="popup">
            <div class="content">
                <div class="close-btn">X</div>
                <h1>STAFF INFORMATION</h1>
                <form action="" id="entry" method="post">
                    <table class="entry">
                        <tr>
                            <td>NAME: </td>
                            <td><input type="text" name="fullname" required></td> 
                        </tr>
                        <tr>
                            <td>AGE: </td>
                            <td><input type="text" name="age" required></td> 
                        </tr>
                        <tr>
                            <td>GENDER: </td>
                            <td><input type="text" name="gender" required></td> 
                        </tr>
                        <tr>
                            <td>NIN: </td>
                            <td><input type="text" name="nin" required></td> 
                        </tr>
                        <tr>
                            <td>EMAIL: </td>
                            <td><input type="text" name="email" required></td>
                        </tr>
                        <tr>
                            <td>CONTACT: </td>
                            <td><input type="text" name="contact" required></td> 
                        </tr>
                        <tr>
                            <td>RESIDENCE: </td>
                            <td><textarea name="residence" id="" cols="30" rows="10" required></textarea></td>
                        </tr> 
                        <tr>
                            <td>NATIONALITY: </td>
                            <td><input type="text" name="nationality" required></td> 
                        </tr>
                        <tr>
                            <td>DUTY: </td>
                            <td><input type="text" name="duty" required></td> 
                        </tr>
                        <tr>
                            <td>PHOTO: </td>
                            <td><input type="file" name="photo" required></td> 
                        </tr>
                        <tr>
                            <td>DOB:</td>
                            <td><input type="date" name="dob" required></td>
                        </tr>
                        <tr>
                            <td>PM ID: </td>
                            <td><input type="text" name="pmId" required></td> 
                        </tr>
                        <tr>
                            <td>ADMIN EMAIL: </td>
                            <td><input type="text" name="ADemail"></td>
                        </tr>
                        
                        <table class="nest">
                            <tr>
                                <td><input type="submit" name="submit" value="submit"></td>
                                <td><input type="reset" name="submit" value="reset"></td>
                            </tr>
                        </table>
    
                    </table>
                </form>
            </div>            
        </div>
        <script>
            document.getElementById("button").addEventListener("click",function(){
                document.querySelector(".box").style.display= "flex";
                
            })

            document.querySelector(".close-btn"). addEventListener("click",function(){
                document.querySelector(".box").style.display= "none";
                
            })
            
        </script>

<?php 
// database connection
$con = mysqli_connect("localhost","root","","prison_system");
if(!$con){
    die("Could not connect: ". mysqli_connect_error());
}else{
   echo "successful connected";
}

// assigning input data into the variable then storing into the database table after selecting submit
if(isset($_POST["submit"])){
$fullname= $_POST["fullname"];
$age= $_POST["age"];
$gender= $_POST["gender"];
$nin= $_POST["nin"];
$email= $_POST["email"];
$contact= $_POST["contact"];
$residence= $_POST["residence"];
$nationality= $_POST["nationality"];
$duty= $_POST["duty"];
$photo= $_POST["photo"];
$dob= $_POST["dob"];
$pmId= $_POST["pmId"];
$ADemail= $_POST["ADemail"];

// image upload
move_uploaded_file($_FILES['file']['tmp_name'],"ANIME/".$_FILES['file']['name']);

$sql = "INSERT INTO staff( fullname, age, gender,nin,email,contact,residence,nationality,duty,photo,dob,pmId,ADemail )VALUE('$fullname','$age', '$gender', '$nin','$email','$contact','$residence','$nationality','$duty','$photo','$dob','$pmId','$ADemail')";

//echo $sql;

if(mysqli_query($con,$sql)){

?>

<script type="text/javascript">
    alert("staff Successfully Registered");
    window.location= "Staff.php";
</script>
<?php 
}else{
echo mysqli_error($con);
}

}
?>
    </body>
</html>