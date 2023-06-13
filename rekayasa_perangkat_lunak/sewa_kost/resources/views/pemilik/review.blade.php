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
                <h3 class="mb-4">Review</h3>

                @if (session()->has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- General Carousel Section -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <div></div>
                            <form>
                                <div class="input-group">
                                    <input type="text" class="form-control" style="width: 500px" placeholder="  Enter review ..." id="input" onkeyup="filterSearch()">
                                </div>
                            </form>
                        </div>

                        @if(count($testimonial))
                            <div class="table-responsive-md" style="height: 450px;">
                                <table class="table table-hover border" id="tabel">
                                    <thead class="sticky-top text-center">
                                        <tr class="bg-dark text-light">
                                            <th scope="col">#</th>
                                            <th scope="col">Kost</th>
                                            <th scope="col">Penghuni</th>
                                            <th scope="col">Tangal sewa</th>
                                            <th scope="col">Rating</th>
                                            <th scope="col">Review</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        @foreach ($testimonial as $item)
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>Kost {{ $item->kost['nama'] }}</td>
                                                <td>{{ $item->customer['username'] }}</td>
                                                <td>
                                                    Check In : {{ $item->checkIn }} <br>
                                                    Check Out : {{ $item->checkOut }} <br>
                                                </td>
                                                <td>{{ $item->rating }}</td>
                                                <td>{{ $item->testimoni }}</td>
                                                <td>
                                                    <button type="button" data-bs-toggle="modal" data-bs-target="#hapus<?php echo $item['id']?>"><i class="bi bi-trash"></i></button>
                                                    <div class="modal fade" id="hapus<?php echo $item['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-body">
                                                                    <p style="color: black">Apakah anda yakin untuk menghapusnya?</p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary btn-sm shadow-none" data-bs-dismiss="modal">Tidak</button>
                                                                    <form action="/review/{{ $item->id }}" method="post" style="display: inline;">
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
                        @else
                            <p class="text-center"> Belum Ada Review </p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>


    @include('admin/inc/script')

    <script>
        function filterSearch() {
            var i;
            var inputGender = document.getElementById("input");
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
    
</body>
</html>