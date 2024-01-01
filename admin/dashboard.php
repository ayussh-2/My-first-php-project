<?php
include "../api/conn.php";
$userCount = mysqli_numrows(mysqli_query($conn,"SELECT * FROM `users` WHERE `status` = '1' "));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <?php include "../includes/headcontent.php"?>
    <link rel="stylesheet" href="../style.css">
    <style>
        body{
            /* background-color:black */
        }
        #dashImg {
            max-width: 100%;
            height: auto;
            display: inline;
            margin: 0 auto;
        }
        #hlinks {
        transition: 0.5s;
        color: black;
        }

        #hlinks:hover {
        color: grey;
        text-decoration: none;
        transform:scale(1.2)
        /* box-shadow: 0px 2px black; */
        }
    </style>
</head>
<body>
    <?php include "./includes/header.php" ?>
    <div class="container">
        <input type="text" value="<?php echo $userCount?>">
        <div class="content">
            <div class="row">
                <div class="col-5 card" style="padding:5%">
                    <h3>Total pictures on display</h3>
                    <hr>
                    <h5>45</h5>
                </div>
                <div class="col-1">&emsp;</div>
                <div class="col-5 card" style="padding:5%">
                    <h3>Total users</h3>
                    <hr>
                    <h5>12</h5>
                </div>
            </div>
            <div class="row my-3">
                <div class="col-5 card" style="padding:5%"><a href="#" id="hlinks" style="text-align:center;">Upload Pictures</a></div>
                <div class="col-1">&emsp;</div>
                <div class="col-5 card" style="padding:5%"><a href="#" id="hlinks" style="text-align:center;">Manage Pictures</a></div>
            </div>
            

        </div>
    </div>
</body>
</html>