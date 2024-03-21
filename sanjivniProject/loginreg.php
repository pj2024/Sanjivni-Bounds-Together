<?php

require('conn.php');
session_start();

#for login
if(isset($_POST['login'])){
    $query = "SELECT * FROM `userreg` WHERE `email` = '$_POST[username_email]' OR `username` = '$_POST[username_email]'";
    $result = mysqli_query($conn, $query);

    if($result){
        if(mysqli_num_rows($result) == 1){
            $result_fetch = mysqli_fetch_assoc($result);
            if($_POST['password'] == $result_fetch['pass']){
                $_SESSION['logged_in'] = true;
                $_SESSION['username'] = $result_fetch['username'];
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


#for registration
if(isset($_POST['signup'])){
    $user_exist_query = "SELECT * FROM `userreg` WHERE `username` = '$_POST[username]' OR `email` = '$_POST[email]'";
    $result = mysqli_query($conn, $user_exist_query);

    if($result){

        if(mysqli_num_rows($result) > 0){
            $result_fetch = mysqli_fetch_assoc($result);
            if($result_fetch['username'] == $_POST['username']){
                echo 
                    "<script>
                    alert('$result_fetch[username] - username is alredy taken');
                    window.location.href='index.php';
                    </script>";
            }else{
                echo 
                    "<script>
                    alert('$result_fetch[email] - E-mail is alredy taken');
                    window.location.href='index.php';
                    </script>";
            }
        }else{
            // $password = password_hash($_POST['password'],PASSWORD_BCRYPT);
            // $query = "INSERT INTO `userreg`(`full_name`, `username`, `email`, `password`) VALUES ('$_POST[fullname]','$_POST[username]','$_POST[email]',$_POST[$password])";
            $query = "INSERT INTO `userreg` (`name`, `email`, `mnum`, `username`, `pass`) VALUES ('$_POST[name]', '$_POST[email]', '$_POST[mnum]', '$_POST[username]', '$_POST[password]')";
            if(mysqli_query($conn, $query)){
                echo 
                    "<script>
                    alert('Registration Successful.');
                    window.location.href='index.php';
                    </script>";
            }else{
                echo 
                    "<script>
                    alert('Cannot Run Query');
                    window.location.href='index.php';
                    </script>";
            }
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