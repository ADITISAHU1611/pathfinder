


<?php
    $insert = false;
    if(isset($_POST['submit'])){
        include '_dbconnect.php';
 
        $name = $_POST['name'];
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];
   

        $sql = "INSERT INTO `contact` (`name`, `email`, `subject`, `message`, `datetime`) VALUES ('$name' , '$email', '$subject', '$message', current_timestamp())";

    $result = mysqli_query($conn,$sql);
    if(!$result){
        echo "Error: ".mysqli_error($conn);
        exit;
    }
    if($result== true){
       $insert = true;
    }
    
    mysqli_close($conn);
    }



        if($insert == true){
        echo "<p class='text-success text-center'>Thanks for submitting your form.</p>";
        }
        ?> 