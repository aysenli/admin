<?php
namespace Zhuayi\admin\Base;

/**
 * 统一搜索
 *
 * $search = [
 *  BaseSearch::name("user_name")->title('客户名称')->type('text')->value(''),
 *  BaseSearch::name("credentials")->title('证件号码')->type('text')->value(''),
 *  BaseSearch::name("apply_id")->title('申请编号')->type('select')->value([
 *         123 => 'abcd',
 *         245 => 'aaaaaa',
 *     ]),
 * ]
 *
 * @author zhuayi <2179942@qq.com>
 */

class BaseSearch {

    // 表单name字段值
    public $name;

    // 表单title
    public $title;

    // 表单类型
    public $type;

    // 表单默认值
    public $value;

    // 表单对象
    private static $object;

    public function __call($method, $arg) {
        self::$object->$method = $arg[0];
        return self::$object;
    }

    public static function __callStatic($method, $arg) {

        self::$object = new BaseSearch;
        self::$object->$method = $arg[0];
        return self::$object;
    }
}
