<?php

namespace App\Http\Controllers;

use App\Models\Lokasi;
use App\Models\Provinsi;
use App\Models\Kabupaten;
use Illuminate\Http\Request;

class LokasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lokasis = Lokasi::query()
            ->with('provinsi', 'kabupaten')
            ->paginate(10);

        return view('lokasi.index', compact('lokasis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $provinsis = Provinsi::query()->get();
        $kabupatens = Kabupaten::query()->get();

        return view('lokasi.create', compact('provinsis', 'kabupatens'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'provinsi_id' => 'required|exists:provinsis,id',
            'kabupaten_id' => 'required|exists:kabupatens,id'
        ]);
        //dd($request);

        Lokasi::create([
            'provinsi_id' => $request->provinsi_id,
            'kabupaten_id' => $request->kabupaten_id,
        ]);

        return redirect()->route('lokasi.index')->with('success', 'Lokasi created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Lokasi $lokasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lokasi $lokasi)
    {
        $provinsis = Provinsi::query()->get();
        $kabupatens = Kabupaten::query()->get();

        //dd($lokasi);
        return view('lokasi.edit', compact('lokasi','provinsis', 'kabupatens'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lokasi $lokasi)
    {
        $request->validate([
            'provinsi_id' => 'required|exists:provinsis,id',
            'kabupaten_id' => 'required|exists:kabupatens,id'

        ]);
        //dd($request);

        $lokasi->update([
            'provinsi_id' =>$request->provinsi_id,
            'kabupaten_id' =>$request->kabupaten_id,

        ]);

        return redirect()->route('lokasi.index')->with('success', 'Lokasi edited successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lokasi $lokasi)
    {
        $lokasi->delete();

        return redirect()
           ->route('lokasi.index')
           ->with('success', 'Lokasi deleted successfully!');
    }
}
