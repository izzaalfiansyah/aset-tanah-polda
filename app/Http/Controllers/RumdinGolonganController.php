<?php

namespace App\Http\Controllers;

use App\Models\RumdinGolongan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class RumdinGolonganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rumdin_golongan = RumdinGolongan::where('parent_id', '0')->get();

        foreach ($rumdin_golongan as $key => $item) {
            $sub = RumdinGolongan::where('parent_id', $item->id)->get();

            $rumdin_golongan[$key]->sub = $sub;
        }

        return view('rumdin-golongan.index', compact('rumdin_golongan'));
    }

    /**
     * Display a listing of the resource.
     */
    public function show($id)
    {
        $rumdin_golongan = RumdinGolongan::find($id);

        $parent = null;

        if ($rumdin_golongan->parent_id != '0') {
            $parent = RumdinGolongan::find($rumdin_golongan->parent_id);
        }

        return view('rumdin-golongan.edit', compact('rumdin_golongan', 'parent'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id = null)
    {
        $parent = null;
        $parent_parent = null;

        if ($id) {
            $parent = RumdinGolongan::find($id);
        }

        if ($parent?->parent_id != '0') {
            $parent_parent = RumdinGolongan::find($parent?->parent_id);
        }

        return view('rumdin-golongan.create', compact('parent', 'parent_parent'));
    }

    public function store(Request $req)
    {
        $data = $req->validate([
            'nama' => 'required',
            'parent_id' => 'nullable',
            'jumlah_personel' => 'nullable|integer',
            'rumah_dinas_jumlah' => 'nullable|integer',
            'rumah_dinas_kapasitas' => 'nullable|integer',
            'rumah_dinas_polri_aktif' => 'nullable|integer',
            'rumah_dinas_polri_punra' => 'nullable|integer',
            'rumah_dinas_non_polri' => 'nullable|integer',
            'rumah_non_dinas_pribadi' => 'nullable|integer',
            'rumah_non_dinas_orang_tua' => 'nullable|integer',
            'rumah_non_dinas_sewa' => 'nullable|integer',
            'keterangan' => 'nullable',
        ]);

        if (!RumdinGolongan::create($data)) {
            return Redirect::back()->withToastError('Rumdin golongan gagal ditambah.');
        }

        return Redirect::to('/rumdin-golongan')->withToastSuccess('Rumdin golongan berhasil ditambah');
    }

    public function update(Request $req, $id)
    {
        $data = $req->validate([
            'nama' => 'required',
            'parent_id' => 'nullable',
            'jumlah_personel' => 'nullable|integer',
            'rumah_dinas_jumlah' => 'nullable|integer',
            'rumah_dinas_kapasitas' => 'nullable|integer',
            'rumah_dinas_polri_aktif' => 'nullable|integer',
            'rumah_dinas_polri_punra' => 'nullable|integer',
            'rumah_dinas_non_polri' => 'nullable|integer',
            'rumah_non_dinas_pribadi' => 'nullable|integer',
            'rumah_non_dinas_orang_tua' => 'nullable|integer',
            'rumah_non_dinas_sewa' => 'nullable|integer',
            'keterangan' => 'nullable',
        ]);

        if (!RumdinGolongan::find($id)->update($data)) {
            return Redirect::back()->withToastError('Rumdin golongan gagal diedit.');
        }

        return Redirect::to('/rumdin-golongan')->withToastSuccess('Rumdin golongan berhasil diedit');
    }

    public function destroy(string $id)
    {
        RumdinGolongan::destroy($id);

        return Redirect::to('/rumdin-golongan')->withToastSuccess('Rumdin golongan berhasil dihapus');
    }
}
