class Node :
    #constructor
    def __init__(self, item): #inisialisasi data
        self.data = item #menuju item (datanya)
        self.next = None #menuju ke none
    # get_set
    def getData(self): #get data = memperoleh data
        return self.data
    def getNext(self): #mengambil pointer (penunjuk) next
        return self.next
    def setData(self, item): #mengatur data
        self.data = item
    def setNext(self, pt): #mengatur node menuju ke node (pt) yang mana
        self.next = pt #pt = pointer

n1 = Node(21)
print(n1.getData())
print(n1.getNext()) # menunjukkan pointer

n2 = Node(10)
n2.setNext(n1) #pointer n2 menuju ke node n1
print(n2.getNext())

#membentuk kesatuan node 
class LinkedList: #linkedlist adalah list list yang saling terhubung
    def __init__(self):
        self.head = None #pointer head menjadi penanda awal node yang menuju ke none
    def isEmpty(self):
        return self.head == None #jika pointer head = none maka linked list masih tidak memiliki node
    def addNode(self,item):
        temp = Node(item) #node yang mau ditambahkan
        temp.setNext(self.head) #menyambungkan node baru menuju ke head dari linkedlist yang sudah ada
        self.head = temp #menyimpan node baru sebagai head dari linked list
    def size(self): #mengetahui jumlah node pada linked list
        current = self.head #pointer current menuju head
        count = 0 #kondisi awal = 0 (belum bergeser)
        while current != None:
            count = count + 1 #akan terus bergeser selagi node != None 
            current = current.getNext() #geser satu per satu
        return count
    def search(self,item): #mencari node pada linked list
        current = self.head #posisi awal current = head
        found = False #kondisi awal found
        while current != None and not found:
            if current.getData() == item: #ketika current = node yang dicari maka found akan True
                found = True
            else:
                current = current.getNext() #current terus bergeser, jika data tidak ditemukan maka found akan false
        return found
    def display(self): #menampilkan seluruh data pada linked list
        current = self.head #current pada posisi head
        while current != None:
            print(current.getData())
            current = current.getNext()
    def remove(self, item): #menghapus data pada linked list
        current = self.head
        previous = None #pointer previous bertujuan menyambungkan pada data setelahnya
        found = False
        while not found:
            if current.getData() == item:
                found = True
            else:
                previous = current
                current = current.getNext()
        if previous == None:
            self.head = current.getNext()
        else:
            previous.setNext(current.getNext())




myList = LinkedList()

print('ada node ?',myList.isEmpty())
myList.addNode(12)
myList.addNode(45)
myList.addNode(72)
print('jumlah node : ',myList.size())
