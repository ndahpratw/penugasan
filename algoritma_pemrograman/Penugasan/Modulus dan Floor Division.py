print("Menampilkan n karakter awal dan akhir dari string yang diinputkan")

kata = str(input("masukkan kata :"))
n_dari_awal = int(input("n dari awal :"))
n_dari_akhir = int(input("n dari akhir :"))

print ("kata awal :", kata[0:n_dari_awal])
print ("kata akhir :", kata[n_dari_akhir:])

print("\nPerbedaan Modulus, Floor Division")
a = float(input("masukkan nilai a :"))
b = float(input("masukkan nilai b :"))


print("Modulus")
hasil = a % b
print(a,'%',b,'=', hasil)

print("Floor Division")
hasil = a // b
print(a,'//',b,'=', hasil)

print("Pangkat")
hasil = a ** b
print(a,'**',b,'=', hasil)