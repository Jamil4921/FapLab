<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\StudentCard;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'admin',
            'email' => 'admin@ehb.be',
            'password' => bcrypt('123456'),
            'role' => 1
        ]);

        $student = StudentCard::create([
            'id' => $user->id,
            'student_name' => $user->name,
            'student_email' => $user->email,
            'user_id' => $user->id,
            'amount' => '0',
        ]);

        return $user;
    }

    
}
