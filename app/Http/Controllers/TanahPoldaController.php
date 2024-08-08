<?php

namespace App\Http\Controllers;

use App\Models\TanahPolda;
use App\Models\TanahPoldaSub;
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

    public function storeSub(Request $req)
    {
        $data = $req->validate([
            'tanah_polda_id' => 'required',
            'nama_sub' => 'required',
            'jumlah_luas' => 'nullable|integer',
            'jumlah_persil' => 'nullable|integer',
            'hibah_luas' => 'nullable|integer',
            'hibah_persil' => 'nullable|integer',
            'swadaya_luas' => 'nullable|integer',
            'swadaya_persil' => 'nullable|integer',
            'sengketa_luas' => 'nullable|integer',
            'sengketa_persil' => 'nullable|integer',
            'pinjam_pakai_luas' => 'nullable|integer',
            'pinjam_pakai_persil' => 'nullable|integer',
            'keterangan' => 'nullable',
        ]);

        $data['nama'] = $data['nama_sub'];

        if (!TanahPoldaSub::create($data)) {
            return Redirect::back()->withToastError('Sub tanah polda gagal ditambah.');
        }

        return Redirect::to('/tanah-polda')->withToastSuccess('Sub tanah polda berhasil ditambah');
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
        $data = $request->validate([
            'nama' => 'required',
        ]);

        if (!TanahPolda::find($id)->update($data)) {
            return Redirect::back()->withToastError('Tanah polda gagal diedit.');
        }

        return Redirect::to('/tanah-polda')->withToastSuccess('Tanah polda berhasil diedit');
    }

    public function updateSub(Request $req, $id)
    {
        $data = $req->validate([
            'tanah_polda_id' => 'required',
            'nama_sub' => 'required',
            'jumlah_luas' => 'nullable|integer',
            'jumlah_persil' => 'nullable|integer',
            'hibah_luas' => 'nullable|integer',
            'hibah_persil' => 'nullable|integer',
            'swadaya_luas' => 'nullable|integer',
            'swadaya_persil' => 'nullable|integer',
            'sengketa_luas' => 'nullable|integer',
            'sengketa_persil' => 'nullable|integer',
            'pinjam_pakai_luas' => 'nullable|integer',
            'pinjam_pakai_persil' => 'nullable|integer',
            'keterangan' => 'nullable',
        ]);

        $data['nama'] = $data['nama_sub'];

        if (!TanahPoldaSub::find($id)->update($data)) {
            return Redirect::back()->withToastError('Sub tanah polda gagal diedit.');
        }

        return Redirect::to('/tanah-polda')->withToastSuccess('Sub tanah polda berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        TanahPoldaSub::where('tanah_polda_id', $id)->delete();
        TanahPolda::destroy($id);

        return Redirect::to('/tanah-polda')->withToastSuccess('Tanah polda berhasil dihapus');
    }
    public function destroySub(string $id)
    {
        TanahPoldaSub::destroy($id);

        return Redirect::to('/tanah-polda')->withToastSuccess('Sub tanah polda berhasil dihapus');
    }
}
