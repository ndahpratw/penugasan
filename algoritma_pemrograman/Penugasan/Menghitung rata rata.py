print("MENENTUKAN KELULUSAN SISWA")

Nilai_tugas_1 = int(input("Masukkan nilai tugas 1 : "))
Nilai_tugas_2 = int(input("Masukkan nilai tugas 2 : "))
Nilai_tugas_3 = int(input("Masukkan nilai tugas 3 : "))
Nilai_UTS = int(input("Masukkan nilai tugas UTS : "))
Nilai_UAS = int(input("Masukkan nilai tugas UAS : "))

jumlah_tugas = Nilai_tugas_1 + Nilai_tugas_2 + Nilai_tugas_3
rata_rata_tugas = jumlah_tugas / 3

nilai_akhir = jumlah_tugas + Nilai_UTS + Nilai_UAS
rata_rata_nilai_akhir = nilai_akhir / 3

print ("x =", rata_rata_tugas)
print ("y =", rata_rata_nilai_akhir)

if rata_rata_tugas > 40 or rata_rata_nilai_akhir > 55:
    print('LOLOS') 
else :
    print ('COBA LAGI')