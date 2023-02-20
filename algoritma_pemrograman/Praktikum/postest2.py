print('Menghitung Kelipatan Dari x^2 Sampai x')
x = int(input("masukkan angka : "))
angka = x**2
while angka >= x:
    print(angka)
    angka -= x

print('Program Hitung Mundur')
z = int(input('Masukan Angka : '))
for i in range (z, 0, -1):
    print(i)

print('Program Mari Berhitung')
angka = 0
while True:
    opsi = input ('Mulai berhitung <y/t> ? ')
    if opsi == 'y':
        angka += 1
        print(angka)
    elif opsi == 't':
        print('berhitung selesai')
        break
    else:
        print('inputan salah')

list_nama = ['indah','iin','pratiwi','ara','rara','tiwi','yulia','nanda','ivne','fara','ananda'
        ,'rama','ahmad','indra','indro','indi','irul','arul','putri','sabrina']
list_nilai = [33,55,35,64,64,38,67,85,96,46,23,87,90,32,76,46,88,65,15,89]
opsi = input("masukkan jenis program : ")
while True :
    if opsi == 'a':
        def nilai_tertinggi(list_nilai):
          nilai_terbesar = list_nilai[0]
          for nilai in list_nilai:
            if nilai > nilai_terbesar:
              nilai_terbesar = nilai
          return nilai_terbesar

        max = max(list_nilai)
        index_a = list_nilai.index(max)
        print('Nilai tertinggi adalah', list_nama[index_a],':',nilai_tertinggi(list_nilai))

        def nilai_terendah(list_nilai):
          nilai_terkecil = list_nilai[0]
          for nilai in list_nilai:
            if nilai < nilai_terkecil:
              nilai_terkecil = nilai
          return nilai_terkecil

        min = min (list_nilai)
        index_b = list_nilai.index(min)
        print('Nilai terendah adalah', list_nama[index_b],':',nilai_terendah(list_nilai))

        for list_nama,list_nilai in zip(list_nama,list_nilai):
            print(list_nama,':', list_nilai)
            
    elif opsi == 'b':
        print('Mahasiswa Yang Lulus (Nilai > 65)')
        list_nama = ['indah','iin','pratiwi','ara','rara','tiwi','yulia','nanda','ivne','fara','ananda'
        ,'rama','ahmad','indra','indro','indi','irul','arul','putri','sabrina']
        list_nilai = [33,55,35,64,64,38,67,85,96,46,23,87,90,32,76,46,88,65,15,89]
        for list_nama,list_nilai in zip(list_nama,list_nilai):
            if list_nilai > 65:
                print(list_nama,':',list_nilai)
            else:
                continue
    
    elif opsi == 'c':
        print('Mahasiswa Yang Tidak Lulus (Nilai < 65)')
        list_nama = ['indah','iin','pratiwi','ara','rara','tiwi','yulia','nanda','ivne','fara','ananda'
        ,'rama','ahmad','indra','indro','indi','irul','arul','putri','sabrina']
        list_nilai = [33,55,35,64,64,38,67,85,96,46,23,87,90,32,76,46,88,65,15,89]
        for list_nama,list_nilai in zip(list_nama,list_nilai):
            if list_nilai <= 65:                
                print(list_nama,':',list_nilai)
            else:
                continue

    elif opsi == 'd':
        list_nama = ['indah','iin','pratiwi','ara','rara','tiwi','yulia','nanda','ivne','fara','ananda'
        ,'rama','ahmad','indra','indro','indi','irul','arul','putri','sabrina']
        list_nilai = [33,55,35,64,64,38,67,85,96,46,23,87,90,32,76,46,88,65,15,89]
        nilai = [33,55,35,64,64,38,67,85,96,46,23,87,90,32,76,46,88,65,15,89]
        list_nilai.sort()
        list_nilai.reverse()
        cek_peringkat = 0
        peringkat = 0
        print ("Mahasiswa Yang Mendapat Peringkat 1-10 :")
        for i in range (0,10):
            peringkat = peringkat + 1
            nilainya = list_nilai[cek_peringkat]
            index_nilai = nilai.index(nilainya)
            print (peringkat, ".",list_nama[index_nilai],":",nilainya)
            cek_peringkat = cek_peringkat + 1
        break
    opsi = input("\nmasukkan jenis program : ")