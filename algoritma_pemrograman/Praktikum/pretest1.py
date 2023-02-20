# MODUL 1
a = 'line 1'
b = 'line 2'
c = 'line 3'
print('kasus 1 :')
print (a, end='')
print (b, end='')
print (c, end='')

print ('kasus 2 :')
for i in (a,b,c):
    print(i)
print('\n')

# MODUL 2
print('program menentukan bilangan prima')
bilangan = int(input('Masukkan bilangan : '))
if bilangan > 0:
    jumlahpembagi = 0
    for i in range (1,bilangan+1):
        if (bilangan % i) == 0:
            jumlahpembagi += 1
    if jumlahpembagi == 2:
        print(bilangan, 'adalah bilangan prima')
    else :
        print(bilangan, 'bukanlah bilangan prima')
else :
    print('bukan bilangan prima karena bilangannya negatif')
print('\n')

print('program menentukan bilangan dengan kelipatan 4')
angka = int(input('Masukkan bilangan : '))
rumus = angka % 4
if rumus == 0:
    print(angka,'adalah bilangan kelipatan dari 4')
else:
    print(angka, 'bukanlah bilangan kelipatan dari 4')