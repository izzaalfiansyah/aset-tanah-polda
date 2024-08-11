@extends('c-app', [
    'title' => 'Manajemen Akun User',
])

@section('content')
    @include('sweetalert::alert')
    <x-card title="Pengaturan Akun User">
        <!--begin::Form-->
        <form id="sendVerification" method="post" action="{{ route('verification.send') }}">
            @csrf
        </form>

        <script>
            function sendForm() {
                document.getElementById("sendVerification").submit();
            }
        </script>

        <form class="form" action="{{ url('/user') }}" method="POST">
            @csrf
            <!--begin::Card body-->
            <div>
                <div class="row">
                    <div class="col-lg-6 mb-7">
                        <div class="form-group">
                            <label for="name" class="form-label">
                                Nama Lengkap <span class="required"></span>
                            </label>

                            <input type="text" name="name" id="name"
                                class="form-control @error('name') is-invalid @enderror" placeholder="Nama Lengkap"
                                value="{{ old('name') }}">

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-lg-6 mb-7">
                        <div class="form-group">
                            <label for="gender" class="form-label">
                                Jenis Kelamin <span class="required"></span>
                            </label>
                            <select name="gender" id="gender" class="form-select @error('gender') is-invalid @enderror"
                                data-control="select2" data-hide-search="true" data-placeholder="Pilih Jenis Kelamin">
                                <option value=""></option>
                                <option value=""></option>
                                <option value="Laki-laki" {{ old('gender') == 'Laki-laki' ? 'selected' : '' }}>
                                    Laki-laki</option>
                                <option value="Perempuan" {{ old('gender') == 'Perempuan' ? 'selected' : '' }}>
                                    Perempuan</option>
                            </select>

                            @error('gender')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-lg-7 mb-7">
                        <div class="form-group">
                            <label for="place-of-birth" class="form-label">
                                Tempat Lahir
                            </label>

                            <input type="text" name="place_of_birth" id="place-of-birth"
                                class="form-control @error('place_of_birth') is-invalid @enderror"
                                placeholder="Tempat Lahir" value="{{ old('place_of_birth') }}">

                            @error('place_of_birth')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-lg-5 mb-7">
                        <div class="form-group">
                            <label for="date_of_birth" class="form-label">
                                Tanggal Lahir
                            </label>

                            <input type="text" name="birthday" id="date_of_birth"
                                class="form-control @error('date_of_birth') is-invalid @enderror"
                                placeholder="Tanggal Lahir" value="{{ old('date_of_birth') }}">

                            @error('date_of_birth')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-lg-4 mb-7">
                        <div class="form-group w-100">
                            <label for="subdistrict" class="form-label">
                                Alamat <span class="required"></span>
                            </label>

                            <select name="province_id" id="provinsi"
                                class="form-select @error('province_id') is-invalid @enderror" data-control="select2"
                                data-placeholder="Pilih Provinsi">
                                <option value="">Pilih Provinsi</option>
                                @foreach ($provinsi as $item)
                                    <option value="{{ $item->id }}">
                                        {{ $item->name }}
                                    </option>
                                @endforeach
                            </select>

                            @error('province_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-lg-4 mb-7 d-flex align-items-end">
                        <div class="form-group w-100">
                            <select name="district_id" id="kabupaten"
                                class="form-select @error('district_id') is-invalid @enderror" data-control="select2"
                                data-placeholder="Pilih Kabupaten">
                                <option value="">
                                    Pilih Kabupaten
                                </option>
                            </select>

                            @error('district_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-lg-4 mb-7 d-flex align-items-end">
                        <div class="form-group w-100">
                            <select name="subdistrict_id" id="kecamatan"
                                class="form-select @error('subdistrict_id') is-invalid @enderror" data-control="select2"
                                data-placeholder="Pilih Kecamatan">
                                <option value="">
                                    Pilih Kecamatan
                                </option>
                            </select>

                            @error('subdistrict_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-lg-12 mb-7">
                        <div class="form-group">
                            <textarea name="address" id="address" rows="4" class="form-control @error('address') is-invalid @enderror"
                                placeholder="Alamat">{{ old('address') }}</textarea>

                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-lg-6 mb-7">
                        <div class="form-group">
                            <label for="username" class="form-label">
                                Alamat Email <span class="required"></span>
                            </label>

                            <input type="text" name="email" id="email"
                                class="form-control @error('email') is-invalid @enderror" placeholder="Alamat Email"
                                value="{{ old('email') }}">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-lg-6 mb-7">
                        <div class="form-group">
                            <label for="username" class="form-label">
                                Username <span class="required"></span>
                            </label>

                            <input type="text" name="username" id="username"
                                class="form-control @error('username') is-invalid @enderror" placeholder="Username"
                                value="{{ old('username') }}">

                            @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-lg-12 mb-7">
                        <div class="form-group">
                            <label for="whatsapp" class="form-label">
                                WhatsApp
                            </label>

                            <div class="input-group">
                                <span class="input-group-text">(+62)</span>
                                <input type="number" name="phone" id="phone"
                                    class="form-control @error('phone') is-invalid @enderror"
                                    placeholder="85xx-xxxx-xxxx" value="{{ old('phone') }}">
                            </div>
                            <small class="text-gray-600 d-block">
                                * Note: Masukkan nomor WhatsApp tanpa angka 0 di depannya.
                            </small>

                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>



                    <div class="col-lg-6 mb-7">
                        <div class="form-group">
                            <!--begin::Label-->
                            <label class="form-label required">
                                Kata Sandi
                            </label>
                            <!--end::Label-->

                            <!--begin::Input wrapper-->
                            <input class="form-control @error('password') is-invalid @enderror" type="password"
                                name="password" autocomplete="off" />

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <!--end::Input wrapper-->
                        </div>
                    </div>

                    <div class="col-lg-6 mb-7">
                        <div class="form-group">
                            <!--begin::Label-->
                            <label class="form-label required">
                                Konfirmasi Kata Sandi
                            </label>
                            <!--end::Label-->

                            <!--begin::Input wrapper-->
                            <input class="form-control @error('password_confirmation') is-invalid @enderror"
                                type="password" name="password_confirmation" autocomplete="current-password" />

                            @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <!--end::Input wrapper-->
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Card body-->
            <!--begin::Actions-->
            <div class="card-footer d-flex justify-content-end py-6 px-9">
                <button type="submit" class="btn btn-sm btn-info" id="kt_account_profile_details_submit">
                    <i class="fas fa-save"></i> Simpan
                </button>
            </div>
            <!--end::Actions-->
        </form>
    </x-card>
@endsection

@push('custom-javascript')
    {{-- <script src="assets/js/custom/account/settings/deactivate-account.js"></script> --}}
    <script>
        $("#date_of_birth").flatpickr({
            dateFormat: "d-m-Y",
        });

        $(function() {
            $('#provinsi').on('change', function() {
                let id_provinsi = $(this).val();

                $.ajax({
                    type: 'POST',
                    url: '{{ route('profile.getkab') }}',
                    data: {
                        id_provinsi: id_provinsi,
                        _token: '{{ csrf_token() }}'
                    },
                    cache: false,
                    success: function(data) {
                        $('#kabupaten').html(data);
                    },
                    error: function(data) {
                        console.log('Terjadi Kesalahan', data);
                    }
                });
            });

            $('#kabupaten').on('change', function() {
                let id_kabupaten = $(this).val();

                $.ajax({
                    type: 'POST',
                    url: '{{ route('profile.getkec') }}',
                    data: {
                        id_kabupaten: id_kabupaten,
                        _token: '{{ csrf_token() }}'
                    },
                    cache: false,
                    success: function(data) {
                        $('#kecamatan').html(data);
                    },
                    error: function(data) {
                        console.log('Terjadi Kesalahan', data);
                    }
                });
            });
        });
    </script>
@endpush
