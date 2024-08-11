@extends('c-app', [
    'title' => 'Rumdin',
])

@section('content')
    <x-card>
        <div class="un-flex un-items-center un-justify-between">
            <div class="un-text-xl un-font-semibold">Rumdin</div>
            <a class="btn btn-primary" href="{{ url('/rumdin/create') }}">Tambah</a>
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
                    @php
                        $colspan = 17;
                    @endphp
                    <tr class="un-bg-gray-50">
                        <th class="un-text-center un-align-middle" rowspan="2" colspan="3">No</th>
                        <th class="un-text-center un-align-middle" rowspan="2">Kesatuan</th>
                        <th class="un-text-center un-align-middle" colspan="2">Rumah Tapak</th>
                        <th class="un-text-center un-align-middle" colspan="2">Mess</th>
                        <th class="un-text-center un-align-middle" colspan="2">Rusun</th>
                        <th class="un-text-center un-align-middle" colspan="2">Rusus</th>
                        <th class="un-text-center un-align-middle" colspan="2">Barak</th>
                        <th class="un-text-center un-align-middle">Jumlah Rumdin</th>
                        <th class="un-text-center un-align-middle">Jumlah Kapasitas</th>
                        @if (request()->user()->role == 'admin')
                            @php $colspan += 1 @endphp
                            <th class="un-text-center un-align-middle" rowspan="2">Penanggung Jawab</th>
                        @endif
                        <th class="un-text-center un-align-middle" rowspan="2">Opsi</th>
                    </tr>
                    <tr class="un-bg-gray-50">
                        <th class="un-text-center un-align-middle">Jumlah Unit</th>
                        <th class="un-text-center un-align-middle">Kapasitas KK</th>
                        <th class="un-text-center un-align-middle">Jumlah Unit</th>
                        <th class="un-text-center un-align-middle">Kapasitas KK</th>
                        <th class="un-text-center un-align-middle">Jumlah Unit</th>
                        <th class="un-text-center un-align-middle">Kapasitas KK</th>
                        <th class="un-text-center un-align-middle">Jumlah Unit</th>
                        <th class="un-text-center un-align-middle">Kapasitas KK</th>
                        <th class="un-text-center un-align-middle">Jumlah Unit</th>
                        <th class="un-text-center un-align-middle">Kapasitas KK</th>
                        <th class="un-text-center un-align-middle">Unit</th>
                        <th class="un-text-center un-align-middle">KK</th>
                    </tr>
                    <tr>
                        @for ($i = 1; $i <= $colspan - 2; $i++)
                            <th colspan="{{ $i == 1 ? 3 : 1 }}" class="un-text-center">{{ $i }}</th>
                        @endfor
                    </tr>
                    <tr>
                        <th colspan="{{ $colspan }}"></th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $keys = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                        $total_rumah_tapak_jumlah = 0;
                        $total_rumah_tapak_kapasitas = 0;
                        $total_mess_jumlah = 0;
                        $total_mess_kapasitas = 0;
                        $total_rusun_jumlah = 0;
                        $total_rusun_kapasitas = 0;
                        $total_rusus_jumlah = 0;
                        $total_rusus_kapasitas = 0;
                        $total_barak_jumlah = 0;
                        $total_barak_kapasitas = 0;
                        $total_total_jumlah = 0;
                        $total_total_kapasitas = 0;
                    @endphp
                    @forelse ($rumdin as $key => $item)
                        <tr class="un-bg-gray-50">
                            <td>{{ $keys[$key] }}</td>
                            <td></td>
                            <td></td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->rumah_tapak_jumlah }}</td>
                            <td>{{ $item->rumah_tapak_kapasitas }}</td>
                            <td>{{ $item->mess_jumlah }}</td>
                            <td>{{ $item->mess_kapasitas }}</td>
                            <td>{{ $item->rusun_jumlah }}</td>
                            <td>{{ $item->rusun_kapasitas }}</td>
                            <td>{{ $item->rusus_jumlah }}</td>
                            <td>{{ $item->rusus_kapasitas }}</td>
                            <td>{{ $item->barak_jumlah }}</td>
                            <td>{{ $item->barak_kapasitas }}</td>
                            <td>{{ $item->total_jumlah }}</td>
                            <td>{{ $item->total_kapasitas }}</td>
                            @if (request()->user()->role == 'admin')
                                @php $ssitemcount = 0 @endphp
                                @foreach ($item->sub as $sitem)
                                    @php $ssitemcount += count($sitem->sub) @endphp
                                @endforeach
                                <td class="un-align-middle text-center"
                                    rowspan="{{ count($item->sub) + $ssitemcount + 2 }}">
                                    {{ $item->user->name }}</td>
                            @endif
                            <td>
                                <div class="un-space-x-3 un-flex un-justify-center">
                                    <a href="{{ url('/rumdin/' . $item->id . '/sub') }}"
                                        class="un-inline-block text-success">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="icon-size">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 10.5v6m3-3H9m4.06-7.19-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z" />
                                        </svg>

                                    </a>
                                    <a href="{{ url('/rumdin/' . $item->id) }}" class="un-inline-block">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="icon-size">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                        </svg>
                                    </a>
                                    <a href="javascript:void(0);" class="text-danger" data-bs-toggle="modal"
                                        data-bs-target="#modal-hapus-rumdin"
                                        onclick="{
                                $('#hapus-rumdin-form').attr('action', '{{ url('/rumdin/' . $item->id) }}');
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
                            $jumlah_rumah_tapak_jumlah = $item->rumah_tapak_jumlah;
                            $jumlah_rumah_tapak_kapasitas = $item->rumah_tapak_kapasitas;
                            $jumlah_mess_jumlah = $item->mess_jumlah;
                            $jumlah_mess_kapasitas = $item->mess_kapasitas;
                            $jumlah_rusun_jumlah = $item->rusun_jumlah;
                            $jumlah_rusun_kapasitas = $item->rusun_kapasitas;
                            $jumlah_rusus_jumlah = $item->rusus_jumlah;
                            $jumlah_rusus_kapasitas = $item->rusus_kapasitas;
                            $jumlah_barak_jumlah = $item->barak_jumlah;
                            $jumlah_barak_kapasitas = $item->barak_kapasitas;
                            $jumlah_total_jumlah = $item->total_jumlah;
                            $jumlah_total_kapasitas = $item->total_kapasitas;
                        @endphp

                        @foreach ($item->sub as $sindex => $sitem)
                            <tr>
                                <td></td>
                                <td>{{ $sindex + 1 }}</td>
                                <td></td>
                                <td>{{ $sitem->nama }}</td>
                                <td>{{ $sitem->rumah_tapak_jumlah }}</td>
                                <td>{{ $sitem->rumah_tapak_kapasitas }}</td>
                                <td>{{ $sitem->mess_jumlah }}</td>
                                <td>{{ $sitem->mess_kapasitas }}</td>
                                <td>{{ $sitem->rusun_jumlah }}</td>
                                <td>{{ $sitem->rusun_kapasitas }}</td>
                                <td>{{ $sitem->rusus_jumlah }}</td>
                                <td>{{ $sitem->rusus_kapasitas }}</td>
                                <td>{{ $sitem->barak_jumlah }}</td>
                                <td>{{ $sitem->barak_kapasitas }}</td>
                                <td>{{ $sitem->total_jumlah }}</td>
                                <td>{{ $sitem->total_kapasitas }}</td>
                                <td>
                                    <div class="un-space-x-3 un-flex un-justify-center">
                                        <a href="{{ url('/rumdin/' . $sitem->id . '/sub') }}"
                                            class="un-inline-block text-success">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="icon-size">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m3.75 9v6m3-3H9m1.5-12H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                                            </svg>
                                        </a>
                                        <a href="{{ url('/rumdin/' . $sitem->id) }}" class="un-inline-block">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="icon-size">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                            </svg>
                                        </a>
                                        <a href="javascript:void(0);" class="text-danger" data-bs-toggle="modal"
                                            data-bs-target="#modal-hapus-rumdin"
                                            onclick="{
                                $('#hapus-rumdin-form').attr('action', '{{ url('/rumdin/' . $sitem->id) }}');
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
                                $jumlah_rumah_tapak_jumlah += $sitem->rumah_tapak_jumlah;
                                $jumlah_rumah_tapak_kapasitas += $sitem->rumah_tapak_kapasitas;
                                $jumlah_mess_jumlah += $sitem->mess_jumlah;
                                $jumlah_mess_kapasitas += $sitem->mess_kapasitas;
                                $jumlah_rusun_jumlah += $sitem->rusun_jumlah;
                                $jumlah_rusun_kapasitas += $sitem->rusun_kapasitas;
                                $jumlah_rusus_jumlah += $sitem->rusus_jumlah;
                                $jumlah_rusus_kapasitas += $sitem->rusus_kapasitas;
                                $jumlah_barak_jumlah += $sitem->barak_jumlah;
                                $jumlah_barak_kapasitas += $sitem->barak_kapasitas;
                                $jumlah_total_jumlah += $sitem->total_jumlah;
                                $jumlah_total_kapasitas += $sitem->total_kapasitas;
                            @endphp

                            @foreach ($sitem->sub as $ssindex => $ssitem)
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>{{ strtolower($keys[$ssindex]) }}</td>
                                    <td>{{ $ssitem->nama }}</td>
                                    <td>{{ $ssitem->rumah_tapak_jumlah }}</td>
                                    <td>{{ $ssitem->rumah_tapak_kapasitas }}</td>
                                    <td>{{ $ssitem->mess_jumlah }}</td>
                                    <td>{{ $ssitem->mess_kapasitas }}</td>
                                    <td>{{ $ssitem->rusun_jumlah }}</td>
                                    <td>{{ $ssitem->rusun_kapasitas }}</td>
                                    <td>{{ $ssitem->rusus_jumlah }}</td>
                                    <td>{{ $ssitem->rusus_kapasitas }}</td>
                                    <td>{{ $ssitem->barak_jumlah }}</td>
                                    <td>{{ $ssitem->barak_kapasitas }}</td>
                                    <td>{{ $ssitem->total_jumlah }}</td>
                                    <td>{{ $ssitem->total_kapasitas }}</td>
                                    <td>
                                        <div class="un-space-x-3 un-flex un-justify-center">
                                            <a href="{{ url('/rumdin/' . $ssitem->id) }}" class="un-inline-block">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="icon-size">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                                </svg>
                                            </a>
                                            <a href="javascript:void(0);" class="text-danger" data-bs-toggle="modal"
                                                data-bs-target="#modal-hapus-rumdin"
                                                onclick="{
                                $('#hapus-rumdin-form').attr('action', '{{ url('/rumdin/' . $ssitem->id) }}');
                                }">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="icon-size">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                </svg>

                                            </a>
                                        </div>
                                    </td>
                                </tr>

                                @php
                                    $jumlah_rumah_tapak_jumlah += $ssitem->rumah_tapak_jumlah;
                                    $jumlah_rumah_tapak_kapasitas += $ssitem->rumah_tapak_kapasitas;
                                    $jumlah_mess_jumlah += $ssitem->mess_jumlah;
                                    $jumlah_mess_kapasitas += $ssitem->mess_kapasitas;
                                    $jumlah_rusun_jumlah += $ssitem->rusun_jumlah;
                                    $jumlah_rusun_kapasitas += $ssitem->rusun_kapasitas;
                                    $jumlah_rusus_jumlah += $ssitem->rusus_jumlah;
                                    $jumlah_rusus_kapasitas += $ssitem->rusus_kapasitas;
                                    $jumlah_barak_jumlah += $ssitem->barak_jumlah;
                                    $jumlah_barak_kapasitas += $ssitem->barak_kapasitas;
                                    $jumlah_total_jumlah += $ssitem->total_jumlah;
                                    $jumlah_total_kapasitas += $ssitem->total_kapasitas;
                                @endphp
                            @endforeach
                        @endforeach

                        <tr>
                            <td colspan="4" class="text-center un-uppercase">Jumlah</td>
                            <td>{{ $jumlah_rumah_tapak_jumlah }}</td>
                            <td>{{ $jumlah_rumah_tapak_kapasitas }}</td>
                            <td>{{ $jumlah_mess_jumlah }}</td>
                            <td>{{ $jumlah_mess_kapasitas }}</td>
                            <td>{{ $jumlah_rusun_jumlah }}</td>
                            <td>{{ $jumlah_rusun_kapasitas }}</td>
                            <td>{{ $jumlah_rusus_jumlah }}</td>
                            <td>{{ $jumlah_rusus_kapasitas }}</td>
                            <td>{{ $jumlah_barak_jumlah }}</td>
                            <td>{{ $jumlah_barak_kapasitas }}</td>
                            <td>{{ $jumlah_total_jumlah }}</td>
                            <td>{{ $jumlah_total_kapasitas }}</td>
                            <td></td>
                        </tr>

                        @php
                            $total_rumah_tapak_jumlah += $jumlah_rumah_tapak_jumlah;
                            $total_rumah_tapak_kapasitas += $jumlah_rumah_tapak_kapasitas;
                            $total_mess_jumlah += $jumlah_mess_jumlah;
                            $total_mess_kapasitas += $jumlah_mess_kapasitas;
                            $total_rusun_jumlah += $jumlah_rusun_jumlah;
                            $total_rusun_kapasitas += $jumlah_rusun_kapasitas;
                            $total_rusus_jumlah += $jumlah_rusus_jumlah;
                            $total_rusus_kapasitas += $jumlah_rusus_kapasitas;
                            $total_barak_jumlah += $jumlah_barak_jumlah;
                            $total_barak_kapasitas += $jumlah_barak_kapasitas;
                            $total_total_jumlah += $jumlah_total_jumlah;
                            $total_total_kapasitas += $jumlah_total_kapasitas;
                        @endphp

                        <tr>
                            <td colspan="{{ $colspan }}"></td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="{{ $colspan }}" class="text-center">Data tidak tersedia</td>
                        </tr>
                        <tr>
                            <td colspan="{{ $colspan }}"></td>
                        </tr>
                    @endforelse

                    <tr class="un-bg-gray-50">
                        <td colspan="4" class="text-center un-font-semibold un-uppercase">Total</td>
                        <td>{{ $total_rumah_tapak_jumlah }}</td>
                        <td>{{ $total_rumah_tapak_kapasitas }}</td>
                        <td>{{ $total_mess_jumlah }}</td>
                        <td>{{ $total_mess_kapasitas }}</td>
                        <td>{{ $total_rusun_jumlah }}</td>
                        <td>{{ $total_rusun_kapasitas }}</td>
                        <td>{{ $total_rusus_jumlah }}</td>
                        <td>{{ $total_rusus_kapasitas }}</td>
                        <td>{{ $total_barak_jumlah }}</td>
                        <td>{{ $total_barak_kapasitas }}</td>
                        <td>{{ $total_total_jumlah }}</td>
                        <td>{{ $total_total_kapasitas }}</td>
                        <td></td>
                        @if (request()->user()->role == 'admin')
                            <td></td>
                        @endif
                    </tr>
                </tbody>
            </table>
        </div>
    </x-card>

    <form action="{{ url('/rumdin') }}" method="POST" id="hapus-rumdin-form">
        @method('DELETE')
        @csrf
        <x-modal id="modal-hapus-rumdin" title="Hapus Rumdin">
            <p>Anda yakin menghapus rumdin terpilih?</p>

            <x-slot:footer>
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-danger">Hapus</button>
            </x-slot:footer>
        </x-modal>
    </form>
@endsection
