<?php

namespace App\Http\Controllers;

use App\Models\Quatation;
use App\Http\Requests\StoreQuatationRequest;
use App\Http\Requests\UpdateQuatationRequest;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;

class QuatationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $user = Auth::user();

        // if ($user) {
        //     $quotations = $user->quotations ?? collect();
        //     return view('quatation.index', compact('quotations'));
        // }

        // return redirect()->back()->withErrors(['error' => 'No quotations for you']);

        try {
            $user = Auth::user();

            if ($user) {
                // Wrap the database query in a try-catch block
                try {
                    $quotations = $user->quotations ?? collect();
                    return view('quatation.index', compact('quotations'));
                } catch (QueryException $e) {
                    // Handle the exception

                    return redirect()->back()->withErrors(['error' => 'Database error: ' . $e->getMessage()]);

                    // if ($e->getCode() == '42S22') {
                    //     // Column not found error
                    //     return redirect()->back()->withErrors(['error' => 'Column not found in the database table']);
                    // } else {
                    //     // Other database-related errors
                    //     return redirect()->back()->withErrors(['error' => 'Database error: ' . $e->getMessage()]);
                    // }
                }
            }

            return redirect()->back()->withErrors(['error' => 'No quotations for you']);
        } catch (\Exception $exception) {
            // Handle any other exceptions (not related to database)
            return redirect()->back()->withErrors(['error' => $exception->getMessage()]);
        }
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
        // Retrieve data from the request
        $tableData = $request->input('tableData');
        $total = $request->input('total');


        $quotation = Quatation::create($request->all());

        return response()->json(['message' => 'Quotation saved successfully']);
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
