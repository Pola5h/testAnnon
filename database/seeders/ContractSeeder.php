<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ContractSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        
        // Retrieve existing user and organization IDs
        $userIds = DB::table('users')->pluck('id')->toArray();
        $organizationIds = DB::table('organizations')->pluck('id')->toArray();

        if (empty($userIds) || empty($organizationIds)) {
            // Handle the case where no users or organizations exist
            $this->command->error('No users or organizations found. Please seed users and organizations first.');
            return;
        }

        for ($i = 0; $i < 5; $i++) {
            DB::table('contracts')->insert([
                'user_id' => $faker->randomElement($userIds), // Randomly select an existing user ID
                'organization_id' => $faker->randomElement($organizationIds), // Randomly select an existing organization ID
                'contract_details' => $faker->text, // Generates random contract details
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }    }
}
