<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Penghuni</title>
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
                <h3 class="mb-4">Penghuni</h3>

                <!-- General Carousel Section -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <div>
                                <button><i class="bi bi-check"></i></button> : Konfirmasi Kedatangan <button><i class="bi bi-x"></i></button> : Cancel
                            </div>
                            <form>
                                <div class="input-group">
                                    <input type="text" class="form-control" style="width: 500px" placeholder="  Enter username ..." id="inputGender" onkeyup="filterGender()">
                                </div>
                            </form>
                        </div>

                        {{-- @if(count($booking)) --}}
                            <div class="table-responsive-md" style="height: 450px;">
                                <table class="table table-hover border" id="tabel">
                                    <thead class="sticky-top text-center">
                                        <tr class="bg-dark text-light">
                                            <th scope="col">#</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">Kost</th>
                                            <th scope="col">Tanggal</th>
                                            <th scope="col">Tenggat</th>
                                            <th scope="col">Status Pembayaran</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        @foreach ($booking as $bk)
                                            <tr>
                                                <td>{{ $bk->id }}</td>
                                                <td>{{ $bk->customer['username'] }}</td>
                                                <td> Kost {{ $bk->kost['nama'] }} </td>
                                                <td> {{ $bk->checkIn }} </td>
                                                <td> {{ $bk->checkOut }} </td>
                                                <td>{{ $bk->status }}</td>
                                                <td>
                                                    <button data-bs-toggle="modal">
                                                        <a href="/antrianedit/{{ $bk->id }}" ><i class="bi bi-check"></i><a>
                                                    </button>
                                                    <button data-bs-toggle="modal">
                                                        <a href="/antrianback/{{ $bk->id }}" ><i class="bi bi-x"></i><a>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        {{-- @else
                            <p class="text-center"> Belum Ada Pesanan / Antrian </p>
                        @endif --}}
                    </div>
                </div>
            </div>
        </div>
    </div>


    @include('admin/inc/script')

    <script>
        function filterGender() {
            var i;
            var inputGender = document.getElementById("inputGender");
            var filter = inputGender.value.toUpperCase();
            var tabel = document.getElementById("tabel");
            var tr = tabel.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                var td = tr[i].getElementsByTagName("td")[1];
                if (td) {
                    if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";}
                    else {
                        tr[i].style.display = "none";}
        }}}
    </script>
    
</body>
</html>