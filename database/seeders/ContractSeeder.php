<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            $this->command->error('No users or organizations found. Please seed users and organizations first.');

            return;
        }

        // Seed contracts for each organization
        foreach ($organizationIds as $organizationId) {
            $contractIds = [];

            // Create 5 contracts per organization
            for ($i = 0; $i < 5; $i++) {
                $userId = $faker->randomElement($userIds);
                $reportingManagerId = null;

                // Ensure the first contract has no reporting manager
                if ($i > 0 && ! empty($contractIds)) {
                    do {
                        $potentialManagerId = $faker->randomElement($contractIds);
                        $managerUserId = DB::table('contracts')->where('id', $potentialManagerId)->value('user_id');
                    } while ($managerUserId == $userId);

                    $reportingManagerId = $managerUserId; // Correct assignment to reportingManagerId
                }

                // Check if the user exists
                if (in_array($userId, $userIds)) {
                    $contractId = DB::table('contracts')->insertGetId([
                        'user_id' => $userId,
                        'organization_id' => $organizationId,
                        'reporting_manager_id' => $reportingManagerId,
                        'contract_details' => $faker->text,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);

                    $contractIds[] = $contractId;
                } else {
                    $this->command->error("User ID $userId does not exist. Skipping contract creation.");
                }
            }
        }
    }
}
