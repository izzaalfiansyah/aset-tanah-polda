@extends('c-app', [
    'title' => 'Rumdin Golongan',
])

@section('content')
    <x-card>
        <div class="un-flex un-items-center un-justify-between">
            <div class="un-text-xl un-font-semibold">Rumdin Golongan</div>
            <a class="btn btn-primary" href="{{ url('/rumdin-golongan/create') }}">Tambah</a>
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
                        <th class="un-text-center un-align-middle" rowspan="5" colspan="2">No</th>
                        <th class="un-text-center un-align-middle" rowspan="5">Nama Satker</th>
                        <th class="un-text-center un-align-middle" rowspan="5">Jumlah Personel</th>
                        <th class="un-text-center un-align-middle" colspan="5">Rumah Dinas</th>
                        <th class="un-text-center un-align-middle" colspan="3">Rumah Non Dinas</th>
                        <th class="un-text-center un-align-middle" rowspan="5">Ket</th>
                        <th class="un-text-center un-align-middle" rowspan="5">Opsi</th>
                    </tr>
                    <tr class="un-bg-gray-50">
                        <th class="un-text-center un-align-middle" rowspan="4">Jumlah (Unit)</th>
                        <th class="un-text-center un-align-middle" rowspan="4">Kapasitas (KK)</th>
                        <th class="un-text-center un-align-middle" colspan="3">Penghuni</th>
                        <th class="un-text-center un-align-middle" rowspan="4">Rumah Pribadi</th>
                        <th class="un-text-center un-align-middle" rowspan="4">Rumah Orang Tua</th>
                        <th class="un-text-center un-align-middle" rowspan="4">Sewa/Kost/Kontrak</th>
                    </tr>
                    <tr class="un-bg-gray-50">
                        <th class="un-text-center un-align-middle" colspan="2">Polri/ASN</th>
                        <th class="un-text-center un-align-middle" rowspan="2">Non Polri</th>
                    </tr>
                    <tr class="un-bg-gray-50">
                        <th class="un-text-center un-align-middle">Aktif</th>
                        <th class="un-text-center un-align-middle">Purnawrwn</th>
                    </tr>
                    <tr class="un-bg-gray-50">
                        <th class="un-text-center un-align-middle">(KK)</th>
                        <th class="un-text-center un-align-middle">(KK)</th>
                        <th class="un-text-center un-align-middle">(KK)</th>
                    </tr>
                    <tr>
                        @for ($i = 1; $i <= 13; $i++)
                            <th colspan="{{ $i == 1 ? 2 : 1 }}" class="un-text-center">{{ $i }}</th>
                        @endfor
                    </tr>
                    <tr>
                        <th colspan="14"></th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $keys = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                        $total_jumlah_personel = 0;
                        $total_rumah_dinas_jumlah = 0;
                        $total_rumah_dinas_kapasitas = 0;
                        $total_rumah_dinas_polri_aktif = 0;
                        $total_rumah_dinas_polri_purna = 0;
                        $total_rumah_dinas_non_polri = 0;
                        $total_rumah_non_dinas_pribadi = 0;
                        $total_rumah_non_dinas_orang_tua = 0;
                        $total_rumah_non_dinas_sewa = 0;
                    @endphp
                    @forelse ($rumdin_golongan as $key => $item)
                        <tr>
                            <td>{{ $keys[$key] }}</td>
                            <td></td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->jumlah_personel }}</td>
                            <td>{{ $item->rumah_dinas_jumlah }}</td>
                            <td>{{ $item->rumah_dinas_kapasitas }}</td>
                            <td>{{ $item->rumah_dinas_polri_aktif }}</td>
                            <td>{{ $item->rumah_dinas_polri_purna }}</td>
                            <td>{{ $item->rumah_dinas_non_polri }}</td>
                            <td>{{ $item->rumah_non_dinas_pribadi }}</td>
                            <td>{{ $item->rumah_non_dinas_orang_tua }}</td>
                            <td>{{ $item->rumah_non_dinas_sewa }}</td>
                            <td>{{ $item->keterangan }}</td>
                            <td>

                                <div class="un-space-x-3 un-flex un-justify-center">
                                    <a href="{{ url('/rumdin-golongan/' . $item->id . '/sub') }}"
                                        class="un-inline-block text-success">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="icon-size">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 10.5v6m3-3H9m4.06-7.19-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z" />
                                        </svg>

                                    </a>
                                    <a href="{{ url('/rumdin-golongan/' . $item->id) }}" class="un-inline-block">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="icon-size">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                        </svg>
                                    </a>
                                    <a href="javascript:void(0);" class="text-danger" data-bs-toggle="modal"
                                        data-bs-target="#modal-hapus-rumdin-golongan"
                                        onclick="{
                                $('#hapus-rumdin-golongan-form').attr('action', '{{ url('/rumdin-golongan/' . $item->id) }}');
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
                            $total_jumlah_personel += $item->jumlah_personel;
                            $total_rumah_dinas_jumlah += $item->rumah_dinas_jumlah;
                            $total_rumah_dinas_kapasitas += $item->rumah_dinas_kapasitas;
                            $total_rumah_dinas_polri_aktif += $item->rumah_dinas_polri_aktif;
                            $total_rumah_dinas_polri_purna += $item->rumah_dinas_polri_purna;
                            $total_rumah_dinas_non_polri += $item->rumah_dinas_non_polri;
                            $total_rumah_non_dinas_pribadi += $item->rumah_non_dinas_pribadi;
                            $total_rumah_non_dinas_orang_tua += $item->rumah_non_dinas_orang_tua;
                            $total_rumah_non_dinas_sewa += $item->rumah_non_dinas_sewa;
                        @endphp
                        @foreach ($item->sub as $sindex => $sitem)
                            <tr>
                                <td></td>
                                <td>{{ $sindex + 1 }}</td>
                                <td>{{ $sitem->nama }}</td>
                                <td>{{ $sitem->jumlah_personel }}</td>
                                <td>{{ $sitem->rumah_dinas_jumlah }}</td>
                                <td>{{ $sitem->rumah_dinas_kapasitas }}</td>
                                <td>{{ $sitem->rumah_dinas_polri_aktif }}</td>
                                <td>{{ $sitem->rumah_dinas_polri_purna }}</td>
                                <td>{{ $sitem->rumah_dinas_non_polri }}</td>
                                <td>{{ $sitem->rumah_non_dinas_pribadi }}</td>
                                <td>{{ $sitem->rumah_non_dinas_orang_tua }}</td>
                                <td>{{ $sitem->rumah_non_dinas_sewa }}</td>
                                <td>{{ $sitem->keterangan }}</td>
                                <td>

                                    <div class="un-space-x-3 un-flex un-justify-center">
                                        <a href="{{ url('/rumdin-golongan/' . $sitem->id) }}" class="un-inline-block">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="icon-size">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                            </svg>
                                        </a>
                                        <a href="javascript:void(0);" class="text-danger" data-bs-toggle="modal"
                                            data-bs-target="#modal-hapus-rumdin-golongan"
                                            onclick="{
                                $('#hapus-rumdin-golongan-form').attr('action', '{{ url('/rumdin-golongan/' . $sitem->id) }}');
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
                                $total_jumlah_personel += $sitem->jumlah_personel;
                                $total_rumah_dinas_jumlah += $sitem->rumah_dinas_jumlah;
                                $total_rumah_dinas_kapasitas += $sitem->rumah_dinas_kapasitas;
                                $total_rumah_dinas_polri_aktif += $sitem->rumah_dinas_polri_aktif;
                                $total_rumah_dinas_polri_purna += $sitem->rumah_dinas_polri_purna;
                                $total_rumah_dinas_non_polri += $sitem->rumah_dinas_non_polri;
                                $total_rumah_non_dinas_pribadi += $sitem->rumah_non_dinas_pribadi;
                                $total_rumah_non_dinas_orang_tua += $sitem->rumah_non_dinas_orang_tua;
                                $total_rumah_non_dinas_sewa += $sitem->rumah_non_dinas_sewa;
                            @endphp
                        @endforeach
                        <tr>
                            <td colspan="14"></td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="14" class="text-center">Data tidak tersedia</td>
                        </tr>
                    @endforelse
                    <tr class="un-bg-gray-50">
                        <td colspan="3" class="text-center un-uppercase un-font-semibold">Total</td>
                        <td>{{ $total_jumlah_personel }}</td>
                        <td>{{ $total_rumah_dinas_jumlah }}</td>
                        <td>{{ $total_rumah_dinas_kapasitas }}</td>
                        <td>{{ $total_rumah_dinas_polri_aktif }}</td>
                        <td>{{ $total_rumah_dinas_polri_purna }}</td>
                        <td>{{ $total_rumah_dinas_non_polri }}</td>
                        <td>{{ $total_rumah_non_dinas_pribadi }}</td>
                        <td>{{ $total_rumah_non_dinas_orang_tua }}</td>
                        <td>{{ $total_rumah_non_dinas_sewa }}</td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </x-card>

    <form action="{{ url('/rumdin-golongan') }}" method="POST" id="hapus-rumdin-golongan-form">
        @method('DELETE')
        @csrf
        <x-modal id="modal-hapus-rumdin-golongan" title="Edit Kesatuan">
            <p>Anda yakin menghapus rumdin golongan terpilih?</p>

            <x-slot:footer>
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-danger">Hapus</button>
            </x-slot:footer>
        </x-modal>
    </form>
@endsection
