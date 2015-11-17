## admin

[![Build Status](https://travis-ci.org/zhuayi/admin.svg)](https://travis-ci.org/zhuayi/admin)
[![Total Downloads](https://poser.pugx.org/zhuayi/admin/d/total.svg)](https://packagist.org/packages/zhuayi/admin)
[![Latest Stable Version](https://poser.pugx.org/zhuayi/admin/v/stable.svg)](https://packagist.org/packages/zhuayi/admin)
[![Latest Unstable Version](https://poser.pugx.org/zhuayi/admin/v/unstable.svg)](https://packagist.org/packages/zhuayi/admin)
[![License](https://poser.pugx.org/zhuayi/admin/license.svg)](https://packagist.org/packages/zhuayi/admin)


## Installation

#### New Project installation

In project Finder

```shell
curl -sS https://raw.githubusercontent.com/zhuayi/admin/master/compose-laravel.sh | sh
```
---
####In order to install Laravel 5 Zhuayi, just add

```php
"zhuayi/admin": "~1.0.0"
```
to your composer.json. Then run composer install or composer update.

Then in your config/app.php add

```php
Zhuayi\admin\BaseAdminServiceProvider::class
```

If you are going to use Middleware (requires Laravel 5.1 or later) you also need to add
```php
'admin' => \Zhuayi\admin\Middleware\AdminMiddleware::class
```
to routeMiddleware array in app/Http/Kernel.php.

modify **config/auth.php**  

```php
'model' => Zhuayi\admin\Models\User::class
```

Run Publish
```shell
php artisan vendor:publish --force

php artisan migrate:refresh
```

##configure
modify DB info to  **.env**

Run autoload
```shell
composer dump-autoload --optimize
```

Run db:seed
```shell
php artisan db:seed --class="AdminDataSeeder"
```

##Usage

Your Application Routes in 

```php
Route::group(['middleware' => ['admin']], function() {

    ...

});
```
