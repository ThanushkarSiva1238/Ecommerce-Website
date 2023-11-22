<?php

@include 'config.php';

session_start();

if(isset($_SESSION_1['user'])){
    header('location:shop.php');
}

?>

<?php
    @include 'config.php';

    if(isset($_POST['paynow'])){
        header('location:shop.php');   
    };
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap');
        body {
            font-family: 'poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }

        .container {
            margin: 0 auto;
            padding: 20px;
        }

        header {
            text-align: center;
        }

        h1 {
            margin: 0;
        }

        form {
            display: flex;
            align-items:flex-start;
            justify-content: center;
            width: 100%;

        }

        .billing-address,
        .payment-information {
            margin: 20px 4rem;
            width: fit-content;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input {
            width: 20rem;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 3px;
            margin-bottom: 10px;
        }

        .card-number-container {
            display: flex;
            gap: 10px;
        }

        .card-number-section {
            width: 2.2rem;
            padding: 3px 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            font-family: monospace;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            outline: none;
        }

        .payment-information .card {
            display: flex;
            align-items: center;
            justify-content: flex-start;
            gap: 3.2rem;
            margin: .5rem 0;
        }

        .expiry, .cvv {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .expiry label, .cvv label{
            margin-right: .2rem;
        }

        .expiry #ex{
            width: 1.35rem;
            text-align: center;
            margin: 0 2px;
        }

        .cvv #cvv{
            width: 1.5rem;
            text-align: center;
            margin: 0 2px;
        }

        #amount {
            color: #777;
        }

        button {
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.2);
            color: white;
            margin-top: .5rem;
            padding: 10px 20px;
            text-decoration: none;
            cursor: pointer; 
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>Payment Page</h1>
        </header>

        <main>
            <form action="#">

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

                <div class="billing-address">
                    <h2>Billing Address</h2>

                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" value="<?php echo $name ?>" required>

                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" value="<?php echo $em ?>" required>

                    <label for="address">Address:</label>
                    <input type="text" id="address" name="address" required>

                    <label for="city">City:</label>
                    <input type="text" id="city" name="city" required>

                    <label for="state">State:</label>
                    <input type="text" id="state" name="state" required>

                    <label for="zip">Zip Code:</label>
                    <input type="text" id="zip" name="zip" required>
                </div>

                <div class="payment-information">
                    <?php

                        $email = $em;
                        $sql = "SELECT Quantity, Price FROM cart WHERE Email = '$email' ";
                        $result = $conn->query($sql);

                        $sum = 0;
                        if($result-> num_rows > 0){
                            while($row = $result-> fetch_assoc()){
                                $count = $row['Quantity'];
                                $amount = $row['Price'];

                                $tot = $count * $amount;
                                $sum = $sum + $tot;
                            }
                        }
                    ?>
                    <h2>Payment Information</h2>

                    <label for="cardNumber">Credit Card Number:</label>
                    <div class="card-number-container">
                        <input type="text" class="card-number-section" maxlength="4" placeholder="5678">
                        <input type="text" class="card-number-section" maxlength="4" placeholder="9012">
                        <input type="text" class="card-number-section" maxlength="4" placeholder="3456">
                        <input type="text" class="card-number-section" maxlength="4" placeholder="1234">

                    </div>
                    <div class="card">
                        <span class="expiry">
                            <label for="expirationMonth">Expiry:</label>
                            <input type="text" id="ex" name="month" placeholder="MM" maxlength="2" required>
                            <input type="text" id="ex" name="year" placeholder="YY" maxlength="2" required>
                        </span>
    
                        <span class="cvv">
                            <label for="cvv">CVV:</label>
                            <input type="text" id="cvv" name="cvv" maxlength="3" required>
                        </span>
                    </div>

                    <label id="amount">Amount : Rs. <?php echo $sum;?>.00</label>

                    <button type="submit" name="paynow" onclick="window.alert('You paid successfully...')">Pay Now</button>
                </div>
            </form>
        </main>

        <footer>
            <p>© 2023 TechTrend Innovation</p>
        </footer>
    </div>
</body>
</html>

<script>
    const cardNumberSections = document.querySelectorAll('.card-number-section');

    cardNumberSections.forEach((section) => {
        section.addEventListener('keyup', (event) => {
            const value = event.target.value;

            if (value.length === 4) {
                const nextSection = section.nextElementSibling;
                if (nextSection) {
                    nextSection.focus();
                }
            }

            if (value.length > 0 && value.length % 4 === 0 && section !== cardNumberSections[cardNumberSections.length - 1]) {
                event.target.value += '-';
            }
        });
    });

</script>