<?php

session_start();
// if the variable is empty, the user is redirected to the login page to log in
if (!$_SESSION['username']){
    header ('location:index.php');
}

$con = mysqli_connect("localhost","root","","prison_system");

                $result =" SELECT * FROM prisoner " ;
                $display=mysqli_query($con, $result);
                
?>

<html>
    <head>
        <link rel="stylesheet" href="../CSS/print.css">
        <link rel="stylesheet" href="../CSS/prisoner_style.css">
        <title>Prisoners</title>

        <style>
            .table-view td,.table-view th{
                padding: 20px;
                width: 18%;
                background: rgb(22, 21, 21);
                color: white;
            }

            .table-view th{
                color:red;
            }

            .scroll-bar{
                height: 70%;
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
                    <a href="../PAGES/Staff.php">Staff records</a>
                </div>

                <div class="side_menu">
                    <img src="../IMAGES/prisoner_icon.png" alt="" id="icon">
                    <a href="#">Prisoner records</a>
                </div>

                <div class="side_menu">
                    <img src="../IMAGES/visitor_icon.jpg" alt="" id="icon">
                    <a href="../PAGES/Visitor.php">Visitors</a>
                </div>

            </div>

            <div class="column2">
                <h1>Prisoners</h1> 
                   
                <div style="color: rgb(54, 54, 100);text-align:right;margin:5px"><a style="border-radius:5px;background:blue;padding:5px;color:white;margin-right:3px" href="lastvisit.php">VISITS</a><a style="border-radius:5px;color:white; background:blue;padding:5px;margin-right:3px" href="print.php">Print report</a><a style="border-radius:5px;color:white;background:blue;padding:5px;" href="cells.php">Cells info</a> </div>          
                    <div class="scroll-bar" style="position: absolute;">
                        <table border="1" style="border-collapse:collapse;" class="table-view">                   
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Age</th>
                                <th>Gender</th>
                                <th>NIN</th>
                                <th>Residence</th>
                                <th>Contact</th>
                                <th>Crime Details</th>
                                <th>Arrival Date</th>
                                <th>Height</th>
                                <th>Weight</th>
                                <th>Remarks</th>
                                <th>Country</th>
                                <th>Photo</th>
                                <th>Punishment Duration</th>
                                <th>Cell no.</th>
                                <th>PM ID</th>
                                <th>Admin Email</th>
                                <th colspan='2'>Operations</th>
                            </tr>
                 
                <!-- fetch data from the database into the table -->
                            <?php
                
                while ( $row=mysqli_fetch_assoc($display)) {
                    ?>
                        <tr>
                            <td > <?php echo $row['prisonerId'];  ?> </td >
                            <td > <?php echo $row['fullname'];  ?> </td >
                            <td > <?php echo $row['age'];  ?> </td >
                            <td > <?php echo $row['gender'];  ?> </td >
                            <td > <?php echo $row['nin'];  ?> </td >
                            <td > <?php echo $row['residence'];  ?> </td >
                            <td > <?php echo $row['contact'];  ?> </td >
                            <td > <?php echo $row['crimedetails'];  ?> </td >
                            <td > <?php echo $row['arrivaldate'];  ?> </td >
                            <td > <?php echo $row['height'];  ?> </td >
                            <td > <?php echo $row['prisonerweight'];  ?> </td >
                            <td > <?php echo $row['remarks'];  ?> </td >
                            <td > <?php echo $row['country'];  ?> </td >
                            <td > <img height="70px" width="70px" src="../ANIME/<?php echo $row['photo'];  ?>"> </td >
                            <td > <?php echo $row['punishmentduration'];  ?> </td >
                            <td > <?php echo $row['cellno'];  ?> </td >
                            <td > <?php echo $row['pmId'];  ?> </td >
                            <td > <?php echo $row['ADemail'];  ?> </td >
                            <!--Update area which links to the upprisoner.php file -->
                            <td> <a style="color:blue" href="upprisoner.php?a=<?php echo $row['prisonerId'];?>"> UPDATE</a></td>
                            <!--Delete area which links to the delprisoner.php file -->
                            <td> <a style="color:red" href="delprisoner.php?pd=<?php echo $row['prisonerId'];?>"> DELETE</a></td>
                                </tr >
                            <?php    }?>
                        </table>                                         
                    </div>
                    
            </div>
            
            <div class="footer">
                <p>&copy;Prison 2021</p>
            </div>
        </div>

        <a href="#" class="button" id="button">ADD NEW</a>
        
                    <!-- Pop-up data entry form  -->
        <div class="box" id="popup">
            <div class="content">
                <div class="close-btn">X</div>
                <h1>PRISONER INFORMATION</h1>
                <form id="entry" action="" method="post" enctype="multipart/form">
                    <table class="entry">
                        <tr>
                            <td>FULL NAME: </td>
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
                            <td><input type="text" name="nin"></td> 
                        </tr>
                        <tr>
                            <td>RESIDENCE: </td>
                            <td><input type="text" name="residence" required></td> 
                        </tr>
                        <tr>
                            <td>CONTACT: </td>
                            <td><input type="text" name="contact"></td> 
                        </tr>
                        <tr>
                            <td>CRIME DETAILS: </td>
                            <td><textarea name="crimedetails" id="" cols="30" rows="10" required></textarea></td> 
                        </tr>
                        <tr>
                            <td>ARRIVAL DATE: </td>
                            <td><input type="date" name="arrivaldate" required></td> 
                        </tr>
                        
                        <tr>
                            <td>HEIGHT: </td>
                            <td><input type="text" name="height" required></td> 
                        </tr>
                        <tr>
                            <td>WEIGHT: </td>
                            <td><input type="text" name="prisonerweight" required></td> 
                        </tr>
                        <tr>
                            <td>REMARKS: </td>
                            <td><textarea name="remarks" id="" cols="30" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td>COUNTRY: </td>
                            <td><input type="text" name="country" required></td> 
                        </tr>
                        <tr>
                            <td>PHOTO: </td>
                            <td><input type="file" class="file" name="photo" required></td> 
                        </tr>
                        <tr>
                            <td>PUNISHMENT DURATION: </td>
                            <td><input type="text" name="punishmentduration" required></td> 
                        </tr>
                        <tr>
                            <td>CELL NUMBER: </td>
                            <td><input type="text" name="cellno" required></td> 
                        </tr>
                        <tr>
                            <td>PRISON MANAGER ID: </td>
                            <td><input type="text" name="pmId" required></td> 
                        </tr>
                        <tr>
                            <td>ADMIN EMAIL:</td>
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
        
                    <!-- popup section javascript -->
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

// Assigning input data into a variable then inserting it into the database
if(isset($_POST["submit"])){
    $fullname= $_POST["fullname"];
    $age= $_POST["age"];
    $gender= $_POST["gender"];
    $nin= $_POST["nin"];
    $residence= $_POST["residence"];
    $contact= $_POST["contact"];
    $crimedetails= $_POST["crimedetails"];
    $arrivaldate= $_POST["arrivaldate"];
    $height= $_POST["height"];
    $prisonerweight= $_POST["prisonerweight"];
    $remarks= $_POST["remarks"];
    $country= $_POST["country"];
    $photo= $_FILES['file']['name'];
    $punishmentduration= $_POST["punishmentduration"];
    $cellno= $_POST["cellno"];
    $pmId= $_POST["pmId"];
    $ADemail= $_POST["ADemail"];

    // image upload
    move_uploaded_file($_FILES['file']['tmp_name'],"ANIME/".$_FILES['file']['name']);

$sql = "INSERT INTO prisoner( fullname, age, gender,nin,residence,contact,crimedetails,arrivaldate,height,prisonerweight,remarks,country,photo,punishmentduration,cellno,pmId,ADemail)VALUE('$fullname', '$age', '$gender', '$nin','$residence','$contact','$crimedetails','$arrivaldate','$height','$prisonerweight','$remarks','$country','$photo','$punishmentduration','$cellno','$pmId','$ADemail')";

//echo $sql;
// excecuting the query
if(mysqli_query($con,$sql)){

?>

<script type="text/javascript">
    alert("Prisoner Successfully Registered");
    window.location= "Prisoner.php";
</script>
<?php 
}else{
echo mysqli_error($con);
}

}
?>
    </body>

    
</html>