<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // // 后台菜单
        // Schema::create('adminMenu', function (Blueprint $table) {
        //     $table->increments('id');

        //     // 父类 ID
        //     $table->integer("parent_id");

        //     // 菜单名称
        //     $table->string('menu_name');

        //     // 菜单 url
        //     $table->string("menu_url");

        //     $table->timestamps();
        // });


        // 后台操作日志
        Schema::create('model_logs', function (Blueprint $table) {
            $table->increments('id');

            // 操作的url
            $table->string("observe_url");

            // 用户 id
            $table->integer("admin_uid");

            // 操作的表
            $table->string('table_name');

            // 操作前数据
            $table->longText('before_data');

            // 操作后数据
            $table->longText('after_data');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::dropIfExists('model_logs');
    }
}