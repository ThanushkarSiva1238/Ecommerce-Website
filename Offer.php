<?php
    $proID = $_GET['proID'];
?>

<?php

    @include 'config.php';

    session_start();

    if(isset($_SESSION_1['user'])){
        header('location:shop.php');
    }

?>
    
<?php
    @include 'config.php';

    if(isset($_POST['addcart'])){
        $proID = $_POST['productID'];
        $count = $_POST['quantity'];
        $email = $_POST['email'];
        $quantity = $_POST['quan'];
        $price = $_POST['price'];
        
        if($conn->connect_error){
            die("Connection Error :(".$conn->connect_error);
        }

        $select = " SELECT * FROM cart WHERE ProductID = '$proID' and Email = '$email' ";

        $result = mysqli_query($conn, $select);

        if(mysqli_num_rows($result) > 0){
            $error[] = 'This product is already in your cart. To increase the quantity, please visit the View cart option...';
        }

        else{
            if($count <= $quantity){
                $insert = "INSERT INTO cart VALUES('$proID', $count, $price, '$email')";
                $result = mysqli_query($conn, $insert);
            }
            else{
                $error[] = 'Few left in stock!';
            }
        }        
    };
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
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

        .products {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            padding: 20px;
        }

        .container {
            width: 80%;
            border-radius: 10px;
            box-shadow: 0 0 20px #aaa;
            padding: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            
        }

        .product-image {
            float: left;
            width: 300px;
            margin-right: 5rem;
        }

        .product-image img {
            width: 100%;
            height: auto;
        }

        .product-info {
            float: left;
            width: 500px;
        }

        h2 {
            font-size: 24px;
            margin-bottom: 10px;
            margin-top: -5px;
        }

        p {
            font-size: 16px;
            margin-bottom: 10px;
        }

        .product-price {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .old-price {
            text-decoration: line-through;
        }

        .new-price {
            color: red;
            margin-left: 10px;
            font-weight: 800;
            font-size: 24px;
        }

        .product-quantity {
            margin-bottom: 10px;
        }

        .quantity-input {
            width: 40px;
            text-align: center;
            border: 1px solid #ccc;
            padding: 5px;
            border-radius: 5px;
            text-align: center;
            height: 15px;
            margin-left: 5px;
        }

        .error-msg{
            text-align: left;
            display: flex;
            justify-content: center;
            margin: 0;
            padding: 0;
            font-size: 16px;
            margin-top: 2px;
            margin-bottom: 5px;
            color: red;
        }

        .add-to-cart {
            background-color: #007bff;
            color: white;
            padding: 10px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }

    </style>
</head>
<body>
    <header>
        <h1>TechTrend Innovation</h1>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="shop.php" class="active">Shop</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
        </nav>
    </header>

    <section class="products">

        <?php
            @include 'config.php';

            if($conn->connect_error){
                die("Connection failed: ". $conn->connect_error);
            }
            $sql = "SELECT product.ProductID, product.Product_Name, product.Description, product.Quantity, product.price, offer.Offer_Price, product.Img_dir FROM product INNER JOIN offer on product.ProductID = offer.ProductID  WHERE product.ProductID ='$proID'";
            $result = $conn->query($sql);
            if($result-> num_rows > 0){
                while($row = $result-> fetch_assoc()){
        ?>

        <div class="container">
            <div class="product-image">
                <img src="Pic/<?= $row['Img_dir'] ?>">
            </div>
    
            <div class="product-info">
                <h2><?= $row['Product_Name']?></h2>
                <p><?= $row['Description']?></p>
    
                <div class="product-price">
                    <span class="old-price">Rs. <?= $row['price']?>.00</span>
                    <span class="new-price">Rs. <?= $row['Offer_Price']?>.99</span>
                </div>
    
                <form action="" method="post">

                    <input type="text" name="productID" value="<?= $row['ProductID']?>" style="display: none;">
                    <input type="text" name="quan" value="<?= $row['Quantity']?>" style="display: none;">
                    <input type="text" name="price" value="<?= $row['Offer_Price']?>" style="display: none;">

                    <div class="product-quantity">
                        <label for="quantity">Quantity:</label>
                        <input type="number" class="quantity-input" name="quantity" value="1" min="1" id="count">
                    </div>

                    <?php
                        @include 'config.php';

                        if($conn->connect_error){
                            die("Connection failed: ". $conn->connect_error);
                        }
                        if (isset($_SESSION['user'])) {
                            $name = $_SESSION['user'];
                            $sql = "SELECT Email FROM user WHERE User_Name = '$name' ";
                            $result = $conn->query($sql);
                            if($result-> num_rows > 0){
                                while($row = $result-> fetch_assoc()){
                        
                                    echo '<input type="text" name="email" value="',$row['Email'],'" style="display: none;">';
                                    
                                }
                            } 
                        }
                        else {
                            echo '<input type="text" name="email" value=" " style="display: none;">';
                        }
                    ?>

                    <?php
                        if(isset($error)){
                            foreach($error as $error){
                                echo '<span class="error-msg">'.$error.'</span>';
                            };
                        };
                    ?>
        
                    <input type="submit" id="add-to-cart" class="add-to-cart" name="addcart" value="Add to Cart" onclick="window.alert('Added to cart!')">
                </form>
            </div>
        </div>

        <?php
                }
            }
        ?>
    </section>

    <footer>
        <p>&copy; 2023 TechTrend Innovation. All Rights Reserved.</p>
    </footer>
    
</body>
</html>