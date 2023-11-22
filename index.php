<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
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
            text-align: center;
            padding: 5px 0 30px 0;
            background-color: #eee;
        }

        .banner .btn {
            padding: 10px 20px;
            text-decoration: none;
            color: #fff;
            background-color: #333;
            border-radius: 5px;
        }

        .products {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            padding: 20px;
        }

        a .product{
            margin: 10px 10px 20px 10px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            text-align: center;
            width: 200px;
            height: 21rem;
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
            margin-top: -25px;
            object-fit: contain;
        }

        .product .price {
            font-weight: 700;
            color: red;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: -15px 0 0 0;
            font-size: 18px;
        }

        .product strike{
            font-weight: 500;
            font-size: 14px;
            text-decoration: line-through;
        }
    </style>
</head>
<body>
    <header>
        <h1>TechTrend Innovation</h1>
        <nav>
            <ul>
                <li><a href="#" class="active">Home</a></li>
                <li><a href="shop.php">Shop</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
        </nav>
    </header>

    <section class="banner">
        <h2>Welcome to Our Store!</h2>
        <p>Explore our collection of products.</p>
        <a href="shop.php" class="btn">Shop Now</a>
    </section>

    <section class="products">
        <?php
            @include 'config.php';

            if($conn->connect_error){
                die("Connection failed: ". $conn->connect_error);
            }
            $sql = "SELECT product.ProductID, product.Product_Name, product.price, offer.Offer_Price, product.Img_dir FROM product INNER JOIN offer ON product.ProductID = offer.ProductID";
            $result = $conn->query($sql);
            if($result-> num_rows > 0){
                while($row = $result-> fetch_assoc()){
        ?>

        <a href="Offer.php?proID=<?= $row["ProductID"] ?>">
            <div class="product">
                <span>Special Offer</span>
                <img src="Pic/<?= $row["Img_dir"] ?>" alt="Product 1">
                <h3><?= $row["Product_Name"] ?></h3>
                <p class="price">Rs. <?= $row["Offer_Price"] ?>.99 </p>
                <strike> Rs. <?= $row["price"] ?>.00 </strike>
            </div>
        </a>

        <?php
                }
            }
        ?>
        
        <!-- Add more product divs as needed -->
    </section>

    <footer>
        <p>&copy; 2023 TechTrend Innovation. All Rights Reserved.</p>
    </footer>
    
    <script src="script.js"></script>
</body>
</html>