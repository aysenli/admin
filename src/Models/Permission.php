<?php 
namespace Zhuayi\admin\Models;

use Zizaco\Entrust\EntrustPermission;

use Zhuayi\admin\Base\BaseObservers;

class Permission extends EntrustPermission {

    public static function boot() {
        parent::boot();

        self::observe(new BaseObservers);
    }

}