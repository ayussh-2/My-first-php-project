<?php
function dislike($imageId, $array){
    $newArray = $array;
    array_splice($newArray, $imageId, 1);
    print_r($newArray);
}

$a = [2, 3, 4, 5, 7, 8, 9];
$ele = 0;
dislike($ele, $a);
?>