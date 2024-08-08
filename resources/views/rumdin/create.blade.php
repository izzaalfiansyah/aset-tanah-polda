@extends('c-app', [
    'title' => 'Tambah Rumdin',
    'showTitle' => true,
])

@section('content')
    <x-card title="Tambah Rumdin">
        <form action="{{ url('/rumdin') }}" method="POST">
            @csrf

            <table class="un-w-full un-whitespace-nowrap table table-bordered un-bg-gray-50">
                <tbody>
                    {{-- nama --}}
                    <tr>
                        <td colspan="2" class="!un-font-semibold !un-text-lg">Kesatuan</td>
                    </tr>
                    @if ($parent)
                        @if ($parent_parent)
                            <tr>
                                <td>Nama Kesatuan</td>
                                <td>
                                    {{ $parent_parent->nama }}
                                </td>
                            </tr>
                            <tr>
                                <td>Nama Sub Kesatuan</td>
                                <td>
                                    {{ $parent->nama }}
                                    <input type="text" style="display: none" name="parent_id" value="{{ $parent->id }}">
                                </td>
                            </tr>
                            <tr>
                                <td>Nama Sub-Sub Kesatuan</td>
                                <td class="!un-bg-white">
                                    <input type="text" class="un-border-none un-bg-transparent un-outline-none un-w-full"
                                        required name="nama" value="{{ old('nama') }}"
                                        placeholder="Masukkan Nama Sub-Sub Kesatuan">
                                </td>
                            </tr>
                        @else
                            <tr>
                                <td>Nama Kesatuan</td>
                                <td>
                                    {{ $parent->nama }}
                                    <input type="text" style="display: none" name="parent_id"
                                        value="{{ $parent->id }}">
                                </td>
                            </tr>
                            <tr>
                                <td>Nama Sub Kesatuan</td>
                                <td class="!un-bg-white">
                                    <input type="text" class="un-border-none un-bg-transparent un-outline-none un-w-full"
                                        required name="nama" value="{{ old('nama') }}"
                                        placeholder="Masukkan Nama Sub Kesatuan">
                                </td>
                            </tr>
                        @endif
                    @else
                        <tr>
                            <td>Nama Kesatuan</td>
                            <td class="!un-bg-white">
                                <input type="text" class="un-border-none un-bg-transparent un-outline-none un-w-full"
                                    required name="nama" value="{{ old('nama') }}"
                                    placeholder="Masukkan Nama Kesatuan">
                            </td>
                        </tr>
                    @endif

                    {{-- rumah tapak --}}
                    <tr>
                        <td colspan="2" class="!un-font-semibold !un-text-lg">Rumah Tapak</td>
                    </tr>
                    <tr>
                        <td class="align-middle">Jumlah Unit</td>
                        <td class="!un-bg-white">
                            <input type="number" class="un-border-none un-bg-transparent un-outline-none un-w-full"
                                name="rumah_tapak_jumlah" value="{{ old('rumah_tapak_jumlah') }}" placeholder="0">
                        </td>
                    </tr>
                    <tr>
                        <td class="align-middle">Kapasitas KK</td>
                        <td class="!un-bg-white">
                            <input type="number" class="un-border-none un-bg-transparent un-outline-none un-w-full"
                                name="rumah_tapak_kapasitas" value="{{ old('rumah_tapak_kapasitas') }}" placeholder="0">
                        </td>
                    </tr>

                    {{-- mess --}}
                    <tr>
                        <td colspan="2" class="!un-font-semibold !un-text-lg">Mess</td>
                    </tr>
                    <tr>
                        <td class="align-middle">Jumlah Unit</td>
                        <td class="!un-bg-white">
                            <input type="number" class="un-border-none un-bg-transparent un-outline-none un-w-full"
                                name="mess_jumlah" value="{{ old('mess_jumlah') }}" placeholder="0">
                        </td>
                    </tr>
                    <tr>
                        <td class="align-middle">Kapasitas KK</td>
                        <td class="!un-bg-white">
                            <input type="number" class="un-border-none un-bg-transparent un-outline-none un-w-full"
                                name="mess_kapasitas" value="{{ old('mess_kapasitas') }}" placeholder="0">
                        </td>
                    </tr>

                    {{-- rusun --}}
                    <tr>
                        <td colspan="2" class="!un-font-semibold !un-text-lg">Rusun</td>
                    </tr>
                    <tr>
                        <td class="align-middle">Jumlah Unit</td>
                        <td class="!un-bg-white">
                            <input type="number" class="un-border-none un-bg-transparent un-outline-none un-w-full"
                                name="rusun_jumlah" value="{{ old('rusun_jumlah') }}" placeholder="0">
                        </td>
                    </tr>
                    <tr>
                        <td class="align-middle">Kapasitas KK</td>
                        <td class="!un-bg-white">
                            <input type="number" class="un-border-none un-bg-transparent un-outline-none un-w-full"
                                name="rusun_kapasitas" value="{{ old('rusun_kapasitas') }}" placeholder="0">
                        </td>
                    </tr>

                    {{-- rusus --}}
                    <tr>
                        <td colspan="2" class="!un-font-semibold !un-text-lg">Rusus</td>
                    </tr>
                    <tr>
                        <td class="align-middle">Jumlah Unit</td>
                        <td class="!un-bg-white">
                            <input type="number" class="un-border-none un-bg-transparent un-outline-none un-w-full"
                                name="rusus_jumlah" value="{{ old('rusus_jumlah') }}" placeholder="0">
                        </td>
                    </tr>
                    <tr>
                        <td class="align-middle">Kapasitas KK</td>
                        <td class="!un-bg-white">
                            <input type="number" class="un-border-none un-bg-transparent un-outline-none un-w-full"
                                name="rusus_kapasitas" value="{{ old('rusus_kapasitas') }}" placeholder="0">
                        </td>
                    </tr>

                    {{-- barak --}}
                    <tr>
                        <td colspan="2" class="!un-font-semibold !un-text-lg">Barak</td>
                    </tr>
                    <tr>
                        <td class="align-middle">Jumlah Unit</td>
                        <td class="!un-bg-white">
                            <input type="number" class="un-border-none un-bg-transparent un-outline-none un-w-full"
                                name="barak_jumlah" value="{{ old('barak_jumlah') }}" placeholder="0">
                        </td>
                    </tr>
                    <tr>
                        <td class="align-middle">Kapasitas KK</td>
                        <td class="!un-bg-white">
                            <input type="number" class="un-border-none un-bg-transparent un-outline-none un-w-full"
                                name="barak_kapasitas" value="{{ old('barak_kapasitas') }}" placeholder="0">
                        </td>
                    </tr>
                </tbody>
            </table>

            <div class="un-flex un-justify-end un-space-x-4">
                <button type="button" class="btn btn-light" onclick="window.history.back()">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </x-card>
@endsection
