<?php 
namespace Zhuayi\BaseAdmin\Models;

use Zizaco\Entrust\EntrustRole;

use Zhuayi\BaseAdmin\Base\BaseObservers;

class Role extends EntrustRole
{
    public static function boot() {
        parent::boot();

        self::observe(new BaseObservers);
    }


	public function projects()
	{
		// return $this->belongsToMany('App\Models\Project');
		return $this->hasMany('App\Models\Project');
	}


	public function users()
	{
		//一对多hasMany 生成的sql select * from `users` where `users`.`role_id` = 5 and `users`.`role_id` is not null
    	// return $this->hasMany('App\Models\User');
    	return $this->belongsToMany('App\Models\User');
	}

	/**
	 * 一对一查询permission表, 根据用户角色 ID 获取用户所有权限
	 * @return [type] [description]
	 */
	public function permissions()
    {
        //一对多hasMany 生成的sql select * from `users` where `users`.`role_id` = 5 and `users`.`role_id` is not null
        // return $this->hasMany('App\Models\User');
        return $this->belongsToMany('Zhuayi\BaseAdmin\Models\Permission')->orderBy('id','asc');
    }
}