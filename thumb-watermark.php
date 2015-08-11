<?php
header('charset=utf8');
//文字水印
    /*  获取图片信息并且打开一张在内存中的图片
		1.代开图片
		2.获取图片信息
		3.获取图片类型
		4.复制图片到内存中
    */
	$image = 'car.jpg';
	$info = getimagesize($image);
	$extension = image_type_to_extension($info[2],false);
	$function = 'imagecreatefrom'.$extension;
	$memory_image = $function($image);
	//操作图片
	$thumb_image = imagecreatetruecolor(300, 200);
	imagecopyresampled($thumb_image,$memory_image,0,0,0,0,300,200,$info[0],$info[1]);

	//输出内存中的图片
		$func = 'image'.$extension;
		$func($thumb_image,'output.'.$extension);
	//销毁内存中图片
	imagedestroy($thumb_image);
?>