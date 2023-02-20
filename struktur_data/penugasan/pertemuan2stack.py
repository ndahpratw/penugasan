def stack():            #inisialisasi stack pada variabel s yang menampung list kosong
    s = []
    return s 
def push (s,data):      #penambahan data baru yang dimasukkan pada variabel s
    s.append(data)      #penambahan data menggunakan method append sehingga data yang ditambahkan ada di indeks terakhir (posisi top)
def pop(s):             #penghapusan data baru
    data = s.pop()      #penghapusan data pada list menggunakan method pop sehingga data yang dikeluarkan merupakan data di posisi top
    return(data)
def peek(s):            #fungsi peek digunakan untuk mengetahui data pada posisi top
    return(s[len(s)-1])
def isEmpty(s):         #pengecekan apakah list sedang dalam keadaan kosong atau tidak
    return(s == [])
def size(s):            #fungsi size digunakan untuk menghitung panjang / banyak data yang ada di list
    return(len(s))

st=stack()
print("List dalam keadaan kosong : ",isEmpty(st))
print(push(st,100))
print(push(st,23))
print("data terbaru = ", st)
print(push(st,34))
print("data yang keluar = ", pop(st))
print(push(st,56))
print("data teratas = ",peek(st))
print("data yang keluar = ", pop(st))
print("Jumlah data = ", size(st))
print("data terbaru = ", st)

print("\n")
print("--------------------KONVERSI BILANGAN KE BINER--------------------")

#KONVERSI BILANGAN KE BINER
def dec2bin(angka):
    st=stack()
    while angka > 0:
        push(st, angka % 2) #sisa (modulus) dimasukkan pada st
        angka = angka // 2 #angka dibagi menjadi 2
    temp = '' #variabel sementara dalam string kosong
    while not(isEmpty(st)): #selama stack tidak dalam keadaan kosong
        temp = temp + str(pop(st)) #data akan di pop satu persatu
    return temp

angka = int(input("Masukkan angka : "))
print("Bilangan biner dari ",angka, ":", dec2bin(angka))

print("\n")
print("--------------------KONVERSI BINER KE DESIMAL--------------------")

#KONVERSI BINER KE BILANGAN
def binerKeDesimal(biner):
    desimal = 0
    for i in range(len(biner)):
        iDes = int(biner[i]) * (2**((len(biner)-1)-i))
        desimal += iDes
    return desimal
a = binerKeDesimal("1010")
print(a)


print("\n")
print("--------------------DELIMETER MATCHING--------------------")

def paranthesesCheck(strMath):
    operandStack=stack()
    lenMath=len(strMath)
    openOperand='({['
    closeOperand=')}]'
    #print(lenMath)
    i=0
    Matched = True
    while i<(lenMath):
        #print(i,'=',strMath[i])
        if strMath[i] in openOperand:
            push(operandStack,strMath[i])
            #print(operandStack)
        elif strMath[i] in closeOperand:
            if not (isEmpty(operandStack)):
                top=pop(operandStack)
                #print("top=",top)
                #print (operandStack)
                if openOperand.index(top)==closeOperand.index(strMath[i]):
                    Matched=Matched and True
                else:
                    Matched=Matched and False
                    print ('Kurung Buka dan Kurang Tutup tidak Cocok')
            else:
                Matched=Matched and False
                print('Jumlah Kurung Tutup lebih banyak')
        i=i+1
        #print(Matched)
    if not(isEmpty(operandStack)):
        Matched=False
        print('Jumlah Kurung Buka Lebih banyak')
    return(Matched)

a = '5 x (4 + 5) / ((3 + 2) x (10 - 8)'
isMatched=paranthesesCheck(a)
print(a,'=', isMatched)
b = '5 x (4 + 5} / ((3 + 2) x (10 - 8))'
isMatched=paranthesesCheck(b)
print(b,'=', isMatched)
c = '5 x (4 + 5) / ((3 + 2) x (10 - 8))'
isMatched=paranthesesCheck(c)
print(c,'=', isMatched)

print("\n")
print("--------------------POSTFIX--------------------")

def evaluatePost(postStr):
    operandStack = stack()
    operator='+-/*'
    for i in postStr:
        if i not in operator:
            push(operandStack,i)
        else:
            oprnd2 = pop(operandStack)
            oprnd1 = pop(operandStack)
            if i == '+':
                result=float(oprnd1)+float(oprnd2)
            elif i=='-':
                result=float(oprnd1)-float(oprnd2)
            elif i=='*':
                result=float(oprnd1)*float(oprnd2)
            else:
                result=float(oprnd1)/float(oprnd2)
            push(operandStack,result)
    return(pop(operandStack))

print(evaluatePost('45-6*'))