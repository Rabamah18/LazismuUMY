<?php

namespace App\Http\Controllers;

use App\Exports\PenyaluransExport;
use App\Imports\PenyaluranImportCsv;
use App\Imports\PenyaluranImportExel;
use App\Models\Ashnaf;
use App\Models\Kabupaten;
use App\Models\Lokasi;
use App\Models\PenerimaManfaat;
use App\Models\Penyaluran;
use App\Models\Pilar;
use App\Models\ProgramPilar;
use App\Models\Provinsi;
use App\Models\Tahun;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class PenyaluranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $ashnafs = Ashnaf::query()->get();
        $pilars = Pilar::query()->get();
        $programPilars = ProgramPilar::query()->get();
        $tahuns = Tahun::query()->get();
        $lokasis = Lokasi::query()->get();
        $provinsis = Provinsi::query()->get();
        $kabupatens = Kabupaten::query()->get();

        $penyalurans = Penyaluran::orderByDesc('tanggal')
            ->with('ashnaf', 'tahun', 'pilar', 'programPilar')
            ->when($request->search, function ($query, $search) {
                $query->where(function ($query) use ($search) {
                    $query->where('uraian', 'like', '%'.$search.'%')
                        ->orWhere('tanggal', 'like', '%'.$search.'%');
                });
            })
            ->when($request->ashnaf, function ($query, $ashnaf) {
                $query->where('ashnaf_id', '=', $ashnaf);
            })
            ->when($request->pilar, function ($query, $pilar) {
                $query->where('pilar_id', '=', $pilar);
            })
            ->when($request->program_pilar, function ($query, $program_pilar) {
                $query->where('program_pilar_id', '=', $program_pilar);
            })
            ->when($request->tahun, function ($query, $tahun) {
                $query->where('tahun_id', '=', $tahun);
            })
            ->when($request->lokasi, function ($query, $lokasi) {
                $query->where('lokasi_id', '=', $lokasi);
            })
            ->when($request->provinsi, function ($query, $provinsi) {
                $query->where('provinsi_id', '=', $provinsi);
            })
            ->when($request->kabupaten, function ($query, $kabupaten) {
                $query->where('kabupaten_id', '=', $kabupaten);
            })
            ->when($request->paginate, function ($query, $paginate) {
                return $query->paginate($paginate);
            }, function ($query) {
                return $query->paginate();
            })

            //->paginate(10)
            ->withQueryString();

        return view('penyaluran.index', compact('penyalurans', 'ashnafs', 'pilars', 'programPilars', 'tahuns', 'lokasis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ashnafs = Ashnaf::query()->get();
        // $penerimaManfaats = PenerimaManfaat::query()->get();
        $pilars = Pilar::query()->get();
        $programPilars = ProgramPilar::query()->get();
        $tahuns = Tahun::query()->get();
        $provinsis = Provinsi::query()->get();
        $kabupatens = Kabupaten::query()->get();

        return view('penyaluran.create', compact('ashnafs',  'pilars', 'programPilars', 'tahuns', 'provinsis', 'kabupatens'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'uraian' => 'required|max:255',
            'nominal' => 'required|numeric',
            'ashnaf_id' => 'nullable|exists:ashnafs,id',
            //'penerima_manfaat_id' => 'nullable|exists:penerima_manfaats,id',
            'lembaga' => 'nullable|numeric',
            'pria' => 'nullable|numeric',
            'wanita' => 'nullable|numeric',
            'pilar_id' => 'nullable|exists:pilars,id',
            'program_pilar_id' => 'nullable|exists:program_pilars,id',
            'tahun_id' => 'nullable|exists:tahuns,id',
            'provinsi_id' => 'nullable|exists:provinsis,id',
            'kabupaten_id' => 'nullable|exists:kabupatens,id',

        ]);
        //dd($request);

        Penyaluran::create([
            'tanggal' => $request->tanggal,
            'uraian' => $request->uraian,
            'nominal' => $request->nominal,
            'ashnaf_id' => $request->ashnaf_id,
            //'penerima_manfaat_id' => $request->penerima_manfaat_id,
            'lembaga_count' => $request->lembaga,
            'male_count' => $request->pria,
            'female_count' => $request->wanita,
            'pilar_id' => $request->pilar_id,
            'program_pilar_id' => $request->program_pilar_id,
            'tahun_id' => $request->tahun_id,
            'provinsi_id' => $request->provinsi_id,
            'kabupaten_id' => $request->kabupaten_id,

            // 'user_id' => auth()->user()->id,
            // 'title' => $request->title,
        ]);

        return redirect()->route('penyaluran.index')->with('success', 'Penyaluran created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Penyaluran $penyaluran)
    {
        //$penyaluran->load('ashnaf', 'penerimaManfaat', 'pilar', 'programPilar', 'tahun');

        return view('penyaluran.view', compact('penyaluran'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Penyaluran $penyaluran)
    {
        $ashnafs = Ashnaf::query()->get();
        // $penerimaManfaats = PenerimaManfaat::query()->get();
        $pilars = Pilar::query()->get();
        $programPilars = ProgramPilar::query()->get();
        $tahuns = Tahun::query()->get();
        $lokasis = Lokasi::query()->get();
        $provinsis = Provinsi::query()->get();
        $kabupatens = Kabupaten::query()->get();

        //dd($penyaluran);
        return view('penyaluran.edit', compact('penyaluran', 'ashnafs',  'pilars', 'programPilars', 'tahuns', 'lokasis'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Penyaluran $penyaluran)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'uraian' => 'required|max:255',
            'nominal' => 'required|numeric',
            'ashnaf_id' => 'nullable|exists:ashnafs,id',
            //'penerima_manfaat_id' => 'nullable|exists:penerima_manfaats,id',
            'lembaga' => 'nullable|numeric',
            'pria' => 'nullable|numeric',
            'wanita' => 'nullable|numeric',
            'pilar_id' => 'nullable|exists:pilars,id',
            'program_pilar_id' => 'nullable|exists:program_pilars,id',
            'tahun_id' => 'nullable|exists:tahuns,id',
            'lokasi_id' => 'nullable|exists:lokasis,id',
            'provinsi_id' => 'nullable|exists:provinsis,id',
            'kabupaten_id' => 'nullable|exists:kabupaten,id',

        ]);
        //dd($request);

        $penyaluran->update([
            'tanggal' => $request->tanggal,
            'uraian' => $request->uraian,
            'nominal' => $request->nominal,
            'ashnaf_id' => $request->ashnaf_id,
            //'penerima_manfaat_id' => $request->penerima_manfaat_id,
            'lembaga_count' => $request->lembaga,
            'male_count' => $request->pria,
            'female_count' => $request->wanita,
            'pilar_id' => $request->pilar_id,
            'program_pilar_id' => $request->program_pilar_id,
            'tahun_id' => $request->tahun_id,
            'lokasi_id' => $request->lokasi_id,
            'provinsi_id' => $request->provinsi_id,
            'kabupaten_id' => $request->kabupaten_id,

            // 'user_id' => auth()->user()->id,
            // 'title' => $request->title,
        ]);

        return redirect()->route('penyaluran.index')->with('success', 'Penyaluran edited successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Penyaluran $penyaluran)
    {
        $penyaluran->delete();

        return redirect()
            ->route('penyaluran.index')
            ->with('success', 'Penyaluran delete successfully!');
    }

    public function export()
    {

        return Excel::download(new PenyaluransExport, 'Penyaluran.xlsx');
    }

    public function exportCsv()
    {

        return Excel::download(new PenyaluransExport, 'Penyaluran.csv');
    }

    public function importExel()
    {
        return view('penyaluran.import-exel');
    }

    public function importCsv()
    {
        return view('penyaluran.import-csv');
    }

    public function importFileExel(Request $request)
    {
        $request->validate([
            'doc' => 'required|file|mimes:xlsx,xls|max:2048',
        ]);

        $file = $request->file('doc');

        $filename = $file->getClientOriginalName();
        $path = 'penyaluran/'.$filename;
        Storage::put($path, file_get_contents($file));

        Excel::import(new PenyaluranImportExel, $path);

        return redirect()->back()->with('success', 'Data imported successfully!');
    }

    public function importFileCsv(Request $request)
    {
        $request->validate([
            'doc' => 'required|file|mimes:csv|max:2048',
        ]);

        $file = $request->file('doc');

        $filename = $file->getClientOriginalName();
        $path = 'penyaluran/'.$filename;
        Storage::put($path, file_get_contents($file));

        Excel::import(new PenyaluranImportCsv, $path);

        return redirect()->back()->with('success', 'Data imported successfully!');
    }
}
