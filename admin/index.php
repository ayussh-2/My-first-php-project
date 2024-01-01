<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <link rel='stylesheet' href='https://codepen.io/P1N2O/pen/xxbjYqx.css'>
    <?php include "../includes/headcontent.php"?>
    <title>Login</title>
    <style>
        #btn{
            margin-top:15%;
            margin-left:37%;
        }
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
            .container {
                transform: scale(1.25);
            }
            body {
                height: 85vh;
            }
            #formContainer {
                display: block;
            }
            #btn {
                margin-top: 10%;
                margin-left: 26%;
            }
        }

    </style>
</head>
<body>
    <div class="container">
        <div class="content">
            <div class="card m-5 shadow" id="phoneCard">
                <div class="row">
                    <div class="col-6  d-none d-md-block">
                        <img src="https://images.pexels.com/photos/17564359/pexels-photo-17564359/free-photo-of-beverage-with-straw-in-table.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="" >
                    
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <a href="./createAcc.php" id="forPass" class="hlinks text-right" style="font-size: 90%;margin-top:20%">New here? Join us now!</a>
                        <div class="form">
                        
                            <h3 id="loginHeader">Welcome Back!</h3>
                            <div class="input-wrapper">
                                <input type="email" required placeholder="Email ID" name="uid" class = "email" id="formInput">
                                <input type="password" required id="pass" name="upass" placeholder="Password">
                                <div class="checkbox-wrapper-35">
                                    <input class="switch" type="checkbox" id="switch" onclick="viewPass()" name="switch" value="private">
                                    <label for="switch">
                                        <span class="switch-x-text" id="desc">Show password</span>
                                    </label>
                                </div>                                    
                            </div>
                                <a href="./forgotPass.php" id="forPass" class="hlinks text-right" style="font-size: 90%">Forgot Password?</a>

                                    <button class="bn54" id="btn" name="login" onclick="loginUser()" style="margin-bottom:10%">
                                        <span class="bn54span">Sign in</span>
                                    </button>
                                
                                
                                
                        
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
<script src="script.js"></script>
</body>
</html>
