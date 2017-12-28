<?php
require("./assets/inc/blur.inc.php");
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['txt'])) {
        ini_set('display_errors', 0);
        $ogtxt=str_replace(['_','+','.jpg'], [' ',' ',''], strtolower($_GET['txt']));
        if(isset($_GET['capitalize'])){
            $txt = strtoupper($ogtxt);
        } else {
            $txt = randomize($ogtxt);
        }
        if(isset($_GET['random'])){
            $image_path=selectBackground();
        }   
        else {
            $image_path="./assets/img/base.jpg";
        }
        list($img_width, $img_height) = getimagesize($image_path);
        
        $jpg_image = imagecreatefromjpeg($image_path);
        $textcolor = imagecolorallocate($jpg_image, 255, 255, 255);
        $txt_max_width = intval(0.8 * $img_width);
        $txt_max_height = intval(0.2* $img_height);
               
        $font_size = 1;
        $txt_width=0;
        $txt_height=0;
        //set text size based on width
        do {
            $font_size++;
            $p = imagettfbbox($font_size,0,'./assets/fonts/impact.ttf',$txt);
            $txt_width=$p[2]-$p[0];
        } while ($txt_width <= $txt_max_width);
        
        //decrease if too tall to max height threshold
        do {
            $font_size--;
            $p = imagettfbbox($font_size,0,'./assets/fonts/impact.ttf',$txt);
            $txt_width=$p[2]-$p[0];
            $txt_height=$p[1]-$p[7];
        } while ($txt_height >= $txt_max_height);
         
        $y = $img_height * 0.9; //position on image Y
        $x = ($img_width - $txt_width) / 2; //position on image X, this is centered.
        
        //last operations, customize!
        if(isset($_GET['color'])){
            $textcolor=getColor($jpg_image, $_GET['color']);
        }else{
            $textcolor=getColor($jpg_image, "white");
        }
        if(isset($_GET['blur'])){
            $jpg_image=blurImage($jpg_image);
        }
        imagettftext($jpg_image, $font_size, 0, $x, $y, $textcolor, './assets/fonts/impact.ttf', $txt);//create image into variable
        //end customize!
        
        header('Content-type: image/jpeg');
        imagejpeg($jpg_image);
        imagedestroy($jpg_image);   
    }
}

function randomize($str){
    $str = str_split(strtolower($str));
    foreach($str as & $char) {
        if (rand(0, 1)) $char = strtoupper($char);
    }
    return implode('', $str);
}
function selectBackground(){
    $files = glob('./assets/img/*.*');
    $file = array_rand($files);
    return $files[$file];
}
function getColor($image, $input){
    $colors=[
        "white" =>imagecolorallocate($image, 255, 255, 255),
        "black"=>imagecolorallocate($image, 0, 0, 0),
        "red"=>imagecolorallocate($image, 255, 20, 0),
        "blue"=>imagecolorallocate($image, 0, 166, 255),
        "green"=>imagecolorallocate($image, 0, 255, 0),
        "teal"=>imagecolorallocate($image, 130, 230, 225),
        "pink"=>imagecolorallocate($image, 254, 46, 154),
        "yellow"=>imagecolorallocate($image, 255, 255, 0),
        "magenta"=>imagecolorallocate($image, 223,1,165),
        "orange"=>imagecolorallocate($image, 255,128,0),
    ];
    $returnColor=$colors['white'];
    if(isset($colors[strtolower($input)])) $returnColor=$colors[strtolower($input)];
    return $returnColor;
}
