<?php 
session_start();
if (!$_SESSION['username']){
    header ('location:index.php');
}

$con=mysqli_connect("localhost","root","","prison_system");
                
$vistorID= $_GET['a'];
                $result =" SELECT * FROM visitor where vistorID=$vistorID " ;
                $display=mysqli_query($con, $result);
// records

?>
<html lang="en">
<head>
    <title>Update</title>
    <style>
        body{
            background: grey;
        }

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
    <a href="Visitor.php" id="button">BACK</a>
    <table >
<?php
        $row=mysqli_fetch_assoc($display);
                    ?>
                    <!-- Display Data -->
                        
                        <tr>
                            <td>ID</td>
                            <td><input type="text" name="id" value="<?php echo $row['vistorID'];  ?>"></td>
                        </tr>
                        <tr>
                            <td>NAME</td>
                            <td><input type="text" name="ful" value="<?php echo $row['fullname'];  ?>"> </td >
                        </tr>
                        <tr>
                            <td>GENDER</td>
                        <td ><input type="text" name="gen" value="<?php echo $row['gender'];  ?>"> </td >
                        </tr>
                        <tr>
                            <td>NIN</td>
                        <td ><input type="text" name="ni" value="<?php echo $row['nin'];  ?>"> </td >
                        </tr>
                        <tr>
                            <td>RESIDENCE</td>
                        <td ><input type="text" name="res" value="<?php echo $row['residence'];  ?>"> </td >
                        </tr>
                        <tr>
                            <td>NATIONALITY</td>
                        <td ><input type="text" name="nat" value="<?php echo $row['nationality'];  ?>"> </td >
                        </tr>
                        <tr>
                            <td>CONTACT</td>
                        <td ><input type="text" name="con" value="<?php echo $row['contact'];  ?>"> </td >
                        </tr>
                        <tr>
                            <td>RELATIONSHIP</td>
                        <td ><input type="text" name="rel" value="<?php echo $row['relationship'];  ?>"> </td >
                        </tr>
                        <tr>
                            <td>PRISONER ID</td>
                        <td ><input type="text" name="pri" value="<?php echo $row['prisonerId'];  ?>"> </td >
                        </tr>
                        <tr>
                            <td>VISITATION DATE</td>
                        <td ><input type="date" name="vis" value="<?php echo $row['visitDate'];  ?>"> </td >
                        </tr>
                        <tr> 
                            <td></td>
                            <td><input type="submit" name="submit" value="change"></td>
                        </tr >
                
                </table>
                </form>

                <?php

                    if(isset($_POST['submit'])){
                        //click on submit button then update data
                        //get values
                         //change data using visitor ID
                        $vistorID=$_POST['id'];
                        $fullname=$_POST['ful'];
                        $gender=$_POST['gen'];
                        $nin=$_POST['ni'];
                        $residence=$_POST['res'];
                        $nationality=$_POST['nat'];
                        $contact=$_POST['con'];
                        $relationship=$_POST['rel'];
                        $prisonerId=$_POST['pri'];
                        $visitDate=$_POST['vis'];
 
                        
                        $con=mysqli_connect("localhost","root","","prison_system");
                        
                        $change ="UPDATE visitor SET fullname='$fullname',gender='$gender',nin='$nin',residence='$residence',nationality='$nationality',contact='$contact',relationship='$relationship',prisonerId='$prisonerId',visitDate='$visitDate' WHERE vistorID= '$vistorID' " ;
                        $update=mysqli_query($con,$change);


                        if($update == TRUE){
                            header("location:Visitor.php");
                        }else {
                            echo "Update Failed";
                        }
    
                       
                    }
                ?>
   
   </body>
</html>                           