<?php

namespace App\Http\Controllers;

use App\Models\Prescription;
use App\Http\Requests\StorePrescriptionRequest;
use App\Http\Requests\UpdatePrescriptionRequest;
use Illuminate\Support\Facades\Auth;

class PrescriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prescriptions = Prescription::all();
        return view('prescription.index', compact('prescriptions'));
    }

    public function indexForCustomer()
    {
        $prescriptions = Prescription::all();
        return view('prescription.index_for_customer', compact('prescriptions'));
    }

    public function indexForStaff()
    {
        $prescriptions = Prescription::all();
        return view('prescription.index_for_staff', compact('prescriptions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('prescription.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePrescriptionRequest $request)
    {
        try {
            // Get the authenticated user
            $user = Auth::user();

            // Validate the request and retrieve validated data
            $validatedData = $request->validated();

            // Create a new prescription associated with the user
            $prescription = $user->prescriptions()->create([
                'delivery_time' => $validatedData['delivery_time'],
                'address' => $validatedData['address'],
                'note' => $validatedData['note'],
            ]);

            // Upload images and store paths in the database
            foreach (range(1, 5) as $index) {
                $imageFieldName = 'img' . $index;
                if ($request->hasFile($imageFieldName)) {
                    $prescription->$imageFieldName = $request->file($imageFieldName)->store('prescription_images', 'public');
                    $prescription->save();
                }
            }

            // Redirect to a specific route upon successful creation
            return redirect()->route('prescription.indexForCustomer')->with('success', 'Prescription uploaded successfully');
        } catch (\Throwable $th) {
            // Log::error('Failed to create a prescription: ' . $th->getMessage());

            // Redirect back in case of failure
            return redirect()->back()->with('error', 'Failed to upload the prescription. ' . $th->getMessage());
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
