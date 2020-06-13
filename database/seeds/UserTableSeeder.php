<?php

use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // admin
        $user = User::create([
            'name'     => '管理 太郎',
            'email'    => 'admin@localhost',
            'password' => Hash::make('admin'),
            'line_token' => Hash::make('line_token_admin'),
            'club_id' => 1,
            'team_id' => 1,
            'grade_id' => 1,
            'accepted' => 1,
        ]);
        $user->assignRole('admin');
        
        // manager
        $user = User::create([
            'name'     => 'マネージャー大森',
            'email'    => 'manager@localhost',
            'password' => Hash::make('manager'),
            'line_token' => Hash::make('line_token_manager'),
            'club_id' => 1,
            'team_id' => 1,
            'grade_id' => 1,
            'accepted' => 1,
        ]);
        $user->assignRole('manager');
        
        // staff
        $user = User::create([
            'name'     => 'スタッフ　花子',
            'email'    => 'player@localhost',
            'password' => Hash::make('player'),
            'line_token' => Hash::make('line_token_player'),
            'club_id' => 1,
            'team_id' => 1,
            'grade_id' => 1,
            'accepted' => 1,
        ]);
        $user->assignRole('player');
    }
}
