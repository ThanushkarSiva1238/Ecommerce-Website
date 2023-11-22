<?php

    $conn = new mysqli('localhost', 'root', '');
    $db = "CREATE DATABASE Tech_Trend";

    if ($conn->query($db)===true) {
        $db1 = "USE Tech_Trend";
        
        if ($conn -> query($db1)) {
            $table = "CREATE TABLE user(User_Name Varchar(30) NOT NULL,
                        Email Varchar(100) PRIMARY KEY,
                        Password Varchar(100) NOT NULL)";

            if ($conn->query($table)===true) {
                $insert = "INSERT INTO user VALUES ('Kiruthika', 'kiruthika@live.com', '389ab9b1f122123bda9ff29b476305f2')";
                if ($conn -> query($insert)) {
                    echo "<b>:)</b><br>";
                }
                else{
                    echo ":( &nbsp;". $conn->error;
                }
            }


            $table1 = "CREATE TABLE product(ProductID Varchar(10) PRIMARY KEY,
                        Product_Name Varchar(50) NOT NULL,
                        Description Varchar(500) NOT NULL,
                        Quantity INT(5) NOT NUll,
                        Price INT(10) NOT NULL,
                        Img_dir VARCHAR(200) NOT NULL)";
                        
            if ($conn -> query($table1)===true) {
                $insert1 = "INSERT INTO product VALUES
                            ('P001', 'Apple AirPods (2nd Generation)', 'The Apple AirPods (2nd Generation) are wireless earbuds that offer a quick and easy setup, with a single tap to connect to all of your Apple devices. They feature the H1 chip for faster wireless charging and a 50% longer talk time than the original AirPods. The AirPods also deliver high-quality audio with rich bass and clear highs, and they feature active noise cancellation to block out unwanted noise.', 50, 11000, 'Apple Airpods.png'),
                            ('P002', 'Apple Watch Series 8 (41mm)', 'The Apple Watch Series 8 is a smartwatch that features a new always-on display, a faster S8 chip, and a new temperature sensor. It also has a variety of health and fitness features, including ECG, blood oxygen monitoring, and sleep tracking. The Apple Watch Series 8 is available in a variety of colors and styles, including white, silver, graphite, and starlight.', 50, 75000, 'Apple Watch Series8.png'),
                            ('P003', 'Beats Solo Pro', 'The Beats Solo Pro Wireless Noise Cancelling On-Ear Headphones are wireless headphones that offer active noise cancellation to block out unwanted noise. They also feature a unique design with foldable ear cups and a comfortable headband. The Beats Solo Pro headphones deliver high-quality audio with rich bass and clear highs, and they have a battery life of up to 22 hours with active noise cancellation turned on.', 100, 29000, 'beats.png'),
                            ('P004', 'HP ProBook 470 G4 laptop', 'The HP ProBook 470 G4 is a business laptop that offers a durable design, powerful performance, and a variety of security features. It features a 17.3-inch HD display, an Intel Core i7-7500U processor, 16GB of DDR4 RAM, and a 240GB SSD. The ProBook 470 G4 also has a variety of ports, including HDMI, USB 3.0, and USB-C.', 30, 70000, 'HP EliteBook Laptop.png'),
                            ('P005', 'JBL Boombox 2', 'The JBL Boombox 2 is a portable Bluetooth speaker that offers powerful sound, long battery life, and a durable design. It features two 4-inch woofers and two 20mm tweeters, delivering up to 24 hours of playtime on a single charge. The Boombox 2 is also waterproof and dustproof, making it ideal for outdoor use.', 40, 45000, 'Jbl Speaker.png'),
                            ('P006', 'JBL Tune 450BT', 'The JBL Tune 450BT wireless on-ear headphones offer JBL Pure Bass sound, up to 40 hours of battery life, and easy connectivity with Bluetooth. They also feature a comfortable design with soft ear cups and a lightweight headband.', 60, 13000, 'jbl.png'),
                            ('P007', 'Samsung Galaxy S9+', 'The Samsung Galaxy S9+ is a high-end smartphone with a 6.2-inch Super AMOLED display, a dual-lens 12-megapixel rear camera, and a 8-megapixel front camera. It is powered by a Snapdragon 845 processor and has 6GB of RAM and 128GB of storage. The Galaxy S9+ also has a long-lasting battery and supports wireless charging.', 20, 45000, 'Samsung Galaxy S9.png'),
                            ('P008', 'Apple iMac 27-Inch (Late 2011)', 'The Apple iMac 27-Inch (Late 2011) is an all-in-one desktop computer with a 27-inch LED display, a quad-core Intel Core i5 or Intel Core i7 processor, up to 16GB of RAM, and up to 2TB of hard drive storage. It also has a built-in webcam, microphone, and speakers.', 10, 70000, 'silver iMac .png'),
                            ('P009', 'Sony MDR-XB650BT', 'The Sony MDR-XB650BT Wireless EXTRA BASS Bluetooth Headphones offer powerful EXTRA BASS sound, long battery life, and comfortable wear. They feature 30mm drivers that deliver deep, punchy bass, and they have a battery life of up to 30 hours on a single charge. The MDR-XB650BT headphones also have a comfortable design with soft ear cups and a lightweight headband.', 70, 9990, 'Sony Headset.png'),
                            ('P010', 'Lenovo ThinkPad X1 Carbon Gen 10 laptop', 'The Lenovo ThinkPad X1 Carbon Gen 10 is a thin and light business laptop with a 14-inch WUXGA display, an Intel Core i7-1360P processor, 16GB of LPDDR5 RAM, and a 512GB PCIe Gen 4 SSD. It also has a variety of ports, including Thunderbolt 4, HDMI, and USB-C. The ThinkPad X1 Carbon Gen 10 is a durable and reliable laptop that is perfect for business users.', 50, 250000, 'Xiaomi Mi Notebook Air.png'),
                            ('P011', 'OnePlus Bullets Wireless Z2', 'The OnePlus Bullets Wireless Z2 Bluetooth Earbuds offer a comfortable fit, long battery life, and good sound quality. They feature 11.2mm drivers that deliver rich, detailed sound, and they have a battery life of up to 38 hours on a single charge. The Bullets Wireless Z2 earbuds also have a fast charging feature that provides 5 hours of playback from just 10 minutes of charging.', 150, 9999, 'Oneplus neckband.png'),
                            ('P012', 'Sony Xperia Z4 Tablet', 'The Sony Xperia Z4 Tablet is a 10.1-inch Android tablet with a powerful Snapdragon 810 processor, 3 GB of RAM, and 32 GB of internal storage. It has a 10.1-inch Triluminos Display with X-Reality Engine for stunning visuals. It also has a 8.1 MP rear camera with Exmor RS for mobile sensor and a 5.1 MP front camera for selfies and video calls. It is water- and dustproof, and has a long-lasting battery with Quick Charge 2.0.', 30, 45000, 'Sony Xperia Z4 Tablet.png')";
                if ($conn -> query($insert1)) {
                    echo "<b>:)</b><br>";
                }
                else{
                    echo ":( &nbsp;". $conn->error;
                }
            }


            $table2 = "CREATE TABLE offer(ProductID Varchar(10),
                        Offer_Price INT(10) NOT NULL,
                        FOREIGN KEY(ProductID) REFERENCES product(ProductID))";
            
            if ($conn -> query($table2)===true) {
                $insert2 = "INSERT INTO offer VALUES ('P001', 8999), ('P005', 39999), ('P003', 24999), ('P011', 6999)";
                if ($conn -> query($insert2)) {
                    echo "<b>:)</b><br>";
                }
                else{
                    echo ":( &nbsp;". $conn->error;
                }
            }


            $table3 = "CREATE TABLE ContactUs(Name Varchar(30),
                        Email Varchar(100),
                        Msg Varchar(256),
                        Time TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL)";
            
            if ($conn -> query($table3)===true) {
                $insert3 = "INSERT INTO ContactUs(Name, Email, Msg) VALUES ('Kiruthika', 'keiruthigasathiyathas@gmail.com', 'Products are incredible...')";
                if ($conn -> query($insert3)) {
                    echo "<b>:)</b><br>";
                }
                else{
                    echo ":( &nbsp;". $conn->error;
                }
            }

            $table4 = "CREATE TABLE cart(ProductID Varchar(10), Quantity INT(5), Price INT(10), Email Varchar(100), FOREIGN KEY(Email) REFERENCES user(Email))";
            
            if ($conn -> query($table4)===true) {
                $insert4 = "INSERT INTO cart VALUES ('P001', 1, 8999, 'kiruthika@live.com')";
                if ($conn -> query($insert4)) {
                    header('location:Welcome.php');
                }
                else{
                    echo ":( &nbsp;". $conn->error;
                }
            }
        }
    }  
?>