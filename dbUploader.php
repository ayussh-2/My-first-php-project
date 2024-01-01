<?php
include "./api/conn.php";
$imageDirectory = './Images/uploads/';

// Create a DirectoryIterator object for the image directory
$directoryIterator = new DirectoryIterator($imageDirectory);

// Loop through the directory iterator and generate HTML code for image files
foreach ($directoryIterator as $fileInfo) {
    if ($fileInfo->isFile() && is_valid_image($fileInfo->getPathname())) {
        $imagePath = $imageDirectory . $fileInfo->getFilename(); // Add directory to the file name
        $query = mysqli_query($conn, "INSERT INTO `images` (`imgDirectory`, `status`) VALUES ('$imagePath', '1');");
    }
}
if($query){
    echo "OK";
}else {
    echo "Failed";
}

// Function to validate if a file is a valid image
function is_valid_image($filePath) {
    $allowedExtensions = array('jpg', 'jpeg', 'png', 'gif');
    $extension = strtolower(pathinfo($filePath, PATHINFO_EXTENSION));
    
    return in_array($extension, $allowedExtensions);
}
?>