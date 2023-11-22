<?php
    @include 'config.php';

    if(isset($_POST['SubReg'])){
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $em = mysqli_real_escape_string($conn, $_POST['email']);
        $pw = md5($_POST['password']);
        $cpw = md5($_POST['cpassword']);

        $select = " SELECT * FROM user WHERE Email = '$em' && Password = '$pw' ";

        $result = mysqli_query($conn, $select);

        if(mysqli_num_rows($result) > 0){
            $error[] = 'User already exist!';
        }

        else{
            if($pw != $cpw){
                $error[] = 'Password not matched!';
            }
            else{
                $insert = "INSERT INTO user VALUES('$name','$em','$pw')";
                mysqli_query($conn, $insert);
            }
        }
    };
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration</title>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap');
    *{
        font-family: 'poppins', sans-serif;
    }

    body {
        font-family: 'poppins', sans-serif;
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
        margin: 0 auto;
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
        flex-direction: column;
        align-items: center;
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

    .footer {
        text-align: center;
        margin-top: 20px;
    }

  </style>

  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <div class="header">
      <h1>TechTrend Innovation</h1>
      <h2>Registration</h2>
    </div>

    <div class="form-container">
      <form action="" method="post">
        <label for="name">User Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Email address:</label>
        <input type="email" id="email" name="email" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <label for="confirmPassword">Confirm Password:</label>
        <input type="password" id="confirmPassword" name="cpassword" required>

        <?php
            if(isset($error)){
                foreach($error as $error){
                    echo '<span class="error-msg">'.$error.'</span>';
                };
            };
        ?>

        <button type="submit" name="SubReg" onclick="window.alert('You\'re Registered Successfully...');">Register</button>
      </form>
    </div>

    <div class="footer">
      <p>Already have an account? <a href="login.php">Login here</a></p>
    </div>
  </div>
</body>
</html>
