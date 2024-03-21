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

        <section class="addproductCon">
            <h1>Add Products here</h1>
            <form action="addProduct.php" method="post" enctype="multipart/form-data">
                <label for="name">Product Name:</label>
                <input type="text" placeholder="Enter your name" name="proName">
                <label for="">Product Image:</label>
                <input type="file" name="proImg">
                <label for="">Product Price</label>
                <input type="number" name="proPrice" placeholder="Enter Price of product">

                <button class="btn" id="addProBtn" name="addProduct">Add Product</button>

                <div id="crossBtn">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
                </div>
            </form>
        </section>

<?php
    if(isset($_POST['addProduct'])){
       $bachatgatName = $_SESSION['bgname'];
       $bachatgatId = $_SESSION['bgId'];
       $proName = $_POST['proName'];
       $proPrice = $_POST['proPrice'];


       if($_FILES["proImg"]["error"] === 4){
        echo "<script> alert('Image Does Not Exist.'); </script>";
        
        }else{
            $fileName = $_FILES["proImg"]["name"];
            $fileSize = $_FILES["proImg"]["size"];
            $tmpName = $_FILES["proImg"]["tmp_name"];

    
            move_uploaded_file($tmpName, 'uplode/'. $fileName);
           
            
            // $query = "INSERT INTO `registered_bg`(`bgname`, `nopeople`, `bgdesc`, `city`, `email`, `pass`, `poster`,  `contactno`) VALUES ('$bachatgatName','$peoples','$bgdesc','$city','$email','$pass','$fileName', '$conno');";

            $query = "INSERT INTO `bgproducts`(`bgname`, `bgid`, `proname`, `proprice`, `proimg`) VALUES ('$bachatgatName','$bachatgatId','$proName','$proPrice','$fileName');";

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
?>
    
</body>

</html>