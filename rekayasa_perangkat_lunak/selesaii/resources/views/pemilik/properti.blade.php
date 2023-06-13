<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" />
    <title>Hotel PKPRI - Riwayat Booking</title>
    <style>
        button a {
            text-decoration: none;
        }
    </style>
    @include('admin/inc/links')
</head>
<body>
    @include('admin/inc/header')

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden ">
                <h3 class="mb-4"> Properti Saya </h3>

                @if (session()->has('succes'))
                    <div class="alert alert-success" role="alert">
                        {{ session('succes') }}
                    </div>
                @endif

                <!-- General Rooms Section -->
                <div>
                    <button><i class="bi bi-check"></i></button> : Aktifkan <button><i class="bi bi-x"></i></button> : Nonaktifkan
                </div>
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <div class="table-responsive-lg">
                            <div class="table-responsive-lg">
                                <table class="table table-hover border">
                                    <thead class="text-center">
                                        <tr class="bg-dark text-light">
                                            <th scope="col">#</th>
                                            <th scope="col">Preview</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">Pemilik</th>
                                            <th scope="col">Harga</th>
                                            <th scope="col">Tersedia</th>
                                            <th scope="col">Penghuni</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center" id="room-data">
                                        @foreach ($kostan as $kos)
                                        <tr>
                                            <td>{{ $kos->id }}</td>
                                            <td>
                                                <img src="{{ asset('images/photo/'.$kos->image) }}" class="card-img" style="width:250px">
                                            </td>
                                            <td>{{ $kos->nama }}</td>
                                            <td>{{ $kos->pemilik['username'] }}</td>
                                            <td>Rp {{ $kos->harga }}</td>
                                            <td>{{ $kos->tersedia }} Tersedia</td>
                                            <td> {{ $kos->penghuni }}</td>
                                            <td> {{ $kos->status }}</td>
                                            <td>
                                                <button data-bs-toggle="modal">
                                                    <a href="/statusaktif/{{ $kos->id }}"> <i class="bi bi-check"></i> </a>
                                                </button>
                                                <button data-bs-toggle="modal">
                                                    <a href="/statustidakaktif/{{ $kos->id }}"> <i class="bi bi-x"></i> </a>
                                                </button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('admin/inc/script')
</body>
</html>