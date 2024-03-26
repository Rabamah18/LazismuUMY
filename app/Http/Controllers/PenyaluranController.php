<?php

namespace App\Http\Controllers;

use App\Models\Ashnaf;
use App\Models\Penyaluran;
use App\Models\Pilar;
use App\Models\Tahun;
use Illuminate\Http\Request;

class PenyaluranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $ashnafs = Ashnaf::query()->get();
        $pilars = Pilar::query()->get();
        $tahuns = Tahun::query()->get();

        $penyalurans = Penyaluran::orderByDesc('tanggal')
        ->when($request->search, function ($query, $search) {
            $query->where(function ($query) use ($search) {
                $query->where('uraian', 'like', '%'.$search.'%');
                // ->orWhere('', 'like', '%'.$search.'%');
            });
        })
        ->when($request->ashnaf, function ($query, $ashnaf) {
            $query->where('ashnaf_id', '=', $ashnaf);
        })
        ->when($request->pilar, function ($query, $pilar) {
            $query->where('pilar_id', '=', $pilar);
        })
        ->when($request->tahun, function ($query, $tahun) {
            $query->where('tahun_id', '=', $tahun);
        })
            ->with('ashnaf', 'penerimaManfaat', 'tahun', 'pilar')
            ->paginate(10)
            ->withQueryString();
        return view('penyaluran.index', compact('penyalurans', 'ashnafs', 'pilars', 'tahuns'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('penyaluran.create');
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
    public function show(Penyaluran $penyaluran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Penyaluran $penyaluran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Penyaluran $penyaluran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Penyaluran $penyaluran)
    {
        //
    }
}
