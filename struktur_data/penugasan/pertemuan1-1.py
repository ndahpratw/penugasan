# VARIABEL
a = 100
print(type(a))

b = 0.1
print(type(b))

c = 'indah'
print(type(c))

d = True
print(type(d))

#ALGORITMA
# Algoritma Sequence - Konversi Kurs Mata Dollar ke Rupiah
dollar = int(input('Jumlah Dollar = '))
rupiah = dollar * 15000
print(dollar,'$ = Rp.',rupiah)

# Algoritma Branching - Penentuan jenis bilangan
num = int(input('Masukkan bilangan = '))
if num % 2 == 0 :
    print(num, ' adalah bilangan genap')
else:
    print(num, ' adalah bilangan ganjil')

# Algoritma Iteration - Menampilkan sejumlah n bilangan genap
num = int(input('Jumlah bilangan genap = '))
count = 1
i = 0
while count <= num:
    if i % 2 == 0:
        print(count,'. ',i)
        count = count + 1
        i = i + 1

# STRING
data = "Where is Waldo ?"
print(data[12]) # Satu karakter
temp = data[9:14] # lima karakter
print(temp)

#bersifat immutable, nilai string dirubah melalui method 'replace'
data="Where is Waldo ?"
databaru = data.replace('i','o')
print(databaru)

# LIST
arrData = [1,2,'python',0.8,'numpy']
print(arrData)
print(arrData[1])
print(arrData[1:4])

#bersifat mutable, list bisa dirubah melalui operasi asignment
arrData = [1,2,'python',0.8,'numpy']
print(arrData)
arrData[2] = 'Java'
print(arrData)

# LIST 2D
arr2 = [[1,2,3],[4,5,6]]
print(arr2)
print(arr2[1][2])

# TUPLE
tupData=(1,2,'python',0.8,'numpy')
print(tupData)
print(tupData[2])
print(tupData[1:3])

#DICTIONARIES
#Cara-1
studData={'001':'Ranti','002':'Diana','003':'Budi','004':'Eri'}
print(studData)

#Cara-2
studentData={}
studentData['001']='Fatimah'
studentData['002']='Sofiah'
studentData['003']='Ahmad'
studentData['005']='Ali'
print(studentData)

# DICTIONARIES 2D
Mat = {(0,3): 1, (2, 1): 2, (3, 3): 3}
print(Mat)
#penambahan data baru
Mat[0,2]=4
print(Mat)
#pengecekan data pada index (ind1,ind2)
#jika tidak terdapat data, maka return value=None,
#jika terdapat data maka return value=adalah data
cek=Mat.get((0,3))
print(cek)

# FUNCTION
# Function tanpa parameter
def addNumbers():
    a = int(input('Bilangan pertama = '))
    b = int(input('Bilangan kedua = '))
    print('Hasil = ', a + b)
addNumbers()#memanggil fungsi addNumbers agar dieksekusi

# Function dengan parameter
def addNumbers(a,b):
    print('Hasil = ', a + b)
num1=int(input('Bilangan pertama = '))
num2=int(input('Bilangan kedua = '))
addNumbers(num1,num2)#memanggil fungsi addNumbers agar dieksekusi

# Function dengan parameter dan return value
def addNumbers(a,b):
    hasil = a + b
    return hasil
def cekGenap(num):
    if num % 2 == 0:
        return True
    else:
        return False
#Main program
num1 = int(input('Bilangan pertama = '))
num2 = int(input('Bilangan kedua = '))
result = addNumbers(num1,num2)#memanggil fungsi addNumbers agar dieksekusi
print('Hasil Penjumlahan= ', result)
if cekGenap(result):
    print(result,' adalah Bilangan Genap')
else:
    print(result,' adalah Bilangan Ganjil')







