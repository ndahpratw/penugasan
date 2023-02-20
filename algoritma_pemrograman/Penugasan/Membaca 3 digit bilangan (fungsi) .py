def terbilang(bil):
    angka = ("","Satu","Dua","Tiga","Empat","Lima","Enam","Tujuh","Delapan","Sembilan","Sepuluh","Sebelas")
    Hasil = " "
    n = int(bil)
    if n >= 0 and n <= 11:
        Hasil = Hasil + angka[n]
    elif n < 20:
        Hasil = terbilang(n % 10) + " belas"
    elif n < 100:
        Hasil = terbilang(n / 10) + " Puluh" + terbilang(n % 10)
    elif n < 200:
        Hasil = "Seratus" + terbilang(n - 100)
    elif n < 1000:
        Hasil = terbilang(n / 100) + " Ratus" + terbilang(n %100) 
    return Hasil
bil = input("Masukkan angka max 3 digit : ")
Hasil= terbilang(bil)
print (Hasil)