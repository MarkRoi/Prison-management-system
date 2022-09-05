<?php
session_start();
if (!$_SESSION['username']){
    header ('location:index.php');
}

$con=mysqli_connect("localhost","root","","prison_system");
if(!$con){
    die("not connected");
    
}


if(isset($_POST['submit'])){
    //click on submit button then update data
    //get values
     //change data using visitor ID
    $staffid=$_GET['ID'];
    $ful=$_POST['ful'];
    $age=$_POST['age'];
    $gen=$_POST['gen'];
    $ni=$_POST['ni'];
    $ema=$_POST['ema'];
    $con=$_POST['con'];
    $res=$_POST['res'];
    $nat=$_POST['nat'];
    $dut=$_POST['dut'];
    $pho=$_POST['pho'];
    $dob=$_POST['dob'];
    $pmId=$_POST['pmId'];
    $ADemail=$_POST['ADemail'];
    
        $con=mysqli_connect("localhost","root","","prison_system") or die ("could not connect to mysql");
        $result ="UPDATE staff SET fullname='".$ful."',age='".$age."',gender='".$gen."',nin='".$ni."',email='".$ema."',contact='".$con."',residence='".$res."',nationality='".$nat."',duty='".$dut."',photo='".$pho."',dob='".$dob."',pmId='".$pmId."',ADemail='".$ADemail."' WHERE staffid='".$staffid."' ";
        $display=mysqli_query($con,$result);

    if($display){
            header("location:Staff.php");
        }else{
            echo "Failed";
        }
       
}

?>