<?php
    require_once('watermark.php');
    $src_im = '../car.jpg';
    $dst_im = '../watermark.png';
    $watermark = new WaterMark($src_im);
    $watermark ->water($dst_im);
    $watermark ->save('./output');
?>