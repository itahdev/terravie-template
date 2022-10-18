<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        User::query()->updateOrCreate([
            'id' => 1,
        ], [
            'name' => 'Terravie',
            'email' => 'terravie@example.com',
            'password' => bcrypt('terravie'),
        ]);
    }
}
