@extends('c-app', [
    'title' => 'Edit Rumdin',
    'showTitle' => true,
])

@section('content')
    <x-card title="Edit Rumdin">
        <form action="{{ url('/rumdin/' . $rumdin->id) }}" method="POST">
            @method('PUT')
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
                                        required name="nama" value="{{ old('nama', $rumdin->nama) }}"
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
                                        required name="nama" value="{{ old('nama', $rumdin->nama) }}"
                                        placeholder="Masukkan Nama Sub Kesatuan">
                                </td>
                            </tr>
                        @endif
                    @else
                        <tr>
                            <td>Nama Kesatuan</td>
                            <td class="!un-bg-white">
                                <input type="text" class="un-border-none un-bg-transparent un-outline-none un-w-full"
                                    required name="nama" value="{{ old('nama', $rumdin->nama) }}"
                                    placeholder="Masukkan Nama Kesatuan">
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>

            <table class="un-w-full un-whitespace-nowrap table table-bordered un-bg-gray-50">
                <tbody>
                    <tr>
                        <td colspan="2" class="!un-font-semibold !un-text-lg">Rumah Tapak</td>
                    </tr>
                    <tr>
                        <td class="align-middle">Jumlah Unit</td>
                        <td class="!un-bg-white">
                            <input type="number" class="un-border-none un-bg-transparent un-outline-none un-w-full"
                                name="rumah_tapak_jumlah"
                                value="{{ old('rumah_tapak_jumlah', $rumdin->rumah_tapak_jumlah) }}" placeholder="0">
                        </td>
                    </tr>
                    <tr>
                        <td class="align-middle">Kapasitas KK</td>
                        <td class="!un-bg-white">
                            <input type="number" class="un-border-none un-bg-transparent un-outline-none un-w-full"
                                name="rumah_tapak_kapasitas"
                                value="{{ old('rumah_tapak_kapasitas', $rumdin->rumah_tapak_kapasitas) }}" placeholder="0">
                        </td>
                    </tr>
                </tbody>
            </table>

            <table class="un-w-full un-whitespace-nowrap table table-bordered un-bg-gray-50">
                <tbody>
                    <tr>
                        <td colspan="2" class="!un-font-semibold !un-text-lg">Mess</td>
                    </tr>
                    <tr>
                        <td class="align-middle">Jumlah Unit</td>
                        <td class="!un-bg-white">
                            <input type="number" class="un-border-none un-bg-transparent un-outline-none un-w-full"
                                name="mess_jumlah" value="{{ old('mess_jumlah', $rumdin->mess_jumlah) }}" placeholder="0">
                        </td>
                    </tr>
                    <tr>
                        <td class="align-middle">Kapasitas KK</td>
                        <td class="!un-bg-white">
                            <input type="number" class="un-border-none un-bg-transparent un-outline-none un-w-full"
                                name="mess_kapasitas" value="{{ old('mess_kapasitas', $rumdin->mess_kapasitas) }}"
                                placeholder="0">
                        </td>
                    </tr>
                </tbody>
            </table>

            <table class="un-w-full un-whitespace-nowrap table table-bordered un-bg-gray-50">
                <tbody>
                    <tr>
                        <td colspan="2" class="!un-font-semibold !un-text-lg">Rusun</td>
                    </tr>
                    <tr>
                        <td class="align-middle">Jumlah Unit</td>
                        <td class="!un-bg-white">
                            <input type="number" class="un-border-none un-bg-transparent un-outline-none un-w-full"
                                name="rusun_jumlah" value="{{ old('rusun_jumlah', $rumdin->rusun_jumlah) }}"
                                placeholder="0">
                        </td>
                    </tr>
                    <tr>
                        <td class="align-middle">Kapasitas KK</td>
                        <td class="!un-bg-white">
                            <input type="number" class="un-border-none un-bg-transparent un-outline-none un-w-full"
                                name="rusun_kapasitas" value="{{ old('rusun_kapasitas', $rumdin->rusun_kapasitas) }}"
                                placeholder="0">
                        </td>
                    </tr>
                </tbody>
            </table>

            <table class="un-w-full un-whitespace-nowrap table table-bordered un-bg-gray-50">
                <tbody>
                    <tr>
                        <td colspan="2" class="!un-font-semibold !un-text-lg">Rusus</td>
                    </tr>
                    <tr>
                        <td class="align-middle">Jumlah Unit</td>
                        <td class="!un-bg-white">
                            <input type="number" class="un-border-none un-bg-transparent un-outline-none un-w-full"
                                name="rusus_jumlah" value="{{ old('rusus_jumlah', $rumdin->rusus_jumlah) }}"
                                placeholder="0">
                        </td>
                    </tr>
                    <tr>
                        <td class="align-middle">Kapasitas KK</td>
                        <td class="!un-bg-white">
                            <input type="number" class="un-border-none un-bg-transparent un-outline-none un-w-full"
                                name="rusus_kapasitas" value="{{ old('rusus_kapasitas', $rumdin->rusus_kapasitas) }}"
                                placeholder="0">
                        </td>
                    </tr>
                </tbody>
            </table>

            <table class="un-w-full un-whitespace-nowrap table table-bordered un-bg-gray-50">
                <tbody>
                    <tr>
                        <td colspan="2" class="!un-font-semibold !un-text-lg">Barak</td>
                    </tr>
                    <tr>
                        <td class="align-middle">Jumlah Unit</td>
                        <td class="!un-bg-white">
                            <input type="number" class="un-border-none un-bg-transparent un-outline-none un-w-full"
                                name="barak_jumlah" value="{{ old('barak_jumlah', $rumdin->barak_jumlah) }}"
                                placeholder="0">
                        </td>
                    </tr>
                    <tr>
                        <td class="align-middle">Kapasitas KK</td>
                        <td class="!un-bg-white">
                            <input type="number" class="un-border-none un-bg-transparent un-outline-none un-w-full"
                                name="barak_kapasitas" value="{{ old('barak_kapasitas', $rumdin->barak_kapasitas) }}"
                                placeholder="0">
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
