<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Timing;
use App\Models\Department;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password'=> 'admin@admin.com',
            'role' => 0,
            'status'=> 1
        ]);
        $departmentNames = [
            'Cardiologists',
            'Neurologists',
            'Pediatricians',
            'Oncologists',
            'Dermatologists',
        ];

        foreach ($departmentNames as $name) {
            Department::create([
                'departments' => $name,
            ]);
        }

        $timings = [
            '6:00 AM',
            '7:00 AM',
            '8:00 AM',
            '9:00 AM',
            '10:00 AM',
            '11:00 AM',
            '12:00 PM',
            '1:00 PM',
            '2:00 PM',
            '3:00 PM',
            '4:00 PM',
            '5:00 PM',
            '6:00 PM',
            '7:00 PM',
            '8:00 PM',
            '9:00 PM',
            '10:00 PM',
            '11:00 PM',
        ];

        foreach ($timings as $timing) {
            Timing::create([
                'timings' => $timing,
            ]);
        }
    }
}
