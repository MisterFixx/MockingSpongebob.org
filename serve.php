<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['txt'])) {
        ini_set('display_errors', 1);
        function randomize($str){
            $str = str_split(strtolower($str));
            foreach($str as & $char) {
                if (rand(0, 1)) $char = strtoupper($char);
            }
            return implode('', $str);
        }
        $txt = randomize(str_replace(['_','+','.jpg'], [' ',' ',''], $_GET['txt']));
        list($img_width, $img_height, ,) = getimagesize("base.jpg");
        $jpg_image = imagecreatefromjpeg('base.jpg');
        $white = imagecolorallocate($jpg_image, 255, 255, 255);
        $font_size = 1;
        $txt_max_width = intval(0.9 * $img_width);
        do {
            $font_size++;
            $p = imagettfbbox($font_size, 0, 'impact.ttf', $txt);
            $txt_width = $p[2] - $p[0];
            $txt_height =$p[1] - $p[7]; // just in case you need it
        }
        while ($txt_width <= $txt_max_width);
        $y = $img_height * 0.9; 
        $x = ($img_width - $txt_width) / 2;
        imagettftext($jpg_image, $font_size, 0, $x, $y, $white, 'impact.ttf', $txt);
        header('Content-type: image/jpeg');
        imagejpeg($jpg_image);
        imagedestroy($jpg_image);
    }
}
