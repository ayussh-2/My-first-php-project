<?php
session_start();
?>
    <?php 
            if(!isset($_SESSION['userId'])){
                ?>
                    <a href="./"><img src=".\Images\Logo.png" alt="Logo" height="10%" width="20%" style = "height:150px;width:210px"></a>
                <?php
            }else{
                ?>
                    <a href="./welcome.php"><img src=".\Images\Logo.png" alt="Logo" height="10%" width="20%" style = "height:150px;width:210px"></a>
                <?php
            }
        ?>

    <div class="hlinks">
        <div class="hlinks d-none d-md-block">
            <br><br>
            <a href=".\About.php" id = "hovertxt">About</a>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href=".\contact.php" id = "hovertxt">Contact</a>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <!-- <button  id = "bttn" href="adminPanel\login.php">Login</button> -->
            <?php 
                if(!isset($_SESSION['userId'])){
                    ?>
                        <a id = "hovertxt" href="./admin">Login</a>
                    <?php
                }else{
                    ?>
                        <a id = "hovertxt" href="./admin/logout.php">Logout</a>
                    <?php
                }
            ?>
        </div>
            <!-- Top menu -->
        <nav class="navbar navbar-dark fixed-top mobile-navbar" id="burger">
            <div class="container">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
    
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a href=".\About.php" id = "hovertxt">About</a>
                        </li>
                        <li class="nav-item">
                            <a href=".\contact.php" id = "hovertxt">Contact</a>
                        </li>
                        <li class="nav-item">
                        <?php 
                            if(!isset($_SESSION['userId'])){
                                ?>
                                    <a id = "hovertxt" href="./admin">Login</a>
                                <?php
                            }else{
                                ?>
                                    <a id = "hovertxt" href="./admin/logout.php">Logout</a>
                                <?php
                            }
                        ?>
                        </li>
                    </ul>
                </div>
    
            </div>
        </nav>

        <!-- onclick="on()" -->
        <!-- <a href="https://www.instagram.com/ayus.sh/" id = "hovertxt">Login</a> -->
    </div>