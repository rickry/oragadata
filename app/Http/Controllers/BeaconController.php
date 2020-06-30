<?php

namespace App\Http\Controllers;

use App\Beacon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BeaconController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param Beacon $beacons
     * @return JsonResponse
     */
    public function show(Beacon $beacon)
    {
        $beacon->load('room');

        auth()->user()->update(['current_room' => $beacon->room->id]);

        return response()->json($beacon);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Beacon $beacons
     * @return Response
     */
    public function edit(Beacon $beacons)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Beacon $beacons
     * @return Response
     */
    public function update(Request $request, Beacon $beacons)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Beacon $beacons
     * @return Response
     */
    public function destroy(Beacon $beacons)
    {
        //
    }
}
