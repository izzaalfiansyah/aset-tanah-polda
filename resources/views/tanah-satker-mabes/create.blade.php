@extends('c-app', [
    'title' => 'Tambah Tanah Satker Mabes',
    'showTitle' => true,
])

@section('content')
    <x-card title="Tambah Tanah Satker Mabes">
        <form action="{{ url('/tanah-satker-mabes') }}" method="POST">
            @csrf

            <table class="un-w-full un-whitespace-nowrap table table-bordered un-bg-gray-50">
                <tbody>
                    {{-- nama --}}
                    <tr>
                        <td colspan="3" class="!un-font-semibold !un-text-lg">Kesatuan</td>
                    </tr>
                    @if ($tanah_satker_mabes)
                        <tr>
                            <td colspan="2">Nama Kesatuan</td>
                            <td>
                                {{ $tanah_satker_mabes->nama }}
                                <input type="text" style="display: none" name="parent_id"
                                    value="{{ $tanah_satker_mabes->id }}">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">Nama Sub Kesatuan</td>
                            <td class="!un-bg-white">
                                <input type="text" class="un-border-none un-bg-transparent un-outline-none un-w-full"
                                    required name="nama" value="{{ old('nama') }}"
                                    placeholder="Masukkan Nama Sub Kesatuan">
                            </td>
                        </tr>
                    @else
                        <tr>
                            <td colspan="2">Nama Kesatuan</td>
                            <td class="!un-bg-white">
                                <input type="text" class="un-border-none un-bg-transparent un-outline-none un-w-full"
                                    required name="nama" value="{{ old('nama') }}"
                                    placeholder="Masukkan Nama Kesatuan">
                            </td>
                        </tr>
                    @endif

                    {{-- sudah sertifikat --}}
                    <tr>
                        <td colspan="3" class="!un-font-semibold !un-text-lg">Sudah Sertifikat</td>
                    </tr>
                    <tr>
                        <td rowspan="2" class="align-middle">Jumlah</td>
                        <td>Luas (M<sup>2</sup>)</td>
                        <td class="!un-bg-white">
                            <input type="number" class="un-border-none un-bg-transparent un-outline-none un-w-full"
                                name="sudah_sertifikat_jumlah_luas" value="{{ old('sudah_sertifikat_jumlah_luas') }}"
                                placeholder="0">
                        </td>
                    </tr>
                    <tr>
                        <td>Persil (Unit)</td>
                        <td class="!un-bg-white">
                            <input type="number" class="un-border-none un-bg-transparent un-outline-none un-w-full"
                                name="sudah_sertifikat_jumlah_persil" value="{{ old('sudah_sertifikat_jumlah_persil') }}"
                                placeholder="0">
                        </td>
                    </tr>

                    {{-- belum sertifikat --}}
                    <tr>
                        <td colspan="3" class="!un-font-semibold !un-text-lg">Belum Sertifikat</td>
                    </tr>
                    <tr>
                        <td rowspan="2" class="align-middle">Hibah</td>
                        <td>Luas (M<sup>2</sup>)</td>
                        <td class="!un-bg-white">
                            <input type="number" class="un-border-none un-bg-transparent un-outline-none un-w-full"
                                name="hibah_luas" value="{{ old('hibah_luas') }}" placeholder="0">
                        </td>
                    </tr>
                    <tr>
                        <td>Persil (Unit)</td>
                        <td class="!un-bg-white">
                            <input type="number" class="un-border-none un-bg-transparent un-outline-none un-w-full"
                                name="hibah_persil" value="{{ old('hibah_persil') }}" placeholder="0">
                        </td>
                    </tr>
                    <tr>
                        <td rowspan="2" class="align-middle">Swadaya/Beli</td>
                        <td>Luas (M<sup>2</sup>)</td>
                        <td class="!un-bg-white">
                            <input type="number" class="un-border-none un-bg-transparent un-outline-none un-w-full"
                                name="swadaya_luas" value="{{ old('swadaya_luas') }}" placeholder="0">
                        </td>
                    </tr>
                    <tr>
                        <td>Persil (Unit)</td>
                        <td class="!un-bg-white">
                            <input type="number" class="un-border-none un-bg-transparent un-outline-none un-w-full"
                                name="swadaya_persil" value="{{ old('swadaya_persil') }}" placeholder="0">
                        </td>
                    </tr>
                    <tr>
                        <td rowspan="2" class="align-middle">Sengketa/Kuasa</td>
                        <td>Luas (M<sup>2</sup>)</td>
                        <td class="!un-bg-white">
                            <input type="number" class="un-border-none un-bg-transparent un-outline-none un-w-full"
                                name="sengketa_luas" value="{{ old('sengketa_luas') }}" placeholder="0">
                        </td>
                    </tr>
                    <tr>
                        <td>Persil (Unit)</td>
                        <td class="!un-bg-white">
                            <input type="number" class="un-border-none un-bg-transparent un-outline-none un-w-full"
                                name="sengketa_persil" value="{{ old('sengketa_persil') }}" placeholder="0">
                        </td>
                    </tr>

                    {{-- Pinjam Pakai --}}
                    <tr>
                        <td colspan="3" class="!un-font-semibold !un-text-lg">Pinjam Pakai</td>
                    </tr>
                    <tr>
                        <td colspan="2">Luas (M<sup>2</sup>)</td>
                        <td class="!un-bg-white">
                            <input type="number" class="un-border-none un-bg-transparent un-outline-none un-w-full"
                                name="pinjam_pakai_luas" value="{{ old('pinjam_pakai_luas') }}" placeholder="0">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">Persil (Unit)</td>
                        <td class="!un-bg-white">
                            <input type="number" class="un-border-none un-bg-transparent un-outline-none un-w-full"
                                name="pinjam_pakai_persil" value="{{ old('pinjam_pakai_persil') }}" placeholder="0">
                        </td>
                    </tr>

                    {{-- keterangan --}}
                    <tr>
                        <td colspan="3" class="!un-font-semibold !un-text-lg">Keterangan</td>
                    </tr>
                    <tr>
                        <td colspan="3" class="!un-bg-white">
                            <textarea class="un-border-none un-bg-transparent un-outline-none un-w-full un-resize-none" rows="3"
                                name="keterangan" placeholder="Masukkan Keterangan">{{ old('keterangan') }}</textarea>
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
