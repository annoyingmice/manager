<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use App\Models\Permission;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->has(
            Role::factory()->has(
                Permission::factory()
            )
        )->create();
        $this->call([
            PaymentMethodSeeder::class,
            PlanSeeder::class,
            StatusSeeder::class,
            RequestTypeSeeder::class,
        ]);
    }
}
