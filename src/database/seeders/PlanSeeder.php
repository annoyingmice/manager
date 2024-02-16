<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Seeder;
use Ramsey\Uuid\Uuid;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $plans = [
            ['name' => '15DAYS TRIAL', 'price' => 0, 'days' => 15],
            ['name' => '1MONTH', 'price' => '$1', 'days' => 30],
            ['name' => '6MONTHS', 'price' => '$5.5', 'days' => 181],
            ['name' => '12MONTHS', 'price' => '$11', 'days' => 364],
        ];

        foreach($plans as $key => $value) {
            $plan = new Plan();
            $plan->slug = Uuid::uuid4();
            $plan->name = $value['name'];
            $plan->price = $value['price'];
            $plan->days = $value['days'];
            $plan->save();
        }
    }
}
