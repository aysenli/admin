<?php

namespace Zhuayi\admin\Base;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use Zhuayi\admin\Models\Permission;

use Zhuayi\admin\Models\Role;


class BaseSeeder extends Seeder {



    // 创建角色组
    public function createRole($name, $display_name) {

        $role = Role::where("name", '=', $name)->get()->first();
        if (!$role) {
            // 创建组
            $role = new Role;
            $role->name = $name;
            $role->display_name = $display_name;
            $role->save();
        }
        return $role;
    }


    // 创建权限菜单
    public function createPermission($name, $display_name, $description, $isDisplay = 1, $power = '') {
        
        // 先检查存在不存在
        $permission = Permission::where('name', '=', $name)->get()->first();
     
        if ($permission) {
            return $permission->id;
        }

        //创建权限
        $manageMenu = new Permission;
        $manageMenu->name = $name;
        $manageMenu->display_name = $display_name;
        $manageMenu->description = $description;
        $manageMenu->isDisplay = $isDisplay;
        $manageMenu->power = $power;
        $manageMenu->save();

        return $manageMenu->id;
    }

}