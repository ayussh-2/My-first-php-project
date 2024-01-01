<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <link rel='stylesheet' href='https://codepen.io/P1N2O/pen/xxbjYqx.css'>
    <?php include "../includes/headcontent.php"?>
    <title>Forgot Password?</title>
    <style>
        body {
            /* font-family: Arial, sans-serif; */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f0f0f0;
            transform:scale(0.9)
        }
        #btn{
            margin-top:7%;
            margin-left:37%
        }
        #btnFP{
            margin-top:7%;
            margin-left:43%;
        }
        .input-wrapper {
            position: relative;
            font-family: 'Dosis', sans-serif;
            /* margin-bottom: 20px; */
        }

        input[type="text"],
        input[type="password"] {
            width: 300px;
            padding: 10px;
            font-size: 16px;
            border: 2px solid #ccc;
            border-bottom-width: 4px; /* Initial bottom border width */
            outline: none;
            transition: border-color 0.3s, border-bottom-width 0.3s; /* Add animation for border color and width changes */
        }

        /* Optional: Style the placeholder text */
        input[type="text"]::placeholder,
        input[type="password"]::placeholder {
            color: #777;
        }
        @media (max-width: 800px) {
            .container{
                transform:scale(1.25);
            }
            body{
                height:100vh
            }
            #takeEmail,#takePass {
                    padding:10%;
                }
            #btn{
                margin-top:10%;
                margin-bottom:5%;
                margin-left:55px;
            }
            #pass,#pass2{
                width:100%;
            }
            #btnFP{
                margin-top:15%;
                margin-left:15%;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="content">
            <div class="card m-5 shadow">
                <div class="row" id="takeEmail">
                    <div class="col-6  d-none d-md-block">
                        <img src="https://images.pexels.com/photos/17564359/pexels-photo-17564359/free-photo-of-beverage-with-straw-in-table.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="" >
                    
                    </div>
                    <div class="col-md-6 sm-12">
                        <a href="./index.php" id="forPass" class="hlinks text-right" style="font-size: 90%;margin-top:20%">Remember Yourself ? Login!</a>
                        <div class="form">
                        
                            <h3 id="loginHeader">Forgot Password?</h3>
                            <div class="input-wrapper">
                                <input type="email" required placeholder="Email ID" name="uid" class = "email" id="formInput">
                            </div>
                                <button class="bn54" id="btn" name="login" onclick="checkUser()">
                                    <span class="bn54span">Next</span>
                                </button>
                        
                        </div>
                    </div>
                </div>

                <div class="row" id="takePass">
                    <div class="col-12">
                        <!-- <a href="./index.php" id="forPass" class="hlinks text-right" style="font-size: 90%;margin-top:20%">Back to login!</a> -->
                        <div class="form2">
                            <h3 id="loginHeader">Welcome!</h3>
                            <div class="input-wrapper">
                                <input type="password" required placeholder="Create a strong password!" name="uid" class = "password" id="pass">
                                <input type="password" required placeholder="Repeat your password!" name="uid" class = "password" id="pass2">
                            </div>
                                <button class="bn54" id="btnFP" name="login" onclick="changePassword()">
                                    <span class="bn54span">Change</span>
                                </button>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
<script src="script.js"></script>

<script>
    $(document).ready(function () {
        $("#takePass").hide()
    });
</script>

</body>
</html>
