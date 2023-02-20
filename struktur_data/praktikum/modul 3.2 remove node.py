class Node :
    #constructor
    def __init__(self, item): #inisialisasi data pada kelas Node
        self.data = item      #menuju item (datanya)
        self.next = None      #menuju ke none
    # get_set
    def getData(self):       #getting data = memperoleh data
        return self.data
    def getNext(self):       #mengambil pointer next selanjutnya
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

    #remove node
    #pada tugas (2) ini node tertentu akan dihapus
    #algoritma : mencari node yang sudah ada pada list, jika node ditemukan maka node tersebut akan dihapus dari list
    #namun jika node tidak ditemukan pada list maka node baru tidak dapat ditambahkan
    def remove(self, item):                       #fungsi remove yang berisi parameter item yang dimasukkan ke dalam self
        current = self.head                       #posisi awal current di bagian head (awal list)
        previous = None                           #pointer bantu yang bertujuan menyambungkan pada data setelahnya
        found = False                             #kondisi awal found adalah false
        while current != None and not found:      #ketika pointer current tidak sama dengan None dan found bernilai benar maka blok program di bawahnya akan berjalan
            if current.getData() == item:         #jika data yang didapat pointer current = data yang dicari
                found = True                      #maka found akan True   
            else:                                 #jika tidak ada data yang sama dengan data yang dicari
                previous = current                #pointer previous sama dengan pointer current
                current = current.getNext()       #pointer current akan terus bergeser sampai current = None (di posisi akhir)
        if previous == None:                      #jika pointer previous sama dengan none
            self.head = current.getNext()         #bagian awal list sama dengan pointer current yang bergeser
        elif current == None:                     #jika pointer current sama dengan none
            print("Node tidak dapat ditemukan")   #maka akan ditampilkan output Node tidak dapat ditemukan menggunakan fungsi print
        else:                                     #namun jika kedua syarat tidak terpenuhi
            previous.setNext(current.getNext())   #maka pointer previous diatur menuju pointer current yang bergeser 
        
#memanggil kelas linked list
ListNode = LinkedList()

#menambah node baru
ListNode.addNode(12)
ListNode.addNode(45)
ListNode.addNode(72)
ListNode.addNode(5)
ListNode.addNode(125)
ListNode.addNode(33)

#menampilkan node yang ada
print("Isi Linked List : ")
print(ListNode.display())

print("\n----------Contoh Pertama----------")
#memanggil fungsi remove dengan parameter
ListNode.remove(125)

#menampilkan node yang ada
print("Isi Linked List : ")
print(ListNode.display())


print("\n----------Contoh Kedua----------")
#memanggil fungsi remove dengan inputan
node = int(input("Node yang akan dihapus : "))
ListNode.remove(node)
print(node, "dihapus dari list")

#menampilkan node yang ada
print("Isi Linked List : ")
print(ListNode.display())


print("\n----------Contoh Ketiga----------")
#memanggil fungsi remove
node = int(input("Node yang akan dihapus : "))
ListNode.remove(node)

#menampilkan node yang ada
print("Isi Linked List : ")
print(ListNode.display())