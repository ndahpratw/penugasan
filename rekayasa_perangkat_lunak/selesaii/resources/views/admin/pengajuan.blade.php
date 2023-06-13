<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Pengajuan</title>
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
                <h3 class="mb-4">Pengajuan</h3>

                <!-- General Carousel Section -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <div>
                                <button><i class="bi bi-check"></i></button> : Konfirmasi Pengajuan
                            </div>
                            <form>
                                <div class="input-group">
                                    <input type="text" class="form-control" style="width: 500px" placeholder="  Enter subjek ..." id="username" onkeyup="filterNama()">
                                </div>
                            </form>
                        </div>

                        @if(count($pengajuan))
                            <div class="table-responsive-md" style="height: 450px;">
                                <table class="table table-hover border" id="tabel">
                                    <thead class="sticky-top text-center">
                                        <tr class="bg-dark text-light">
                                            <th scope="col">#</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">Tanggal</th>
                                            <th scope="col">Jenis Pengajuan</th>
                                            <th scope="col">Pesan</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        @foreach ($pengajuan as $item)
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->customer['username'] }}</td>
                                                <td>{{ $item->created_at }}</td>
                                                <td>{{ $item->subjek }}</td>
                                                <td>{{ $item->pesan }}</td>
                                                <td>
                                                    <button data-bs-toggle="modal">
                                                        <a href="/pengajuanselesai/{{ $item->id }}" ><i class="bi bi-check"></i><a>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <p class="text-center"> Belum Ada Pengajuan </p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function filterNama() {
            var i;
            var inputGender = document.getElementById("username");
            var filter = inputGender.value.toUpperCase();
            var tabel = document.getElementById("tabel");
            var tr = tabel.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                var td = tr[i].getElementsByTagName("td")[3];
                if (td) {
                    if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";}
                    else {
                        tr[i].style.display = "none";}
        }}}
    </script>

    @include('admin/inc/script')
    
</body>
</html>