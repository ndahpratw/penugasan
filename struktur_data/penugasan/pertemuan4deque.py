def createDeque():      #inisialisasi deque pada list kosong
    d=[]
    return (d)
def addFront(d,data):    #menambah data dari bagian front
    d.insert(0,data)     #menggunakan fungsi insert agar bisa disisipkan di indeks ke n
    return(d)
def addRear(d,data):     #menambah data dari bagian rear
    d.append(data)       #menggunakan fungsi append agar masuk ke indeks ke 0
    return(d)
def removeRear(d):       #menghapus data dari bagian rear
    data=d.pop()         #menggunakan fungsi pop untuk mengapus data
    return(data)
def removeFront(d):      #menghapus data dari bagian front
    data=d.pop(0)        #menggunakan fungsi pop untuk mengapus data pada indeks ke 0
    return(data)
def isEmpty(d):          #cek apakah list dalam keadaan kosong
    return (d==[])
def size(d):             #menghitung jumlah data pada list
    return (len(d))


d = createDeque()
addFront(d,'Abah')
addFront(d,'Ayah')
addRear(d,'Bapak')
addRear(d,'Papa')
print("list : ", d)

data = removeFront(d)
print(data, "dikeluarkan dari list")
print("list : ", d)

print("jumlah list : ", size(d))
print("Apakah list dalam keadaan kosong ? ", isEmpty(d))

dataa = addRear(d,removeFront(d))
print(dataa, "ditambahkan dalam list")
print("list : ", d)

#PALINDROM pdf

def cekPalindrom(string):
    palindrom=createDeque()
    for huruf in string:
        addRear(palindrom,huruf)
    cek=True
    while size(palindrom)>1:
        a=removeRear(palindrom)
        b=removeFront(palindrom)
        if (a==b):
            cek=cek and True
        else:
            cek=cek and False
    return cek

print(cekPalindrom('hannah'))
print(cekPalindrom('surabaya'))
print(cekPalindrom('abcdcba'))
print(cekPalindrom('katak'))
print(cekPalindrom('taat'))
print(cekPalindrom('dia'))

kata = 'asasa'
print(kata , '=' ,cekPalindrom(kata)) 

#PALINDROM

def isPalindrom (kata):
    palindrom = createDeque()
    for ch in kata:
        addFront(palindrom,ch)
    #while not(isEmpty(palindrom)) : akan menyebabkan error jika jumlah hurufnya ganjil

    cek = True
    while size(palindrom) > 1: #jika terdapat lebih dari 1 huruf pada suatu kata
        if removeFront(palindrom) == removeRear(palindrom):
            cek = cek and True #diber true agar program terus beriterasi dan tidak terpaku pada memori sebelumnya
        else:
            cek = cek and False
    return cek

kata = 'asasa'
print(kata , '=' ,cekPalindrom(kata)) 