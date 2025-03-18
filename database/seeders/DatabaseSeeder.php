<?php

namespace Database\Seeders;

use App\Models\LoanTerm;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
            'user_type' => 'admin',
        ]);

        User::create([
            'name' => 'Staff',
            'email' => 'staff@gmail.com',
            'password' => bcrypt('password'),
            'user_type' => 'staff',
        ]);
        // User::create([
        //     'name' => 'Customer',
        //     'email' => 'customer@gmail.com',
        //     'password' => bcrypt('password'),
        //     'user_type' => 'customer',
        // ]);


        LoanTerm::create([
            'name' => 'Short Term',
            'monthly_interest' => 1,
            'number_of_months' => 6
        ]);

        LoanTerm::create([
            'name' => 'Long Term',
            'monthly_interest' => 2,
            'number_of_months' => 12
        ]);


    }
}
