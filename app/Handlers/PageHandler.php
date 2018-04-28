<?php

namespace App\Handlers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class PageHandler{

	public function page($table,$where=[],$rev=10){
		//总条数
		$count = count(DB::table($table)->where($where)->get());
		//总页数
		$sum = ceil($count/$rev);
		//求当前页
		$page = Input::get('page'); 
		if(empty($page)){
			$page=1;
		}
		//上一页 下一页
		$prev = ($page==1)?$page:$page-1;
		$next = ($page==$sum)?$page:$page+1;
		//偏移量
		$offset = ($page-1)*$rev;
		//获取数据
		$data=DB::table($table)->where($where)->offset($offset)->limit($rev)->get();
		$pageData = ['data'=>$data,'prev'=>$prev,'next'=>$next,'sum'=>$sum,'page'=>$page];
		return $pageData;
	}

	public function allPage($data,$rev=10){
		//总条数
		$count = count($data);
		//总页数
		$sum = ceil($count/$rev);
		//求当前页
		$page = Input::get('page'); 
		if(empty($page)){
			$page=1;
		}
		//上一页 下一页
		$prev = ($page==1)?$page:$page-1;
		$next = ($page==$sum)?$page:$page+1;
		//偏移量
		$offset = ($page-1)*$rev;
		//获取数据
		$data=array_slice($data,$offset,10);
		$pageData = ['data'=>$data,'prev'=>$prev,'next'=>$next,'sum'=>$sum,'page'=>$page];
		return $pageData;
	}

}