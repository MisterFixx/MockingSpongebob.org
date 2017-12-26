<?php

ini_set("display_errors", 1);

/*
 *  FUNCTIONS
 */
function mock($string) {
    $string = str_split(strtolower($string));
    foreach($string as & $character) {
        if (rand(0, 1)) { 
            $character = strtoupper($character);
        }
    }
    return implode("", $string);
}

/*
 *  REQUEST
 */
if ($_SERVER["REQUEST_METHOD"] == "GET" && !empty($_GET["txt"])) {
    $txt = mock(str_replace(["_", "+", ".jpg"], [" ", " ", ""], $_GET["txt"]));
    list($img_width, $img_height, ,) = getimagesize("base.jpg");
    $jpg_image = imagecreatefromjpeg("base.jpg");
    $font_size = 1;
    while($txt_width <= intval(0.9 * $img_width)) {
        $font_size++;
        $p = imagettfbbox($font_size, 0, "impact.ttf", $txt);
        $txt_width = $p[2] - $p[0];
        $txt_height =$p[1] - $p[7]; // just in case you need it
    } 
    imagettftext($jpg_image, $font_size, 0, ($img_width - $txt_width) / 2, $img_height * 0.9, imagecolorallocate($jpg_image, 255, 255, 255), "impact.ttf", $txt);
    header("Content-type: image/jpeg");
    imagejpeg($jpg_image);
    imagedestroy($jpg_image);
}
