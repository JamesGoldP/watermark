<?php
	require_once('watermark.php');
    $src_im = '../car.jpg';
    $dsc_im = '../watermark.png';
    $word = '抵押车交易网';
    $watermark = new WaterMark($src_im);
    $watermark->text($word);
    $watermark->thumb(200,100);
    $watermark->water($dsc_im);
    $watermark->show();
?>