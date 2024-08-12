<?php

namespace App\Http\Controllers;

use App\Models\PembangunanRumdin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class PembangunanRumdinController extends Controller
{
    public function index(Request $req)
    {
        $builder = PembangunanRumdin::where('parent_id', '0');

        if (Auth::user()->role != 'admin') {
            $builder = $builder->where('user_id', Auth::id());
        }

        if ($req->user_id) {
            $builder = $builder->where('user_id', $req->user_id);
        }

        $pembangunan_rumdin = $builder->paginate(5)->withQueryString();

        foreach ($pembangunan_rumdin as $key => $item) {
            $sub = PembangunanRumdin::where('parent_id', $item->id)->get();

            foreach ($sub as $skey => $sitem) {
                $subsub = PembangunanRumdin::where('parent_id', $sitem->id)->get();

                foreach ($subsub as $sskey => $ssitem) {
                    $subsubsub = PembangunanRumdin::where('parent_id', $ssitem->id)->get();

                    $subsub[$sskey]->sub = $subsubsub;
                }

                $sub[$skey]->sub = $subsub;
            }

            $pembangunan_rumdin[$key]->sub = $sub;
        }

        return view('pembangunan-rumdin.index', compact('pembangunan_rumdin'));
    }

    public function show($id)
    {
        $pembangunan_rumdin = PembangunanRumdin::find($id);

        $parent = null;
        $parent_parent = null;
        $parent_parent_parent = null;

        if ($pembangunan_rumdin->parent_id != '0') {
            $parent = PembangunanRumdin::find($pembangunan_rumdin->parent_id);
        }

        if ($parent?->parent_id != '0') {
            $parent_parent = PembangunanRumdin::find($parent?->parent_id);
        }

        if ($parent_parent?->parent_id != '0') {
            $parent_parent_parent = PembangunanRumdin::find($parent_parent?->parent_id);
        }

        return view('pembangunan-rumdin.edit', compact('pembangunan_rumdin', 'parent', 'parent_parent', 'parent_parent_parent'));
    }

    public function create($id = null)
    {
        $parent = null;
        $parent_parent = null;
        $parent_parent_parent = null;

        if ($id) {
            $parent = PembangunanRumdin::find($id);
        }

        if ($parent?->parent_id != '0') {
            $parent_parent = PembangunanRumdin::find($parent?->parent_id);
        }

        if ($parent_parent?->parent_id != '0') {
            $parent_parent_parent = PembangunanRumdin::find($parent_parent?->parent_id);
        }

        return view('pembangunan-rumdin.create', compact('parent', 'parent_parent', 'parent_parent_parent'));
    }

    public function store(Request $req)
    {
        $data = $req->validate([
            'nama' => 'nullable',
            'parent_id' => 'nullable',
            'nama' => 'nullable',
            'jenis_bangunan' => 'nullable',
            'tipe' => 'nullable|integer',
            'jumlah' => 'nullable|integer',
            'sumber_gar' => 'nullable',
            'keterangan' => 'nullable',
        ]);

        $data['user_id'] = $req->user()->id;

        if (!PembangunanRumdin::create($data)) {
            return Redirect::back()->withToastError('Pembangunan rumdin gagal ditambah.');
        }

        return Redirect::to('/pembangunan-rumdin')->withToastSuccess('Pembangunan rumdin berhasil ditambah');
    }

    public function update(Request $req, $id)
    {
        $data = $req->validate([
            'nama' => 'nullable',
            'parent_id' => 'nullable',
            'nama' => 'nullable',
            'jenis_bangunan' => 'nullable',
            'tipe' => 'nullable|integer',
            'jumlah' => 'nullable|integer',
            'sumber_gar' => 'nullable',
            'keterangan' => 'nullable',
        ]);

        if (!PembangunanRumdin::find($id)->update($data)) {
            return Redirect::back()->withToastError('Pembangunan rumdin gagal diedit.');
        }

        return Redirect::to('/pembangunan-rumdin')->withToastSuccess('Pembangunan rumdin berhasil diedit');
    }

    public function destroy(string $id)
    {
        PembangunanRumdin::destroy($id);

        return Redirect::to('/pembangunan-rumdin')->withToastSuccess('Pembangunan rumdin berhasil dihapus');
    }
}
