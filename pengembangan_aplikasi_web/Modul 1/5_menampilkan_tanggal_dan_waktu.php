<!DOCTYPE html>
<html>
<head>
    <title>Kalender</title>
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
        section {
            background-color: white;
            margin-top: 3px;
            border-radius: 10px;
            padding: 10px;
        }
        .button {
            border: 1px solid black;
            border-radius: 5px;
            background-color: #404149;
            width: 100px;
            text-align: center;
            margin: 5px 140px;
        }
        .button:hover {
            background-color: #c0c0c0;
        }
    </style>
</head>
<body>

    <h1>Modul IV : PHP Kondisional</h1>
    <p>Nama : Indah Pratiwi | NIM : 210411100050</p>

    <section>
        <?php
            date_default_timezone_set('Asia/Jakarta');

            function nama_hari ($day) {
                switch ($day) {
                case 'Sunday':
                    return 'Minggu';
                case 'Monday':
                    return 'Senin';
                case 'Tuesday':
                    return 'Selasa';
                case 'Wednesday':
                    return 'Rabu';
                case 'Thursday':
                    return 'Kamis';
                case 'Friday':
                    return 'Jumat';
                case 'Saturday':
                    return 'Sabtu';
                }}

            $day = date('l');
            $translate_day = nama_hari($day);
            echo "<pre>Hari    : {$translate_day}</pre>";
            
            #Cara 1 : pendekatan prosedural
            echo "<pre>Tanggal : ". date('d F Y') . "</pre>";
            echo "<pre>Pukul   : ". date('H:i') .  "</pre>";

            #Cara 2 : pendekatan objek
            // $waktu = new DateTime();
            // echo "<pre>Tanggal : ". $waktu->format('d F Y'). "</pre>";
            // echo "<pre>Pukul   : ". $waktu -> format('H:i'). "</pre>";
        ?>
    </section>
    <input type="button" value="Perbaharui" onClick="document.location.reload(true)" class="button">
</body>
</html>