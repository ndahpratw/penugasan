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
                <h3 class="mb-4">Informasi Pengguna Keisuke's Boarding House</h3>

                <!-- General Carousel Section -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <p>
                            <button class="btn btn-secondary" data-bs-toggle="collapse" href="#admins" role="button" aria-expanded="false" aria-controls="admins">
                                Admin
                            </button>
                            <button class="btn btn-secondary" type="button" data-bs-toggle="collapse" data-bs-target="#customer" aria-expanded="false" aria-controls="customer">
                                Customer
                            </button>
                            <button class="btn btn-secondary" type="button" data-bs-toggle="collapse" data-bs-target="#pemilik" aria-expanded="false" aria-controls="pemilik">
                                Pemilik Kost
                            </button>
                        </p>

                          <div class="collapse" id="admins">
                            <div class="card card-body">
                                Total = {{ count($admin) }} admin
                                @if(count($admin))
                                    <div class="table-responsive-md mt-3">
                                        <table class="table table-hover border" id="tabel">
                                            <thead class="sticky-top text-center">
                                                <tr class="bg-dark text-light">
                                                    <th scope="col"></th>
                                                    <th scope="col">Username</th>
                                                    <th scope="col">Email</th>
                                                    <th scope="col">Telepon</th>
                                                    <th scope="col">Alamat</th>
                                                    <th scope="col">Tanggal Lahir</th>
                                                    <th scope="col">Sejak</th>
                                                    {{-- <th scope="col">Action</th> --}}
                                                </tr>
                                            </thead>
                                            <tbody class="text-center">
                                                @foreach ($admin as $a)
                                                    <tr>
                                                        <td>{{ $a->id }}</td>
                                                        <td>{{ $a->username }}</td>
                                                        <td>{{ $a->email }}</td>
                                                        <td>{{ $a->telepon }}</td>
                                                        <td>{{ $a->alamat }}</td>
                                                        <td>{{ $a->tanggal_lahir }}</td>
                                                        <td>{{ $a->created_at }}</td>
                                                        {{-- <td>
                                                            <button data-bs-toggle="modal">
                                                                <a href="/antrianedit/{{ $bk->id }}" ><i class="bi bi-check"></i><a>
                                                            </button>
                                                            <button data-bs-toggle="modal">
                                                                <a href="/antrianback/{{ $bk->id }}" ><i class="bi bi-x"></i><a>
                                                            </button>
                                                        </td> --}}
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @else
                                    <p class="text-center"> Data Admin Belum Ada </p>
                                @endif
                            </div>
                          </div>

                          <div class="collapse" id="customer">
                            <div class="card card-body">
                                Total = {{ count($customer) }} customer
                                @if(count($customer))
                                    <div class="table-responsive-md mt-3">
                                        <table class="table table-hover border" id="tabel">
                                            <thead class="sticky-top text-center">
                                                <tr class="bg-dark text-light">
                                                    <th scope="col"></th>
                                                    <th scope="col">Username</th>
                                                    <th scope="col">Email</th>
                                                    <th scope="col">Telepon</th>
                                                    <th scope="col">Alamat</th>
                                                    <th scope="col">Tanggal Lahir</th>
                                                    <th scope="col">Sejak</th>
                                                    {{-- <th scope="col">Action</th> --}}
                                                </tr>
                                            </thead>
                                            <tbody class="text-center">
                                                @foreach ($customer as $cm)
                                                <tr>
                                                    <td>{{ $cm->id }}</td>
                                                    <td>{{ $cm->username }}</td>
                                                    <td>{{ $cm->email }}</td>
                                                    <td>{{ $cm->telepon }}</td>
                                                    <td>{{ $cm->alamat }}</td>
                                                    <td>{{ $cm->tanggal_lahir }}</td>
                                                    <td>{{ $cm->created_at }}</td>
                                                    {{-- <td>
                                                        <button data-bs-toggle="modal">
                                                            <a href="/antrianedit/{{ $bk->id }}" ><i class="bi bi-check"></i><a>
                                                        </button>
                                                        <button data-bs-toggle="modal">
                                                            <a href="/antrianback/{{ $bk->id }}" ><i class="bi bi-x"></i><a>
                                                        </button>
                                                    </td> --}}
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @else
                                    <p class="text-center"> Data Customer Belum Ada</p>
                                @endif
                            </div>
                          </div>

                          <div class="collapse" id="pemilik">
                            <div class="card card-body">
                                Total = {{ count($pemilik) }} pemilik kost
                                @if(count($pemilik))
                                    <div class="table-responsive-md mt-3">
                                        <table class="table table-hover border" id="tabel">
                                            <thead class="sticky-top text-center">
                                                <tr class="bg-dark text-light">
                                                    <th scope="col"></th>
                                                    <th scope="col">Username</th>
                                                    <th scope="col">Email</th>
                                                    <th scope="col">Telepon</th>
                                                    <th scope="col">Alamat</th>
                                                    <th scope="col">Tanggal Lahir</th>
                                                    <th scope="col">Sejak</th>
                                                    {{-- <th scope="col">Action</th> --}}
                                                </tr>
                                            </thead>
                                            <tbody class="text-center">
                                                @foreach ($pemilik as $item)
                                                <tr>
                                                    <td>{{ $item->id }}</td>
                                                    <td>{{ $item->username }}</td>
                                                    <td>{{ $item->email }}</td>
                                                    <td>{{ $item->telepon }}</td>
                                                    <td>{{ $item->alamat }}</td>
                                                    <td>{{ $item->tanggal_lahir }}</td>
                                                    <td>{{ $item->created_at }}</td>
                                                    {{-- <td>
                                                        <button data-bs-toggle="modal">
                                                            <a href="/antrianedit/{{ $bk->id }}" ><i class="bi bi-check"></i><a>
                                                        </button>
                                                        <button data-bs-toggle="modal">
                                                            <a href="/antrianback/{{ $bk->id }}" ><i class="bi bi-x"></i><a>
                                                        </button>
                                                    </td> --}}
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @else
                                    <p class="text-center"> Data Customer Belum Ada</p>
                                @endif
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