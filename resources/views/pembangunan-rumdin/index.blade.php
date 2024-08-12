@extends('c-app', [
    'title' => 'Rumdin',
])

@section('content')
    <x-card>
        <div class="un-flex un-items-center un-justify-between">
            <div class="un-text-xl un-font-semibold">Pembangunan Rumdin</div>
            <a class="btn btn-primary" href="{{ url('/pembangunan-rumdin/create') }}">Tambah</a>
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
        @if (request()->user()->role == 'admin')
            <div class="mb-5">
                <x-filter-user></x-filter-user>
            </div>
        @endif
        <div class="mb-5">
            <button
                onclick="exportExcel(document.querySelector('table.un-whitespace-nowrap'),'pembangunan-rumdin-{{ date('Y-m-d') }}')"
                class="btn btn-success">Export
                Excel</button>
        </div>
        <div class="un-overflow-x-auto">
            <table class="table table-bordered un-whitespace-nowrap">
                <thead>
                    @php
                        $colspan = 11;
                    @endphp
                    <tr class="un-bg-gray-50">
                        <th class="un-text-center un-align-middle" rowspan="2" colspan="3">No</th>
                        <th class="un-text-center un-align-middle" rowspan="2">Kesatuan</th>
                        <th class="un-text-center un-align-middle" rowspan="2">Jenis Bangunan</th>
                        <th class="un-text-center un-align-middle" rowspan="2">Type</th>
                        <th class="un-text-center un-align-middle">Jumlah</th>
                        <th class="un-text-center un-align-middle">Luas</th>
                        <th class="un-text-center un-align-middle" rowspan="2">Sumber GAR</th>
                        <th class="un-text-center un-align-middle" rowspan="2">Ket</th>
                        @if (request()->user()->role == 'admin')
                            @php $colspan += 1 @endphp
                            <th class="un-text-center un-align-middle" rowspan="2">Penanggung Jawab</th>
                        @endif
                        <th class="un-text-center un-align-middle" rowspan="2">Opsi</th>
                    </tr>
                    <tr class="un-bg-gray-50">
                        <th class="un-text-center un-align-middle">(Unit)</th>
                        <th class="un-text-center un-align-middle">(M<sup>2</sup>)</th>
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
                        $total_tipe = 0;
                        $total_jumlah = 0;
                        $total_luas = 0;
                    @endphp
                    @forelse ($pembangunan_rumdin as $key => $item)
                        <tr class="un-bg-gray-50">
                            <td>{{ $keys[$key] }}</td>
                            <td></td>
                            <td></td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->jenis_bangunan }}</td>
                            <td>{{ $item->tipe }}</td>
                            <td>{{ $item->jumlah }}</td>
                            <td>{{ $item->luas }}</td>
                            <td>{{ $item->sumber_gar }}</td>
                            <td>{{ $item->keterangan }}</td>
                            @if (request()->user()->role == 'admin')
                                @php $ssitemcount = 0 @endphp
                                @foreach ($item->sub as $sitem)
                                    @php $ssitemcount += count($sitem->sub) @endphp
                                    @foreach ($sitem->sub as $ssitem)
                                        @php $ssitemcount += count($ssitem->sub) @endphp
                                        {{-- @php $ssitemcount += 1 @endphp --}}
                                    @endforeach
                                @endforeach
                                <td class="un-align-middle text-center"
                                    rowspan="{{ count($item->sub) + $ssitemcount + 2 }}">
                                    {{ $item->user->name }}</td>
                            @endif
                            <td>
                                <div class="un-space-x-3 un-flex un-justify-center">
                                    <a href="{{ url('/pembangunan-rumdin/' . $item->id . '/sub') }}"
                                        class="un-inline-block text-success">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="icon-size">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 10.5v6m3-3H9m4.06-7.19-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z" />
                                        </svg>

                                    </a>
                                    <a href="{{ url('/pembangunan-rumdin/' . $item->id) }}" class="un-inline-block">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="icon-size">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                        </svg>
                                    </a>
                                    <a href="javascript:void(0);" class="text-danger" data-bs-toggle="modal"
                                        data-bs-target="#modal-hapus-pembangunan-rumdin"
                                        onclick="{
                                $('#hapus-pembangunan-rumdin-form').attr('action', '{{ url('/pembangunan-rumdin/' . $item->id) }}');
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
                            $jumlah_tipe = $item->tipe;
                            $jumlah_jumlah = $item->jumlah;
                            $jumlah_luas = $item->luas;
                        @endphp

                        @foreach ($item->sub as $sindex => $sitem)
                            <tr>
                                <td></td>
                                <td>{{ $sindex + 1 }}</td>
                                <td></td>
                                <td>{{ $sitem->nama }}</td>
                                <td>{{ $sitem->jenis_bangunan }}</td>
                                <td>{{ $sitem->tipe }}</td>
                                <td>{{ $sitem->jumlah }}</td>
                                <td>{{ $sitem->luas }}</td>
                                <td>{{ $sitem->sumber_gar }}</td>
                                <td>{{ $sitem->keterangan }}</td>
                                <td>
                                    <div class="un-space-x-3 un-flex un-justify-center">
                                        <a href="{{ url('/pembangunan-rumdin/' . $sitem->id . '/sub') }}"
                                            class="un-inline-block text-success">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="icon-size">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m3.75 9v6m3-3H9m1.5-12H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                                            </svg>
                                        </a>
                                        <a href="{{ url('/pembangunan-rumdin/' . $sitem->id) }}" class="un-inline-block">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="icon-size">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                            </svg>
                                        </a>
                                        <a href="javascript:void(0);" class="text-danger" data-bs-toggle="modal"
                                            data-bs-target="#modal-hapus-pembangunan-rumdin"
                                            onclick="{
                                $('#hapus-pembangunan-rumdin-form').attr('action', '{{ url('/pembangunan-rumdin/' . $sitem->id) }}');
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
                                $jumlah_tipe += $sitem->tipe;
                                $jumlah_jumlah += $sitem->jumlah;
                                $jumlah_luas += $sitem->luas;
                            @endphp

                            @foreach ($sitem->sub as $ssindex => $ssitem)
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>{{ strtolower($keys[$ssindex]) }}</td>
                                    <td>{{ $ssitem->nama }}</td>
                                    <td>{{ $ssitem->jenis_bangunan }}</td>
                                    <td>{{ $ssitem->tipe }}</td>
                                    <td>{{ $ssitem->jumlah }}</td>
                                    <td>{{ $ssitem->luas }}</td>
                                    <td>{{ $ssitem->sumber_gar }}</td>
                                    <td>{{ $ssitem->keterangan }}</td>
                                    <td>
                                        <div class="un-space-x-3 un-flex un-justify-center">
                                            <a href="{{ url('/pembangunan-rumdin/' . $ssitem->id . '/sub') }}"
                                                class="un-inline-block text-success">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="icon-size">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                </svg>
                                            </a>
                                            <a href="{{ url('/pembangunan-rumdin/' . $ssitem->id) }}"
                                                class="un-inline-block">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="icon-size">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                                </svg>
                                            </a>
                                            <a href="javascript:void(0);" class="text-danger" data-bs-toggle="modal"
                                                data-bs-target="#modal-hapus-pembangunan-rumdin"
                                                onclick="{
                                $('#hapus-pembangunan-rumdin-form').attr('action', '{{ url('/pembangunan-rumdin/' . $ssitem->id) }}');
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
                                    $jumlah_tipe_cabang = 0;
                                    $jumlah_jumlah_cabang = 0;
                                    $jumlah_luas_cabang = 0;
                                @endphp
                                @foreach ($ssitem->sub as $sssindex => $sssitem)
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td class="text-center">-</td>
                                        <td>{{ $sssitem->jenis_bangunan }}</td>
                                        <td>{{ $sssitem->tipe }}</td>
                                        <td>{{ $sssitem->jumlah }}</td>
                                        <td>{{ $sssitem->luas }}</td>
                                        <td>{{ $sssitem->sumber_gar }}</td>
                                        <td>{{ $sssitem->keterangan }}</td>
                                        <td>
                                            <div class="un-space-x-3 un-flex un-justify-center">
                                                <a href="{{ url('/pembangunan-rumdin/' . $sssitem->id) }}"
                                                    class="un-inline-block">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="icon-size">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                                    </svg>
                                                </a>
                                                <a href="javascript:void(0);" class="text-danger" data-bs-toggle="modal"
                                                    data-bs-target="#modal-hapus-pembangunan-rumdin"
                                                    onclick="{
                                    $('#hapus-pembangunan-rumdin-form').attr('action', '{{ url('/pembangunan-rumdin/' . $sssitem->id) }}');
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
                                        $jumlah_tipe_cabang += $sssitem->tipe;
                                        $jumlah_jumlah_cabang += $sssitem->jumlah;
                                        $jumlah_luas_cabang += $sssitem->luas;
                                    @endphp
                                @endforeach

                                {{-- @if ($jumlah_jumlah_cabang != 0 && $jumlah_luas_cabang != 0) --}}
                                {{-- <tr class="un-bg-gray-50">
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td class="text-center un-uppercase">Total {{ $ssitem->nama }}</td>
                                        <td></td>
                                        <td></td>
                                        <td>{{ $jumlah_jumlah_cabang }}</td>
                                        <td>{{ $jumlah_luas_cabang }}</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr> --}}
                                {{-- @endif --}}

                                @php
                                    $jumlah_tipe += $jumlah_tipe_cabang;
                                    $jumlah_jumlah += $jumlah_jumlah_cabang;
                                    $jumlah_luas += $jumlah_luas_cabang;

                                    $jumlah_tipe += $ssitem->tipe;
                                    $jumlah_jumlah += $ssitem->jumlah;
                                    $jumlah_luas += $ssitem->luas;
                                @endphp
                            @endforeach
                        @endforeach

                        <tr>
                            <td colspan="4" class="text-center un-uppercase">Total {{ $item->nama }}</td>
                            <td></td>
                            <td></td>
                            <td>{{ $jumlah_jumlah }}</td>
                            <td>{{ $jumlah_luas }}</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                        @php
                            $total_tipe += $jumlah_tipe;
                            $total_jumlah += $jumlah_jumlah;
                            $total_luas += $jumlah_luas;
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
                        <td></td>
                        <td></td>
                        <td>{{ $total_jumlah }}</td>
                        <td>{{ $total_luas }}</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        @if (request()->user()->role == 'admin')
                            <td></td>
                        @endif
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="mt-5">
            {{ $pembangunan_rumdin->links() }}
        </div>
    </x-card>

    <form action="{{ url('/pembangunan-rumdin') }}" method="POST" id="hapus-pembangunan-rumdin-form">
        @method('DELETE')
        @csrf
        <x-modal id="modal-hapus-pembangunan-rumdin" title="Hapus Rumdin">
            <p>Anda yakin menghapus pembangunan rumdin terpilih?</p>

            <x-slot:footer>
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-danger">Hapus</button>
            </x-slot:footer>
        </x-modal>
    </form>
@endsection
