price1 = 1.45
price2 = 2.38
print ('price 1 : $', price1, '\nprice 2 : $', price2)
print('\n')

harga = int(input('Masukkan harga awal : '))
diskon = int(input('Masukkan diskon (%) : '))
rumus = harga - (harga * (diskon/100))
print('Jadi harga akhir  dari', harga, 'yang mendapat diskon', diskon, 'persen adalah', rumus)
print('\n')

def menu ():
    print('----------------------MENU----------------------')
    print('1. Menghitung Nilai Mata Uang Rupiah ke Dolar')
    print('2. Menghitung Nilai Mata Uang Dolar ke Rupiah')
menu ()
opsi = int(input('Masukkan pilihan anda (1/2) :'))
if opsi == 1:
    rupiah = int(input('Masukkan nilai mata uang rupiah : '))
    rd = rupiah * 0.000070
    print(rupiah, 'rupiah =', rd, 'dolar')
elif opsi == 2:
    dolar = int(input('Masukkan nilai mata uang dollar : '))
    dr = dolar * 14191.20
    print(dolar, 'dolar =', dr, 'rupiah')

print('Program Pertukaran Variabel')
a = float(input('Masukkan angka pertama : '))
b = float(input('Masukkan angka kedua : '))
if a > b:
    print('a =',a, 'b = ', b)
    a, b = b, a
    print('angka pertama lebih besar dari angka kedua, maka :')
    print('a =', a, 'b = ',b)
else:
    print('a =',a, 'b = ', b)
    print('angka pertama lebih kecil dari angka kedua, maka posisi tidak ditukar')


print('Progam Menghitung Usia Mendatang')
nama = input('Masukkan nama anda : ')
usia = int(input('Masukkan usia anda :'))
hitung = 50 - usia
print(hitung, 'tahun lagi', nama, 'akan berusia 50 tahun')

def syarat ():
    print('Selamat Datang di Permainan Batu Gunting Kertas')
    print('Aturan Bermain :')
    print('1. Kedua pemain bergantian untuk menginput opsi yang dipilih')
    print('2. Jika salah satu pemain keliru untuk menginput opsi, maka permainan otomatis selesai')
    print('3. Untuk mengakhiri permainan, pemain 1 menginput "end" sedangkan pemain 2 mengosongkan inputan')
import getpass
syarat ()
pemain1 = getpass.getpass("masukkan pilihan pemain 1 <batu/gunting/kertas> : ")
pemain2 = getpass.getpass("masukkan pilihan pemain 2 <batu/gunting/kertas> : ")
while True: 
    if pemain1 == "gunting" and pemain2 == "batu":
        print("PEMAIN 2 MENANG, karena pemain 2 yang menginputkan",pemain2,"sedangkan pemain 1 yang menginputkan",pemain1)
    elif pemain1 == "batu" and pemain2 == "gunting":
        print("PEMAIN 1 MENANG, karena pemain 1 yang menginputkan",pemain1,"sedangkan pemain 2 yang menginputkan",pemain2)
    elif pemain1 == "kertas" and pemain2 == "batu":
        print("PEMAIN 1 MENANG, karena pemain 1 yang menginputkan",pemain1,"sedangkan pemain 2 yang menginputkan",pemain2)
    elif pemain1 == "batu" and pemain2 == "kertas":
        print("PEMAIN 2 MENANG, karena pemain 2 yang menginputkan",pemain2,"sedangkan pemain 1 yang menginputkan",pemain1)
    elif pemain1 == "gunting" and pemain2 == "kertas":
        print("PEMAIN 1 MENANG, karena pemain 1 yang menginputkan",pemain1,"sedangkan pemain 2 yang menginputkan",pemain2)
    elif pemain1 == "kertas" and pemain2 == "gunting":
        print("PEMAIN  2 MENANG, karena pemain 2 yang menginputkan",pemain2,"sedangkan pemain 1 yang menginputkan",pemain1)
    elif pemain1 == pemain2:
        print("SERI, karena inputan kedua pemain sama, yakni", pemain1)
    elif pemain1 == 'end':
        print('Permainan Selesai')
        break
    else:
        print("inputan salah")
        break
    pemain1 = getpass.getpass("masukkan pilihan pemain 1 <batu/gunting/kertas> : ")
    pemain2 = getpass.getpass("masukkan pilihan pemain 2 <batu/gunting/kertas> : ")