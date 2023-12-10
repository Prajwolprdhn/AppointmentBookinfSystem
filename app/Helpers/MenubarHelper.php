<?php

namespace App\Helpers;

use App\Models\Menubar;


class MenubarHelper
{
    public function show()
    {
        $menus = Menubar::where('status', 1)->orderBy('display_order')->get();
        return ($menus);
    }
}
