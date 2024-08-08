@extends('c-app', [
    'title' => 'Tanah Polda',
])

@section('content')
    <x-card>
        <div class="un-flex un-items-center un-justify-between">
            <div class="un-text-xl un-font-semibold">Tanah Polda</div>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-tambah-tanah-polda">Tambah</button>
        </div>
    </x-card>

    <div class="mb-5"></div>

    @if (count($errors->all()) > 0)
        <x-card>
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="text-danger">{{ $error }}</li>
                @endforeach
            </ul>
        </x-card>
    @endif

    <div class="mb-5"></div>

    <x-card>
        <div class="un-overflow-x-auto">
            <table class="table table-bordered un-whitespace-nowrap">
                <thead>
                    <tr class="un-bg-gray-50">
                        <th class="un-text-center un-align-middle" colspan="2" rowspan="3">No</th>
                        <th class="un-text-center un-align-middle" rowspan="3">Kesatuan</th>
                        <th class="un-text-center un-align-middle" colspan="2">Sudah Sertifikat</th>
                        <th class="un-text-center un-align-middle" colspan="6">Belum Sertifikat</th>
                        <th class="un-text-center un-align-middle" colspan="2" rowspan="2">Jumlah Belum Sertifikat
                        </th>
                        <th class="un-text-center un-align-middle" colspan="2" rowspan="2">Pinjam Pakai</th>
                        <th class="un-text-center un-align-middle" colspan="2" rowspan="2">Total</th>
                        <th class="un-text-center un-align-middle" rowspan="3">Keterangan</th>
                        <th class="un-text-center un-align-middle" rowspan="3">Opsi</th>
                    </tr>
                    <tr class="un-bg-gray-50">
                        <th class="un-text-center un-align-middle" colspan="2">Jumlah</th>
                        <th class="un-text-center un-align-middle" colspan="2">Hibah</th>
                        <th class="un-text-center un-align-middle" colspan="2">Swadaya/Beli</th>
                        <th class="un-text-center un-align-middle" colspan="2">Sengketa/Kuasa</th>
                    </tr>
                    <tr class="un-bg-gray-50">
                        <th class="un-text-center">Luas (M<sup>2</sup>)</th>
                        <th class="un-text-center">Persil (Unit)</th>
                        <th class="un-text-center">Luas (M<sup>2</sup>)</th>
                        <th class="un-text-center">Persil (Unit)</th>
                        <th class="un-text-center">Luas (M<sup>2</sup>)</th>
                        <th class="un-text-center">Persil (Unit)</th>
                        <th class="un-text-center">Luas (M<sup>2</sup>)</th>
                        <th class="un-text-center">Persil (Unit)</th>
                        <th class="un-text-center">Luas (M<sup>2</sup>)</th>
                        <th class="un-text-center">Persil (Unit)</th>
                        <th class="un-text-center">Luas (M<sup>2</sup>)</th>
                        <th class="un-text-center">Persil (Unit)</th>
                        <th class="un-text-center">Luas (M<sup>2</sup>)</th>
                        <th class="un-text-center">Persil (Unit)</th>
                    </tr>
                    <tr>
                        @for ($i = 1; $i <= 18; $i++)
                            <th colspan="{{ $i == 1 ? '2' : '1' }}" class="un-text-center">{{ $i }}</th>
                        @endfor
                    </tr>
                    <tr>
                        <th colspan="19"></th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $keys = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                        $totalJumlahLuas = 0;
                        $totalJumlahPersil = 0;
                        $totalHibahLuas = 0;
                        $totalHibahPersil = 0;
                        $totalSwadayaLuas = 0;
                        $totalSwadayaPersil = 0;
                        $totalSengketaLuas = 0;
                        $totalSengketaPersil = 0;
                        $totalBelumSertifikatJumlahLuas = 0;
                        $totalBelumSertifikatJumlahPersil = 0;
                        $totalPinjamPakaiLuas = 0;
                        $totalPinjamPakaiPersil = 0;
                        $totalTotalLuas = 0;
                        $totalTotalPersil = 0;
                    @endphp
                    @foreach ($tanah_polda as $index => $item)
                        <tr class="un-bg-gray-50 un-font-semibold">
                            <td>{{ $keys[$index] }}</td>
                            <td></td>
                            <td>{{ strtoupper($item->nama) }}</td>
                            <td colspan="15"></td>
                            <td>
                                <div class="un-space-x-3 un-flex un-justify-center">
                                    <a href="javascript:void(0);" data-bs-toggle="modal"
                                        data-bs-target="#modal-tambah-sub-tanah-polda" class="un-inline-block text-success"
                                        onclick="{
                                        $('#tambah-sub-tanah-polda-form [name=tanah_polda_id]').val('{{ $item->id }}');
                                        $('#tambah-sub-tanah-polda-form .tanah_polda').html('{{ $item->nama }}');
                                    }">Tambah
                                        Sub</a>
                                    <div class="un-font-normal">|</div>
                                    <a href="javascript:void(0);" data-bs-toggle="modal"
                                        data-bs-target="#modal-edit-tanah-polda" class="un-inline-block"
                                        onclick="{
                                        $('#edit-tanah-polda-form').attr('action', '{{ url('/tanah-polda/' . $item->id) }}');
                                        $('#edit-tanah-polda-form [name=nama]').val('{{ $item->nama }}');
                                    }">Edit</a>
                                    <div class="un-font-normal">|</div>
                                    <a href="javascript:void(0);" data-bs-toggle="modal"
                                        data-bs-target="#modal-hapus-tanah-polda" class="text-danger un-inline-block"
                                        onclick="{
                                        $('#hapus-tanah-polda-form').attr('action', '{{ url('/tanah-polda/' . $item->id) }}');
                                    }">Hapus</a>
                                </div>
                            </td>
                        </tr>
                        @php
                            $jumlahJumlahLuas = 0;
                            $jumlahJumlahPersil = 0;
                            $jumlahHibahLuas = 0;
                            $jumlahHibahPersil = 0;
                            $jumlahSwadayaLuas = 0;
                            $jumlahSwadayaPersil = 0;
                            $jumlahSengketaLuas = 0;
                            $jumlahSengketaPersil = 0;
                            $jumlahBelumSertifikatJumlahLuas = 0;
                            $jumlahBelumSertifikatJumlahPersil = 0;
                            $jumlahPinjamPakaiLuas = 0;
                            $jumlahPinjamPakaiPersil = 0;
                            $jumlahTotalLuas = 0;
                            $jumlahTotalPersil = 0;
                        @endphp
                        @foreach ($item->sub as $jndex => $sub_item)
                            <tr>
                                <td></td>
                                <td>{{ $jndex + 1 }}</td>
                                <td>{{ $sub_item->nama }}</td>
                                <td>{{ $sub_item->jumlah_luas }}</td>
                                <td>{{ $sub_item->jumlah_persil }}</td>
                                <td>{{ $sub_item->hibah_luas }}</td>
                                <td>{{ $sub_item->hibah_persil }}</td>
                                <td>{{ $sub_item->swadaya_luas }}</td>
                                <td>{{ $sub_item->swadaya_persil }}</td>
                                <td>{{ $sub_item->sengketa_luas }}</td>
                                <td>{{ $sub_item->sengketa_persil }}</td>
                                <td>{{ $sub_item->belum_sertifikat_jumlah_luas }}</td>
                                <td>{{ $sub_item->belum_sertifikat_jumlah_persil }}</td>
                                <td>{{ $sub_item->pinjam_pakai_luas }}</td>
                                <td>{{ $sub_item->pinjam_pakai_persil }}</td>
                                <td>{{ $sub_item->total_luas }}</td>
                                <td>{{ $sub_item->total_persil }}</td>
                                <td>{{ $sub_item->keterangan }}</td>
                                <td>
                                    <div class="un-space-x-3 un-flex un-justify-center">
                                        <a href="javascript:void(0);" data-bs-toggle="modal"
                                            data-bs-target="#modal-edit-sub-tanah-polda" class="un-inline-block"
                                            onclick="{
                                        $('#edit-sub-tanah-polda-form').attr('action', '{{ url('/tanah-polda/sub/' . $sub_item->id) }}');
                                        $('#edit-sub-tanah-polda-form [name=nama_sub]').val('{{ $sub_item->nama }}');
                                        $('#edit-sub-tanah-polda-form [name=tanah_polda_id]').val('{{ $sub_item->tanah_polda_id }}');
                                        $('#edit-sub-tanah-polda-form [name=jumlah_luas]').val('{{ $sub_item->jumlah_luas }}');
                                        $('#edit-sub-tanah-polda-form [name=jumlah_persil]').val('{{ $sub_item->jumlah_persil }}');
                                        $('#edit-sub-tanah-polda-form [name=hibah_luas]').val('{{ $sub_item->hibah_luas }}');
                                        $('#edit-sub-tanah-polda-form [name=hibah_persil]').val('{{ $sub_item->hibah_persil }}');
                                        $('#edit-sub-tanah-polda-form [name=sengketa_luas]').val('{{ $sub_item->sengketa_luas }}');
                                        $('#edit-sub-tanah-polda-form [name=sengketa_persil]').val('{{ $sub_item->sengketa_persil }}');
                                        $('#edit-sub-tanah-polda-form [name=swadaya_luas]').val('{{ $sub_item->swadaya_luas }}');
                                        $('#edit-sub-tanah-polda-form [name=swadaya_persil]').val('{{ $sub_item->swadaya_persil }}');
                                        $('#edit-sub-tanah-polda-form [name=pinjam_pakai_luas]').val('{{ $sub_item->pinjam_pakai_luas }}');
                                        $('#edit-sub-tanah-polda-form [name=pinjam_pakai_persil]').val('{{ $sub_item->pinjam_pakai_persil }}');
                                        $('#edit-sub-tanah-polda-form [name=keterangan]').val('{{ $sub_item->keterangan }}');
                                        }">Edit</a>
                                        <div>|</div>
                                        <a href="javascript:void(0);" class="text-danger" data-bs-toggle="modal"
                                            data-bs-target="#modal-hapus-sub-tanah-polda"
                                            onclick="{
                                        $('#hapus-sub-tanah-polda-form').attr('action', '{{ url('/tanah-polda/sub/' . $sub_item->id) }}');
                                        }">Hapus</a>
                                    </div>
                                </td>
                            </tr>
                            @php
                                $jumlahJumlahLuas += $sub_item->jumlah_luas;
                                $jumlahJumlahPersil += $sub_item->jumlah_persil;
                                $jumlahHibahLuas += $sub_item->hibah_luas;
                                $jumlahHibahPersil += $sub_item->hibah_persil;
                                $jumlahSwadayaLuas += $sub_item->swadaya_luas;
                                $jumlahSwadayaPersil += $sub_item->swadaya_persil;
                                $jumlahSengketaLuas += $sub_item->sengketa_luas;
                                $jumlahSengketaPersil += $sub_item->sengketa_persil;
                                $jumlahBelumSertifikatJumlahLuas += $sub_item->belum_serfikat_jumlah_luas;
                                $jumlahBelumSertifikatJumlahPersil += $sub_item->belum_serfikat_jumlah_persil;
                                $jumlahPinjamPakaiLuas += $sub_item->pinjam_pakai_luas;
                                $jumlahPinjamPakaiPersil += $sub_item->pinjam_pakai_persil;
                                $jumlahTotalLuas += $sub_item->total_luas;
                                $jumlahTotalPersil += $sub_item->total_persil;
                            @endphp
                        @endforeach
                        <tr class="un-bg-gray-50">
                            <td colspan="3" class="text-center un-font-semibold">JUMLAH</td>
                            <td>{{ $jumlahJumlahLuas }}</td>
                            <td>{{ $jumlahJumlahPersil }}</td>
                            <td>{{ $jumlahHibahLuas }}</td>
                            <td>{{ $jumlahHibahPersil }}</td>
                            <td>{{ $jumlahSwadayaLuas }}</td>
                            <td>{{ $jumlahSwadayaPersil }}</td>
                            <td>{{ $jumlahSengketaLuas }}</td>
                            <td>{{ $jumlahSengketaPersil }}</td>
                            <td>{{ $jumlahBelumSertifikatJumlahLuas }}</td>
                            <td>{{ $jumlahBelumSertifikatJumlahPersil }}</td>
                            <td>{{ $jumlahPinjamPakaiLuas }}</td>
                            <td>{{ $jumlahPinjamPakaiPersil }}</td>
                            <td>{{ $jumlahTotalLuas }}</td>
                            <td>{{ $jumlahTotalPersil }}</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="19" class="text-center"></td>
                        </tr>


                        @php
                            $totalJumlahLuas += $jumlahJumlahLuas;
                            $totalJumlahPersil += $jumlahJumlahPersil;
                            $totalHibahLuas += $jumlahHibahLuas;
                            $totalHibahPersil += $jumlahHibahPersil;
                            $totalSwadayaLuas += $jumlahSwadayaLuas;
                            $totalSwadayaPersil += $jumlahSwadayaPersil;
                            $totalSengketaLuas += $jumlahSengketaLuas;
                            $totalSengketaPersil += $jumlahSengketaPersil;
                            $totalBelumSertifikatJumlahLuas += $jumlahBelumSertifikatJumlahLuas;
                            $totalBelumSertifikatJumlahPersil += $jumlahBelumSertifikatJumlahPersil;
                            $totalPinjamPakaiLuas += $jumlahPinjamPakaiLuas;
                            $totalPinjamPakaiPersil += $jumlahPinjamPakaiPersil;
                            $totalTotalLuas += $jumlahTotalLuas;
                            $totalTotalPersil += $jumlahTotalPersil;
                        @endphp
                    @endforeach
                    <tr class="un-bg-gray-50">
                        <td colspan="3" class="text-center un-font-semibold">TOTAL</td>
                        <td>{{ $totalJumlahLuas }}</td>
                        <td>{{ $totalJumlahPersil }}</td>
                        <td>{{ $totalHibahLuas }}</td>
                        <td>{{ $totalHibahPersil }}</td>
                        <td>{{ $totalSwadayaLuas }}</td>
                        <td>{{ $totalSwadayaPersil }}</td>
                        <td>{{ $totalSengketaLuas }}</td>
                        <td>{{ $totalSengketaPersil }}</td>
                        <td>{{ $totalBelumSertifikatJumlahLuas }}</td>
                        <td>{{ $totalBelumSertifikatJumlahPersil }}</td>
                        <td>{{ $totalPinjamPakaiLuas }}</td>
                        <td>{{ $totalPinjamPakaiPersil }}</td>
                        <td>{{ $totalTotalLuas }}</td>
                        <td>{{ $totalTotalPersil }}</td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </x-card>

    {{-- <x-accordion id="accordion-1">
        @foreach ($tanah_polda as $item)
            <x-accordion-item id="accordion-1-item-{{ $item->id }}" parent-id="accordion-1" :title="$item->nama" show>
                <div class="un-flex un-items-center un-justify-between">
                    <div>{{ $item->nama }}</div>
                    <div>
                        <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                            data-bs-target="#modal-edit-tanah-polda"
                            onclick="{
                            $('#edit-tanah-polda-form').attr('action', '{{ url('/tanah-polda/' . $item->id) }}');
                            $('#edit-tanah-polda-form [name=nama]').val('{{ $item->nama }}');
                        }">
                            <i class="ki-duotone ki-
                        pencil                        ">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                        </button>
                        <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                            data-bs-target="#modal-hapus-tanah-polda"
                            onclick="{
                            $('#hapus-tanah-polda-form').attr('action', '{{ url('/tanah-polda/' . $item->id) }}');
                        }">
                            <i class="ki-duotone ki-
                        trash                        ">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                                <span class="path4"></span>
                                <span class="path5"></span>
                            </i>
                        </button>
                    </div>
                </div>

                <div class="mb-5"></div>

                <div class="un-overflow-x-auto">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th colspan="2" rowspan="3">No</th>
                                <th rowspan="3">Kesatuan</th>
                                <th colspan="2">Sudah Sertifikat</th>
                                <th colspan="6">Belum Sertifikat</th>
                                <th colspan="2" rowspan="2">Jumlah Belum Sertifikat</th>
                                <th colspan="2" rowspan="2">Pinjam Pakai</th>
                                <th colspan="2" rowspan="2">Total</th>
                                <th rowspan="3">Keterangan</th>
                            </tr>
                            <tr>
                                <th colspan="2">Jumlah</th>
                                <th colspan="2">Hibah</th>
                                <th colspan="2">Swadaya/Beli</th>
                                <th colspan="2">Sengketa/Kuasa</th>
                            </tr>
                            <tr>
                                <th>Luas (M<sup>2</sup>)</th>
                                <th>Persil (Unit)</th>
                                <th>Luas (M<sup>2</sup>)</th>
                                <th>Persil (Unit)</th>
                                <th>Luas (M<sup>2</sup>)</th>
                                <th>Persil (Unit)</th>
                                <th>Luas (M<sup>2</sup>)</th>
                                <th>Persil (Unit)</th>
                                <th>Luas (M<sup>2</sup>)</th>
                                <th>Persil (Unit)</th>
                                <th>Luas (M<sup>2</sup>)</th>
                                <th>Persil (Unit)</th>
                                <th>Luas (M<sup>2</sup>)</th>
                                <th>Persil (Unit)</th>
                            </tr>
                            <tr>
                                @for ($i = 1; $i <= 17; $i++)
                                    <th colspan="{{ $i == 1 ? '2' : '1' }}">{{ $i }}</th>
                                @endfor
                            </tr>
                        </thead>
                    </table>
                </div>
            </x-accordion-item>
        @endforeach
    </x-accordion> --}}

    <form action="{{ url('/tanah-polda') }}" method="POST">
        @csrf
        <x-modal id="modal-tambah-tanah-polda" title="Tambah Kesatuan">
            <x-form-group label="Nama Kesatuan" required name="nama">
                <input type="text" class="form-control @error('nama') is-invalid @enderror" required
                    placeholder="Masukkan Nama Kesatuan" value="{{ old('nama') }}" name="nama">
            </x-form-group>

            <x-slot:footer>
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </x-slot:footer>
        </x-modal>
    </form>

    <form action="{{ url('/tanah-polda') }}" method="POST" id="edit-tanah-polda-form">
        @method('PUT')
        @csrf
        <x-modal id="modal-edit-tanah-polda" title="Edit Kesatuan">
            <x-form-group label="Nama Kesatuan" required name="nama">
                <input type="text" class="form-control @error('nama') is-invalid @enderror" required
                    placeholder="Masukkan Nama Kesatuan" value="{{ old('nama') }}" name="nama">
            </x-form-group>

            <x-slot:footer>
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </x-slot:footer>
        </x-modal>
    </form>

    <form action="{{ url('/tanah-polda') }}" method="POST" id="hapus-tanah-polda-form">
        @method('DELETE')
        @csrf
        <x-modal id="modal-hapus-tanah-polda" title="Edit Kesatuan">
            <p>Anda yakin menghapus tanah polda terpilih?</p>

            <x-slot:footer>
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-danger">Hapus</button>
            </x-slot:footer>
        </x-modal>
    </form>

    <form action="{{ url('/tanah-polda/sub') }}" method="POST" id="tambah-sub-tanah-polda-form">
        @csrf
        <x-modal id="modal-tambah-sub-tanah-polda" title="Tambah Sub Kesatuan" size="xl">
            <input type="text" style="display: none" name="tanah_polda_id">
            <table class="un-w-full un-whitespace-nowrap table table-bordered un-bg-gray-50">
                <tbody>
                    {{-- nama --}}
                    <tr>
                        <td colspan="3" class="!un-font-semibold !un-text-lg">Kesatuan <span
                                class="tanah_polda"></span></td>
                    </tr>
                    <tr>
                        <td colspan="2">Nama Sub Kesatuan</td>
                        <td class="!un-bg-white">
                            <input type="text" class="un-border-none un-bg-transparent un-outline-none un-w-full"
                                required name="nama_sub" value="{{ old('nama_sub') }}"
                                placeholder="Masukkan Nama Sub Kesatuan">
                        </td>
                    </tr>

                    {{-- sudah sertifikat --}}
                    <tr>
                        <td colspan="3" class="!un-font-semibold !un-text-lg">Sudah Sertifikat</td>
                    </tr>
                    <tr>
                        <td rowspan="2" class="align-middle">Jumlah</td>
                        <td>Luas (M<sup>2</sup>)</td>
                        <td class="!un-bg-white">
                            <input type="number" class="un-border-none un-bg-transparent un-outline-none un-w-full"
                                name="jumlah_luas" value="{{ old('jumlah_luas') }}" placeholder="0">
                        </td>
                    </tr>
                    <tr>
                        <td>Persil (Unit)</td>
                        <td class="!un-bg-white">
                            <input type="number" class="un-border-none un-bg-transparent un-outline-none un-w-full"
                                name="jumlah_persil" value="{{ old('jumlah_persil') }}" placeholder="0">
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

            <div class="mt-5">

            </div>

            <x-slot:footer>
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </x-slot:footer>
        </x-modal>
    </form>

    <form action="{{ url('/tanah-polda/sub') }}" method="POST" id="edit-sub-tanah-polda-form">
        @method('PUT')
        @csrf
        <x-modal id="modal-edit-sub-tanah-polda" title="Edit Sub Kesatuan" size="xl">
            <input type="text" style="display: none" name="tanah_polda_id">
            <table class="un-w-full un-whitespace-nowrap table table-bordered un-bg-gray-50">
                <tbody>
                    {{-- nama --}}
                    <tr>
                        <td colspan="3" class="!un-font-semibold !un-text-lg">Kesatuan <span
                                class="tanah_polda"></span></td>
                    </tr>
                    <tr>
                        <td colspan="2">Nama Sub Kesatuan</td>
                        <td class="!un-bg-white">
                            <input type="text" class="un-border-none un-bg-transparent un-outline-none un-w-full"
                                required name="nama_sub" value="{{ old('nama_sub') }}"
                                placeholder="Masukkan Nama Sub Kesatuan">
                        </td>
                    </tr>

                    {{-- sudah sertifikat --}}
                    <tr>
                        <td colspan="3" class="!un-font-semibold !un-text-lg">Sudah Sertifikat</td>
                    </tr>
                    <tr>
                        <td rowspan="2" class="align-middle">Jumlah</td>
                        <td>Luas (M<sup>2</sup>)</td>
                        <td class="!un-bg-white">
                            <input type="number" class="un-border-none un-bg-transparent un-outline-none un-w-full"
                                name="jumlah_luas" value="{{ old('jumlah_luas') }}" placeholder="0">
                        </td>
                    </tr>
                    <tr>
                        <td>Persil (Unit)</td>
                        <td class="!un-bg-white">
                            <input type="number" class="un-border-none un-bg-transparent un-outline-none un-w-full"
                                name="jumlah_persil" value="{{ old('jumlah_persil') }}" placeholder="0">
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

            <div class="mt-5">

            </div>

            <x-slot:footer>
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </x-slot:footer>
        </x-modal>
    </form>

    <form action="{{ url('/tanah-polda/sub') }}" method="POST" id="hapus-sub-tanah-polda-form">
        @method('DELETE')
        @csrf
        <x-modal id="modal-hapus-sub-tanah-polda" title="Edit Kesatuan">
            <p>Anda yakin menghapus sub tanah polda terpilih?</p>

            <x-slot:footer>
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-danger">Hapus</button>
            </x-slot:footer>
        </x-modal>
    </form>
@endsection
