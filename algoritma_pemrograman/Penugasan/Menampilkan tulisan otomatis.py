print("Menampilkan Tulisan Otomatis")

nama = str(input("Nama susu :"))
harga = int(input("Harga susu: "))
jumlah = int(input("Jumlah susu :"))
jumlah_harga = harga*jumlah
diskon_mingguan = jumlah_harga * (10/100)
harga_mingguan = jumlah_harga - diskon_mingguan
diskon_bulanan = jumlah_harga*(30/100)
harga_bulanan = jumlah_harga - diskon_bulanan


print (diskon_mingguan)
print (diskon_bulanan)

print("Output")
print ("Susu", nama, "adalah salah satu produk susu yang cukup laris.")
print ("Harga susu", nama, "ini adalah", harga)
print ("Jika kita membeli", jumlah, ", maka kita harus membayar sebesar", jumlah_harga)
print ("Namun pada saat akhir minggu ada diskon sebesar 10%, sehingga kita hanya perlu membayar sebesar",harga_mingguan)
print ("Pada akhir bulan ada promo tambahan yaitu setiap pembelian akan mendapat bonus tambahan produk susu", nama,"sebanyak 30% dari jumlah sus yang kita beli, jadi kita akan mendapat", harga_bulanan, "kotak tambahan susu")