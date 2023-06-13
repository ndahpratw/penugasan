window.onload = function() {jam()}

//menampilkan jam digital
function jam() {
    var a = document.getElementById('jam'),
    waktu = new Date ();
    jamm = waktu.getHours();
    if ( jamm > 12 ){
        sesi = "pm"
    } else {
        sesi = "am"
    }
    menit = waktu.getMinutes();
    detik = waktu.getSeconds();

    a.innerHTML = jamm + " : " + menit + " : " + detik + "  " + sesi;

    setTimeout('jam()', 1000)
}