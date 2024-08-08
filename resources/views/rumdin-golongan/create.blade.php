@extends('c-app', [
    'title' => 'Tambah Rumdin Golongan',
    'showTitle' => true,
])

@section('content')
    <x-card title="Tambah Rumdin Golongan">
        <form action="{{ url('/rumdin-golongan') }}" method="POST">
            @csrf

            <table class="un-w-full un-whitespace-nowrap table table-bordered un-bg-gray-50">
                <tbody>
                    {{-- nama --}}
                    <tr>
                        <td colspan="3" class="!un-font-semibold !un-text-lg">Satker</td>
                    </tr>
                    @if ($parent)
                        <tr>
                            <td>Nama Satker</td>
                            <td>
                                {{ $parent->nama }}
                                <input type="text" style="display: none" name="parent_id" value="{{ $parent->id }}">
                            </td>
                        </tr>
                        <tr>
                            <td>Nama Sub Satker</td>
                            <td class="!un-bg-white">
                                <input type="text" class="un-border-none un-bg-transparent un-outline-none un-w-full"
                                    required name="nama" value="{{ old('nama') }}"
                                    placeholder="Masukkan Nama Sub Satker">
                            </td>
                        </tr>
                    @else
                        <tr>
                            <td>Nama Satker</td>
                            <td class="!un-bg-white">
                                <input type="text" class="un-border-none un-bg-transparent un-outline-none un-w-full"
                                    required name="nama" value="{{ old('nama') }}" placeholder="Masukkan Nama Satker">
                            </td>
                        </tr>
                    @endif

                    <tr>
                        <td class="align-middle">Jumlah Personel</td>
                        <td class="!un-bg-white">
                            <input type="number" class="un-border-none un-bg-transparent un-outline-none un-w-full"
                                name="jumlah_personel" value="{{ old('jumlah_personel') }}" placeholder="0">
                        </td>
                    </tr>
                </tbody>
            </table>

            <table class="un-w-full un-whitespace-nowrap table table-bordered un-bg-gray-50">
                <tbody>
                    <tr>
                        <td colspan="4" class="!un-font-semibold !un-text-lg">Rumah Dinas</td>
                    </tr>
                    <tr>
                        <td colspan="3">Jumlah Rumah Dinas</td>
                        <td class="!un-bg-white">
                            <input type="number" class="un-border-none un-bg-transparent un-outline-none un-w-full"
                                name="rumah_dinas_jumlah" value="{{ old('rumah_dinas_jumlah') }}" placeholder="0">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">Jumlah Kapasitas</td>
                        <td class="!un-bg-white">
                            <input type="number" class="un-border-none un-bg-transparent un-outline-none un-w-full"
                                name="rumah_dinas_kapasitas" value="{{ old('rumah_dinas_kapasitas') }}" placeholder="0">
                        </td>
                    </tr>
                    <tr>
                        <td rowspan="3" class="text-center un-align-middle">Penghuni</td>
                        <td rowspan="2" class="text-center un-align-middle">Polri</td>
                        <td class="text-center un-align-middle">Aktif</td>
                        <td class="!un-bg-white">
                            <input type="number" class="un-border-none un-bg-transparent un-outline-none un-w-full"
                                name="rumah_dinas_polri_aktif" value="{{ old('rumah_dinas_polri_aktif') }}" placeholder="0">
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center un-align-middle">Purnawrwn</td>
                        <td class="!un-bg-white">
                            <input type="number" class="un-border-none un-bg-transparent un-outline-none un-w-full"
                                name="rumah_dinas_polri_purna" value="{{ old('rumah_dinas_polri_purna') }}" placeholder="0">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="text-center un-align-middle">Non Polri</td>
                        <td class="!un-bg-white">
                            <input type="number" class="un-border-none un-bg-transparent un-outline-none un-w-full"
                                name="rumah_dinas_non_polri" value="{{ old('rumah_dinas_non_polri') }}" placeholder="0">
                        </td>
                    </tr>
                </tbody>
            </table>

            <table class="un-w-full un-whitespace-nowrap table table-bordered un-bg-gray-50">
                <tbody>
                    <tr>
                        <td colspan="2" class="!un-font-semibold !un-text-lg">Rumah Non Dinas</td>
                    </tr>
                    <tr>
                        <td>Rumah Pribadi</td>
                        <td class="!un-bg-white">
                            <input type="number" class="un-border-none un-bg-transparent un-outline-none un-w-full"
                                name="rumah_non_dinas_pribadi" value="{{ old('rumah_non_dinas_pribadi') }}"
                                placeholder="0">
                        </td>
                    </tr>
                    <tr>
                        <td>Rumah Orang Tua</td>
                        <td class="!un-bg-white">
                            <input type="number" class="un-border-none un-bg-transparent un-outline-none un-w-full"
                                name="rumah_non_dinas_orang_tua" value="{{ old('rumah_non_dinas_orang_tua') }}"
                                placeholder="0">
                        </td>
                    </tr>
                    <tr>
                        <td>Rumah Sewa/Kost/Kontrak</td>
                        <td class="!un-bg-white">
                            <input type="number" class="un-border-none un-bg-transparent un-outline-none un-w-full"
                                name="rumah_non_dinas_sewa" value="{{ old('rumah_non_dinas_sewa') }}" placeholder="0">
                        </td>
                    </tr>
                </tbody>
            </table>

            <table class="un-w-full un-whitespace-nowrap table table-bordered un-bg-gray-50">
                <tbody>
                    <tr>
                        <td class="!un-font-semibold !un-text-lg">Keterangan</td>
                    </tr>
                    <tr class="!un-bg-white">
                        <td>
                            <textarea name="keterangan" rows="3"
                                class="un-border-none un-bg-transparent un-outline-none un-w-full un-resize-none" placeholder="Masukkan Keterangan">{{ old('keterangan') }}</textarea>
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
