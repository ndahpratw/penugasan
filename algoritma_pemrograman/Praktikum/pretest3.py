import json
print('\tSelamat Datang\n')
buka = open("menu makan dan minum.json", "r")
print(buka.read())
order = input('Apakah anda ingin memesan <y/t> ? ')
while True :
    if order == 'y':
        pembeli = input('Masukkan Nama Anda : ')
        makanan = input('Makanan Yang Dipesan = ')
        jumlah_makanan = int(input('Jumlah = '))
        pesananmakan = {"nama": [pembeli], "makanan": [makanan], "jumlah": [jumlah_makanan]}
        minuman = input('Minuman Yang Dipesan = ')
        jumlah_minuman = int(input('Jumlah = '))
        pesananminum = {"nama": [pembeli], "minuman": [minuman], "jumlah": [jumlah_minuman]}
        print('\nSilahkan Tunggu Pesanan Tiba\n')
        break
    else:
        print('Pesanan Dibatalkan')
        break
with open("pesananmakan.json", "w") as json_file:
    json.dump(pesananmakan, json_file)
with open("pesananminum.json", "w") as json_file:
    json.dump(pesananminum, json_file)

#modul 2
menu=[]

import json
with open("menu makan dan minum.json") as jsonya:
    lihat_menu = json.loads(jsonya.read())
    print("==========MENU============")
    print("=========MAKANAN==========")
    for makanan in lihat_menu["Menu Makanan"]:
                print(makanan)
    print("=========MINUMAN==========")
    for minuman in lihat_menu["Menu Minuman"]:
                print(minuman)
opsi = input("operasi pada menu <tambah/kurang>:")
if opsi == 'tambah':
    with open("menu makan dan minum.json") as jsonya:
        lihat_menu = json.loads(jsonya.read())
        print("==========MENU============")
        print("=========MAKANAN==========")
        tambah_makan = input("ingin menambahkan makanan apa :")
        lihat_menu["Menu Makanan"].append(tambah_makan)

        print("=========MINUMAN==========")
        tambah_minum = input("ingin menambahkan minuman apa :")
        lihat_menu["Menu Minuman"].append(tambah_minum)
        for makanan in lihat_menu["Menu Makanan"]:
            print(makanan)
        for minuman in lihat_menu["Menu Minuman"]:
            print(minuman)
elif opsi == 'kurang':
    print("==========MENU============")
    print("=========MAKANAN==========")
    kurang_makan = input("ingin menghapus list makanan apa :")
    lihat_menu["Menu Makanan"].remove(kurang_makan)
    for makanan in lihat_menu["Menu Makanan"]:
        print(makanan)
    print("=========MINUMAN==========")
    kurang_minum = input("ingin menghapus list minuman apa :")
    lihat_menu["Menu Minuman"].remove(kurang_minum)
    print("=========MAKANAN==========")
    for makanan in lihat_menu["Menu Makanan"]:
        print(makanan)
    print("=========MINUMAN==========")
    for minuman in lihat_menu["Menu Minuman"]:
        print(minuman)

print('PEMBAYARAN')
try :
    a = int(input('Masukkan Harga'))
except : 
    print('Inputan Tidak Bisa Huruf')
finally:
    print('pembayaran selesai')