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
        <div class="register-from">
            <h1>तुमच्या बचत गटाची येथे नोंदणी करा....</h1>
            <form action="regForm.php" method="post" enctype="multipart/form-data">
            <div class="input-con">
                    <div>
                        <label for="name">बचत गटाचे नाव/Bachat Gat Name</label><br>
                        <input type="text" name="name" placeholder="Enter Bachat Gat Name">
                    </div>
                    <div>
                        <label for="name">बचत गटातील लोकांची संख्या/Number of Peoples in Bachat Gat</label><br>
                        <input type="text" name="peoples" placeholder="Enter Bachat Gat Name"><br>
                    </div>
                    <div>
                        <label for="name">बचत गटाची माहिती/Information About Bachat Gat</label><br>
                        <textarea id="bgdesc" name="bgdesc" rows="4" cols="50" placeholder="बचत गट माहिती/वर्णन प्रविष्ट करा/Enter Bachat Gat information/Description">  
                        </textarea>
                    </div>
                    <div>
                        <label for="name">बचत गट कोणत्या शहरात/गावात आहे/Which City/Village where the Bachat Gat is located</label><br>
                        <input type="text" name="city" placeholder="Enter Bachat Gat City/village"><br>
                    </div>
                    <div>
                        <label for="">बचत गटाचे पोस्टर/फोटो टाका/Enter Poster/Photo of Bachat Gat</label><br>
                        <input type="file" name="posterimg" placeholder="Enter Poster/Photo">
                    </div>
                    <div>
                        <label for="">Mobile No. :</label><br>
                        <input type="number" name="contact_no" placeholder="Enter Poster/Photo">
                    </div>
                    <div>
                        <label for="">Email:</label><br>
                        <input type="email" name="email" placeholder="Enter email">
                    </div>
                    <div>
                        <label for="">Password:</label><br>
                        <input type="password" name="pass" placeholder="Enter password">
                    </div>
                        
                </div>
                <button class="btn" id="regBtn" name="regBtn">Register</button>
            </form>
        </div>
    </section>

    <?php
    
    if (isset($_POST['regBtn'])) {
        // Collect form data
        $bachatgatName = $_POST["name"];
        $peoples = $_POST["peoples"];
        $bgdesc = $_POST["bgdesc"];
        $city = $_POST["city"];
        $email = $_POST["email"];
        $pass = $_POST["pass"];
        $conno = $_POST["contact_no"];

        if($_FILES["posterimg"]["error"] === 4){
            echo "<script> alert('Image Does Not Exist.'); </script>";
            
        }else{
                $fileName = $_FILES["posterimg"]["name"];
                $fileSize = $_FILES["posterimg"]["size"];
                $tmpName = $_FILES["posterimg"]["tmp_name"];
    
        
                move_uploaded_file($tmpName, 'uplode/'. $fileName);
               
                // $query = "INSERT INTO products_info (farmername, contactno, email, password, producttype, productname, productdescription, productprice, productimage)
                // VALUES ('$farmername', '$contactno', '$email', '$password', '$producttype', '$productname', '$productdescription', $productprice, '$fileName');
                // ";
                
                $query = "INSERT INTO `registered_bg`(`bgname`, `nopeople`, `bgdesc`, `city`, `email`, `pass`, `poster`,  `contactno`) VALUES ('$bachatgatName','$peoples','$bgdesc','$city','$email','$pass','$fileName', '$conno');";

                $result = mysqli_query($conn, $query);
    
                if($result){
                    echo
                        "<script>
                        alert('New record created successfully.');
                        document.location.href = 'index.php';
                        </script>"; 
                }else{
                    echo
                    "<script>
                    alert('data not Added.');
                    document.location.href = 'regForm.php';
                    </script>";  
                }
            
            }
    }
    
    
        $conn->close();
    ?>
    
  
</body>
</html>