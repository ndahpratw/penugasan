<?php
    // mengaktifkan session
    session_start();
    if(!isset($_SESSION['login']))
    {
    header('location:halaman_login.php');
    exit();
    }

    //multidimensional array
    $mahasiswa = array(
        array(
            "nama" => "Indah Pratiwi",
            "nim" => 210411100050,
            "alamat" => "Bangkalan",
        ),
        array(
            "nama" => "Muhammad Haikal",
            "nim" => 210411100150,
            "alamat" => "Bandung",
        ),
        array(
            "nama" => "Lee Haechan",
            "nim" => 210411100250,
            "alamat" => "Malang",
        ),
    );
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
        <title>Data Mahasiswa</title>
        <style type="text/css">
            table{
                border: 1px solid gray;
            } 
            th, td{
                text-align: center;
            }
        </style>
    </head>
    <body>
        <div class="container mt-3">
            <h1>Daftar Mahasiswa</h1>

            <table class="table table-striped">
                <thead class="table-dark">
                    <tr>
                    <th>Nama Mahasiswa</th>
                    <th>NIM</th>
                    <th>Alamat</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($mahasiswa as $mhs) { ?>
                        <tr>
                            <td> <?php echo $mhs["nama"]; ?> </td>
                            <td> <?php echo $mhs["nim"]; ?> </td>
                            <td> <?php echo $mhs["alamat"]; ?> </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <a href="logout.php" class="btn btn-secondary">Logout</a>
        </div>
    </body>
</html>