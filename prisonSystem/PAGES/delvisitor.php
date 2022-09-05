<?php 
$con = mysqli_connect("localhost","root","","prison_system");

$vistorID=$_GET['vd'];
$result =" DELETE FROM visitor WHERE vistorID='$vistorID'" ;
$display=mysqli_query($con, $result);

if($display){
    echo "<font color='green'>Record Deleted from Database";
}else{
    echo "<font color='red'>Failed to delete for Database";
}

?>