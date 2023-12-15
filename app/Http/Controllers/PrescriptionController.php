<?php

namespace App\Http\Controllers;

use App\Models\Prescription;
use App\Http\Requests\StorePrescriptionRequest;
use App\Http\Requests\UpdatePrescriptionRequest;

class PrescriptionController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePrescriptionRequest $request)
    {
        try {
            $prescription = Prescription::create([
                'delivery_time' => $request->input('delivery_time'),
                'Address' => $request->input('Address'),
                'note' => $request->input('note'),
                'img1' => $request->input('img1'),
                'img2' => $request->input('img2'),
                'img3' => $request->input('img3'),
                'img4' => $request->input('img4'),
                'img5' => $request->input('img5'),
            ]);

            // Redirect to a specific route upon successful creation
            return redirect()->back()->with('success', 'Prescription Uploaded successfully');
        } catch (\Throwable $th) {
            // Log::error('Failed to create a student: ' . $th->getMessage());

            // Redirect to a specific route in case of failure
            return redirect()->back()->with('error', 'Failed to upload the Prescription. ' . $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Prescription $prescription)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prescription $prescription)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePrescriptionRequest $request, Prescription $prescription)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prescription $prescription)
    {
        //
    }
}
