<?php

@include 'config.php';

session_start();

if(isset($_SESSION_2['user'])){
    header('location:shop.php');
};
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap');
        *{
            text-decoration: none;
            color: #000;
        }

        body {
            font-family:'poppins';
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

        .banner {
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 15px 20px;
            background-color: #eee;
        }

        .banner form{
            width: 80%;
            padding: 0px 10px;
            margin: 7px 0 0 10px;
            border-left: 0;
            border-top: 0;
            border-right: 0;
            border-bottom: 1px solid #999;
            border-radius: 5px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .banner form input[type='text']{
            width: 100%;
            outline: none;
            border: 0px;
            background: transparent;
            font-size: 15px;
            font-family: 'Poppins', sans-serif;
        }

        .banner form #search {
            display: none;
        }

        .banner #main {
            width:max-content;
            margin: 0 10px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .banner .material-symbols-outlined{
            margin-right: 5px;
        }

        .banner form .material-symbols-outlined {
            color: #aaa;
            font-weight: 900;
            width: 100%;
        }

        .cart .content{
            opacity: 0;
            visibility: hidden;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 400px;
            height: 360px;
            background: #ccc;
            border-radius: 1rem;
            box-shadow: 0 2px 12px 700px rgba(0, 0, 0, 0.5);
            color: #fff;
            transition: .3s ease-in;
        }

        #click{
            display: none;
        }

        #click:checked ~ .content{
            opacity: 1;
            visibility: visible;
        }

        .click-me{
            width:max-content;
            margin: 0 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
        }

        .click-me i{
            font-size: 1.4em;
            padding-right: 10px;
            position: relative;
            top: 5px;
        }

        .click-me:hover{
            box-shadow: none;
        }

        .content .header{
            background: var(--color-pro);
            height: 68px;
            overflow: hidden;
            border-radius: 1rem 1rem 0 0;
            display: flex;
            align-items: center;
        }

        .header h2{
            padding-top: -20px;
            padding-left: 32px;
            font-weight: normal;
            font-size: 20px;
            font-weight: 700;
        }

        #fa-xmark{
            position: absolute;
            right: 32px;
            top: 25px;
            color: #999;
            font-size: 20px;
            font-weight: bold;
            cursor: pointer;
        }

        .content .main{
            display: flex;
            justify-content: flex-start;
            flex-direction: column;
            height: 225px;
            width: 380px;
            margin: 0 10px;
            overflow: hidden;
            overflow-y: auto;
        }

        /* width */
        .main::-webkit-scrollbar {
            width: 10px;
            height: 10px;
        }
        /* Track */
        .main::-webkit-scrollbar-track {
            box-shadow: inset 0 0 5px grey; 
            border-radius: 10px;
        }        
        /* Handle */
        .main::-webkit-scrollbar-thumb {
            background: #888; 
            border-radius: 10px;
        }
        /* Handle on hover */
        .main::-webkit-scrollbar-thumb:hover {
            background: #555; 
        }

        .main .table{
            display: flex;
            flex-direction: column;
            justify-content: center;
            width: 380px;
            height: fit-content;
        }

        .table .cartProduct {
            display: flex;
            align-items: center;
        }

        .main .table .cartProduct img {
            width: 3.5rem;
            height: 3.5rem;
            object-fit: contain;
            margin-right: 2px;
        }

        .cartProduct .detail {
            display: flex;
            flex-direction: column;
            justify-content: center;
            width: 260px;
            margin: 0 5px;
            text-align: left;
        }

        .detail .h4{
            font-size: 16px;
            margin: 0;
        }

        .detail .h5{
            font-size: 14px;
            font-weight: 700;
        }

        .quantity-input {
            width: 20px;
            text-align: center;
            border: 1px solid #ccc;
            padding: 5px;
            border-radius: 5px;
            text-align: center;
        }

        hr{
            width: 380px;
            height: 1px;
        }

        #main .line{
            width: 100%;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: .5rem 0 .3rem;
        }

        .line button {
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.2);
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            cursor: pointer;
        }

        .products {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            padding: 20px;
        }

        .product {
            margin: 10px;
            padding: 40px 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            text-align: center;
            width: 200px;
            height: 18rem;
        }

        .product span{
            display:flex;
            position: relative;
            background: red;
            padding: 5px 10px;
            width: fit-content;
            top: -36px;
            color: #eee;
            font-weight: 700;
            letter-spacing: 1px;
            border-radius: 5px;
        }

        .product img {
            width: 200px;
            height: 200px;
            margin-top: -20px;
            object-fit: contain;
            margin-bottom: -10px;
        }

        .product .price {
            font-weight: 700;
            color: #333;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: -15px 0 0 0;
            font-size: 18px;
        }

        .product strike{
            font-weight: 500;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <header>
        <h1>TechTrend Innovation</h1>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="#" class="active">Shop</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
        </nav>
    </header>

    <section class="banner">
        <form action="" method="post">
            <input type="text" name="engine" id="engine" placeholder="Search Product...">
            <label for="search"><span class="material-symbols-outlined">search</span></label>
            <input type="submit" id="search" name="sub">
        </form>

        <div class="cart" id="main">
            <input type="checkbox" id="click">
            <label for="click" class="click-me"><span class="material-symbols-outlined">shopping_cart</span>View Cart</label>
            <div class="content">
                <div class="header">
                    <h2>My Cart</h2>
                    <label for="click"><span class="material-symbols-outlined" id="fa-xmark">close</span></label>
                </div>
                <div class="main">
                    <div class="table">
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
                                        $id = $row['Email'];

                                        $sql = "SELECT product.ProductID, product.Product_Name, cart.Price, product.Img_dir, cart.Quantity FROM product INNER JOIN cart ON product.ProductID = cart.ProductID WHERE cart.Email = '$id'";
                                        $result = $conn->query($sql);
                                        if($result-> num_rows > 0){
                                            while($row = $result-> fetch_assoc()){
                        ?>
                        
                        <a href="updateProduct.php?proID=<?= $row['ProductID']?>&quantity=<?= $row["Quantity"] ?>&amount=<?=$row["Price"] ?>">
                            <div class="cartProduct">
                                <img src="Pic/<?= $row["Img_dir"] ?>">
                                <div class="detail">
                                    <p class="h4"><?= $row["Product_Name"] ?></p>
                                    <span class="h5">Rs. <?= $row["Price"] ?>.00</span>
                                </div>
                                <input type="text" class="quantity-input" value="<?= $row["Quantity"] ?>" id="count" readonly>
                            </div>
                        </a>
                        <hr>

                        <?php
                                            }
                                        }
                                    }
                                } 
                            }
                            else {
                                echo '<a href="login.php"><div class="cartProduct"><div class="detail"> 0 Results </div></div></a>';
                            }
                        ?>
                    </div>
                </div>
                <div class="line">
                    <a href="payment.php"><button>Buy Now</button></a>
                </div>
            </div>
        </div>
        <a href="login.php">
            <div class="login" id="main">
            <?php
                if (isset($_SESSION['user'])) {
                    $user = $_SESSION['user'];
                }
                else {
                    $user = "Login";
                }
        
            ?>
                <span class="material-symbols-outlined">account_circle</span>
                <label id="user_name"><?php echo $user; ?></label>
            </div>
        </a>
    </section>

    <section class="products">

        <?php
            @include 'config.php';

            $sql = "SELECT * FROM product";
            $result = $conn->query($sql);

            if(isset($_POST['sub'])){
                $engine =  $_POST['engine'];
                $sql = "SELECT * FROM product WHERE Product_Name LIKE '$engine%' or Product_Name LIKE '%$engine%'";
                $result = $conn->query($sql);

                if($result-> num_rows > 0){
                    while($row = $result-> fetch_assoc()){
                    
        ?>

        <a href="product.php?proID=<?= $row['ProductID']?>">
            <div class="product">
                <img src="Pic/<?= $row["Img_dir"]?>">
                <h3><?= $row["Product_Name"]?></h3>
                <p class="price">Rs. <?= $row["Price"]?>.00 </p>
            </div>
        </a>

        <?php
                    }
                }
                else{
                    echo '<div class="tab" id="zero"> 0 Results </div>';
                };
            }
            else {
                if($result-> num_rows > 0){
                    while($row = $result-> fetch_assoc()){
                        echo '<a href = "product.php?proID=', $row['ProductID'],'"><div class="product">
                                <img src="Pic/',$row["Img_dir"],'">
                                <h3>',$row["Product_Name"],'</h3>
                                <p class="price">Rs. ',$row["Price"] ,'.00 </p>
                              </div></a>';
                    }
                }
            }
        ?>
        
    </section>

    <footer>
        <p>&copy; 2023 TechTrend Innovation. All Rights Reserved.</p>
    </footer>
    
</body>
</html>