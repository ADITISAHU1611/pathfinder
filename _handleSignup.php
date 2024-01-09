<?php
$showError = "false";
if($_SERVER["REQUEST_METHOD"]== "POST"){
    include '_dbconnect.php';
    $username = $_POST['signupUsername'];
    //securing username input from XSS attack
    $username = str_replace("<", "&lt;", $username);
    $username = str_replace(">", "&gt;", $username);

    $pass= $_POST['signupPassword'];
    //securing pass input from XSS attack
    $pass = str_replace("<", "&lt;", $pass);
    $pass = str_replace(">", "&gt;", $pass);

    $cpass= $_POST['signupcPassword'];
    //securing cpass input from XSS attack
    $cpass = str_replace("<", "&lt;", $cpass);
    $cpass = str_replace(">", "&gt;", $cpass);
    
    //check whether this username already exits
    $existSql = "SELECT * FROM `users` WHERE username = '$username'";
    $result = mysqli_query($conn, $existSql);
    $numRows = mysqli_num_rows($result);
    if($numRows>0){
        $showError = "Username already exists";
    
}
else{
   if($pass == $cpass){
      $hash = password_hash($pass, PASSWORD_DEFAULT);
      $sql = "INSERT INTO `users` (`username`, `password`, `timestamp`) VALUES ('$username', '$hash', current_timestamp())";
      
      $result = mysqli_query($conn, $sql);
      if($result){
      $showAlert= true;
      header("Location: index.php?signupsuccess=true");
      exit();
    }
}
else{
 
    $showError = "Passwords do not match";
}

}

 header("Location: _signupModal.php?signupsuccess=false&error=$showError");              

}

?>