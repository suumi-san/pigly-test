<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\WeightTarget;
use App\Models\WeightLog;

class DummyDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::factory()->create([
            'email' => 'test@example.com',
            'password' => bcrypt('password'), // ログイン用
        ]);

        WeightTarget::factory()->create([
            'user_id' => $user->id,
        ]);

        WeightLog::factory()->count(35)->create([
            'user_id' => $user->id,
        ]);
    }
}
