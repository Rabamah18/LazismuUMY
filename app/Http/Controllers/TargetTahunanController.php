<?php

namespace App\Http\Controllers;

use App\Models\Tahun;
use App\Models\TargetTahunan;
use Illuminate\Http\Request;

class TargetTahunanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tahuns = Tahun::query()->get();
        $targetTahunans = TargetTahunan::query()->get();

        return view('targettahunan.index', compact('tahuns', 'targetTahunans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tahuns = Tahun::query()->get();

        return view('targettahunan.create', compact('tahuns'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'jenis' => 'required',
            'nominal' => 'required',
            'tahun' => 'required|exists:tahuns,id',
        ]);
        // Remove any non-numeric characters for safe storage as integer
        // $nominal = $this->ubahRupiah($request->nominal);

        TargetTahunan::create([
            'nominal' => $request->nominal,
            'jenis' => $request->jenis,
            'tahun_id' => $request->tahun,
        ]);

        return redirect()
            ->route('targettahunan.index')
            ->with('success', 'Target berhasil dibuat');

    }

    /**
     * Display the specified resource.
     */
    public function show(TargetTahunan $targetTahunan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TargetTahunan $targetTahunan)
    {
        $tahuns = Tahun::query()->get();

        return view('targettahunan.edit', compact('tahuns', 'targetTahunan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TargetTahunan $targetTahunan)
    {
        $request->validate([
            'jenis' => 'required',
            'nominal' => 'required|',
            'tahun' => 'required|exists:tahuns,id',

        ]);

        // Remove any non-numeric characters for safe storage as integer
        $nominal = $this->ubahRupiah($request->input('nominal'));

        $targetTahunan->update([
            'jenis' => $request->jenis,
            'nominal' => $nominal,
            'tahun_id' => $request->tahun,
        ]);

        return redirect()->route('targettahunan.index')
            ->with('success', 'Target berhasil diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TargetTahunan $targetTahunan)
    {
        $targetTahunan->delete();

        return redirect()
            ->route('targettahunan.index')
            ->with('success', 'Target Tahunan Berhasil dihapus');
    }

    public function ubahRupiah($value)
    {
        // Remove "Rp.", commas, and dots from the nominal input
        $numericValue = preg_replace('/[Rp.\s]/', '', $value);

        // Convert the resulting string to an integer
        return (int) str_replace('.', '', $numericValue);
    }
}
