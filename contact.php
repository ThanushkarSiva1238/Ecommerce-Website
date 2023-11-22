<?php

@include 'config.php';

session_start();

if(isset($_SESSION_1['user'])){
    header('location:shop.php');
}

?>

<?php
    @include 'config.php';

    if(isset($_POST['submit'])){
        $txt = $_POST['name'];
        $em = $_POST['email'];
        $msg = $_POST['message'];
        
        if($conn->connect_error){
            die("Connection Error :(".$conn->connect_error);
        }
        else{
            echo "<br> Database entered Successfully";
        }
    
        $insert = "INSERT INTO contactus SET Name = '$txt', Email = '$em', Msg = '$msg'";
        $result = mysqli_query($conn, $insert);
        if ($result === true) {
            header('location:contacts.php');
        }
    
    };
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap');
        *{
            text-decoration: none;
            color: #000;
            font-family:'poppins';
        }

        body {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        header {
            background-color: #f4f4f4;
            padding: 10px;
            text-align: center;
        }

        nav{
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: -20px;
        }

        nav ul {
            list-style: none;
            padding: 0;
            justify-content: flex-start;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        nav ul li {
            display: inline;
            padding: 0 10px;
        }

        nav ul li .active {
            border-bottom: 2px solid #333;
            width: 100%;
        }

        nav ul li a {
            text-decoration: none;
            color: #333;
        }

        .contact-form {
            padding: 20px;
        }

        .contact-form form {
            width: 500px;
        }

        .contact-form label {
            display: block;
            margin: 5px 0;
        }

        main{
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }

        main h2 {
            text-align: center;
        }

        .contact-form input,
        .contact-form textarea {
            width: 100%;
            padding: 5px;
            border: 1px solid #ccc;
        }

        .contact-form button {
            background-color: #007bff;
            color: white;
            padding: 10px;
            border: none;
            cursor: pointer;
        }

        .contact-info {
            padding: 20px;
        }

        .contact-info ul {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .contact-info li {
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .contact-info span {
            margin-right: 10px
        }
    </style>
</head>
<body>
    <header>
        <h1>TechTrend Innovation</h1>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="shop.php">Shop</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="#" class="active">Contact</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section class="contact-form">
            <h2>Contact Us</h2>
            <?php
                @include 'config.php';

                if($conn->connect_error){
                    die("Connection failed: ". $conn->connect_error);
                }
                if (isset($_SESSION['user'])) {
                    $name = $_SESSION['user'];
                    $sql = "SELECT * FROM user WHERE User_Name = '$name' ";
                    $result = $conn->query($sql);
                    if($result-> num_rows > 0){
                        while($row = $result-> fetch_assoc()){
                            $em = $row['Email'];
                        }
                    }
                }
                else{
                    $name = " ";
                    $em = " ";
                }
            ?>

            <form action="" method="post">
                <label for="name">Name:</label>               
                <input type="text" id="name" name="name" value="<?php echo $name; ?>" required>
                                
                <label for="email">Email:</label>               
                <input type="email" id="email" name="email" value="<?php echo $em; ?>" required>
                                
                <label for="message">Message:</label>
                <textarea id="message" name="message" rows="5" required></textarea>
                                
                <button type="submit" name="submit">Send Message</button>
            </form>

        </section>

        <section class="contact-info">
            <h2>Contact Information</h2>

            <ul>
                <li>
                    <span class="material-symbols-outlined">call</span>
                    <a href="tel:+94743724413">+94 (74) 372 4413</a>
                </li>

                <li>
                    <span class="material-symbols-outlined">alternate_email</span>
                    <a href="mailto:keiruthigasathiyathas@gmail.com">keiruthigasathiyathas@gmail.com</a>
                </li>

                <li>
                    <span class="material-symbols-outlined">location_on</span>
                    12/3, Fairline Road, Dehiwela, Sri Lanka
                </li>
            </ul>
        </section>
    </main>

    <footer>
        <p>&copy; 2023 TechTrend Innovation. All Rights Reserved.</p>
    </footer>
    
</body>
</html>