def createDeque(): #inisialisasi deque pada list kosong
    d = []
    return (d)
def addFront(d,data): #penambahan data baru di ujung front
    d.insert(0,data) #menggunakan fungsi insert untuk posisi 0 dari list
    return(d)
def addRear(d,data): #penambahan data baru di ujung rear
    d.append(data) #menggunakan fungsi append untuk menambah data
    return(d)
def removeRear(d): #penghapusan data di ujung rear
    data = d.pop() #menggunakan fungsi pop untuk mengeluarkan data teratas dari list
    return(data)
def removeFront(d): #penghapusan data di ujung front
    data = d.pop(0) #menggunakan fungsi pop untuk mengeluarkan data dari indeks ke 0
    return(data)
def isEmpty(d): #mengecek apakah dalam kondisi kosong atau tidak
    return (d == [])
def size(d): #menghitung jumlah data yang ada
    return (len(d))

def cekPalindrom(kata):
    palindrom = createDeque()
    for i in kata:
        addRear(palindrom,i)
    cek = True
    while size(palindrom) > 1:
        a = removeRear(palindrom)
        b = removeFront(palindrom)
        if ( a == b ):
            cek = cek and True
        else:
            cek = cek and False
    return cek

print(cekPalindrom("hannah"))
print(cekPalindrom("surabaya"))
print(cekPalindrom("abcdcba"))
print(cekPalindrom("katak"))
print(cekPalindrom("taat"))
print(cekPalindrom("dia"))

#berupa inputan
kata = input("Masukkan Kata atau Bilangan Apapun : ")
print(cekPalindrom(kata))
