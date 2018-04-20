<?php

namespace App\Handlers;
use Image;

class ImageUploadHandler{

	//只允许上传的文件类型
	protected $allowed_ext=['png','jpg','gif','jpeg'];

	public function save($file,$folder,$prefix,$max_width=false){
		//文件目录拼接
		$folder_name='uploads/images/'.$folder.'/'.date('Ym/d',time());

		//具体路径 public_path() 是public文件的物理路径
		$path=public_path().'/'.$folder_name;

		//获取文件后缀名
		$extension=strtolower($file->getClientOriginalExtension())?:'png';

		//拼接文件名
		$filename=$prefix.'_'.time().'_'.str_random(10).'.'.$extension;

		//判断上传文件后缀
		if(!in_array($extension,$this->allowed_ext)){
			return false;
		}

		//将图片移动到目标文件
		$file->move($path,$filename);
		//如果有对图片宽度进行限制
		if($max_width && $extension!='gif')
		{
			$this->reduceSize($path.'/'.$filename,$max_width);
		}

		//返回绝对路径
		return [
            'path' => config('app.url')."/$folder_name/$filename",
        ];
	}

	protected function reduceSize($path,$max_width){
		//实例化
		$image=Image::make($path);

		  // 进行大小调整的操作
        $image->resize($max_width, $max_width, function ($constraint) {

            // 设定宽度是 $max_width，高度等比例双方缩放
           // $constraint->aspectRatio();

            // 防止裁图时图片尺寸变大
            $constraint->upsize();
        });

		//保存图片
		$image->save();
	}
}
