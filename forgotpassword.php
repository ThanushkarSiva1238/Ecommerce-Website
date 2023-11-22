<?php

    @include 'config.php';

    if(isset($_POST['submit'])){
        $em = $_POST['email'];
        $pw = md5($_POST['password']);
        $cpw = md5($_POST['cpassword']);

        if($conn->connect_error){
            die("Connection Error :(".$conn->connect_error);
        }
        else{
            if($pw != $cpw){
                $error1[] = 'Password not matched!';
            }
            else{
                $update = "UPDATE user SET Password='$pw' WHERE Email='$em'";
                if($conn->query($update)===True){
                    header('location:forgotpassword.php');
                }
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap');
        *{
            font-family: 'poppins', sans-serif;
        }
        body {
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .container {
            width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            text-align: center;
        }

        img {
            width: 100px;
            height: auto;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }

        h1 {
            font-size: 24px;
            margin-top: 20px;
            margin-bottom: 10px;
        }

        p {
            font-size: 14px;
        }

        form {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            margin: 0 auto;
            width: 200px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input {
            width: 150%;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 3px;
            margin-bottom: 10px;
        }

        button {
            background-color: #007bff;
            color: white;
            padding: 10px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }

        a {
            color: blue;
            text-decoration: none;
        }

    </style>
</head>
<body>
    <div class="container">
        <h1>Forgot Password</h1>
        <p>Enter your registered email address below and we'll send you a link to reset your password.</p><br>

        <form method="post" action="">
            <label for="email">Email Address:</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            
            <label for="confirmPassword">Confirm Password:</label>
            <input type="password" id="confirmPassword" name="cpassword" required>
    
            <button type="submit" name="submit" onclick="window.alert('Password Changed Successfully :) ...');">Reset Password</button>
        </form>

        <p>Don't have an account yet? <a href="register.php">Create one here</a></p>

        <p><a href="login.php">Return to Login</a></p>
    </div>
</body>
</html>
