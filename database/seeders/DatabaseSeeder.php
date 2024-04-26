<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Company;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(100)->create();

        User::factory()->create([
            'name' => 'Dhimas Admin',
            'email' => 'test@example.com',
            'password'=> Hash::make('123456789'),
        ]);


    // data dummy for company
    \App\Models\Company::create([
        'name' => 'PT. Dhimas',
        'email' => 'DhimasMakmurBahagia@dmb.com',
        'address' => 'Jl. Raya Bogor, Jakarta',
        'latitude' => '-6.3011',
        'longitude' => '106.7347',
        'radius_km' => '1',
        'time_in' => '08:00:00',
        'time_out' => '17:00:00',
    ]);

    $this->call([
        AttendanceSeeder::class,
        PermissionSeeder::class,
    ]);
}
}
