class Node :
    #constructor
    def __init__(self, item): #inisialisasi data pada kelas Node
        self.data = item      #menuju item (datanya)
        self.next = None      #menuju ke none
    # get_set
    def getData(self):       #getting data = memperoleh data
        return self.data
    def getNext(self):       #mengambil pointer (penunjuk) next
        return self.next
    def setData(self, item): #setting data = mengatur data
        self.data = item     
    def setNext(self, pt):   #mengatur node menuju ke node (pointer) yang mana
        self.next = pt       

class LinkedList:           #linkedlist adalah kumpulan node yang saling terhubung
    def __init__(self):     #inisialisasi linked list
        self.head = None    #pointer head menjadi penanda awal node yang menuju ke none

    #menambah node baru
    def addNode(self,item):      #fungsi addNode yang berisi parameter item yang disimpan pada self
        temp = Node(item)        #node yang mau ditambahkan
        temp.setNext(self.head)  #menyambungkan node baru menuju ke head dari linkedlist yang sudah ada
        self.head = temp         #menyimpan node baru sebagai head (terletak di awal) dari linked list

    #menampilkan seluruh data pada linked list
    def display(self):                   #fungsi display yang berisi parameter self
        current = self.head              #posisi awal current di bagian head (awal list)
        while current != None:           #jika current tidak sama dengan None
            print(current.getData())     #maka data yang didapat akan ditampilkan
            current = current.getNext()  #current akan terus bergeser sampai current = None (di posisi akhir)

    #insert next
    #insert berarti menambah node pada indeks tertentu, pada tugas (1b) ini penambahan node dilakukan setelah node tertentu
    #algoritma : mencari node yang sudah ada pada list, jika node ditemukan maka node baru akan ditambahkan setelah node yang dicari
    #namun jika node tidak ditemukan pada list maka node baru tidak dapat ditambahkan
    def insertNext(self,item):                                      #fungsi insertNext yang berisi parameter node baru dan disimpan pada self
        temp = Node(item)                                           #variabel baru yang menampung node baru
        current = self.head                                         #posisi awal current di bagian head (awal list)
        found = False                                               #kondisi awal found adalah false
        after = int(input("node akan ditambah setelah node : "))    #variabel baru yang menjadi inputan node yang akan dicari
        while current != None and not found:                        #ketika pointer current tidak sama dengan None dan found bernilai benar maka blok program di bawahnya akan berjalan
            if current.getData() == after:                          #jika data yang didapat pointer current = data yang dicari
                found = True                                        #maka kondisi found berubah jadi true
            else:                                                   #namun jika tidak
                current = current.getNext()                         #pointer current akan terus bergeser sampai current = None (di posisi akhir)
        if current == None :                                        #jika pointer current = None
            print("Node tidak dapat ditemukan")                     #maka akan ditampilakn output Node tidak dapat ditemukan menggunakan fungsi print
        else:                                                       #namun jika tidak 
            temp.setNext(current.getNext())                         #node baru di set pada pointer current yang bergeser
            current.setNext(temp)                                   #pointer current di set menuju node baru
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
#memanggil fungsi insertNext dengan parameter
ListNode.insertNext(20)

#menampilkan node yang ada
print("Isi Linked List : ")
print(ListNode.display())


print("\n----------Contoh Kedua----------")
#memanggil fungsi insertNext dengan inputan
newNode = int(input("Node baru yang akan ditambahkan : "))
ListNode.insertNext(newNode)

#menampilkan node yang ada
print("Isi Linked List : ")
print(ListNode.display())


print("\n----------Contoh Ketiga----------")
#memanggil fungsi insert Next
newNode = int(input("Node baru yang akan ditambahkan : "))
ListNode.insertNext(newNode)

#menampilkan node yang ada
print("Isi Linked List : ")
print(ListNode.display())