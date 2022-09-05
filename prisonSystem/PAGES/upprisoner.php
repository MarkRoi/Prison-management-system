<?php 

session_start();
if (!$_SESSION['username']){
    header ('location:index.php');
}

$con=mysqli_connect("localhost","root","","prison_system");
                
$prisonerId= $_GET['a'];
                $result =" SELECT * FROM prisoner where prisonerId=$prisonerId " ;
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
        body{
            background:grey;
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
<a href="Prisoner.php" id="button">BACK</a>
    <table >
<?php
        $row=mysqli_fetch_assoc($display);
                    ?>
                    <!-- Display Data -->
                        
                        <tr>
                            <td>ID</td>
                            <td><input type="text" name="id" value="<?php echo $row['prisonerId'];  ?>"></td>
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
                            <td>RESIDENCE</td>
                        <td ><input type="text" name="res" value="<?php echo $row['residence'];  ?>"> </td >
                        </tr>
                        <tr>
                            <td>CONTACT</td>
                        <td ><input type="text" name="con" value="<?php echo $row['contact'];  ?>"> </td >
                        </tr>
                        <tr>
                            <td>CRIME DETAILS</td>
                        <td ><input type="text" name="cri" value="<?php echo $row['crimedetails'];  ?>"> </td >
                        </tr>
                
                        <tr>
                            <td>ARRIVAL DATE</td>
                        <td ><input type="date" name="arr" value="<?php echo $row['arrivaldate'];  ?>"> </td >
                        </tr>
                        <tr>
                            <td>HEIGHT</td>
                        <td ><input type="text" name="hei" value="<?php echo $row['height'];  ?>"> </td >
                        </tr>
                        <tr>
                            <td>WEIGHT</td>
                        <td ><input type="text" name="wei" value="<?php echo $row['prisonerweight'];  ?>"> </td >
                        </tr>
                        <tr>
                            <td>REMARKS</td>
                        <td ><input type="text" name="rem" value="<?php echo $row['remarks'];  ?>"> </td >
                        </tr>
                        <tr>
                            <td>COUNTRY</td>
                        <td ><input type="text" name="cou" value="<?php echo $row['country'];  ?>"> </td >
                        </tr>
                        <tr>
                            <td>PHOTO</td>
                        <td ><input type="file" name="pho" value="<?php echo $row['photo'];  ?>"> </td >
                        </tr>
                        <tr>
                            <td>PUNISHMENT DURATION</td>
                        <td ><input type="text" name="pun" value="<?php echo $row['punishmentduration'];  ?>"> </td >
                        </tr>
                        <tr>
                            <td>CELL NO.</td>
                        <td ><input type="text" name="cel" value="<?php echo $row['cellno'];  ?>"> </td >
                        </tr>
                        <tr>
                            <td>PM ID.</td>
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
                
                </table>
                </form>

                <?php 

                    if(isset($_POST['submit'])){ 
                        //click on submit button then update data
                        //get values
                         //change data using prisoner ID
                        $prisonerId=$_POST['id'];
                        $fullname=$_POST['ful'];
                        $age=$_POST['age'];
                        $gender=$_POST['gen'];
                        $nin=$_POST['ni'];
                        $residence=$_POST['res'];
                        $contact=$_POST['con'];
                        $crimedetails=$_POST['cri'];
                        $arrivaldate=$_POST['arr'];
                        $height=$_POST['hei'];
                        $prisonerweight=$_POST['wei'];
                        $remarks=$_POST['rem'];
                        $country=$_POST['cou'];
                        $photo=$_POST['pho'];
                        $punishmentduration=$_POST['pun'];
                        $cellno=$_POST['cel'];
                        $pmId=$_POST['pmId'];
                        $ADemail=$_POST['ADemail'];


                        $con=mysqli_connect("localhost","root","","prison_system");
                        $change ="UPDATE prisoner SET fullname='$fullname',age='$age',gender='$gender',nin='$nin',residence='$residence',contact='$contact',crimedetails='$crimedetails',arrivaldate='$arrivaldate',height='$height',prisonerweight='$prisonerweight',remarks='$remarks',country='$country',photo='$photo',punishmentduration='$punishmentduration',cellno='$cellno',pmId='$pmId',ADemail='$ADemail' WHERE prisonerId= '$prisonerId' " ;
                        $update=mysqli_query($con,$change);

                        if($update == TRUE){
                            // header("location:Prisoner.php"); 
                            echo '<META HTTP-EQUIV="Refresh" Content="0; URL=Prisoner.php">';    
                            exit;
                        }else {
                            echo "Failed";
                        }
                       
                   }
                ?>
   
   </body>
</html>                           