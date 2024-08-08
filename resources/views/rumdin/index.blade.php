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
                        @for ($i = 1; $i <= 15; $i++)
                            <th colspan="{{ $i == 1 ? 3 : 1 }}" class="un-text-center">{{ $i }}</th>
                        @endfor
                    </tr>
                    <tr>
                        <th colspan="19"></th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </x-card>

    <form action="{{ url('/rumdin') }}" method="POST" id="hapus-rumdin">
        @method('DELETE')
        @csrf
        <x-modal id="modal-hapus-rumdin" title="Edit Kesatuan">
            <p>Anda yakin menghapus sub tanah polda terpilih?</p>

            <x-slot:footer>
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-danger">Hapus</button>
            </x-slot:footer>
        </x-modal>
    </form>
@endsection
