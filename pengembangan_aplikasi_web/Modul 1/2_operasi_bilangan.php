<!DOCTYPE html> 

<html>

    <head>
        <title>Operasi Bilangan</title>
    </head>

    <!-- Bagian CSS -->
    <style type="text/css">
        body{
            background-color: gray;
            margin-left: 450px;
            margin-right: 450px;
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
        form {
            border:1px solid black;
            border-radius: 5px;
            background-color: #3d4c51;
            padding: 5px;
        }
        input{
            margin-bottom: 5px;
            font-size: 15px;
        }
        .bil1::after{
            content: ":";
            margin-left: 12px;
            margin-right: 5px;
        }
        .bil2::after{
            content: ":";
            margin-left: 26px;
            margin-right: 4px;
        }
        .button {
            border: 1px solid black;
            border-radius: 5px;
            background-color: #363737;
        }
        .button:hover {
            background-color: gray;
        }
        section {
            background-color: white;
            margin-top: 3px;
            border-radius: 10px;
            padding: 10px;
        }
    </style>

    <body>

        <h1>Modul III : PHP Variabel dan Tipe Data</h1>
        <p>Nama : Indah Pratiwi | NIM : 210411100050</p>
        
        <!--bagian inputan-->
        <form action="" method="post">
            <label class="bil1">Bilangan pertama</label>
            <input type="number" name="angka_pertama">
            <br>
            <label class="bil2">Bilangan kedua</label>
            <input type="number" name="angka_kedua">
            <br>
            <input type="submit" name="submit" value="hitung" class="button">
        </form>

        <section>
        <?php
            //tipe data string
            $teks = "Berikut Adalah Hasil Operasi Dari : <br>"; 
            echo $teks;

            //tipe data pada angka adalah integer karena inputan tidak menerima bilangan koma
            if (isset($_POST['submit'])){
                $angka_pertama = $_POST['angka_pertama'];
                $angka_kedua = $_POST["angka_kedua"];
                echo "<br>";
                echo "Angka pertama : ". $angka_pertama;
                echo "<br>";
                echo "Angka kedua &nbsp;&nbsp;&nbsp;: ". $angka_kedua;
                echo "<br/>";

                //fungsi untuk melakukan penambahan pada kedua bilangan
                function tambah($angka_pertama, $angka_kedua){
                    $tambah = $angka_pertama + $angka_kedua;
                    echo "<br>";
                    echo "Hasil pertambahan  <br>";
                    echo "&nbsp;&nbsp;". $angka_pertama. " + ". $angka_kedua. " = ". $tambah. "<br>";
                    echo "<br/>";
                }

                //fungsi untuk melakukan pengurangan pada kedua bilangan
                function kurang($angka_pertama, $angka_kedua){
                    $kurang = $angka_pertama - $angka_kedua;
                    echo "Hasil pengurangan  <br>";
                    echo "&nbsp;&nbsp;". $angka_pertama. " - ". $angka_kedua. " = ". $kurang. "<br>";
                    echo "<br/>";
                }

                //fungsi untuk melakukan perkalian pada kedua bilangan
                function kali($angka_pertama, $angka_kedua){
                    $kali = $angka_pertama * $angka_kedua;
                    echo "Hasil perkalian  <br>";
                    echo "&nbsp;&nbsp;". $angka_pertama. " x ". $angka_kedua. " = ". $kali. "<br>";
                    echo "<br/>";
                }

                //fungsi untuk melakukan pembagian pada kedua bilangan
                function bagi($angka_pertama, $angka_kedua){
                    $bagi = $angka_pertama / $angka_kedua;
                    echo "Hasil pembagian  <br>";
                    echo "&nbsp;&nbsp;". $angka_pertama. " / ". $angka_kedua. " = ". $bagi. "<br>";
                    echo "<br/>";
                }

                //pemanggilan fungsi
                tambah($angka_pertama, $angka_kedua);
                kurang($angka_pertama, $angka_kedua);
                kali($angka_pertama, $angka_kedua);
                bagi($angka_pertama, $angka_kedua);
            }
        ?>
        </section>
        
    </body>

</html>