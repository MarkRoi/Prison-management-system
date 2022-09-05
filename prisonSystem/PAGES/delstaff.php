<?php 
$con = mysqli_connect("localhost","root","","prison_system");

$staffid=$_GET['sd'];
$result =" DELETE FROM staff WHERE staffid='$staffid'" ;
$display=mysqli_query($con, $result);

if($display){
    
    echo "<font color='green'>Record Deleted from Database";
}else{
    echo "<font color='red'>Failed to delete for Database";
}

?>