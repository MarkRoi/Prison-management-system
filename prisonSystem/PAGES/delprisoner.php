<?php 
$con = mysqli_connect("localhost","root","","prison_system");

$prisonerID=$_GET['pd'];
$result =" DELETE FROM prisoner WHERE prisonerID='$prisonerID'" ;
$display=mysqli_query($con, $result);

if($display){
    echo "<font color='green'>Record Deleted from Database";
}else{
    echo "<font color='red'>Failed to delete for Database";
}

?>