<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Util\Helper;
use App\Models\Menu;

class MenuList extends Component
{
    public function __construct()
    {
    }

    public function render()
    {
        //dd(Auth::guard('member'));
        if (Helper::guard('member', 'status') == "admin") {
            $data["menu"] = Helper::QueryAllTable('menu', '*', array(['menu_sub', '=', 'N'], ['menu_active', '=', 'Y']), 'menu_sort asc', '', '');
            $data_menu_sub = Helper::QueryAllTable('menu', '*', array(['menu_sub', '=', 'Y'], ['menu_sub_id', '!=', '0'], ['menu_active', '=', 'Y']), 'menu_sort asc', '', '');
        } else {
            $data["menu"] = Helper::QueryAllTable('menu', '*', array(['menu_sub', '=', 'N'], ['menu_active', '=', 'Y'], ['id', '!=', 3], ['id', '!=', 4]), 'menu_sort asc', '', '');
            $data_menu_sub = Helper::QueryAllTable('menu', '*', array(['menu_sub', '=', 'Y'], ['menu_sub_id', '!=', '0'], ['menu_active', '=', 'Y']), 'menu_sort asc', '', '');
        }

        if (count($data_menu_sub) > 0) {
            foreach ($data_menu_sub as $key => $value) {
                $data["menu_sub"][$value->menu_sub_id][] = array("menu_sub_id" => $value->menu_sub_id, "name" => $value->menu_name, "link" => $value->menu_link, "menu_icon" => $value->menu_icon);
            }
        } else {
            $data["menu_sub"] = null;
        }

        return view('components.menu-list', $data);
    }
}
