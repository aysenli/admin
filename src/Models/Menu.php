<?php

namespace Zhuayi\admin\Models;

use Auth;

class Menu {

    /**
     * 获取菜单
     */
    public static function get() {
        if (Auth::user()) {
            $permission = Auth::user()->roleInfo()['permission'];
        } else {
            return '';
        }
        return self::menuHtml($permission);
    }


    public static function menuHtml($menus) {
        $html = '';
        foreach ($menus as $node_id => $node) {

            if ($node['isDisplay'] == 0) {
                continue;
            }
            $menus[$node_id] += ['html' => '', 'icon' => 'fa-bar-chart-o'];

            if ($node['display_name'] == '') {

                if (isset($menus[$node_id-1]) && $menus[$node_id-1]['isDisplay'] == 0) {
                    $menus[$node_id]['html'] .= '</ul></li>';

                }
                
                $menus[$node_id]['html'] .= '
                <li class="treeview active">
                    <a href="#">
                        <i class="fa ' . $menus[$node_id]['icon'] . '"></i>
                        <span>' . $node['description'] . '</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu" style="display:block;">';
            } else if ($node['name'] == '') {
                $menus[$node_id]['html'] .= '
                <li class="treeview">
                    <a href="#">
                        <i class="fa ' . $menus[$node_id]['icon'] . '"></i>
                        <span>' .   $node['description'] . '</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul style="display: none;" class="treeview-menu">';
            } else {
                $menus[$node_id]['html'] .= '
                <li>
                    <a href="/' . $node['name'] . '">
                        <i class="fa fa-angle-double-right"></i>' . $node['description'] . 
                    '</a>
                </li>';

                if (!isset($menus[$node_id+1]) || $menus[$node_id+1]['display_name'] != $menus[$node_id]['display_name']) {
                    $menus[$node_id]['html'] .= '</ul></li>';
                }

            }

            $html .= $menus[$node_id]['html'];
        }

        return $html;
    }

}