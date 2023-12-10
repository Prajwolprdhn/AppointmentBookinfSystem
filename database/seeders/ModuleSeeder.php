<?php

namespace Database\Seeders;

use App\Models\Modules;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $modules = [
            'Home',
            'Doctors',
            'Login',
            'Dynamic Page',
        ];
        $links = [
            'home',
            'doctors',
            'login',
            'dynamic_view',
        ];

        foreach ($modules as $key => $module) {
            Modules::create([
                'name' => $module,
                'link' => $links[$key],
            ]);
        }
    }
}
