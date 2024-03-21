<!-- <?php
require('conn.php');
session_start();
?> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
    <!-- <section class="sec1">  -->

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
        
        </header>

        <div class="signupForm" >
            <h1>Sign Up Here</h1>
            <form action="loginreg.php" method="post">
                <label for="name">Name</label>
                <input type="text" placeholder="Enter your name" name="name" require><br>
                <label for="email" >Email</label>
                <input type="email" placeholder="Enter your email" name="email" require><br>
                <label for="mnumber">Mobile no.</label>
                <input type="number" placeholder="Enter your mobile no" name="mnum" require><br>
                <label for="username">username</label>
                <input type="text" placeholder="Enter a username" name="username" require><br>
                <label for="name">Password</label>
                <input type="password" placeholder="Enter password" name="password" require>

                <button class="btn" id="signupBtn" name="signup">SignUp</button>

                <div id="crossBtn">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
                </div>
            </form>
        </div>
</body>
</html>