<?php

namespace App\Http\Controllers;

use App\Imports\PenghimpunanImportCsv;
use App\Imports\PenghimpunanImportExel;
use App\Models\Penghimpunan;
use App\Models\ProgramSumber;
use App\Models\SumberDana;
use App\Models\Tahun;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class PenghimpunanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        return view('penghimpunan.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sumberDanas = SumberDana::query()->get();
        $programSumbers = ProgramSumber::query()->get();
        $tahuns = Tahun::query()->get();

        return view('penghimpunan.create', compact('sumberDanas', 'programSumbers', 'tahuns'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'uraian' => 'required|max:65535',
            'nominal' => 'required',
            'lembaga' => 'nullable|numeric',
            'pria' => 'nullable|numeric',
            'wanita' => 'nullable|numeric',
            'sumber_dana_id' => 'nullable|exists:sumber_danas,id',
            'program_sumber_id' => 'nullable|exists:program_sumbers,id',
            'tahun_id' => 'nullable|exists:tahuns,id',

        ]);
        //dd($request);

        // Remove any non-numeric characters for safe storage as integer
        $nominal = $this->parseRupiah($request->input('nominal'));

        Penghimpunan::create([
            'tanggal' => $request->tanggal,
            'uraian' => $request->uraian,
            'nominal' => $nominal,
            'lembaga_count' => $request->lembaga,
            'male_count' => $request->pria,
            'female_count' => $request->wanita,
            'sumber_dana_id' => $request->sumber_dana_id,
            'program_sumber_id' => $request->program_sumber_id,
            'tahun_id' => $request->tahun_id,

            // 'user_id' => auth()->user()->id,
            // 'title' => $request->title,
        ]);

        return redirect()->route('penghimpunan.index')->with('success', 'Penghimpunan created successfully!');
    }

    public function parseRupiah($value)
    {
        // Remove "Rp.", commas, and dots from the nominal input
        $numericValue = preg_replace('/[Rp.\s]/', '', $value);

        // Convert the resulting string to an integer
        return (int) str_replace('.', '', $numericValue);
    }

    /**
     * Display the specified resource.
     */
    public function show(Penghimpunan $penghimpunan)
    {
        //$penghimpunan->load('sumberDana', 'programSumber', 'tahun');

        return view('penghimpunan.view', compact('penghimpunan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Penghimpunan $penghimpunan)
    {
        $sumberDanas = SumberDana::query()->get();
        $programSumbers = ProgramSumber::query()->get();
        $tahuns = Tahun::query()->get();

        //dd($penghimpunan);
        return view('penghimpunan.edit', compact('penghimpunan', 'sumberDanas', 'programSumbers', 'tahuns'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Penghimpunan $penghimpunan)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'uraian' => 'required|max:65535',
            'nominal' => 'required',
            'lembaga' => 'nullable|numeric',
            'pria' => 'nullable|numeric',
            'wanita' => 'nullable|numeric',
            'sumber_dana_id' => 'nullable|exists:sumber_danas,id',
            'program_sumber_id' => 'nullable|exists:program_sumbers,id',
            'tahun_id' => 'nullable|exists:tahuns,id',

        ]);
        //dd($request);
        $nominal = $this->parseRupiah($request->nominal);

        $penghimpunan->update([
            'tanggal' => $request->tanggal,
            'uraian' => $request->uraian,
            'nominal' => $nominal,
            'lembaga_count' => $request->lembaga,
            'male_count' => $request->pria,
            'female_count' => $request->wanita,
            'sumber_dana_id' => $request->sumber_dana_id,
            'program_sumber_id' => $request->program_sumber_id,
            'tahun_id' => $request->tahun_id,

            // 'user_id' => auth()->user()->id,
            // 'title' => $request->title,
        ]);

        return redirect()->route('penghimpunan.index')->with('success', 'Penghimpunan created successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Penghimpunan $penghimpunan)
    {
        $penghimpunan->delete();

        return redirect()
            ->route('penghimpunan.index')
            ->with('success', 'Penghimpunan deleted successfully!');
    }

    public function importExel()
    {
        return view('penghimpunan.import-exel');
    }

    public function importCsv()
    {
        return view('penghimpunan.import-csv');
    }

    public function export()
    {

        return view('penghimpunan.export');
    }

    public function importFileExel(Request $request)
    {
        $request->validate([
            'doc' => 'required|file|mimes:xlsx,xls|max:2048',
        ]);

        $file = $request->file('doc');

        $filename = $file->getClientOriginalName();
        $path = 'penghimpunan/'.$filename;
        Storage::put($path, file_get_contents($file));

        Excel::import(new PenghimpunanImportExel, $path);

        return redirect()->back()->with('success', 'Data imported successfully!');
    }

    public function importFileCsv(Request $request)
    {
        $request->validate([
            'doc' => 'required|file|mimes:csv|max:2048',
        ]);

        $file = $request->file('doc');

        $filename = $file->getClientOriginalName();
        $path = 'penghimpunan/'.$filename;
        Storage::put($path, file_get_contents($file));

        Excel::import(new PenghimpunanImportCsv, $path);

        return redirect()->back()->with('success', 'Data imported successfully!');
    }
}
