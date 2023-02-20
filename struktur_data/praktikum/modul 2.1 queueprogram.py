def createQueue(): #inisialisasi queue pada list kosong
    q=[] #variabel q yang menampung list kosong
    return (q)
def enqueue(q, data): #menambah data baru
    q.insert(0, data) #menggunakan fungsi insert untuk posisi 0 dari list
    return(q)
def dequeue(q): #menghapus data
    data=q.pop() #menggunakan fungsi pop untuk mengeluarkan data teratas dari list
    return(data)
def isEmpty(q): #mengecek apakah dalam kondisi kosong atau tidak
    return (q==[])
def size(q): #menghitung jumlah data yang ada
    return (len(q))

print("------------queueProgram------------")
print("\nMenu : ")
print(
    "1. Masuk Antrian\n"
    "2. Keluar Antrian\n"
    "3. Menghitung Jumlah Antrian\n"
    "4. Mengecek Apakah Antrian Dalam Keadaan Kosong\n"
    "0. Selesai"
)

Antrian = createQueue() #memanggil fungsi ... yang ditampung dalam variabel Antrian

while True:
    menu = int(input("\nPilih Menu (1/2/3/4) : "))
    if menu == 1:
        tambah = input("Masukkan Nama : ")
        enqueue(Antrian, tambah)
        print(Antrian)
    elif menu == 2:
        print(dequeue(Antrian), "telah keluar dari antrian")
        print(Antrian)
    elif menu == 3:
        print("Total antrian saat ini sebanyak", size(Antrian), "antrian")
    elif menu == 4:
        isi = isEmpty(Antrian)
        if isi == False:
            print("Antrian Tidak Dalam Keadaan Kosong")
        elif isi == True:
            print("Antrian Dalam Keadaan Kosong")
    elif menu == 0:
        print("PROGRAM SELESAI")
        break
    else:
        print("Pilihan Menu Tidak Tersedia")
        break
