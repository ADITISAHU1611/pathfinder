






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Login Page</title>
</head>
<body>
    <div class="login-page">
        <div class="form">
            <form id="registration-form" method="post" action="_handleSignup.php">
                <input type="email" placeholder="email id" name="signupUsername" required>
                <input type="password" name="signupPassword" placeholder="password" required>
                <input type="password" name="signupcPassword" placeholder="confirm password" required>
                <button type="submit">Create</button>
               
                <p class="message">Already Registered? <a href="#" id="check">Login</a></p>
            </form>
            <form class="login-form" method="post" action="_handleLogin.php">
                <input type="email" name="loginUsername" placeholder="email id" required>
                <input type="password" name="loginPass" placeholder="password" required> 
                <button type="submit">Login</button> 
                <p class=" message">Not Registered? <a href="#">Register</a></p>
            </form>
        </div>
    </div>
    <script src='https://code.jquery.com/jquery-3.6.0.min.js
    '></script>
    <script>
        $('.message a').click(function(){
            $('form').animate({height: "toggle",opacity: "toggle"}, "slow");
        });
    </script>
    
    <script type="module">
        // Import the functions you need from the SDKs you need
        import { initializeApp } from "https://www.gstatic.com/firebasejs/9.8.4/firebase-app.js";
        import { getAnalytics } from "https://www.gstatic.com/firebasejs/9.8.4/firebase-analytics.js";
        
      
       
      </script>
</body>
</html>
