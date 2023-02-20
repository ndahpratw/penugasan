while True :
    try:
        a = int(input('Masukkan bilangan asli : '))
        print(a)
    except:
        print('harap untuk memeriksa kembali inputan anda')
    else:
        print('program berhasil dijalankan')


#2
while True :
    a = input('Masukkan angka : ')
    try:
        b = int(a)
    except:
        print('periksa kembali inputan anda')
    else:
        print('berhasil mengonversi')
    finally :
        print('-' * 50)


#3
try:
    a = int(input('Masukkan nilai : '))
    rumus = a / 0
    print('hasilnya adalah', rumus)
except:
    print('pembagian tidak bisa dilakukan')
    raise Exception ('program error')


#4
while True:
    print("\n")
    print("file saya adalah 'nama buah'")
    try:
        namafile = input("masukkan nama file anda : ")
        buka = open(namafile + ".txt", "r")
        print(buka.read())
    except:
        print("file tidak ditemukan")
    else:
        print("file ditemukan")
    finally:
        print("program selesai")
        break