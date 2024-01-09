<?php
 $insert=false;
 if(isset($_POST['submit'])){
   
   include '_dbconnect.php';
   $name = $_POST['name'];
   $email = $_POST['email'];
   $subject = $_POST['subject'];
   $message = $_POST['message'];


   $sql = "INSERT INTO `contact` (`name`, `email`, `subject`, `message`, `datetime`) VALUES ('$name' , '$email', '$subject', '$message', current_timestamp())";
    
   if($conn->query($sql)== true){
      //echo "Successfully inserted";
      $insert= true;
   }
   else{
      echo "ERROR: $sql <br> $conn->error";
   }

   $conn->close();
 }
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Portfolio</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    <div class="container">
       
        <div class="mainContact">
            
            <h2>Contact Form</h2>
            <?php
               if($insert == true){
                  echo "<p style='color:green; text-align:center;'>Your form has been submitted successfully.</p>";
               }
            ?> 
            <div class="formm">
                <form id="form" class="form" action="contactus.php" method = "post">
                    <div class="formControl">
                    <label for="name">Name : </label>
                    <input  name = "name" id="name" type="text" size="20" placeholder="enter your full name" required><br><br><br>
                    </div>
                    <div class="formControl">
                    <label for="email">Email : </label>
                    <input  name="email" id="email" type="email" size="30" placeholder="enter your email-id" required><br><br><br>
                    </div>
                    <div class="formControl">
                    <label for="subject">Subject : </label>
                    <input  name="subject" id="subject" type="text" placeholder="enter the subject" required><br><br><br>
                    </div>
                    <div class="formControl success">
                    <label for="message">Reason : </label>
                    <input name = "message" id="message" type="text" placeholder="enter your issue" required><br><br>
                    </div>
                    
                    
                    <button type="submit" name="submit" class="btn">Submit</button>
                </form>
            </div>
            
        </div>
    </div>
    <script src="script.js"></script>
    
</body>

</html>