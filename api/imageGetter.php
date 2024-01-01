<?php
include "conn.php";

$query = mysqli_query($conn, "SELECT * FROM `images` WHERE `status` = 1;");
$totalImages = mysqli_num_rows($query);

if ($totalImages > 0) {
    while ($row = mysqli_fetch_assoc($query)) {
        $imagePath = $row['imgDirectory'];
        $imageId = $row['id'];
        echo '<div class="col-lg-4 col-md-6 col-sm-6">';
        echo '    <a href="' . $imagePath . '" data-fancybox="gallery">';
        echo '        <img src="' . $imagePath . '" class="img-fluid" id="gimage" alt="Image">';
        echo '    </a>';
        echo '<input type="hidden" id="' . $imageId . '" value="' . $imageId . '">';
        echo '</div>';
    }
} else {
    echo "<h2>No images found!</h2>";
}
?>