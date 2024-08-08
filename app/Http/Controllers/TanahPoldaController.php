<?php

namespace App\Http\Controllers;

use App\Models\TanahPolda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class TanahPoldaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tanah_polda = TanahPolda::all();

        return view('tanah-polda.index', compact('tanah_polda'));
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
        $data = $request->validate([
            'nama' => 'required',
        ]);

        if (!TanahPolda::create($data)) {
            return Redirect::back()->withToastError('Tanah polda gagal ditambah.');
        }

        return Redirect::to('/tanah-polda')->withToastSuccess('Tanah polda berhasil ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
