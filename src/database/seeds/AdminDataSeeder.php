<?php

use Zhuayi\admin\Base\BaseSeeder;

use Illuminate\Database\Eloquent\Model;

use Zhuayi\admin\Models\User;

// ini_set("display_errors", "On");
// error_reporting(E_ALL | E_STRICT);

// 初始化用户数据
class AdminDataSeeder extends BaseSeeder
{
    // 角色名字
    protected $roleName = "Admin";

    // 权限, 可以使用正则模式
    protected $permission = '/';

    public function run() {

        
        Model::unguard();

        DB::table('users')->delete();
        DB::table('roles')->delete();
        DB::table('role_user')->delete();
        DB::table('permission_role')->delete();
        DB::table('permissions')->delete();
        
        if (!Schema::hasColumn('permissions', 'isDisplay'))
        {
            Schema::table('permissions', function($table)
            {
                $table->tinyInteger('isDisplay')->comment('是否显示在左侧菜单');
            });
        }

        if (!Schema::hasColumn('permissions', 'power'))
        {
            Schema::table('permissions', function($table)
            {
                $table->string('power')->comment('权限正则');
            });
        }
        

        $user = User::create([
            'email' => 'admin@yingzt.com', 
            'name' => 'admin',
            'password' => bcrypt('admin')
        ]);

        // 创建组
        $admin = parent::createRole($this->roleName, "超级管理员组");

        $menuIds = array();
        $perant_id = parent::createPermission("/admin", "", "管理后台", 1 , '$');
        $menuIds[] = $perant_id;
        $menuArray = [
           [
                "name" => "admin/user",
                "display_name" => $perant_id,
                "description" => "账号管理",
                "isDisplay" => 1,
                "power" => '(.*)',
           ],
           [
                "name" => "admin/role",
                "display_name" => $perant_id,
                "description" => "角色管理",
                "isDisplay" => 1,
                "power" => '(.*)',
           ],
           [
                "name" => "admin/menu",
                "display_name" => $perant_id,
                "description" => "菜单管理",
                "isDisplay" => 1,
                "power" => '(.*)',
           ]
        ];

        foreach ($menuArray as $value) {
            
            $menuIds[] = self::createPermission(
                $value['name'], 
                $value['display_name'], 
                $value['description'],
                $value['isDisplay'],
                $value['power']
                );
        }

        // 添加用户组权限
        $admin->perms()->sync($menuIds);


        $user->attachRole($admin); 

        // // 检查
        print_r("true\n");

        Model::reguard();
    }


}
