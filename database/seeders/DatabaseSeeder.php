<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        \App\Models\User::factory()->create([
            'name' => 'Aslam Admin',
            'email' => 'aslam@gmail.com',
            'role' => 'admin',
            'password' => Hash::make('12345678'),
            'phone' =>  '+92300123'
        ]);

        \App\Models\ProfileClinic::factory()-> create([
            'name'=>'Muh Nur Aslam',
            'address' => 'Daerah Istimewa Yogyakarta',
            'phone' => '0990090282',
            'email' => 'dr.aslam@clinic.com',
            'doctor_name' => 'Dr. Aslam',
            'unique_code' => '1122'
        ]);

        $this-> call(DoctorSeeder::class);
    }
}
