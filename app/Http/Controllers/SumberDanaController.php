<?php

namespace App\Http\Controllers;

use App\Models\SumberDana;
use Illuminate\Http\Request;

class SumberDanaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('sumberdana.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(SumberDana $sumberDana)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SumberDana $sumberDana)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SumberDana $sumberDana)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SumberDana $sumberDana)
    {
        //
    }
}