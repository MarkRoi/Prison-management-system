<?php 
session_start();
if (!$_SESSION['username']){
    header ('location:index.php');
}

$con=mysqli_connect("localhost","root","","prison_system");
                
$vistorID= $_GET['u'];
                $result =" SELECT * FROM visitation where vistorID=$vistorID " ;
                $display=mysqli_query($con, $result);
// records

?>
<html lang="en">
<head>
    <title>Update</title>
    <style>
        form{
            background: #282828;
            transform:translate(-50%,20%);
            padding: 30px;   
            margin-left: 50%;
        }

        table{
            align-items:center;
            border:border-collapse;
            padding: 50px;
            color:white;
            margin-left: 40px;
            line-height: 19px;
        }

        #button{
                border-radius:5px;
                background:white;
                color:black;
                padding:5px;
                text-decoration:none;
                margin-bottom:50px;
            }
            
    </style>
</head>
<body>
    
<form action="" method="post">
<a href="visitation.php" id="button">BACK</a>
    <table >
<?php
        $row=mysqli_fetch_assoc($display);
                    ?>
                    <!-- Display Data -->
                        
                        <tr>
                            <td>VISITOR ID</td>
                            <td><input type="text" name="id" value="<?php echo $row['vistorID'];  ?>"> </td >
                        </tr>
                        <tr>
                            <td>PRISONER ID</td>
                            <td><input type="text" name="pId" value="<?php echo $row['prisonerId'];  ?>"></td>
                        </tr>
                        
                        <tr>
                            <td>DATE</td>
                        <td ><input type="date" name="vis" value="<?php echo $row['visitDate'];  ?>"> </td >
                        </tr>
                        
                        <tr> 
                            <td></td>
                            <td><input type="submit" name="submit" value="change"></td>
                        </tr >
                <!-- <?php    ?> -->
                </table>
                </form>

                <?php

                    if(isset($_POST['submit'])){
                        //click on submit button then update data
                        //get values
                         //change data using visitor ID
                        $vistorID=$_POST['id'];
                        $prisonerId=$_POST['pId'];
                        $visitDate=$_POST['vis'];
                        
                        $con=mysqli_connect("localhost","root","","prison_system");
                        
                        $change ="UPDATE visitation SET prisonerId='$prisonerId',visitDate='$visitDate' WHERE vistorID= '$vistorID' " ;
                        $update=mysqli_query($con,$change);

                        
                        if( $update == TRUE){
                            header("location:visitation.php");
                        }else {
                            echo "Failed";
                        }
                   
                }
    
                ?>
   
   </body>
</html>                           