## compose-laravel

[![Build Status](https://travis-ci.org/laravel/framework.svg)](https://travis-ci.org/laravel/framework)
[![Total Downloads](https://poser.pugx.org/laravel/framework/d/total.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/framework/v/stable.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Unstable Version](https://poser.pugx.org/laravel/framework/v/unstable.svg)](https://packagist.org/packages/laravel/framework)
[![License](https://poser.pugx.org/laravel/framework/license.svg)](https://packagist.org/packages/laravel/framework)


## 创建一个新的laravel项目

### 安装到当前目录
curl -sS https://raw.githubusercontent.com/zhuayi/base_admin/master/compose-laravel.sh | sh

### 安装到指定目录

compose-laravel.sh  you DIRECTORY

###安装配置

App/Http/Kernel.php 下的routeMiddleware 增加 权限中间件

```php
'admin' => \Zhuayi\BaseAdmin\Middleware\AdminMiddleware::class
```

Config 文件下的providers数组增加依赖

```php
Zhuayi\BaseAdmin\BaseAdminServiceProvider::class,
```

执行安装命令

```php
php artisan vendor:publish --force
```