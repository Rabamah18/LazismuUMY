<?php

namespace App\Http\Controllers;

use App\Models\Pilar;
use Illuminate\Http\Request;

class PilarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pilars = Pilar::query()
            ->withCount('programPilars')
            ->paginate(10);

        return view('pilar.index', compact('pilars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pilar.create');
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
    public function show(Pilar $pilar)
    {

        $pilar->load('programPilars');
        //dd($pilar);
        return view('pilar.view', compact('pilar'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pilar $pilar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pilar $pilar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pilar $pilar)
    {
        //
    }
}
