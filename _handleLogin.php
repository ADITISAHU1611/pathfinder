<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
    // include '_dbconnect.php';
    $servername="localhost";
    $username="root";
    $password="";
    $database="pathfinder";
    $conn=mysqli_connect($servername,$username,$password,$database);

    
    $inputusername = $_POST['loginUsername'];
    //securing username input from XSS attack
    $inputusername = str_replace("<", "&lt;", $inputusername);
    $inputusername = str_replace(">", "&gt;", $inputusername);

    $password = $_POST['loginPass'];
    //securing pass input from XSS attack
    $password = str_replace("<", "&lt;", $password);
    $password = str_replace(">", "&gt;", $password);

    $sql = "SELECT * FROM `users` WHERE username='$inputusername'";
    $result = mysqli_query($conn, $sql);
    $numRows = mysqli_num_rows($result);
    
    if($numRows!=1){
        header("Location: index.php?loginsuccess=false&error=UsernameDoesNotExists");
        
        
    }
    else{
        $row = mysqli_fetch_assoc($result);
        $hashedpass=$row['password'];
        
        if(!password_verify($password,$hashedpass)){
            header("Location: index.php?loginsuccess=false&error=passnotmatch");
            // echo "Entered Password: " . $password . "<br>";
            // echo "Hashed Password from Database: " . $hashedpass . "<br>";
            // die("Password does not match");
        }
        else{
        
        session_start();
            $_SESSION['user'] = $inputusername;
            $_SESSION['sno'] = $row['sno'];
            $_SESSION['loggedin'] = 'true';
            $showAlert = true;
            header("Location: main.php?loginsuccess=true");
            exit();
        }
    }
}
?> 





 