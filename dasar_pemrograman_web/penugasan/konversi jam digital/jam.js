window.onload = function() {jam();button();konversi(jam)}

function jam() {
    var a = document.getElementById('jam'),
    d = new Date (), j, m, d;
    j = d.getHours();
    m = set(d.getMinutes());
    d = set(d.getSeconds());

    a.innerHTML = j + ":" + m + ":" + d;

    setTimeout('jam()', 1000)
}

function set(a) {
    a = a < 10 ? '0' + a : a;
    return a;
}

function button() {
    var c = document.getElementById("button")
    c.addEventListener("click", function(){
        var a = document.getElementById('jam'),
        d = new Date (), j, m, d;
        j = d.getHours();
        m = set(d.getMinutes());
        d = set(d.getSeconds());

        a.innerHTML = "jam " + j + " lewat " + m + " menit " + d + " detik ";

        alert(a.innerHTML)
    });
}