<?php

namespace App\Http\Controllers;

use App\Models\TanahSatkerMabes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class TanahSatkerMabesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tanah_satker_mabes = TanahSatkerMabes::all();

        return view('tanah-satker-mabes.index', compact('tanah_satker_mabes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tanah-satker-mabes.create');
    }

    public function store(Request $req)
    {
        $data = $req->validate([
            'nama' => 'required',
            'sudah_sertifikat_jumlah_luas' => 'nullable|integer',
            'sudah_sertifikat_jumlah_persil' => 'nullable|integer',
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

        if (!TanahSatkerMabes::create($data)) {
            return Redirect::back()->withToastError('Tanah satker mabes gagal ditambah.');
        }

        return Redirect::to('/tanah-satker-mabes')->withToastSuccess('Tanah satker mabes berhasil ditambah');
    }

    public function update(Request $req, $id)
    {
        $data = $req->validate([
            'nama' => 'required',
            'sudah_sertifikat_jumlah_luas' => 'nullable|integer',
            'sudah_sertifikat_jumlah_persil' => 'nullable|integer',
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

        if (!TanahSatkerMabes::find($id)->update($data)) {
            return Redirect::back()->withToastError('Tanah satker mabes gagal diedit.');
        }

        return Redirect::to('/tanah-satker-mabes')->withToastSuccess('Tanah satker mabes berhasil diedit');
    }

    public function destroy(string $id)
    {
        TanahSatkerMabes::destroy($id);

        return Redirect::to('/tanah-satker-mabes')->withToastSuccess('Tanah satker mabes berhasil dihapus');
    }
}
