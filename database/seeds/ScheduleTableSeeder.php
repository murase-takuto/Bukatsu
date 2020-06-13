<?php

use App\Schedule;
use Illuminate\Database\Seeder;

class ScheduleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $schedule = Schedule::create([
            'name' => 'トレーニング1',
            'start_datetime' => '2020-06-01 12:30:00',
            'end_datetime' => '2020-06-01 16:30:00',
            'club_id' => 1,
            'team_id' => 1,
            'place' => 'グランドA',
            'memo' => 'メモ1',
        ]);
        $schedule = Schedule::create([
            'name' => '試合1',
            'start_datetime' => '2020-06-02 11:00:00',
            'end_datetime' => '2020-06-02 15:00:00',
            'club_id' => 1,
            'team_id' => 1,
            'place' => 'グランドA',
            'memo' => 'メモ2',
        ]);
        $schedule = Schedule::create([
            'name' => 'トレーニング2',
            'start_datetime' => '2020-06-06 09:30:00',
            'end_datetime' => '2020-06-06 11:30:00',
            'club_id' => 1,
            'team_id' => 1,
            'place' => 'グランドB',
            'memo' => 'メモ3',
        ]);
        $schedule = Schedule::create([
            'name' => 'トレーニング3',
            'start_datetime' => '2020-06-09 10:30:00',
            'end_datetime' => '2020-06-09 14:00:00',
            'club_id' => 1,
            'team_id' => 1,
            'place' => 'グランドA',
            'memo' => 'メモ4',
        ]);
        $schedule = Schedule::create([
            'name' => '試合2',
            'start_datetime' => '2020-06-13 16:30:00',
            'end_datetime' => '2020-06-13 19:30:00',
            'club_id' => 1,
            'team_id' => 1,
            'place' => 'グランドB',
            'memo' => 'メモ5',
        ]);
    }
}
