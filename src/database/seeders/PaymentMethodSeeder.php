<?php

namespace Database\Seeders;

use App\Models\PaymentMethod;
use Illuminate\Database\Seeder;
use Ramsey\Uuid\Uuid;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $paymentMethods = ['GCASH', 'MAYA', 'UB (Unionbank)'];

        foreach($paymentMethods as $key => $value) {
            $pm = new PaymentMethod();
            $pm->slug = Uuid::uuid4();
            $pm->name = $value;
            $pm->save();
        }
    }
}
