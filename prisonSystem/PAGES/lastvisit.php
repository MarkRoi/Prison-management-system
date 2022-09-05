<?php
session_start();
if (!$_SESSION['username']){
    header ('location:index.php');
}

// database connection
    $con = mysqli_connect("localhost","root","","prison_system");
    $result =" SELECT * FROM visitation" ;
        $display=mysqli_query($con, $result);
    
    
?>
<html lang="en">
<head>
    <title>search</title>
    <style>
        body{
            background:grey;
        }
        form{
            transform:translate(35%,70%);

        }
        table{
            background: rgb(22, 21, 21);
            transform:translate(75%,50%);
        }
        th{
            color:red;
            padding:30px;
        }
        td{
            color:white;
            padding:30px;
        }
        input{
            height: 40px;
        }
    </style>
</head>
<body>
    <!-- search input section -->
    <form action="" method="post">
        <label for="">Search</label>
        <input type="text" name="search">
        <input type="submit" name="submit-search">
        <a href="Prisoner.php">Back</a>
    </form>
    
    <?php
        // fetch data from the database
        $result =" SELECT * FROM visitation " ;
        $display=mysqli_query($con, $result);
        $queryResults= mysqli_num_rows($display);

// selecting results using prisoner id 
        if(isset($_POST["submit-search"])){
            $str=$_POST["search"];
            $result =" SELECT * FROM visitation WHERE prisonerId= $str" ;
            $display=mysqli_query($con, $result);
            $queryResults= mysqli_num_rows($display);
//displaying the number of results received
            echo "There are ".$queryResults. " results";

            if($queryResults>0){
                echo "<table border='1' width='40%' >";
                echo "<tr>";
                echo "<th>Prisoner ID</th>";
                echo "<th>Visitor ID</th>";
                echo "<th>Date</th>";
                echo "</tr>";

                while($row=mysqli_fetch_assoc($display)){
            
               echo  "<tr>" ;
               echo   "<td >" .$row['prisonerId']."</td >";
               echo   "<td >" .$row['vistorID']. "</td >";
               echo   "<td >" .$row['visitDate']. "</td >";
                echo "</tr>"   ;    
                    
            }

            echo    "</table>";
        }else{
            echo "There are no results matching your search";
        }
    }
?>

</body>
</html>

