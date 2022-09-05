<?php

session_start();
if (!$_SESSION['username']){
    header ('location:index.php');
}

$con = mysqli_connect("localhost","root","","prison_system");

                $result =" SELECT * FROM visitor " ;
                $display=mysqli_query($con, $result);
                
?>


<html>
    <head>
        <link rel="stylesheet" href="../CSS/visitor_style.css">
        <title>Visitor</title>

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
                    <a href="../PAGES/Staff.php">Staff records</a>
                </div>

                <div class="side_menu">
                    <img src="../IMAGES/prisoner_icon.png" alt="" id="icon">
                    <a href="../PAGES/Prisoner.php">Prisoner records</a>
                </div>

                <div class="side_menu">
                    <img src="../IMAGES/visitor_icon.jpg" alt="" id="icon">
                    <a href="#">Visitors</a>
                </div>

            </div>
            
            
                <div class="column2">
                    <h1>Visitors</h1>
                    <div style="color: rgb(54, 54, 100);text-align:right;margin:5px"><a style="border-radius:5px;background:blue;padding:5px;color:white;margin-right:3px" href="visitation.php">Visitation</a></div> 
                    <div class="scroll-bar" style="position: absolute;">
                        <table border="1" style="border-collapse:collapse;" class="table-view" width="100%">                   
                            <tr >
                                <th>#</th>
                                <th>Full Name</th>
                                <th>Gender</th>
                                <th>NIN</th>
                                <th>Residence</th>
                                <th>Nationality</th>
                                <th>Contact</th>
                                <th>Relationship</th>
                                <th>Prisoner Id</th>
                                <th>Visitation Date</th>
                                <th colspan='2'>Operations</th>
                            </tr>    
                            
                            
                            <?php
                
                while ( $row=mysqli_fetch_assoc($display)) {
                    ?>
                    <!-- Display Data -->
                        <tr>
                            <td > <?php echo $row['vistorID'];  ?> </td >
                            <td > <?php echo $row['fullname'];  ?> </td >
                            <td > <?php echo $row['gender'];  ?> </td >
                            <td > <?php echo $row['nin'];  ?> </td >
                            <td > <?php echo $row['residence'];  ?> </td >
                            <td > <?php echo $row['nationality'];  ?> </td >
                            <td > <?php echo $row['contact'];  ?> </td >
                            <td > <?php echo $row['relationship'];  ?> </td >
                            <td > <?php echo $row['prisonerId'];  ?> </td >
                            <td > <?php echo $row['visitDate'];  ?> </td >
                            <!--Update area which links to the up.php file -->
                            <td > <a style="color:blue" href="upvisitor.php?a=<?php echo $row['vistorID'];?>"> UPDATE</a></td>
                            <!--Delete area which links to the delvisitor.php file -->
                            <td> <a style="color:red" href="delvisitor.php?vd=<?php echo $row['vistorID'];?>"> DELETE</a></td>
                                </tr >
                            <?php    }?>
                        </table>                                         
                    </div>
                </div>


                <div class="footer">
                    <p>&copy;Prison 2021</p>
                </div>

                <a href="#" class="button" id="button">ADD NEW</a>
                    
                    <div class="box" id="popup">
                        <div class="close-btn">X</div>
                        <div  class="content">
                            <form action=" " id="entry-form" method="POST">
                                <table class="entry-table">
                                    <caption>VISITORS RECORDS</caption>
                                    <tr>
                                        <td>FULL NAME: </td>
                                        <td><input type="text" name="fullname" required></td> 
                                    </tr>
                                    <tr>
                                        <td>GENDER</td>
                                        <td><input type="text" name="gender" required></td>
                                    </tr>
                                    <tr>
                                        <td>NIN: </td>
                                        <td><input type="text" name="nin" required></td> 
                                    </tr>
                                    <tr>
                                        <td>ADDRESS: </td>
                                        <td><textarea name="residence" id="" cols="30" rows="10" required></textarea></td> 
                                        <!-- <td><input type="text" name="address"></td> -->
                                    </tr>
                                    <tr>
                                        <td>NATIONALITY:</td>
                                        <td><input type="text" name="nationality" required></td>
                                    </tr>
                                    <tr>
                                        <td>CONTACT: </td>
                                        <td><input type="text" name="contact" required></td> 
                                    </tr>
                                    <tr>
                                        <td>RELATIONSHIP: </td>
                                        <td><input type="text" name="relationship"></td> 
                                    </tr>
                                    <tr>
                                        <td>PRISONER ID: </td>
                                        <td><input type="text" name="prisonerId" ></td> 
                                    </tr>
                                    <tr>
                                        <td>VISITATION DATE: </td>
                                        <td><input type="date" name="visitDate" required></td> 
                                    </tr>
                                    <tr>
                                    <table class="nest">    
                                        <tr >    
                                                <td><input type="submit" name="submit" value="submit"></td>
                                                <td><input type="reset" name="submit" value="reset"></td>
                                        </tr>    
                                    </table>    
                                    </tr>
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
    $con = mysqli_connect("localhost","root","","prison_system");
    if(!$con){
        die("Could not connect: ". mysqli_connect_error());
    }else{
        echo "successful connected";
    }


    if(isset($_POST["submit"])){
                $fullname= $_POST["fullname"];
                $gender= $_POST["gender"];
                $nin= $_POST["nin"];           
                $residence= $_POST["residence"];
                $nationality= $_POST["nationality"];
                $contact= $_POST["contact"]; 
                $relationship= $_POST["relationship"];
                $prisonerId= $_POST["prisonerId"];
                $visitDate= $_POST["visitDate"];


            
                $sql = "INSERT INTO visitor( fullname, gender,nin,residence,nationality,contact,relationship,prisonerId,visitDate)VALUE('$fullname', '$gender', '$nin','$residence','$nationality','$contact','$relationship','$prisonerId','$visitDate')";
                
                echo $sql;
            
            
                if(mysqli_query($con,$sql)){

                    ?>
                
                    <script type="text/javascript">
                        alert("staff Successfully Registered");
                        window.location= "Visitor.php";
                    </script>
                    <?php 
                }else{
                    echo mysqli_error($con);
                   }
                
                }
            
                 
     ?> 

    </body>
</html>