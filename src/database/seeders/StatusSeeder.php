<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Seeder;
use Ramsey\Uuid\Uuid;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statuses = ['EXPIRED', 'ACTIVE', 'INACTIVE', 'DONE', 'PENDING'];

        foreach($statuses as $key => $value) {
            $status = new Status();
            $status->slug = Uuid::uuid4();
            $status->name = $value;
            $status->save();
        }
    }
}
