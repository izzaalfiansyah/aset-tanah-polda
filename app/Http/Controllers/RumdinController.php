<?php

namespace App\Http\Controllers;

use App\Models\Rumdin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class RumdinController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $builder = Rumdin::where('parent_id', '0');

        if (Auth::user()->role != 'admin') {
            $builder = $builder->where('user_id', Auth::id());
        }

        $rumdin = $builder->get();

        foreach ($rumdin as $key => $item) {
            $sub = Rumdin::where('parent_id', $item->id)->get();

            foreach ($sub as $skey => $sitem) {
                $sub[$skey]->sub = Rumdin::where('parent_id', $sitem->id)->get();
            }

            $rumdin[$key]->sub = $sub;
        }

        return view('rumdin.index', compact('rumdin'));
    }

    /**
     * Display a listing of the resource.
     */
    public function show($id)
    {
        $rumdin = Rumdin::find($id);

        $parent = null;
        $parent_parent = null;

        if ($rumdin->parent_id != '0') {
            $parent = Rumdin::find($rumdin->parent_id);
        }

        if ($parent?->parent_id != '0') {
            $parent_parent = Rumdin::find($parent?->parent_id);
        }

        return view('rumdin.edit', compact('rumdin', 'parent', 'parent_parent'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id = null)
    {
        $parent = null;
        $parent_parent = null;

        if ($id) {
            $parent = Rumdin::find($id);
        }

        if ($parent?->parent_id != '0') {
            $parent_parent = Rumdin::find($parent?->parent_id);
        }

        return view('rumdin.create', compact('parent', 'parent_parent'));
    }

    public function store(Request $req)
    {
        $data = $req->validate([
            'nama' => 'required',
            'parent_id' => 'nullable',
            'rumah_tapak_jumlah' => 'nullable|integer',
            'rumah_tapak_kapasitas' => 'nullable|integer',
            'mess_jumlah' => 'nullable|integer',
            'mess_kapasitas' => 'nullable|integer',
            'rusun_jumlah' => 'nullable|integer',
            'rusun_kapasitas' => 'nullable|integer',
            'rusus_jumlah' => 'nullable|integer',
            'rusus_kapasitas' => 'nullable|integer',
            'barak_jumlah' => 'nullable|integer',
            'barak_kapasitas' => 'nullable|integer',
        ]);

        $data['user_id'] = $req->user()->id;

        if (!Rumdin::create($data)) {
            return Redirect::back()->withToastError('Rumdin gagal ditambah.');
        }

        return Redirect::to('/rumdin')->withToastSuccess('Rumdin berhasil ditambah');
    }

    public function update(Request $req, $id)
    {
        $data = $req->validate([
            'nama' => 'required',
            'parent_id' => 'nullable',
            'rumah_tapak_jumlah' => 'nullable|integer',
            'rumah_tapak_kapasitas' => 'nullable|integer',
            'mess_jumlah' => 'nullable|integer',
            'mess_kapasitas' => 'nullable|integer',
            'rusun_jumlah' => 'nullable|integer',
            'rusun_kapasitas' => 'nullable|integer',
            'rusus_jumlah' => 'nullable|integer',
            'rusus_kapasitas' => 'nullable|integer',
            'barak_jumlah' => 'nullable|integer',
            'barak_kapasitas' => 'nullable|integer',
        ]);

        if (!Rumdin::find($id)->update($data)) {
            return Redirect::back()->withToastError('Rumdin gagal diedit.');
        }

        return Redirect::to('/rumdin')->withToastSuccess('Rumdin berhasil diedit');
    }

    public function destroy(string $id)
    {
        Rumdin::destroy($id);

        return Redirect::to('/rumdin')->withToastSuccess('Rumdin berhasil dihapus');
    }
}
