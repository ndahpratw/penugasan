<!DOCTYPE html> 
<html>
    <head>
        <title>Modul V - PHP Fungsi</title>
    </head>

    <!-- Bagian CSS -->
    <style type="text/css">
        body{
            background-color: gray;
        }
        h1{
            text-align: center;
            text-shadow: 2px 1px 1px white;
            font-size: 35px;
        }
        p {
            text-align: center;
            color: white;
            margin-top:0px;
        }
        section {
            width: fit-content;
            background-color: white;
            margin-top: 3px;
            border-radius: 10px;
            padding: 10px;
        }
        .atur{
            display: flex;
            justify-content: center;
        }
    </style>

    <body>

        <h1>Modul V : PHP Fungsi</h1>
        <p>Nama : Indah Pratiwi | NIM : 210411100050</p>

        <div class="atur">
            <section>
                <?php
                    //fungsi untuk melakukan penambahan pada kedua bilangan
                    function tambah($angka_pertama, $angka_kedua){
                        $tambah = $angka_pertama + $angka_kedua;
                        echo "Hasil pertambahan dari ". $angka_pertama. " + ". $angka_kedua. " = ". $tambah. "<br>";
                    }

                    //fungsi untuk melakukan perkalian pada kedua bilangan
                    function kali($angka_pertama, $angka_kedua){
                        $kali = $angka_pertama * $angka_kedua;
                        echo "Hasil perkalian dari ". $angka_pertama. " * ". $angka_kedua. " = ". $kali. "<br>";
                    }

                    //fungsi untuk melakukan pembagian pada kedua bilangan
                    function bagi($angka_pertama, $angka_kedua){
                        $bagi = $angka_pertama / $angka_kedua;
                        echo "Hasil pembagian dari ". $angka_pertama. " / ". $angka_kedua. " = ". $bagi. "<br>";
                    }

                    //pemanggilan fungsi jumlah
                    echo "<pre>Pemanggilan Fungsi Jumlah()</pre>";
                    tambah(5,7);
                    tambah(3,3);
                    tambah(6,4);
                    echo "<br>";

                    //pemanggilan fungsi kali
                    echo "<pre>Pemanggilan Fungsi Kali()</pre>";
                    kali(5,7);
                    kali(3,3);
                    kali(6,4);
                    echo "<br>";

                    //pemanggilan fungsi bagi
                    echo "<pre>Pemanggilan Fungsi Bagi()</pre>";
                    bagi(5,7);
                    bagi(3,3);
                    bagi(6,4);
                    echo "<br>";
                ?>
            </section>
        </div>
    </body>
</html>