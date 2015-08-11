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
	$function = imagecreatefrom.$extension;
	$memory_image = $function($image);

	//操作图片
        $water_image = 'watermark.png';
        $water_info = getimagesize($water_image);
		$water_extension = image_type_to_extension($water_info[2],false);
		$water_function = imagecreatefrom.$water_extension;
		$water_memory_image = $water_function($water_image);
		imagecopymerge($memory_image,$water_memory_image,0,0,0,0,$water_info[0],$water_info[1],30);

	//输出内存中的图片
		$func = image.$extension;
		$func($memory_image,'output.'.$extension);
	//销毁内存中图片
	imagedestroy($memory_image);
?>