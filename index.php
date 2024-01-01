<?php 
session_start();
$userId = $_SESSION['userId'];
if(isset($_SESSION['userId'])){
    header("Location:./welcome.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "includes/headcontent.php"?>
    <!-- Fancybox CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css">
    <!-- Fancybox JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>

    <link rel="stylesheet" href="style.css">
    <title>Shutter Symphony</title>
</head>

<body>
    <div id="header">
        <?php include "includes/header.php"?>
    </div>
    <div class="welcome">
        <p>Welcome to Shutter Symphony!</p>
    </div>

    <div class="container">
        <div class="row" id="image-gallery">
            <?php include "./api/imageGetter.php"?>
        </div>

        <!--login overlay-->
        <?php include "includes/loginoverlay.php"?>
    </div>

    <hr>
    <div class="endtxt">
        <P>
            Thank you for joining me on this visual exploration and for allowing my photographs to be a part of your
            artistic journey.
        </P>
    </div>
    <?php include "includes/footer.php"?>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Fancybox JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>

    <script>
        $(document).ready(function () {
            // Initialize Fancybox plugin on elements with class "img-popup"
            $('[data-fancybox="gallery"]').fancybox({
                loop: true,
                infobar: false,
                arrows: true,
                buttons: ['close', 'slideShow'],
                transitionEffect: 'fade',
                transitionDuration: 300,
                idleTime: false,
                baseClass: 'fancybox-custom'
            });
        });
</script>



    


</body>

</html>
