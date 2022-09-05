<?php

session_start();
if (!$_SESSION['username']){
    header ('location:index.php');
}

$con = mysqli_connect("localhost","root","","prison_system");

                $result =" SELECT * FROM visitation " ;
                $display=mysqli_query($con, $result);
                
?>


<html lang="en">
<head>
    <title>visitation</title>

    <style>
        body{
            background:grey;
        }
            .table-view td, th{
                padding: 20px;
                width: 18%;
                background: rgb(22, 21, 21);
                color: white;

            }

            .table-view th{
                color:red;
            }

            #button{
                border-radius:5px;
                background:white;
                color:black;
                padding:5px;
                text-decoration:none;
                margin-bottom:50px;
                
            }

 .box{
    position: absolute;
    display: none;
    justify-content: center;
    align-items: center;
    text-align: center;
    top: 0;
    line-height: 40px;
}

.box .content{
    width: 100%;
    height: auto;
    left: 15%;
    padding: 40px;
    background: rgb(22, 21, 21);
    position: relative;
    box-sizing: border-box;
    line-height: 60px;
    transform:translate(90%,50%);
    border: 1px solid black;
    box-shadow: 38px 38px 56px #1e1e1e, -15px -15px 28px #282828;
    
}

.close-btn{
    position: absolute;
    margin-left:70%;
    top:15%;
    left:80%;
    color: white;
    font-size: 30px;
    border-radius: 50%;
    padding:7px;
    background: orange;
    box-shadow: 5px 5px 15px #1e1e1e, -5px -5px 15px #282828;
    
}

.close-btn:hover{
    cursor: pointer;
    background: white ;
    color: black;
}


.box h1{
    font-size: 30px;
    font-weight: bold;
    color: rgb(250, 250, 253);
    text-align: center;
    text-decoration: underline;
}

.entry-table{
    color:white;
}

caption{
    background:red;
    color:white;
}

        </style>
</head>
<body>
            <div style="transform:translate(30%,50%); background:grey;padding: 40px; margin-right:40%">
                    <!--pops up a data entry form when clicked  -->
                  <a href="#" class="button" id="button">ADD NEW</a> <a href="Visitor.php" class="button" id="button">BACK</a>
                
                    <table border="1" style="border-collapse:collapse;" class="table-view">  
                    <caption>VISITATION RECORDS</caption>                 
                            <tr>
                                <th>Visitor ID </th>
                                <th>Prisoner ID</th>                       
                                <th>Date</th>
                                <th colspan='2'>Operations</th>
                            </tr>
                            
                            <?php
                // fetching data from the database into the html table
                while ( $row=mysqli_fetch_assoc($display)) {
                    ?>
                        <tr>
                            <td > <?php echo $row['vistorID'];  ?> </td >
                            <td > <?php echo $row['prisonerId'];  ?> </td >   
                            <td > <?php echo $row['visitDate'];  ?> </td >
                            <!--Update area which links to the upvisitation.php file -->
                            <td> <a style="color:blue" href="upvisitation.php?u=<?php echo $row['vistorID'];?>"> UPDATE</a></td>
                            <!--Delete area which links to the delvisitation.php file -->
                            <td> <a style="color:red" href="delvisitation.php?d=<?php echo $row['vistorID'];?>"> DELETE</a></td>
                                </tr >
                            <?php    }?>
                    
                    </table>   
                
            </div>            

                        
                    <!-- data entry form -->
                    <div class="box" id="popup">
                        <div class="close-btn">X</div>
                        <div  class="content">
                            <form action=" " id="entry-form" method="POST">
                                <table class="entry-table">
                                    <h1>VISITATION RECORDS</h1>
                                    <tr>
                                        <td>VISITOR ID</td>
                                        <td><input type="text" name="vistorID" required></td>
                                    </tr>
                                    <tr>
                                        <td>PRISONER ID </td>
                                        <td><input type="text" name="prisonerId" required></td> 
                                    </tr>
                                    
                                    <tr>
                                        <td>VISITATION DATE: </td>
                                        <td><input type="date" name="visitDate" required></td> 
                                    </tr>
                                    <tr>
                                    <table class="nest">    
                                        <tr >    
                                                <td><input type="submit" name="submit" value="submit"></td>
                                                <td><input type="reset" name="submit" value="reset"></td>
                                        </tr>    
                                    </table>    
                                    </tr>
                                </table>                           
                            </form>
                        </div>
                        
                    </div>              
                

                     <!-- popup section javascript -->
        <script>
            document.getElementById("button").addEventListener("click",function(){
                document.querySelector(".box").style.display= "flex";
                
            })

            document.querySelector(".close-btn"). addEventListener("click",function(){
                document.querySelector(".box").style.display= "none";
                
            })   
        </script>

        
<?php 
// connection to mysql database
$con = mysqli_connect("localhost","root","","prison_system");
if(!$con){
    die("Could not connect: ". mysqli_connect_error());
}else{
   echo "successful connected";
}

// assigns the input data to variables then inserts into the visitation table in the database when the submit button is clicked
if(isset($_POST["submit"])){
    $vistorID= $_POST["vistorID"];
    $prisonerId= $_POST["prisonerId"];
    $visitDate= $_POST["visitDate"];
   

$sql = "INSERT INTO visitation( vistorID,prisonerId, visitDate)VALUE('$vistorID','$prisonerId',  '$visitDate')";

//echo $sql;

if(mysqli_query($con,$sql)){

?>

<script type="text/javascript">
    alert("Information Successfully Added");
    window.location= "visitation.php";
</script>
<?php 
}else{
echo mysqli_error($con);
}

}
?>
    
</body>
</html>