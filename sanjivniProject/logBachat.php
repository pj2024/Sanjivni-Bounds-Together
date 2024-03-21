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
                        <div class='btn' id='signup'>SignUp</div>
                        <div class='btn' id='login'>Login</div>
                    </div>";
                }
            ?>
    </header>


    <section class="login-bachatGatForm">
        <form action="logBachat.php" method="post">
            <h1>Login Bachat Gat</h1>
            <div class="input-con">
                <div>
                    <label for="">Email:</label><br>
                    <input type="email" name="email" placeholder="Enter email">
                </div>
                <div>
                    <label for="">Password:</label><br>
                    <input type="password" name="pass" placeholder="Enter password">
                </div>
            </div>

            <button class="btn" id="loginBachtGatBtn" name="loginBachtGatBtn">login</button>
        </form>
    </section>
<?php
    #for login
if(isset($_POST['loginBachtGatBtn'])){
    $query = "SELECT * FROM `registered_bg` WHERE `email` = '$_POST[email]'";
    $result = mysqli_query($conn, $query);

    if($result){
        if(mysqli_num_rows($result) == 1){
            $result_fetch = mysqli_fetch_assoc($result);
            if($_POST['pass'] == $result_fetch['pass']){
                $_SESSION['logged_in_bachat_gat'] = true;
                $_SESSION['bgname'] = $result_fetch['bgname'];
                $_SESSION['bgId'] = $result_fetch['id'];
                header("location: index.php");
                // echo "<script>
                // window.location.href='customer.php';
                // </script>";
            }
        }else{
            echo 
            "<script>
            alert('Email or username not Registered');
            window.location.href='index.php';
            </script>";
        }
    }else{
        echo 
            "<script>
            alert('Cannot Run Query');
            window.location.href='index.php';
            </script>"; 
    }
}

?>
</section>
</body>
</html>