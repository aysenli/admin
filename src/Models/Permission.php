<?php 
namespace Zhuayi\BaseAdmin\Models;

use Zizaco\Entrust\EntrustPermission;

use Zhuayi\BaseAdmin\Base\BaseObservers;

class Permission extends EntrustPermission {

    public static function boot() {
        parent::boot();

        self::observe(new BaseObservers);
    }

}