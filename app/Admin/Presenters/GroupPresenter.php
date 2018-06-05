<?php

namespace App\Admin\Presenters;

use App\Models\Group;

class GroupPresenter
{
	public function cover($url){
        return "<img src='$url' width='30' class='img-circle' height='30'/>";
	}
}