import json

print('\tSelamat Datang di I - Cafe\n')

with open("menu makan dan minum.json") as jsonya:
    lihat_menu = json.loads(jsonya.read())
    print("Menu Makanan : ")
    for makanan in lihat_menu["Menu Makanan"]:
        print(makanan)
    print("\nMenu Minuman : ")
    for minuman in lihat_menu["Menu Minuman"]:
        print(minuman)

order = input('\nApakah anda ingin memesan <y/t> ? ')
while True :
    if order == 'y':
        pembeli = input('Masukkan Nama Anda : ')
        makanan = input('Makanan Yang Dipesan = ').lower()
        jumlah_makanan = int(input('Jumlah = '))
        pesananmakan = {"nama": [pembeli], "makanan": [makanan], "jumlah": [jumlah_makanan]}
        minuman = input('Minuman Yang Dipesan = ').lower()
        jumlah_minuman = int(input('Jumlah = '))
        pesananminum = {"nama": [pembeli], "minuman": [minuman], "jumlah": [jumlah_minuman]}
        print('\nSilahkan Melunasi Pembayaran\n')
        break
    else:
        print('Pesanan Dibatalkan')
        break

total = 0
if makanan == "kentang goreng":
    total += ( 5000 * jumlah_makanan )
if makanan == "sosis bakar":
    total += ( 5000 * jumlah_makanan )
if makanan == "pentol bakar":
    total += ( 5000 * jumlah_makanan )
if makanan == "corndog":
    total += ( 10000 * jumlah_makanan )
if makanan == "crepes":
    total += ( 5000 * jumlah_makanan )
if makanan == "waffle":
    total += ( 10000 * jumlah_makanan )
if minuman == "air botol":
    total += ( 3000 * jumlah_minuman )
if minuman == "es teh":
    total += ( 3000 * jumlah_minuman )
if minuman == "es jeruk":
    total += ( 3000 * jumlah_minuman )
if minuman == "teh hangat":
    total += ( 3000 * jumlah_minuman )
if minuman == "coklat panas":
    total += ( 5000 * jumlah_minuman )
if minuman == "matcha latte":
    total += ( 7000 * jumlah_minuman )
if minuman == "kopi":
    total += ( 3000 * jumlah_minuman )

with open("pesananmakan.json", "w") as json_file:
    json.dump(pesananmakan, json_file)
with open("pesananmakan.json") as jsonya:
    data_pesanan = json.loads(jsonya.read())
    for data in data_pesanan["nama"]:
        print("Nama    : ",data)
    for data in data_pesanan["makanan"]:
        print("Pesanan : ",data)
        print(".............................. x", jumlah_makanan)

with open("pesananminum.json", "w") as json_file:
    json.dump(pesananminum, json_file)
with open("pesananminum.json") as jsonya:
    data_pesanan = json.loads(jsonya.read())
    for data in data_pesanan["minuman"]:
        print("          ",data)
        print(".............................. x", jumlah_minuman)

print("Total   : ", total)

bayar = int(input("masukkan uang anda :"))
while True:
    if bayar == total:
        print("\nPembayaran Berhasil Dilakukan")
        print("Silahkan Menunggu Pesanan Tiba")
        break
    elif bayar > total :
        kembalian = bayar - total
        print("\nPembayar Berhasil Dilakukan, silahkan Ambil Kembalian Anda : (", kembalian, ")")
        print("Silahkan Menunggu Pesanan Tiba")
        break
    elif bayar < total :
        a = total - bayar
        while True :
            print("Mohon maaf, uang yang anda masukkan kurang Rp. ", a)
            kurangnya = int(input("Masukkan tambahan : "))
            if kurangnya == a:
                print("\nPembayaran Berhasil Dilakukan")
                print("Silahkan Menunggu Pesanan Tiba")
                break
            elif kurangnya < a :
                a = a - kurangnya
            break
    else:
        print("Mohon Lakukan Pembayaran Terlebih Dahulu")   