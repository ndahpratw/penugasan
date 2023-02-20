#membuat fungsi - fungsi yang ada pada stack
def stack():
    s = []
    return s 
def push (s,data):
    s.append(data)
def pop(s):
    data = s.pop()
    return(data)
def peek(s):
    return(s[len(s)-1])
def isEmpty(s):
    return(s==[])
def size(s):
    return(len(s))

def cekkurung(cek):
    operasi = stack()                   #inisialisasi stack
    math = len(cek)                     #menghitung karakter pada cek
    kurungbuka = '({['
    kurungtutup = ')}]'
    i = 0
    cocok = True
    while i < math:
        if cek[i] in kurungbuka:        #pengecekan kurung buka
            push(operasi, cek[i])
        elif cek[i] in kurungtutup:     #pengecekan kurung tutup
            if not (isEmpty(operasi)):
                top = pop(operasi)
                if kurungbuka.index(top) == kurungtutup.index(cek[i]):  #pengecekan jenis kurung buka dan kurung tutup
                    cocok = cocok and True
                else:
                    cocok = cocok and False
                    print ('Kurung Buka dan Kurang Tutup tidak Cocok')
            else:
                cocok = cocok and False
                print('Jumlah Kurung Tutup lebih banyak')
        i = i + 1
    if not(isEmpty(operasi)):
        cocok = False
        print('Jumlah Kurung Buka Lebih banyak')
    return cocok

def kepostfix(infix):
    operator = ['+','-','*','/','(',')']
    urut = {}
    urut['*','/'] = 3 
    urut['+','-'] = 2
    urut['(',')'] = 1
    st = stack()
    hasil = ''
    spasi = ''
    for i in infix:
        if i == '':
            spasi = spasi + i
        elif i not in operator :
            hasil = hasil + i
        elif i == ')':
            while peek(st) != '(':
                hasil = hasil + pop(st)
            pop(st)
        elif i == ')':
            push(st,i)
        else :
            while not isEmpty(st) and peek(st) != '(' and urut[i] <= urut[peek(st)]:
                hasil = hasil + pop(st)
            push(st,i)
    while not isEmpty(st) :
        hasil = hasil + pop(st)
    return hasil

def evaluasi (postfix):
    operasi = stack()
    operator = '+-/*'
    for i in postfix:
        if i not in operator:
            push(operasi, i)
        else:
            a = pop(operasi)
            b = pop(operasi)
            if i == '+':
                hasil = float(a) + float(b)
            elif i == '-':
                hasil = float(a) - float(b)
            elif i == '*':
                hasil = float(a) * float(b)
            else:
                hasil = float(a) / float(b)
            push(operasi, hasil)
    return(pop(operasi))

coba = input("Masukkan string operasi aritmatika : ")

print("1. Pengecekan Kurung Pada Operasi")
print("2. Konversi Infix Ke Postfix kemudian Evaluasi")
print("0. Keluar dari program")

while True:
    opsi = int(input("Masukkan opsi (1/2) : "))
    if opsi == 1:
        cek = cekkurung(coba)
        print(coba, "=", cek)
    elif opsi == 2:
        ubah = kepostfix(coba)
        print("Postfix = ", ubah)
        print("Hasil = ", evaluasi(ubah))
        break
    else:
        break