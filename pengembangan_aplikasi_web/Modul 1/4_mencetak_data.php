<!DOCTYPE html>
<html lang="en">
<head>
    <title>Menampilkan Data</title>
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
            margin-top:10px;
            margin-bottom:0px;
        }
        .ket{
            color: black;
        }
        section {
            background-color: white;
            margin-top: 3px;
            border-radius: 10px;
            padding: 10px;
            width: 250px;
            margin-left:50px;
        }
    </style>
</head>
<body>
    <h1>Modul III : PHP Looping</h1>
    <p>Nama : Indah Pratiwi | NIM : 210411100050</p>

    <section>
        <!--Menggunakan While Loop-->
        <p class="ket">Menggunakan While Loop<br></p> 
        <?php
            $iterasi = 1;
            $data = 1;
            while($data <= 5) {
                echo "data ke : ". $iterasi. " --> ". $data. "<br>";
                $iterasi++;
                $data++;
            }
        ?>

        <!--Menggunakan Do-While-->
        <p class="ket">Menggunakan Do - While</p>
        <?php
            $iterasi = 1;
            $data = 1;
            do {
                echo "data ke : ". $iterasi. " --> ". $data. "<br>";
                $iterasi++;
                $data++;
            }
            while($data <= 5)
        ?> 

        <!--Menggunakan For Loop-->
        <p class="ket">Menggunakan For Loop</p>
        <?php
            for($data = 1; $data <= 5;){
                $iterasi = 1;
                echo "data ke : ". $iterasi. " --> ". $data. "<br>";
                $iterasi++;
                $data++;
            }
        ?>
    </section>
</body>
</html>