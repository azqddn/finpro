<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Company;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get the company ID from the companies table
        $company = Company::where('companyName', 'Pasar Mini Afkar Sdn Bhd')->first();

        $users = [
            [
               'name' => 'Admin User',
               'email' => 'admin@itsolutionstuff.com',
               'type' => 0,
               'password' => bcrypt('12345678'),
               'address' => '123 Admin St, Admin City, AC 12345',
               'phone' => '0123456789',
               'ic' => 'A12345678',
               'staffId' => 'ADM001',
               'photo' => 'admin-photo.jpg',
               'companyId' => $company->id, // Assign the company ID
            ],
            // [
            //    'name' => 'Business Owner User',
            //    'email' => 'owner@itsolutionstuff.com',
            //    'type' => 1,
            //    'password' => bcrypt('123456'),
            //    'address' => '456 Owner Blvd, Owner City, OC 23456',
            //    'phone' => '0987654321',
            //    'ic' => 'B23456789',
            //    'staffId' => 'OWN001',
            //    'photo' => 'owner-photo.jpg',
            //    'companyId' => $company->id, // Assign the company ID
            // ],
            // [
            //    'name' => 'Staff User',
            //    'email' => 'staff@itsolutionstuff.com',
            //    'type' => 2,
            //    'password' => bcrypt('123456'),
            //    'address' => '789 Staff Rd, Staff Town, ST 34567',
            //    'phone' => '0123987654',
            //    'ic' => 'C34567890',
            //    'staffId' => 'STA001',
            //    'photo' => 'staff-photo.jpg',
            //    'companyId' => $company->id, // Assign the company ID
            // ],
        ];
    
        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}
