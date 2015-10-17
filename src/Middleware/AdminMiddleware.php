<?php

namespace Zhuayi\BaseAdmin\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

use Zhuayi\BaseAdmin\Models\Role;
use Zhuayi\BaseAdmin\Models\Permission;

class AdminMiddleware
{
    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * Create a new filter instance.
     *
     * @param  Guard  $auth
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // 增加权限验证中间件 modify by renxin 2015/09/25
        if ($request->user()) {
            $isNext = false;
            $permission = $this->auth->user()->roleInfo()['permission'];
            
            if (empty($permission)) {
                return abort(403);
            }
            
            foreach ($permission as $value) {

                $power = trim($value['power']);
                $value = $value['name'];
                if (empty(trim($value))) {
                    continue;
                }
                if (empty($power)) {
                    if ($value == $request->path()) {
                        return $next($request);
                    }

                } else {
                    $value = "/^".str_replace('/', '\/', $value. $power)."/i";
                    if (preg_match($value, $request->path())) {
                        return $next($request);
                    } 
                }
            }
            if ($isNext == false) {
                return abort(403);
            }
        }
        
        if ($this->auth->guest()) {
            if ($request->ajax()) {
                return abort(403);
            } else {
                return redirect()->guest('auth/login');
            }
        }

        return $next($request);
    }
}
