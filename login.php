<?php
    @include 'config.php';

    session_start();

    if(isset($_POST['SubLog'])){
        $em = mysqli_real_escape_string($conn, $_POST['email']);
        $pw = md5($_POST['password']);
        $select = "SELECT * FROM user WHERE Email='$em' && Password='$pw'";

        $result = mysqli_query($conn, $select);

        if(mysqli_num_rows($result) > 0){

            $row = mysqli_fetch_array($result);

            $_SESSION['user'] = $row['User_Name'];
            header('location:shop.php');
        }
        else{
            $error[] = 'Incorrect Email or Password!';
        }
    };
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap');
        *{
            font-family: 'poppins', sans-serif;
        }
        body {
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .container {
            width: 400px;
            margin: 0;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        h1 {
            margin: 0 0 -10px;
            font-size: 30px;
        }

        .form-container {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            margin: 0 auto;
            width: 80%;
        }
        
        .error-msg{
            text-align: center;
            display: flex;
            justify-content: center;
            margin: 0;
            padding: 0;
            font-size: 16px;
            margin-top: 2px;
            color: red;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input {
            width: 100%;
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
            margin-right: 10px;
        }

        a {
            color: blue;
            text-decoration: none;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
          <h1>TechTrend Innovation</h1>
          <h2>Login</h2>
        </div>
    
        <div class="form-container">
          <form action="" method="post">
            <label for="email">Email address:</label>
            <input type="email" id="email" name="email" required>
    
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            
            <?php
                if(isset($error)){
                    foreach($error as $error){
                        echo '<span class="error-msg">'.$error.'</span>';
                    };
                };
            ?>
    
            <button type="submit" name="SubLog">Login</button>
            <a href="forgotpassword.php">Forgot password?</a>
          </form>
        </div>
    
        <div class="footer">
          <p>Don't have an account? <a href="register.php">Create one here</a></p>
        </div>
      </div>
</body>
</html>