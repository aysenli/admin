<?php 

namespace Zhuayi\BaseAdmin\Base;

use Zhuayi\BaseAdmin\Models\ModelLog;
use Request;
use Auth;

class BaseObservers {


    public function saved($model) {
        

        $modelLog = new ModelLog;
        $modelLog->observe_url = Request::path();
        $modelLog->admin_uid = Auth::user() ? Auth::user()->id : 0;
        $modelLog->table_name = $model->getTable();
        $modelLog->after_data = json_encode($model->getAttributes());
        $modelLog->before_data = json_encode($model->getOriginal());
        $modelLog->save();

    }

    public function deleted($model){

        $modelLog = new ModelLog;
        $modelLog->admin_uid = Auth::user()->id;
        $modelLog->observe_url = Request::path();
        $modelLog->table_name = $model->getTable();
        $modelLog->before_data = json_encode($model->getOriginal());
        $modelLog->save();
    }

}