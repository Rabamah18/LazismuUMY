<?php

namespace App\Http\Controllers;

use App\Models\PenerimaManfaat;
use Illuminate\Http\Request;

class PenerimaManfaatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('penerimamanfaat.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('penerimamanfaat.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(PenerimaManfaat $penerimaManfaat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PenerimaManfaat $penerimaManfaat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PenerimaManfaat $penerimaManfaat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PenerimaManfaat $penerimaManfaat)
    {
        //
    }
}