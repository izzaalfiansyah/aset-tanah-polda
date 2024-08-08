@extends('c-app', [
    'title' => 'Tanah Polda',
])

@section('content')
    <x-card>
        <div class="un-flex un-items-center un-justify-between">
            <div class="un-text-xl un-font-semibold">Tanah Polda</div>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambah-kesatuan">Tambah</button>
        </div>
    </x-card>

    <div class="mb-5"></div>

    <x-accordion id="accordion-1">
        @foreach ($tanah_polda as $item)
            <x-accordion-item id="accordion-1-item-{{ $item->id }}" parent-id="accordion-1" :title="$item->nama">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem dolor animi hic consectetur,
                consequuntur
                natus voluptatum provident consequatur eligendi eos mollitia assumenda omnis officiis quaerat similique
                aliquid
                iure illo debitis.
            </x-accordion-item>
        @endforeach
    </x-accordion>

    <form action="{{ url('/tanah-polda') }}" method="POST">
        @csrf
        <x-modal id="tambah-kesatuan" title="Tambah Kesatuan">
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
@endsection
