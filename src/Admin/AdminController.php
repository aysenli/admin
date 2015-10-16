<?php

namespace compose_laravel;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\User;
use Redirect;
use App\Models\Role;
use DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function user()  {
        
        $wherName = trim(\Input::get('name'));
        if ($wherName) {
            $show['users'] = User::where('name','like','%'.$wherName.'%')->get();
        } else {
            $show['users'] = User::all();
        }

        return View('admin.user.user', ['title' => '后台管理 - 账号管理', 'show' => $show]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        // 新增
        if (empty($request->get('id'))) {

            return self::create($request);

        } else {
           
           return self::update($request , $request->get('id'));
        }
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
        $show['role'] = Role::all();

        return View('admin.user.edit', ['title' => '后台管理 - 新增账号', 'show' => $show]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Request $request)
    {
        $password = trim($request->get('password'));
        $confirmation_password = trim($request->get('confirmation_password'));
        $name = trim($request->get('name'));
        $email = trim($request->get('email'));

        // 判断密码格式是否正确
        if (empty($password) || empty($confirmation_password) || ($password != $confirmation_password)) {

            return redirect()->to('/admin/user/add/')->withErrors("密码不能为空");
        }
        
        //判断是否存在该账号
        $user = User::where('name','=', $name)->where("email", '=', $email)->first();
        if ($user) {

            return redirect()->to('/admin/user/add/')->withErrors("该账号已经存在了");
        }
        $user = new User;
        $user->name = $name;
        $user->email = $email;

        // 更新密码
        $user->password = bcrypt($password);
        $user->save();

        self::updateUserRole($request, $user);
        return redirect()->to('/admin/user/')->withErrors("操作成功");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $show['user'] = User::where('id','=', $id)->first();

        // 获取全部角色
        $show['role'] = Role::all();

        // 获取全部权限, 用来判断那些全选选中了
        $role_user = DB::table('role_user')->where('user_id', '=', $id)->get();
        foreach ($role_user as $value) {
            
            $show['role_user'][$value->role_id] = 1;
        }

        return View('admin.user.edit', ['title' => '后台管理 - 修改账号', 'show' => $show]);
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
        $password = trim($request->get('password'));
        $confirmation_password = trim($request->get('confirmation_password'));
        // 修改
        $user = User::where('id','=', $id)->first();

        // 如果密码不为空, 则需要修改密码, 验证下两次密码是否一样
        if (!empty($password)) {
            if($password != $confirmation_password) {
                return redirect()->to('/admin/user/edit/'. $id)->withErrors("两次密码不相同");
            }
            // 更新密码
            $user->password = bcrypt($password);
            $user->save();
        } 

        self::updateUserRole($request, $user);
        return redirect()->to('/admin/user/')->withErrors("操作成功");
    }

    /*
     * 更新用户权限
     */
    public static function updateUserRole(Request $request, $user)
    {
        DB::table('role_user')->where('user_id', '=', $user->id)->delete();

        // 赋值权限
        if ($request->get('role_id') && !empty($request->get('role_id'))) {
            foreach ($request->get('role_id') as $value) {
                $user->roles()->attach( $value ); 
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $user = User::where('id','=', $id)->first();
        if (empty($user)) {

            return redirect()->to('/admin/user/')->withErrors("删除失败");
        }
        $user->delete();

        return redirect()->to('/admin/user/')->withErrors("删除成功");
    }
}
