def createQueue():      #inisialisasi queue pada list kosong
    q=[]                #variabel q yang menampung list kosong
    return (q)
def enqueue(q, data):   #menambah data baru
    q.insert(0, data)   #menggunakan fungsi insert untuk posisi 0 dari list
    return(q)
def dequeue(q):         #menghapus data
    data=q.pop()        #menggunakan fungsi pop untuk mengeluarkan data teratas dari list
    return(data)
def isEmpty(q):         #mengecek apakah dalam kondisi kosong atau tidak
    return (q==[])
def size(q):            #menghitung jumlah data yang ada
    return (len(q))

#fungsi untuk menginputkan nama tugas beserta waktu prosesnya
def penjadwalanCPU ():
    total = int(input("Jumlah proses yang akan dijadwalkan di CPU : "))
    task = []
    for i in range(total):
        task.append([])
        nama = input ("Nama Proses : ")
        task[i].append(nama)
        waktu = int(input("Waktu Proses : "))
        task[i].append(waktu)
    print("Total task :\n", task)
    return task

#task diproses menjadi queue
def waktuCPU (task):
    waktuCPU = int(input("waktu proses CPU : "))
    taskQueue = createQueue()
    for nama in task:
        enqueue(taskQueue, nama)
    print("Antrian Proses beserta Waktunya = ", taskQueue)
    print("\n")

    count = 1
    while not (isEmpty(taskQueue)):
        print ("Iterasi ke -", count,":")
        count = count + 1
        temp = dequeue(taskQueue)
        if temp[1] > waktuCPU:
            temp[1] = temp[1] - waktuCPU
            enqueue(taskQueue,temp)
            print("Proses", temp[0], "sedang diproses dan sisa waktu proses", temp[0], "=", temp[1])
            print("Data proses yang tersisa : ", taskQueue)
        else:
            print("proses", temp[0], "telah selesai diproses")
            print("Data proses yang tersisa : ", taskQueue)

a = penjadwalanCPU()
waktuCPU(a)