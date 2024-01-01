    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="favicon.ico" type="image/x-icon">
        <title>Register yourself!</title>
        <?php include "../includes/headcontent.php"?>
        <link rel="stylesheet" href="../style.css">
        <link rel="stylesheet" href="toast/style.css">
        <script src="https://kit.fontawesome.com/ad27b7bb36.js" crossorigin="anonymous"></script>
        <style>
            body{
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                /* margin-top:5%; */
                background-color: #f0f0f0;
                transform:scale(0.9) 
            }
            #loginHeader{
                text-align:center;
            }
            .input-wrapper {
                position: relative;
                font-family: 'Dosis', sans-serif;
                /* margin-bottom: 20px; */
            }

            .swal-custom-container {
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
            #btn{
                margin-top:10%;
                margin-left:37%;
            }
            /* .swal2-container {
            transform: none !important;
            } */

            @media (max-width: 700px) {
            .container{
                transform:scale(1.25);
            }
            body{
                height:85vh;
            }
                #imageContainer {
                display: none;
            }
            .form{
                padding-top:20%
            }
            #formContainer {
                    display: block;
                }
            #btn{
            margin-top:10%;
            margin-left:26%;
                }
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
            <div id="toastBox"></div>
                <div class="card m-5 shadow">
                    <div class="row">
                        <div class="col-md-6" id="imageContainer">
                            <!-- <img src="https://images.pexels.com/photos/6110294/pexels-photo-6110294.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt=""> -->
                            <img src="https://images.pexels.com/photos/17564359/pexels-photo-17564359/free-photo-of-beverage-with-straw-in-table.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="" >
                        </div>

                        <div class="col-md-6" id="formContainer">
                            <div class="form">
                                <h3 id="loginHeader" >Create a new account!</h3>
                                <div id="newAcc">
                                    <div class="input-wrapper">
                                        <input type="text" required placeholder="What should we call you?" name="name" id="formInput" class="name">
                                        <input type="email" required placeholder="Tell us your Email" name="email" id="formInput" class="email">
                                        <input type="password" required placeholder="Create a strong password" name="pass" id="pass" class="pass">
                                        <input type="password" required placeholder="Repeat your password"  id="pass2">
                                    </div>
                                    <button class="bn54" onclick="registerUser()" id="btn" style="margin-bottom:10%">
                                        <span class="bn54span">Submit</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        
        <script src="script.js"></script>
    </body>
    </html>