<?php

namespace App\Observers;

use App\Http\Models\Log;

// creating, created, updating, updated, saving,
// saved,  deleting, deleted, restoring, restored

class LogObserver
{
    public function saving(Log $log)
    {
        if(empty($log->title)){
        	$log->title=date('Y_m_d',time());
        }
    }
}