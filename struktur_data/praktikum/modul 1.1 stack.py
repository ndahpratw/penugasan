print("----------Menghitung Tumpukan Batu Bata Sebanyak 7 Buah----------")
print("\nMenu : ")
print(
    "1. Menambah Tumpukan Batu Bata\n"
    "2. Menghilangkan Tumpukan Batu Bata\n"
    "3. Menampilkan Data Tumpukan Batu Bata\n"
    "4. Mengecek Apakah Tumpukan Batu Bata Tersebut Sudah Kosong\n"
    "5. Mengecek Apakah Tumpukan Batu Bata Tersebut Sudah Penuh\n"
    "6. Menghapus Tumpukan Batu Bata\n"
    "0. Selesai"
)

#instruksi
def stack():
    bata = [1,2,3,4,5,6,7]
    return bata 
def push (bata,data):
    bata.append(data)
def pop(bata):
    data = bata.pop()
    return(data)
def clear(bata):
    data = bata.clear()
    return data
def peek(bata):
    return(bata[len(bata)-1])
def isEmpty(bata):
    return(bata==[])
def size(bata):
    return(len(bata))

tumpukan = stack() 

while True:
    menu = int(input("\nPilih Menu (1/2/3/4/5/6) : "))
    if menu == 1:
        tambah = int(input("Bata yang akan ditambahkan : "))
        push(tumpukan, tambah)
        print(tumpukan)
    elif menu == 2:
        print("Bata yang dihapus adalah bata dengan nilai -", pop(tumpukan))
        print(tumpukan)
    elif menu == 3:
        for i in tumpukan:
            print("Tampilan Urutan Bata : ",i)
    elif menu == 4:
        isi = isEmpty(tumpukan)
        if isi == False:
            print("Tumpukan Terisi Bata")
        elif isi == True:
            print("Tumpukan Dalam Keadaan Kosong")
    elif menu == 5:
        jumlah = size(tumpukan)
        if jumlah == 7:
            print("Tumpukan Bata Sudah Penuh")
        elif jumlah < 7:
            print("Tumpukan Bata Belum Penuh")
        elif jumlah > 7:
            lebih = jumlah - 7
            print("Jumlah Bata Lebih ", lebih)
    elif menu == 6:
        jumlah = clear(tumpukan)
        if jumlah == None:
            print("Semua Bata Telah Terhapus")
        else:
            print("Tumpukan Masih Terisi Bata")
    elif menu == 0:
        print("PROGRAM SELESAI")
        break
    else:
        print("Pilihan Menu Tidak Tersedia")
        break


    