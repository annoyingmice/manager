<?php

namespace Database\Seeders;

use App\Models\RequestType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Ramsey\Uuid\Uuid;

class RequestTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $requestTypes = ['CA', 'LR', 'COE'];

        foreach($requestTypes as $key => $value) {
            $status = new RequestType();
            $status->slug = Uuid::uuid4();
            $status->name = $value;
            $status->save();
        }
    }
}
