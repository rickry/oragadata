<?php

namespace App\Http\Controllers;

use App\Building;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BuildingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        return response()->json(Building::all());
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
     * @param Building $building
     * @return JsonResponse
     */
    public function show(Building $building)
    {
        $building->load('rooms');
        $building->load('rooms.devices');
        return response()->json($building);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Building $building
     * @return Response
     */
    public function edit(Building $building)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Building $building
     * @return Response
     */
    public function update(Request $request, Building $building)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Building $building
     * @return Response
     */
    public function destroy(Building $building)
    {
        //
    }
}
