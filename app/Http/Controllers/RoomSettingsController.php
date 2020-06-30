<?php

namespace App\Http\Controllers;

use App\Room_Settings;
use Illuminate\Http\Request;

class RoomSettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $settings = auth()->user()->settings;
        return response()->json($settings);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Room_Settings  $room_Settings
     * @return \Illuminate\Http\Response
     */
    public function show(Room_Settings $room_Settings)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Room_Settings  $room_Settings
     * @return \Illuminate\Http\Response
     */
    public function edit(Room_Settings $room_Settings)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Room_Settings  $room_Settings
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Room_Settings $room_Settings)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Room_Settings  $room_Settings
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room_Settings $room_Settings)
    {
        //
    }
}
