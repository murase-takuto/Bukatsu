<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \App\User;
use \App\Club;
use \App\Schedule;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $club = Club::find($user->club_id);
        $schedules = Schedule::where('club_id', $club->id)->get();
        return view('schedule.index', compact('user', 'club', 'schedules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $schedule = Schedule::create([
            'name' => $request->name,
            'start_datetime' => $request->start_datetime,
            'end_datetime' => $request->end_datetime,
            'club_id' => $user->club_id,
            //後々セレクトボックスの値をコンマ区切りか何かでDBに保存
            'team_id' => 1,
            'place' => $request->place,
            'memo' => $request->memo,
        ]);
        $club = Club::find($user->club_id);
        $schedules = Schedule::where('club_id', $club->id)->get();
        return view('schedule.index', compact('user', 'club', 'schedules'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
