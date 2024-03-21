<?php
require('conn.php');
session_start();
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
    <section class="sec1"> 

        <header class="header">
            <div class="logo">
                <div class="image-con">
                    <img src="CSS/image/logo.png" alt="">
                </div>
                <p><span>Sanjivni</span></p>
            </div>

            <div class="menu-opions">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="index.php">About Us</a></li>
                    <li><a href="index.php">Contact Us</a></li>
                    <li><a href="index.php">BachatGat List</a></li>
                </ul>
            </div>

            <?php
                if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true){
                    echo"
                    <div class='user btn'>
                        <p> $_SESSION[username]-<a href='logout.php'>LOGOUT</a></p>
                    </div> 
                    ";
                }else{
                    echo"  
                    <div class='btns'>
                        <div class='btn' id='signup'><a href='signup.php'>SignUp</a></div>
                        <div class='btn' id='login'><a href='login.php'>Login</a></div>
                    </div>
                 "; 
                 }
            ?>  
        
        </header>


        <?php
        
        $sql = "SELECT * FROM registered_bg";
        $result = $conn->query($sql);
       
        ?>
        <section class="list-sec">
            <div class="list-sec-inner">
       <?php
       if ($result->num_rows > 0) {
        // Output data of each row
        while($row = $result->fetch_assoc()) {
             echo '<div class="list-upper">
                    <div class="image-sec">
                        <img src="uplode/'. $row['poster'] .'" alt="'.$row['bgname'].'">
                    </div>
                    <div class="text-sec">
                        <h1>'.$row['bgname'].'</h1>
                        <p> '.$row['bgdesc'].'</p>
                        <div class="con-sec">
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-mail"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
                            <span>'.$row['email'].'</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-phone"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                            <span>'.$row['contactno'].'</span>
                        </div>
                        <button class="btn product">Products</button>
                    </div>
                </div>';

                $sql2 = "SELECT * FROM bgproducts where bgid = $row[id]";
                $result2 = $conn->query($sql2);

                while($row2 = $result2->fetch_assoc()){
                   echo'<div class="list-lower">
                            <div class="list-pro">
                                <div class="image-con">
                                    <img src="uplode/'. $row2['proimg'] .'" alt="'.$row2['proname'].'">
                                </div>
                                <div class="text-con">
                                    <h1>Product Name: <span>'.$row2['proname'].'</span></h1>
                                    <p>Price: <span> &#8377;'.$row2['proprice'].'</span></p>
                                </div>
                                <div class="sale">
                                    sale
                                </div>
                            </div>
                        </div>';
                    }
                }
            }
        ?>
        </section>
    
</body>
</html>