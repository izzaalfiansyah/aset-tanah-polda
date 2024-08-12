@extends('c-app', [
    'title' => 'Tambah Pembangunan Rumdin',
    'showTitle' => true,
])

@section('content')
    <x-card title="Tambah Pembangunan Rumdin">
        <form action="{{ url('/pembangunan-rumdin') }}" method="POST">
            @csrf

            <table class="un-w-full un-whitespace-nowrap table table-bordered un-bg-gray-50">
                <tbody>
                    {{-- nama --}}
                    <tr>
                        <td colspan="2" class="!un-font-semibold !un-text-lg">Kesatuan</td>
                    </tr>
                    @if ($parent)
                        @if ($parent_parent)
                            @if ($parent_parent_parent)
                                <tr>
                                    <td>Nama Kesatuan</td>
                                    <td>
                                        {{ $parent_parent_parent->nama }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Nama Sub Kesatuan</td>
                                    <td>
                                        {{ $parent_parent->nama }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Nama Sub-Sub Kesatuan</td>
                                    <td>
                                        {{ $parent->nama }}
                                        <input type="text" style="display: none" name="parent_id"
                                            value="{{ $parent->id }}">
                                    </td>
                                </tr>
                                {{-- <tr>
                                    <td>Nama Cabang Sub-Sub Kesatuan</td>
                                    <td class="!un-bg-white">
                                        <input type="text"
                                            class="un-border-none un-bg-transparent un-outline-none un-w-full"
                                            name="nama" value="{{ old('nama') }}"
                                            placeholder="Masukkan Nama Cabang Sub-Sub Kesatuan">
                                    </td>
                                </tr> --}}
                            @else
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
                                        <input type="text" style="display: none" name="parent_id"
                                            value="{{ $parent->id }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Nama Sub-Sub Kesatuan</td>
                                    <td class="!un-bg-white">
                                        <input type="text"
                                            class="un-border-none un-bg-transparent un-outline-none un-w-full"
                                            name="nama" value="{{ old('nama') }}"
                                            placeholder="Masukkan Nama Sub-Sub Kesatuan">
                                    </td>
                                </tr>
                            @endif
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
                                        name="nama" value="{{ old('nama') }}"
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
                </tbody>
            </table>

            <table class="un-w-full un-whitespace-nowrap table table-bordered un-bg-gray-50">
                <tbody>
                    <tr>
                        <td colspan="2" class="!un-font-semibold !un-text-lg">Bangunan</td>
                    </tr>
                    <tr>
                        <td class="align-middle">Jenis Bangunan</td>
                        <td class="!un-bg-white">
                            <input type="text" class="un-border-none un-bg-transparent un-outline-none un-w-full"
                                name="jenis_bangunan" value="{{ old('jenis_bangunan') }}" placeholder="-">
                        </td>
                    </tr>
                    <tr>
                        <td class="align-middle">Type</td>
                        <td class="!un-bg-white">
                            <input type="number" class="un-border-none un-bg-transparent un-outline-none un-w-full"
                                name="tipe" value="{{ old('tipe') }}" placeholder="0">
                        </td>
                    </tr>
                    <tr>
                        <td class="align-middle">Jumlah (Unit)</td>
                        <td class="!un-bg-white">
                            <input type="number" class="un-border-none un-bg-transparent un-outline-none un-w-full"
                                name="jumlah" value="{{ old('jumlah') }}" placeholder="0">
                        </td>
                    </tr>
                    <tr>
                        <td class="align-middle">Sumber GAR</td>
                        <td class="!un-bg-white">
                            <input type="text" class="un-border-none un-bg-transparent un-outline-none un-w-full"
                                name="sumber_gar" value="{{ old('sumber_gar') }}" placeholder="-">
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
