<?php

namespace Zhuayi\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Redirect;

use Zhuayi\admin\Models\Role;
use Zhuayi\admin\Models\Permission;
use DB;
class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $wherName = trim(\Input::get('name'));

        if ($wherName) {
            $show['roles'] = Role::where('display_name','like','%'.$wherName.'%')->get();
        } else {
            $show['roles'] = Role::all();
        }
        
        return View('admin.role.index', ['title' => '后台管理 - 账号管理', 'show' => $show]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function add()
    {
        // 获取全部角色
        $show['permissions'] = Permission::all();
        return View('admin.role.edit', ['title' => '后台管理 - 新增角色', 'show' => $show]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Request $request)
    {
        $role = new Role;
        $role->name = trim($request->get('display_name'));
        $role->display_name = trim($request->get('display_name'));
        $role->description = trim($request->get('description'));
        $role->save();
        $role->perms()->sync($request->get('permission_id'));
        return redirect()->to('/admin/role/')->withErrors("操作成功");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $show['role'] = Role::where('id','=', $id)->first();
        $show['permissions'] = Permission::all();

        // 获取全部权限, 用来判断那些全选选中了
        $permissions = DB::table('permission_role')->where('role_id', '=', $id)->get();
        foreach ($permissions as $value) {
            
            $show['selected_permissions'][$value->permission_id] = 1;
        }

        return View('admin.role.edit', ['title' => '后台管理 - 修改角色', 'show' => $show]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        // 检查角色是否存在
        $role = Role::where('id', '=', $id)->first();
        if (empty($role)) {
            return redirect()->to('/admin/role/edit/')->withErrors("找不到该角色");
        }
        
        $role->name = trim($request->get('display_name'));
        $role->display_name = trim($request->get('display_name'));
        $role->description = trim($request->get('description'));
        $role->save();

        // 删除权限重新赋值
        DB::table('permission_role')->where('role_id', '=', $id)->delete();
        $role->perms()->sync($request->get('permission_id'));
        return redirect()->to('/admin/role/')->withErrors("操作成功");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $role = Role::where('id','=', $id)->first();
        if (empty($role)) {

            return redirect()->to('/admin/role/')->withErrors("删除失败");
        }
        $role->delete();
        return redirect()->to('/admin/role/')->withErrors("删除成功");
    }
}
