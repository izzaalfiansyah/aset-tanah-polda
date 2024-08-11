<?php

namespace App\Http\Controllers;

use App\Models\Province;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::all();

        return view('user.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $provinsi = Province::all();

        return view('user.create', compact('provinsi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'gender' => ['required'],
            'place_of_birth' => ['nullable'],
            'date_of_birth' => ['nullable'],
            'province_id' => ['required', 'exists:provinces,id'],
            'district_id' => ['required', 'exists:districts,id'],
            'subdistrict_id' => ['required', 'exists:subdistricts,id'],
            'address' => ['nullable'],
            'phone' => ['nullable'],
            'username' => 'required|unique:users,username,' . auth()->id(),
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)],
            'password' => ['required', 'confirmed', Password::default()],
        ]);

        $data['password'] = Hash::make($request->password);

        if (!User::create($data)) {
            return Redirect::back()->withToastError('User gagal ditambah.');
        }

        return Redirect::to('/user')->withToastSuccess('User berhasil ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $provinsi = Province::all(); // Ambil semua provinsi

        $user = User::find($id); // Ambil user yang sedang login
        $selectedProvinsi = $user->province_id; // Ambil ID provinsi user
        $selectedKabupaten = $user->district_id; // Ambil ID kabupaten user
        $selectedKecamatan = $user->subdistrict_id; // Ambil ID kecamatan user

        return view('user.edit', [
            'user' => $user,
            'provinsi' => $provinsi,
            'selectedProvinsi' => $selectedProvinsi,
            'selectedKabupaten' => $selectedKabupaten,
            'selectedKecamatan' => $selectedKecamatan,
        ]);
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
            'name' => ['required', 'string', 'max:255'],
            'gender' => ['required'],
            'place_of_birth' => ['nullable'],
            'date_of_birth' => ['nullable'],
            'province_id' => ['required', 'exists:provinces,id'],
            'district_id' => ['required', 'exists:districts,id'],
            'subdistrict_id' => ['required', 'exists:subdistricts,id'],
            'address' => ['nullable'],
            'phone' => ['nullable'],
            'username' => 'required|unique:users,username,' . $id,
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($id)],
            'password' => ['nullable', 'confirmed', Password::default()],
        ]);

        $data['password'] = Hash::make($request->password);

        if (!$request->password) {
            unset($data['password']);
        }

        if (!User::find($id)->update($data)) {
            return Redirect::back()->withToastError('User gagal diedit.');
        }

        return Redirect::back()->withToastSuccess('User berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
