<?php

namespace App\Http\Controllers;

use App\Models\Penghimpunan;
use Illuminate\Http\Request;

class PenghimpunanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penghimpunans = Penghimpunan::query()
            //->with('sumberDana', 'programSumber', 'tahun')
            ->paginate(10);

        return view('penghimpunan.index', compact('penghimpunans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('penghimpunan.create');
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
    public function show(Penghimpunan $penghimpunan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Penghimpunan $penghimpunan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Penghimpunan $penghimpunan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Penghimpunan $penghimpunan)
    {
        //
    }
}
