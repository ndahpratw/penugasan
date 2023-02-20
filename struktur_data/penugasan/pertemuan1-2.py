#METHOD
dataStr='Struktur Data'
print(dataStr)
dataStr=dataStr.upper()
print(dataStr)

dataLs=[4,10,21]
print(dataLs)
dataLs.append(45)
print(dataLs)

#CONSTRUCTOR
class BilanganKompleks:
    def __init__(self,a,b): # constructor
        self.real=a
        self.im=b
    def display(self): # method untuk menampilkan state
        print (self.real,'+',self.im,'i')
        #perintah self.real adalah perintah untuk mengakses state atau property real, 
        #yang dimiliki oleh class BilanganKompleks
        #perintah self.im, digunakan untuk mengakses property im
data=BilanganKompleks(4,6)
print(type(data))
print(data)
data.display()

class BilanganKompleks:
    def __init__(self,a,b): # constructor
        self.real=a
        self.im=b
    def display(self):
        print (self.real,"+",self.im,"i")
    def __str__(self): # ovveride method
        return str(self.real)+" + "+str(self.im)+" i "
data1=BilanganKompleks(4,6)
print(data1)

#PENJUMLAHAN 2 BILANGAN KOMPLEKS
#menggunakan method baru
class BilanganKompleks:
    def __init__(self,a,b):
        self.real=a
        self.im=b
    def display(self):
        print (self.real,'+',self.im,'i')
    def __str__(self):
        return str(self.real) + " + " + str(self.im) + " i "
    def addKompleks(self,obj):
        a=self.real+obj.real
        b=self.im+obj.im
        return BilanganKompleks(a,b)
data1=BilanganKompleks(4,6)
data2=BilanganKompleks(2,5)
jumlah=data1.addKompleks(data2)
data1.display()
data2.display()
print(jumlah)

#menggunakan ovveride method
class BilanganKompleks:
    def __init__(self,a,b):
        self.real=a
        self.im=b
    def display(self):
        print (self.real,'+',self.im,'i')
    def __str__(self):
        return str(self.real) + " + " + str(self.im) + " i "
    def __add__(self,obj):
        a=self.real+obj.real
        b=self.im+obj.im
        return BilanganKompleks(a,b)
data1=BilanganKompleks(4,6)
data2=BilanganKompleks(5,10)
jumlah=data1+data2
print(data1)
print(data2)
print(jumlah)

#PERKALIAN 2 BUAH METHOD
class BilanganKompleks:
    def __init__(self,a,b):
        self.real=a
        self.im=b
    def display(self):
        print (self.real,'+',self.im,'i')
    def __str__(self):
        return str(self.real) + " + " + str(self.im) + " i "
    def __mul__(self,data):
        temp1=(self.real*data.real)-(self.im*data.im)
        temp2=(self.real*data.im)+(data.real*self.im)
        return BilanganKompleks(temp1,temp2)
a=BilanganKompleks(4,6)
b=BilanganKompleks(5,10)
c=a * b
print(a)
print(b)
print(c)