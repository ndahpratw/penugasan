# MODUL 1
print('Menampilkan Bilangan Kelipatan 3')
n = int(input('Masukkan batas bilangan : '))
for i in range (3,n + 1,3):
    print(i)

# MODUL 2
nama = ['indah','nanda','enjel','rama','soni','mubes','firly','whinta', 'anita', 'naura', 'daffa', 'vely', 'natasha', 'lutfi', 'roy', 'rifki', 'echan', 'jamal', 'haikal', 'avita']
nilai = [95,93,91,89,87,85,83,81,82,84,86,88,90,92,94,96,98,97,80,99]

maks = 0
min = nilai[0]
for i in nilai:
      if i > maks:
            maks=i
      elif i<min:
            min=i
def g():
      nilai_tertinggi = print('Nilai tertinggi adalah', (maks))
      nilai_terendah = print('Nilai terendah adalah', (min))
      

for nama,nilai in zip(nama,nilai):
    print(nama, ':', nilai)

g()



