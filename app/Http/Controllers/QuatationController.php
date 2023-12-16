<?php

namespace App\Http\Controllers;

use App\Models\Quatation;
use App\Http\Requests\StoreQuatationRequest;
use App\Http\Requests\UpdateQuatationRequest;

class QuatationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('quatation.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreQuatationRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Quatation $quatation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Quatation $quatation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateQuatationRequest $request, Quatation $quatation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Quatation $quatation)
    {
        //
    }
}
