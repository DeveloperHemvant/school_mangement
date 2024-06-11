<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Populate admins table
        // for ($i = 0; $i < 5; $i++) {
        //     DB::table('admins')->insert([
        //         'name' => Str::random(10),
        //         'email' => Str::random(10) . '@example.com',
        //         'password' => Hash::make('password'),
        //     ]);
        // }
        $roles = ['teacher', 'driver', 'principal', 'peon', 'conductor'];
        foreach ($roles as $role) {
            DB::table('roles')->insert([
                'name' => $role,
            ]);
        }

        // Populate users table
        for ($i = 0; $i < 5; $i++) {
            DB::table('users')->insert([
                'name' => Str::random(10),
                'email' => Str::random(10) . '@example.com',
                'password' => Hash::make('password'),
            ]);
        }

        // Populate parents table
        for ($i = 0; $i < 5; $i++) {
            DB::table('parents')->insert([
                'name' => Str::random(10),
                'email' => Str::random(10) . '@example.com',
                'password' => Hash::make('password'),
                'phone' => $this->getUniquePhone(),
            ]);
        }

        // Populate staff table
        $roleIds = DB::table('roles')->pluck('id')->toArray();

        // Populate staff table with role_id
        for ($i = 0; $i < 5; $i++) {
            DB::table('staff')->insert([
                'name' => Str::random(10),
                'email' => Str::random(10) . '@example.com',
                'password' => Hash::make('password'),
                'role_id' => $roleIds[array_rand($roleIds)], // Assign a random role_id from the available role IDs
            ]);
        }
        }
    

    // Method to generate a unique phone number
    private function getUniquePhone()
    {
        $phone = '';
        do {
            $phone = '0' . mt_rand(1000000000, 9999999999); // Generate a random 10-digit phone number
        } while ($this->phoneExists($phone));

        return $phone;
    }

    // Method to check if the phone number already exists in the database
    private function phoneExists($phone)
    {
        return DB::table('parents')->where('phone', $phone)->exists();
    }
}
