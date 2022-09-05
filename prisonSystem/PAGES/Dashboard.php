<?php
    session_start();
    if (!$_SESSION['username']){
        header ('location:index.php');
    }
?>

<html>
    <head>
        <link rel="stylesheet" href="../CSS/dashboard_style.css">
        <title>Dashboard</title>
    </head>
    <body>
        <div class="container" id="container">
            <div class="header">
                <img src="../IMAGES/Logo.png" alt="" id="logo">
                <h1>PRISON MANAGEMENT SYSTEM</h1>
                <a href="#"><img src="../IMAGES/drop-down.jpg" id="dropdown" alt="drop-down icon" ></a>
                
            </div>
            <!-- logout popup -->
            <div id="logout" class="logout" style="display:none;width=30px;padding:10px;background:black;position:absolute;left:92%;top:10%">
                 <a href="logout.php" style="color:white;">LOGOUT</a>
            </div>
            <!-- popup script -->
            <script>
                document.getElementById("dropdown").addEventListener("click",function(){
                document.querySelector(".logout").style.display= "flex";
                
            })

            document.querySelector(".column2"). addEventListener("click",function(){
                document.querySelector(".logout").style.display= "none";
                
            })

            </script>
            <!-- left side -->
            <div class="column1">
                <div class="side_menu">
                    <img src="../IMAGES/dashboard_icon.png" alt="" id="icon">
                    <a href="#">Dashboard</a>
                </div>

                <div class="side_menu">
                    <img src="../IMAGES/staff_icon.jpg" alt="" id="icon">
                    <a href="../PAGES/Staff.php">Staff records</a>
                </div>

                <div class="side_menu">
                    <img src="../IMAGES/prisoner_icon.png" alt="" id="icon">
                    <a href="../PAGES/Prisoner.php">Prisoner records</a>
                </div>

                <div class="side_menu">
                    <img src="../IMAGES/visitor_icon.jpg" alt="" id="icon">
                    <a href="../PAGES/Visitor.php">Visitors</a>
                </div>

            </div>

            <!-- right side -->
            <div class="column2">
                <h1>Dashboard</h1>
                <div class="menu">
                    <div>
                        <ul>
                            <li style="padding-right: 103px;"><a href="../PAGES/Staff.php">Staffs <span>Records</span></a></li>
                            <li><a href="../PAGES/Prisoner.php">Prisoner <span>Records</span></a></li>
                        </ul>             
                    </div>
                    
                    <div>
                        <ul>
                            <li><a href="../PAGES/Visitor.php">Visitors <span>Records</span></a></li>
                            <li style="padding-right: 170px;"><a href="logout.php">Logout </a></li>
                        </ul>   
                    </div>
                </div>
            </div>

            <div class="footer">
                <p>&copy;Prison 2021</p>
            </div>
        </div>

        
    </body>
</html>