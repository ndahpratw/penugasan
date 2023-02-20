class Node :
    #constructor
    def __init__(self, item): #inisialisasi data pada kelas Node
        self.data = item      #menuju item (datanya)
        self.next = None      #menuju ke none
    # get_set
    def getData(self):       #mengetahui informasi pada node
        return self.data
    def getNext(self):       #mengetahui informasi pada node selanjutnya
        return self.next
    def setData(self, item): #merubah informasi pada node
        self.data = item     
    def setNext(self, pt):   #mengatur node menuju ke node (pointer) yang mana
        self.next = pt       

class LinkedList:           #linkedlist adalah kumpulan node yang saling terhubung
    def __init__(self):     #inisialisasi linked list
        self.head = None    #pointer head menjadi penanda awal node yang menuju ke none

    #mengecek apakah linked list sudah terisi node atau belum
    def isEmpty(self):             #fungsi isEmpty yang berisi parameter self
        return self.head == None   #jika pointer head = none maka linked list masih tidak memiliki node

    #menambah node baru
    def addNode(self,item):      #fungsi addNode yang berisi parameter item yang disimpan pada self
        temp = Node(item)        #node yang mau ditambahkan
        temp.setNext(self.head)  #menyambungkan node baru menuju ke head dari linkedlist yang sudah ada
        self.head = temp         #menyimpan node baru sebagai head (terletak di awal) dari linked list

    #mengetahui jumlah node pada linked list
    def size(self):                      #fungsi size yang berisi parameter item yang disimpan pada self              
        current = self.head              #pointer current berada di posisi head (awal list)
        count = 0                        #kondisi awal = 0 (belum bergeser)
        while current != None:           #ketika pointer current tidak sama dengan None
            count = count + 1            #akan terus bertambah selagi current tidak sama dengan None
            current = current.getNext()  #pointer current akan terus bergeser satu per satu sampai current = None
        return count

    #mencari node tertentu pada linked list
    def search(self,item):                   #fungsi search yang berisi parameter item yang disimpan pada self
        current = self.head                  #posisi awal current di bagian head (awal list)
        found = False                        #kondisi awal found adalah false
        while current != None and not found: #ketika pointer current tidak sama dengan None dan variabel found adalah True
            if current.getData() == item:    #jika data yang didapat pointer current = data yang dicari 
                found = True                 #maka found akan True
            else:                            #jika tidak ada data yang sama dengan data yang dicari 
                current = current.getNext()  #maka pointer current akan terus bergeser sampai akhir dan found tetap False
        return found

    #menampilkan seluruh data yang ada pada linked list
    def display(self):                   #fungsi display yang berisi parameter self
        current = self.head              #posisi awal current di bagian head (awal list)
        while current != None:           #jika current tidak sama dengan None
            print(current.getData())     #maka data yang didapat akan ditampilkan
            current = current.getNext()  #current akan terus bergeser sampai current = None (di posisi akhir)

    #insert previous
    #insert berarti menambah node pada indeks tertentu, pada tugas (1a) ini penambahan node dilakukan sebelum node tertentu
    #algoritma : mencari node yang sudah ada pada list, jika node ditemukan maka node baru akan ditambahkan sebelum node yang dicari
    #namun jika node tidak ditemukan pada list maka node baru tidak dapat ditambahkan
    def insertPrevious(self, newNode):                            #fungsi insertPrevious yang berisi parameter node baru dan disimpan pada self
        temp = Node(newNode)                                      #variabel baru yang menampung node baru 
        current = self.head                                       #posisi awal current di bagian head (awal list)
        previous = None                                           #posisi awal pointer previous di none
        found = False                                             #kondisi awal found adalah false
        before = int(input("node akan ditambah sebelum node : ")) #variabel baru yang menjadi inputan node yang akan dicari
        while current != None and not found:                      #ketika pointer current tidak sama dengan None dan found bernilai benar maka blok program di bawahnya akan berjalan
            if current.getData() == before:                       #jika data yang didapat pointer current = data yang dicari 
                found = True                                      #maka kondisi found berubah jadi true
            else:                                                 #namun jika tidak
                previous = current                                #pointer previous sama dengan pointer current
                current = current.getNext()                       #pointer current akan terus bergeser sampai current = None (di posisi akhir)
        if previous == None:                                      #jika pointer previous sama dengan none
            self.head = temp                                      #menyimpan node baru sebagai head (terletak di awal) dari linked list
            temp.setNext(current)                                 #node baru di set menuju ke pointer current
        elif current == None:                                     #jika pointer current = None
            print("Node tidak dapat ditemukan !")                 #maka akan ditampilakn output Node tidak dapat ditemukan menggunakan fungsi print
        else:                                                     #jika kedua syarat tidak dapat dipenuhi, maka :
            temp.setNext(current)                                 #node baru di set menuju ke pointer current
            previous.setNext(temp)                                #pointer previous di set menuju node baru
        return self.head

#memanggil kelas linked list
ListNode = LinkedList()

#menambah node baru
ListNode.addNode(12)
ListNode.addNode(45)
ListNode.addNode(72)

#menampilkan node yang ada
print("Isi Linked List : ")
print(ListNode.display())

print("\n----------Contoh Pertama----------")
#memanggil fungsi insert previous dengan parameter
ListNode.insertPrevious(20)

#menampilkan node yang ada
print("Isi Linked List : ")
print(ListNode.display())


print("\n----------Contoh Kedua----------")
#memanggil fungsi insert previous dengan inputan
newNode = int(input("Node baru yang akan ditambahkan : "))
ListNode.insertPrevious(newNode)

#menampilkan node yang ada
print("Isi Linked List : ")
print(ListNode.display())


print("\n----------Contoh Ketiga----------")
#memanggil fungsi insert previous
newNode = int(input("Node baru yang akan ditambahkan : "))
ListNode.insertPrevious(newNode)

#menampilkan node yang ada
print("Isi Linked List : ")
print(ListNode.display())