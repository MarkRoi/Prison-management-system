<?php
session_start();
if (!$_SESSION['username']){
    header ('location:index.php');
}

$con = mysqli_connect("localhost","root","","prison_system");

                $result =" SELECT * FROM prisoner " ;
                $display=mysqli_query($con, $result);
                
?>
<html lang="en">
<head>
    <link href="print.css" rel="stylesheet">
    <title>Print Report</title>
</head>
<body>
    <h1 style="text-alighn:center; font-size:30px;">PRISONERS AND THEIR RESPECTIVE CELLS INFORMATION</h1>
<Button onclick="window.print()">Print report</Button><a href="cells.php">  cell information</a>  <a href="Prisoner.php">   Back</a>         
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
                            </tr>
                            
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
                            <td > <?php echo $row['photo'];  ?> </td >
                            <td > <?php echo $row['punishmentduration'];  ?> </td >
                            <td > <?php echo $row['cellno'];  ?> </td >
                            <td > <?php echo $row['pmId'];  ?> </td >
                            <td > <?php echo $row['ADemail'];  ?> </td >
                                </tr >
                            <?php    }?>
                        </table>                                         
                    </div>
            </div>

    
</body>
</html>