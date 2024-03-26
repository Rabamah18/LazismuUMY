<?php

namespace App\Http\Controllers;

use App\Models\PenerimaManfaat;
use App\Models\ProgramPilar;
use Illuminate\Http\Request;

class ProgramPilarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $programPilars = ProgramPilar::query()
            ->paginate(10);

        return view('programpilar.index', compact('programPilars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('programpilar.create');
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
    public function show(ProgramPilar $programPilar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProgramPilar $programPilar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProgramPilar $programPilar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProgramPilar $programPilar)
    {
        //
    }
}
