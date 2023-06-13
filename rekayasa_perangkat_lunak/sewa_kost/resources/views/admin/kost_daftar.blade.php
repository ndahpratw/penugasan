<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Kamar</title>
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
            <div class="col-lg-10 ms-auto p-4">
                <h3 class="mb-4"> Daftar Kost - an Telang </h3>

                @if (session()->has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- General Rooms Section -->
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
                                                    <a href="/kost/{{ $kos->id }}/edit" ><i class="bi bi-pencil-square"></i><a>
                                                </button>
                                                <button data-bs-toggle="modal">
                                                    <a href="/kost/detail/{{ $kos->id }}" ><i class="bi bi-images"></i><a>
                                                </button>
                                                <button type="button" data-bs-toggle="modal" data-bs-target="#hapus<?php echo $kos['id']?>"><i class="bi bi-trash"></i></button>
                                                <div class="modal fade" id="hapus<?php echo $kos['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-body">
                                                                <p style="color: black">Apakah anda yakin untuk menghapus kost tersebut dari daftar?</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary btn-sm shadow-none" data-bs-dismiss="modal">Tidak</button>
                                                                <form action="/kost/{{ $kos->id }}" method="post" style="display: inline;">
                                                                    @method('delete')
                                                                    @csrf
                                                                    <input type="submit" value="Hapus" class="btn btn-danger btn-sm shadow-none">
                                                                </form> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
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