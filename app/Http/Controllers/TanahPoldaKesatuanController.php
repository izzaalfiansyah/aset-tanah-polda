<?php

namespace App\Http\Controllers;

use App\Models\TanahPoldaKesatuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class TanahPoldaKesatuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $req)
    {
        $builder = new TanahPoldaKesatuan;

        if (Auth::user()->role != 'admin') {
            $builder = $builder->where('user_id', Auth::id());
        }

        if ($req->user_id) {
            $builder = $builder->where('user_id', $req->user_id);
        }

        $tanah_polda = $builder->paginate(10)->withQueryString();

        return view('tanah-polda-kesatuan.index', compact('tanah_polda'));
    }

    public function show($id)
    {
        $tanah_polda = TanahPoldaKesatuan::find($id);

        return view('tanah-polda-kesatuan.edit', compact('tanah_polda'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tanah-polda-kesatuan.create');
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

        $data['user_id'] = $req->user()->id;

        if (!TanahPoldaKesatuan::create($data)) {
            return Redirect::back()->withToastError('Tanah polda gagal ditambah.');
        }

        return Redirect::to('/tanah-polda')->withToastSuccess('Tanah polda berhasil ditambah');
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

        if (!TanahPoldaKesatuan::find($id)->update($data)) {
            return Redirect::back()->withToastError('Tanah polda gagal diedit.');
        }

        return Redirect::to('/tanah-polda')->withToastSuccess('Tanah polda berhasil diedit');
    }

    public function destroy(string $id)
    {
        TanahPoldaKesatuan::destroy($id);

        return Redirect::to('/tanah-polda')->withToastSuccess('Tanah polda berhasil dihapus');
    }
}
