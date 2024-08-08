@extends('c-app', [
    'title' => 'Tanah Satker Mabes',
])

@section('content')
    <x-card>
        <div class="un-flex un-items-center un-justify-between">
            <div class="un-text-xl un-font-semibold">Tanah Satker Mabes</div>
            <a class="btn btn-primary" href="{{ url('/tanah-satker-mabes/create') }}">Tambah</a>
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
                        <th class="un-text-center un-align-middle" rowspan="3" colspan="2">No</th>
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
                            <th colspan="{{ $i == 1 ? 2 : 1 }}" class="un-text-center">{{ $i }}</th>
                        @endfor
                    </tr>
                    <tr>
                        <th colspan="19"></th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $keys = 'abcdefghijklmnopqrstuvwxyz';
                        $totalSudahSertifikatJumlahLuas = 0;
                        $totalSudahSertifikatJumlahPersil = 0;
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
                    @forelse ($tanah_satker_mabes as $index => $item)
                        <tr class="un-bg-gray-50">
                            <td>{{ $index + 1 }}</td>
                            <td></td>
                            <td>{{ strtoupper($item->nama) }}</td>
                            <td>{{ $item->sudah_sertifikat_jumlah_luas }}</td>
                            <td>{{ $item->sudah_sertifikat_jumlah_persil }}</td>
                            <td>{{ $item->hibah_luas }}</td>
                            <td>{{ $item->hibah_persil }}</td>
                            <td>{{ $item->swadaya_luas }}</td>
                            <td>{{ $item->swadaya_persil }}</td>
                            <td>{{ $item->sengketa_luas }}</td>
                            <td>{{ $item->sengketa_persil }}</td>
                            <td>{{ $item->belum_sertifikat_jumlah_luas }}</td>
                            <td>{{ $item->belum_sertifikat_jumlah_persil }}</td>
                            <td>{{ $item->pinjam_pakai_luas }}</td>
                            <td>{{ $item->pinjam_pakai_persil }}</td>
                            <td>{{ $item->total_luas }}</td>
                            <td>{{ $item->total_persil }}</td>
                            <td>{{ $item->keterangan }}</td>
                            <td>
                                <div class="un-space-x-3 un-flex un-justify-center">
                                    <a href="{{ url('/tanah-satker-mabes/' . $item->id . '/sub') }}"
                                        class="un-inline-block text-success">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="icon-size">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 10.5v6m3-3H9m4.06-7.19-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z" />
                                        </svg>

                                    </a>
                                    <a href="{{ url('/tanah-satker-mabes/' . $item->id) }}" class="un-inline-block">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="icon-size">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                        </svg>
                                    </a>
                                    <a href="javascript:void(0);" class="text-danger" data-bs-toggle="modal"
                                        data-bs-target="#modal-hapus-tanah-satker-mabes"
                                        onclick="{
                                $('#hapus-tanah-satker-mabes').attr('action', '{{ url('/tanah-satker-mabes/' . $item->id) }}');
                                }">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="icon-size">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                        </svg>

                                    </a>
                                </div>
                            </td>
                        </tr>

                        @php
                            $totalSudahSertifikatJumlahLuas += $item->sudah_sertifikat_jumlah_luas;
                            $totalSudahSertifikatJumlahPersil += $item->sudah_sertifikat_jumlah_persil;
                            $totalHibahLuas += $item->hibah_luas;
                            $totalHibahPersil += $item->hibah_persil;
                            $totalSwadayaLuas += $item->swadaya_luas;
                            $totalSwadayaPersil += $item->swadaya_persil;
                            $totalSengketaLuas += $item->sengketa_luas;
                            $totalSengketaPersil += $item->sengketa_persil;
                            $totalBelumSertifikatJumlahLuas += $item->belum_serfikat_jumlah_luas;
                            $totalBelumSertifikatJumlahPersil += $item->belum_serfikat_jumlah_persil;
                            $totalPinjamPakaiLuas += $item->pinjam_pakai_luas;
                            $totalPinjamPakaiPersil += $item->pinjam_pakai_persil;
                            $totalTotalLuas += $item->total_luas;
                            $totalTotalPersil += $item->total_persil;
                        @endphp

                        @foreach ($item->sub as $j_index => $sub_item)
                            <tr>
                                <td></td>
                                <td>{{ $keys[$j_index] }}.</td>
                                <td>{{ strtoupper($sub_item->nama) }}</td>
                                <td>{{ $sub_item->sudah_sertifikat_jumlah_luas }}</td>
                                <td>{{ $sub_item->sudah_sertifikat_jumlah_persil }}</td>
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
                                        <a href="{{ url('/tanah-satker-mabes/' . $sub_item->id) }}"
                                            class="un-inline-block">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="icon-size">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                            </svg>
                                        </a>

                                        <a href="javascript:void(0);" class="text-danger" data-bs-toggle="modal"
                                            data-bs-target="#modal-hapus-tanah-satker-mabes"
                                            onclick="{
                                $('#hapus-tanah-satker-mabes').attr('action', '{{ url('/tanah-satker-mabes/' . $sub_item->id) }}');
                                }">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="icon-size">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                            </svg>

                                        </a>
                                    </div>
                                </td>
                            </tr>

                            @php
                                $totalSudahSertifikatJumlahLuas += $sub_item->sudah_sertifikat_jumlah_luas;
                                $totalSudahSertifikatJumlahPersil += $sub_item->sudah_sertifikat_jumlah_persil;
                                $totalHibahLuas += $sub_item->hibah_luas;
                                $totalHibahPersil += $sub_item->hibah_persil;
                                $totalSwadayaLuas += $sub_item->swadaya_luas;
                                $totalSwadayaPersil += $sub_item->swadaya_persil;
                                $totalSengketaLuas += $sub_item->sengketa_luas;
                                $totalSengketaPersil += $sub_item->sengketa_persil;
                                $totalBelumSertifikatJumlahLuas += $sub_item->belum_serfikat_jumlah_luas;
                                $totalBelumSertifikatJumlahPersil += $sub_item->belum_serfikat_jumlah_persil;
                                $totalPinjamPakaiLuas += $sub_item->pinjam_pakai_luas;
                                $totalPinjamPakaiPersil += $sub_item->pinjam_pakai_persil;
                                $totalTotalLuas += $sub_item->total_luas;
                                $totalTotalPersil += $sub_item->total_persil;
                            @endphp
                        @endforeach
                        <tr>
                            <td colspan="19" class="text-center"></td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="19" class="text-center">Data tidak tersedia</td>
                        </tr>
                    @endforelse
                    <tr class="un-bg-gray-50">
                        <td colspan="3" class="text-center un-font-semibold">TOTAL</td>
                        <td>{{ $totalSudahSertifikatJumlahLuas }}</td>
                        <td>{{ $totalSudahSertifikatJumlahPersil }}</td>
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

    <form action="{{ url('/tanah-satker-mabes') }}" method="POST" id="hapus-tanah-satker-mabes">
        @method('DELETE')
        @csrf
        <x-modal id="modal-hapus-tanah-satker-mabes" title="Edit Kesatuan">
            <p>Anda yakin menghapus sub tanah polda terpilih?</p>

            <x-slot:footer>
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-danger">Hapus</button>
            </x-slot:footer>
        </x-modal>
    </form>
@endsection
