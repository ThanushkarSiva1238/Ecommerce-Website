<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded" />
    <title>Welcome</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap');

        body{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            background: #dce1eb;
        }
        .container{
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding-top: .5rem;
        }
        .container h3{
            font-size: 2em;
            margin: 0;
            color: #333;
            font-weight: 600;
        }
        .container h1{
            font-size: 4em;
            color: #444;
            font-weight: 600;
            margin: 0;
            text-shadow: -8px 8px 7px #777;
        }
        h1 #bolt{
            font-size: .7em;
            margin: 0;
            padding: 0;
        }
        .container h2{
            margin-top: 10px;
            font-size: 2em;
            color: #333;
        }
        h2 span{
            font-size: 1em;
            padding: 5px 15px;
            margin-right: 5px;
            background: #dc143c;
            color: #fff;
            border-radius: 10px;
            box-shadow: -5px 5px 10px #dc143c;
        }
        table{
            box-shadow: 0 0 30px rgba(0, 0, 0, .4);
            border-radius: 1rem;
        }
        table caption{
            font-size: 1.2rem;
            font-weight: 500;
            color: #222;
        }
        table tr th{
            text-align: left;
            padding: 5px 20px;
            text-transform: capitalize;
            color: #333;
        }
        table tr td span{
            padding: 5px 20px;
            color: #dc143c;
            padding-left: 5px;
            text-shadow: 0 0 25px #dc143c;
        }
        @media screen and (max-width: 1920px){
            body{
                overflow: hidden;
                zoom: 1.4;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h3>Hi, Admin</h3>
        <h1><span class="material-symbols-rounded" id="bolt">bolt</span>Welcome<span class="material-symbols-rounded" id="bolt">bolt</span></h1>
        <h2><span>TechTrend Database</span> Created Successfully</h2>
        <table>
            <caption>Table List</caption>
            <?php
                $conn = mysqli_connect('localhost', 'root', '', 'tech_trend');

                if($conn->connect_error){
                    die("Connection failed: ". $conn->connect_error);
                }

                $sql = "SHOW Tables";
                $result = $conn->query($sql);

                if($result-> num_rows > 0){
                    while($row = $result-> fetch_assoc()){
            ?>
            <tr>
                <th><?= $row["Tables_in_tech_trend"] ?></th>
                <td><span class='material-symbols-rounded'>done_all</span></td>
            </tr>
            <?php
                    }
                }
            ?>
        </table>
    </div>
    
</body>
</html>