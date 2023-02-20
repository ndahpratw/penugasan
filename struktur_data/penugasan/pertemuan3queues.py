def createQueue(): #inisialisasi q yang kosong
    q=[]
    return (q)
def enqueue(q,data): #menambah data (di reae, indeks ke 0)
    q.insert(0,data)
    return(q)
def dequeue(q): #menghapus data
    data=q.pop() #menggunakan fungsi pop
    return(data)
def isEmpty(q): #cekkondisidata sedang kosong apa tidak
    return (q==[])
def size(q): #mengetahui panjang antrian
    return (len(q))

q = createQueue()
enqueue(q,'A') 
enqueue(q,'B')
enqueue(q,'C')
enqueue(q,'D')
print("List : ", q)

temp=dequeue(q)
print("Data yang dikeluarkan : ",temp)
print("List : ", q)

enqueue(q, temp)
print("Tambah data ", temp)
print("List : ",q)

print("Kondisi list : ", isEmpty(q))
print("Jumlah data di dalam list : ", size(q))


#ULAR NAGA
def ularNaga(nama, hitungan):
    gameQueue = createQueue() #buat variavel nama game
    for namaAnak in nama: 
        enqueue(gameQueue,namaAnak) #memansukkan data nama dalam permainan
    print('Peserta Permainan=',gameQueue) #menampilkan peserta permainan
    while size(gameQueue) > 1:
    #while mot isEmpt(gameQueue) :
        for i in range(hitungan):
            enqueue(gameQueue,dequeue(gameQueue)) #selama tidak masuk dalam hitungan maka akan masuk lagi ke dalama antrian
            print('hitungan ke-',i,'=',gameQueue) #menampilkan proses antrian 
        dequeue(gameQueue)
        print('Peserta Permainan=',gameQueue)
        return dequeue(gameQueue)

ularNaga(['andi','rita','sari','anton','rafa','diana','zaki'],2)


print('\n')
#penjadwalan CPU
def inputTask (numOfTask) :
    task = {}
    for i in range (numOfTask) :
        nama = input ('Nama Task = ')
        waktu = int(input('Waktu Task = '))
        task[nama] = [waktu,0] 
    return task

def scheduling(limitTime, task) :
    taskQueue = createQueue()
    for nama in task.keys():
        enqueue(taskQueue, nama)
    print("antrian : ",taskQueue)

    total = 0
    while not (isEmpty(taskQueue)):
        temp = dequeue(taskQueue) #variabel sementara yang nantinya akan menghapus task
        remainTime = task[temp][0]-limitTime # sisa waktu pemrosesan = nilai task - waktu processor 
        if remainTime > 0 : #jika sisa waktu > 0
            enqueue(taskQueue,temp) #maka angka kembali dimasukkan rear antrian
            procTime = limitTime #proses timenya = processor
        else :
            procTime = task[temp][0] #proses timenya = waktu itu sendiri
            remainTime = 0 #sisawaktu = 0
        total = total + procTime #total 
        task[temp][0] = remainTime
        task[temp][1] = total
        print(taskQueue)
    return task

task = inputTask(3)
newTask = scheduling(3, task)
print(newTask)
