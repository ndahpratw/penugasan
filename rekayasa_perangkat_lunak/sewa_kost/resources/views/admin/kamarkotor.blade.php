<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Antrian</title>
    <style>
        a i{
            color: black
        }
    </style>
    @include('admin/inc/links')
</head>
<body class="bg-light">

    @include('admin/inc/header')

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <h3 class="mb-4">KAMAR KOTOR</h3>

                @if (session()->has('succes'))
                    <div class="alert alert-success text-center" role="alert">
                        {{ session('succes') }} 
                    </div>
                @endif
                
                <!-- General Carousel Section -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">

                        <button><i class="bi bi-arrow-clockwise"></i></button> : Refresh untuk ketersedian kamar <button><i class="bi bi-check"></i></button> : Konfirmasi Kembali
                        <div class="text-end mb-4">
                            {{-- <button href="" class="btn btn-success rounded-pill shadown-none btn-sm">
                                <i class="bi bi-arrow-counterclockwise"></i> Refresh
                            </button> --}}
                        </div>

                        @if(count($booking))
                        <div class="table-responsive-md" style="height: 450px;">
                        <!-- <div class="table-responsive-md" style="height: 450px; overflow-y; scroll;"> -->
                                <table class="table table-hover border">
                                    <thead class="sticky-top text-center">
                                        <tr class="bg-dark text-light">
                                            <th scope="col">#</th>
                                            <th scope="col">Tipe Kamar</th>
                                            <th scope="col">Tamu</th>
                                            <th scope="col">Tanggal</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        @foreach ($booking as $bk)
                                            <tr>
                                                <td>{{ $bk->id }}</td>
                                                <td>{{ $bk->room['jenis_kamar'] }}</td>
                                                <td>
                                                    {{ $bk->room['tamu_dewasa'] }} dewasa <br>
                                                    {{ $bk->room['tamu_anak'] }} anak
                                                </td>
                                                <td>
                                                    Check In : {{ $bk->checkIn }} <br>
                                                    Check Out : {{ $bk->checkOut }} <br>
                                                </td>
                                                <td>
                                                    <button data-bs-toggle="modal">
                                                        <a href="/antriankamarkotor1/{{ $bk->room['id'] }}"><i class="bi bi-arrow-clockwise"></i></a>
                                                    </button>
                                                    <button data-bs-toggle="modal">
                                                        <a href="/antriankamarkotor2/{{ $bk->id }}"><i class="bi bi-check"></i></a>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <p class="text-center">Belum Ada Kamar Kotor</p>
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


    @include('admin/inc/script')
</body>
</html>