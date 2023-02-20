<!--CARA 1-->
<?php
    //mendeklarasikan variabel
    $a = 1;
    $b = 2;
    //membuat fungsi
    function cara_satu() {
        //memanggil nilai dari variabel yang diluar
        global $a, $b;
        $hasil = $a + $b;
        return $hasil;}
    //melakukan pemanggilan fungsi
    echo "Output Cara ke 1 :<br>";
    echo "Hasil dari ". $a. "+". $b. " = ". cara_satu();
?>

<!--CARA 2-->
<?php
    //mendeklarasikan variabel
    $a = 1;
    $b = 2;
    //membuat fungsi
    function cara_dua() {
                //memanggil nilai dari variabel yang diluar
        $a = $GLOBALS['a'];
        $b = $GLOBALS['b'];
        $hasil = $a + $b;
        return $hasil;}
    //melakukan pemanggilan fungsi
    echo "<br>Output Cara ke 2 :";
    echo "<br>Hasil dari ". $a. "+". $b. " = ". cara_dua();
?>