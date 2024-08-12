<?php

namespace App\Http\Controllers;

use App\Models\TanahPoldaKesatuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $tanah_polda = TanahPoldaKesatuan::select(
            DB::raw('sum(sudah_sertifikat_jumlah_luas) as sudah_sertifikat_jumlah_luas'),
            DB::raw('sum(sudah_sertifikat_jumlah_persil) as sudah_sertifikat_jumlah_persil'),
            DB::raw('sum(hibah_luas) as hibah_luas'),
            DB::raw('sum(hibah_persil) as hibah_persil'),
            DB::raw('sum(swadaya_luas) as swadaya_luas'),
            DB::raw('sum(swadaya_persil) as swadaya_persil'),
            DB::raw('sum(sengketa_luas) as sengketa_luas'),
            DB::raw('sum(sengketa_persil) as sengketa_persil'),
            DB::raw('sum(pinjam_pakai_luas) as pinjam_pakai_luas'),
            DB::raw('sum(pinjam_pakai_persil) as pinjam_pakai_persil'),
        )->first();

        // return $tanah_polda;

        return view('dashboard', compact('tanah_polda'));

        if (Auth::id()) {
            $user = Auth::user();
            if ($user->role === 'admin') {
                return view('dashboard');
            } elseif ($user->role === 'user') {
                return view('dashboard');
            }
        }
    }
}
