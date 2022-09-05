<?php 
session_start();
if (!$_SESSION['username']){
    header ('location:index.php');
}

$con=mysqli_connect("localhost","root","","prison_system");
if(!$con){
    die("not connected");
}

$staffid= $_GET['a'];
                $result =" SELECT * FROM staff where staffid= '".$staffid."' " ;
                $display=mysqli_query($con, $result);
                
// records

    
    




?>
<html lang="en">
<head>
    <title>Update</title>
    <style>
        body{
            background:grey;
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
    
<form action=" " method="post">
    <a href="Staff.php" id="button">BACK</a>
    <table >
<?php
        $row=mysqli_fetch_assoc($display);
                    ?>
                    <!-- Display Data -->
                        
                        <tr>
                            <td>ID</td>
                            <td><input type="text" name="staffid" value="<?php echo $row['staffid'];  ?>"></td>
                        </tr>
                        <tr>
                            <td>NAME</td>
                            <td><input type="text" name="ful" value="<?php echo $row['fullname'];  ?>"> </td >
                        </tr>
                        <tr>
                            <td>AGE</td>
                        <td ><input type="text" name="age" value="<?php echo $row['age'];  ?>"> </td >
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
                            <td>EMAIL</td>
                        <td ><input type="text" name="ema" value="<?php echo $row['email'];  ?>"> </td >
                        </tr>
                        <tr>
                            <td>CONTACT</td>
                        <td ><input type="text" name="con" value="<?php echo $row['contact'];  ?>"> </td >
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
                            <td>DUTY</td>
                        <td ><input type="text" name="dut" value="<?php echo $row['duty'];  ?>"> </td >
                        </tr>
                        <tr>
                            <td>PHOTO</td>
                        <td ><input type="file" name="pho" value="<?php echo $row['photo'];  ?>"> </td >
                        </tr>
                        <tr>
                            <td>DOB</td>
                        <td ><input type="date" name="dob" value="<?php echo $row['dob'];  ?>"> </td >
                        </tr>
                        <tr>
                            <td>PM ID</td>
                        <td ><input type="text" name="pmId" value="<?php echo $row['pmId'];  ?>"> </td >
                        </tr>
                        <tr>
                            <td>ADMIN EMAIL</td>
                        <td ><input type="text" name="ADemail" value="<?php echo $row['ADemail'];  ?>"> </td >
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
    $staffid=$_POST['staffid'];
    $fullname=$_POST['ful'];
    $age=$_POST['age'];
    $gender=$_POST['gen'];
    $nin=$_POST['ni'];
    $email=$_POST['ema'];
    $contact=$_POST['con'];
    $residence=$_POST['res'];
    $nationality=$_POST['nat'];
    $duty=$_POST['dut'];
    $photo=$_POST['pho'];
    $dob=$_POST['dob'];
    $pmId=$_POST['pmId'];
    $ADemail=$_POST['ADemail'];
  
    
    $con=mysqli_connect("localhost","root","","prison_system");
    
    $change ="UPDATE staff SET fullname='$fullname',age='$age',gender='$gender',nin='$nin',email='$email',contact='$contact',residence='$residence',nationality='$nationality',duty='$duty',photo='$photo',dob='$dob',pmId='$pmId',ADemail= '$ADemail' WHERE staffid= '$staffid' " ;
    $update=mysqli_query($con,$change);

        if($update == TRUE){
            header("location:Staff.php");
        }else {
            echo "Failed";
        }
   
}


                    
                ?>  
   
   </body>
</html>                           