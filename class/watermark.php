<?php
/**
 * @author Jimmy
 * @version 1.0
 *
 */

class WaterMark{

	private $info;   //原图像信息
	private $image;  //暂存图像

	public function __construct($src){
		$this->info = $this->load_image($src);
	}

	/**
	 * 加载图片创建临时图像
	 */
	public function load_image($src){
		$imagesize = getimagesize($src);
		$info = array(
			'width' =>$imagesize[0],
			'height' =>$imagesize[1],
			'extension' =>image_type_to_extension($imagesize[2],false)
		);
		$function = 'imagecreatefrom'.$info['extension'];
		//统一放到$info数组中
		$info['image'] = $function($src);
		return $info;
	}

	/**
	 * 缩略图函数
	 * @$width   缩略图宽度
	 * @$height  缩略图高度
	 */
	public function thumb($width,$height){
		$thumb_image = imagecreatetruecolor($width, $height);
		imagecopyresampled($thumb_image,$this->info['image'],0,0,0,0,$width,$height,$this->info['width'],$this->info['height']);
		$this->info['image'] = $thumb_image;
	}

	/**
	 * 添加水印
	 * @$dst_im  水印图
	 */
	public function water($dst_im){
        $water_info = $this ->load_image($dst_im);
		imagecopymerge($this->info['image'],$water_info['image'],0,0,0,0,$water_info['width'],$water_info['height'],30);
		imagedestroy($water_info['image']);
	}

	/**
	 * 添加文字水印
	 * @$word  水印文字
	 */
	public function text($word){
		$textcolor = imagecolorallocate($this->info['image'],255,255,255);
		$font = 'msyh.ttf';
		//imagestring($this->info['image'],2,40,40,$word,$textcolor);
		imagettftext($this->info['image'],14,0,20,20,$textcolor,$font,$word);
	}

	public function show(){
		header('Content-type:image/'.$this->info['extension']);
		$func = 'image'.$this->info['extension'];
		$func($this->info['image']);
	}

	public function save($path){
		$func = 'image'.$this->info['extension'];
		$func($this->info['image'],$path.'.'.$this->info['extension']);
	}

	public function __destruct(){
		imagedestroy($this->info['image']);
	}

}
?>