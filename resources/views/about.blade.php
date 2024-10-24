@extends('layouts.admin')

@section('main-content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">{{ __('About') }}</h1>

<div class="row justify-content-center">

    <div class="col-lg-6">

        <div class="card shadow mb-4">

            <div class="card-profile-image mt-4">
                <img src="{{ asset('img/favicon.png') }}" class="rounded-circle" alt="user-image">
            </div>

            <div class="card-body">

                <div class="row">
                    <div class="col-lg-12">
                        <h5 class="font-weight-bold">Buku Tamu Digital</h5>
                        <p>Fitur utama aplikasi Buku Tamu Digital meliputi:</p>
                        <ul>
                            <li>Pencatatan nama dan alamat tamu.</li>
                            <li>Penyimpanan foto tamu untuk verifikasi visual.</li>
                            <li>Pengambilan tanda tangan digital tamu untuk keperluan validasi.</li>
                            <li>Eksport data tamu ke format XLSX untuk analisis dan pelaporan.</li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>

    </div>

</div>

@endsection
