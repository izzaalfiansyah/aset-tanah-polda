@extends('c-app', [
    'title' => 'User',
    'isDataTable' => true,
])

@section('content')
    <x-card>
        <div class="un-flex un-items-center un-justify-between">
            <div class="un-text-xl un-font-semibold">User</div>
            <a class="btn btn-primary" href="{{ url('/user/create') }}">Tambah</a>
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
        <div class="mb-5">
            <form action="" method="get" class="un-relative">
                <button
                    class="un-block un-outline-none un-bg-transparent un-border-none un-absolute un-top-0 un-bottom-0 un-right-0 un-w-12 un-flex un-items-center un-justify-center"
                    type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="un-size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                    </svg>
                </button>
                <input type="text" value="{{ request()->get('q') }}" autocomplete="off" class="form-control !un-pr-12"
                    placeholder="Cari..." name="q">
            </form>
        </div>
        <div class="un-overflow-x-auto">
            <table class="table table-bordered un-whitespace-nowrap">
                <thead>
                    <tr class="un-bg-gray-50">
                        <th class="text-center">No</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">Role</th>
                        <th class="text-center">Alamat</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Telepon</th>
                        <th class="text-center">Opsi</th>
                    </tr>
                    <tr>
                        @for ($i = 1; $i <= 7; $i++)
                            <th class="text-center">{{ $i }}</th>
                        @endfor
                    </tr>
                    <tr>
                        <th colspan="7"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($user as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->role }}</td>
                            <td>{{ $item->address }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->phone }}</td>
                            <td class="text-center">
                                <a href="{{ url('/user/' . $item->id) }}" class="un-inline-block">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="icon-size">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                    </svg>
                                </a>
                                <a href="javascript:void(0);" class="text-danger" data-bs-toggle="modal"
                                    data-bs-target="#modal-hapus-user"
                                    onclick="{
                        $('#hapus-user-form').attr('action', '{{ url('/user/' . $item->id) }}');
                        }">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="icon-size">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                    </svg>

                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">Data tidak tersedia.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-5">
            {{ $user->links() }}
        </div>
    </x-card>

    <form action="{{ url('/user') }}" method="POST" id="hapus-user-form">
        @method('DELETE')
        @csrf
        <x-modal id="modal-hapus-user" title="Hapus User">
            <p>Anda yakin menghapus user terpilih?</p>

            <x-slot:footer>
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-danger">Hapus</button>
            </x-slot:footer>
        </x-modal>
    </form>
@endsection
