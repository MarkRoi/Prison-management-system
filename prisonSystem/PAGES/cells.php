<?php
session_start();
if (!$_SESSION['username']){
    header ('location:index.php');
}

$con = mysqli_connect("localhost","root","","prison_system");

                $result =" SELECT * FROM cell " ;
                $display=mysqli_query($con, $result);
                
?>
<html lang="en">
<head>
    <title>Cell information</title>

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
            width:70%
            
        }
        th,td{
            font: size 25px;
        }

        #button{
                border-radius:5px;
                background:white;
                color:black;
                padding:5px;
                text-decoration:none;
                margin-bottom:50px;
        }
        
        caption{
                background:red;
                color:white;
        }
        

    </style>
</head>
<body>
      
              <form> 
              <Button onclick="window.print()">Print</Button> <a href="Prisoner.php" id="button"> Back</a>    
                        <table border="1" style="border-collapse:collapse;" class="table-view">
                        <caption>CELLS INFORMATION</caption>                   
                            <tr>
                                <th>CELL NUMBER</th>
                                <th>SECTION</th>
                                
                            </tr>
                            
                            <?php
                
                while ( $row=mysqli_fetch_assoc($display)) {
                    ?>
                        <tr>
                            <td > <?php echo $row['cellno'];  ?> </td >
                            <td > <?php echo $row['section'];  ?> </td >
                            
                                </tr >
                            <?php    }?>
                        </table>                                         
                        
                </form>
            

    
</body>
</html>