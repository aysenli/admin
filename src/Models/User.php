<?php

namespace Zhuayi\BaseAdmin\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
// use Zizaco\Entrust\Contracts\EntrustUserInterface as EntrustUserContract;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use DB;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use EntrustUserTrait;
    use Authenticatable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];
  
    function assoc_unique($arr, $key)
    {
        $tmp_arr = array();
        foreach($arr as $k => $v)
        {
            //搜索$v[$key]是否在$tmp_arr数组中存在，若存在返回true
            if(in_array($v[$key], $tmp_arr))
            {
                unset($arr[$k]);
            }
            else {
                $tmp_arr[] = $v[$key];
            }
        }

        //sort函数对数组进行排序
        sort($arr);
        return $arr;
    }
    
    /**
     * 获取角色名
     */
    public function roleInfo(){

        // 获取用户权限组合权限列表 modify by renxin 2015/09/25
        $roleArray = array();
        $permission = array();
        foreach($this->roles as $role){
            $roleArray[] = $role->name;

            $permission = array_merge($role->permissions->toArray(), $permission);
        }

        $permission = $this->assoc_unique($permission, 'id');
        
        return [ 'role' => $roleArray, 'permission' => $permission];
    }

   
}
