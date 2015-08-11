<?php
	require_once('watermark.php');
	$src = '../car.jpg';
	$watermark = new WaterMark($src);
	$watermark ->thumb(100,100);
	$watermark ->show();
?>