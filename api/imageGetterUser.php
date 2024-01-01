<?php
// error_reporting(E_ALL);
// ini_set('display_errors', 1);

include "conn.php";
$query = mysqli_query($conn, "SELECT * FROM `images` WHERE `status` = 1;");
$totalImages = mysqli_num_rows($query);
$query2 = mysqli_query($conn, "SELECT * FROM `users` WHERE `Sysid` = '$userId' AND `status` = '1'");
$dataArray = mysqli_fetch_assoc($query2);
// print_r($dataArray);
$userName = $dataArray['name'];
$idArray = json_decode($dataArray['liked'], true);
if ($totalImages > 0) {
    while ($row = mysqli_fetch_assoc($query)) {
        $imagePath = $row['imgDirectory'];
        $imageId = $row['id'];
        $btnText = "Like!";
        if (in_array($imageId, $idArray)) {
            $btnText = "Unlike!";
        }
        echo '<div class="col-lg-4 col-md-6 col-sm-6">';
        echo '    <a href="' . $imagePath . '" data-fancybox="gallery">';
        echo '        <img src="' . $imagePath . '" class="img-fluid" id="gimage" alt="Image">';
        echo '    </a>';
        echo '<button value ="' . $imageId . '" onclick="likePics()" id="'.$imageId.'">'.$btnText.'</button>';
        echo '</div>';
    }
} else {
    echo "<h2>No images found!</h2>";
}
?>