import pandas as pd
import matplotlib.pyplot as plt

print("------------------------------------ DATA ------------------------------------")
baca = pd.read_csv('caffeine.csv')
print(baca)

print('\nBeberapa Hal Menarik Yang Dapat Ditemukan : ')
print('1. 10 minuman dengan kandungan kafein tertinggi')
print('2. 10 minuman dengan kandungan kafein terendah ( >0 )')
print('3. Daftar minuman non kafein')
print('4. 10 minuman dengan kandungan kalori rendah ( >0)')
print('5. 10 minuman dengan kandungan kalori tertinggi')
print('6. Daftar minuman non kalori')
print('7. Menampilkan daftar minuman berdasarkan tipenya')
print('8. Tampilkan tipe minuman pada data menggunakan pie chart')
print('0. keluar')

while True :
    coba = int(input('\nCari tahu hal menarik ke - '))
    if coba == 1:
        print ('\n----------------10 MINUMAN DENGAN KANDUNGAN KAFEIN TERTINGGI-----------------')
        a = baca.nlargest(10,'Caffeine (mg)').loc[:, ['drink', 'Caffeine (mg)','type']]
        print (a)
        grafik = input('Apakah anda ingin menampilkan grafiknya <y/t>? ')
        if grafik == 'y':
            fig = plt.figure(figsize = (10, 10))
            plt.title('Grafik 10 Daftar Minuman Dengan Kandungan Kafein Tertinggi')
            plt.xlabel('drink')
            plt.ylabel('Caffeine (mg)')
            plt.xticks(rotation = 90)
            plt.bar(a['drink'], a['Caffeine (mg)'], width = 0.5, color = 'grey')
            plt.show()
        elif grafik == 't':
            print('Grafik Tidak Ditampilkan')
    elif coba == 2:
        print ('\n--------------10 MINUMAN DENGAN KANDUNGAN KAFEIN TERENDAH ( >0 )-----------------')
        data = baca[baca['Caffeine (mg)'] > 100]
        a = data.nsmallest(10,'Caffeine (mg)').loc[:, ['drink', 'Caffeine (mg)', 'type']]
        print(a)
        grafik = input('Apakah anda ingin menampilkan grafiknya <y/t>? ')
        if grafik == 'y':
            fig = plt.figure(figsize = (10, 10))
            plt.title('Grafik 10 Daftar Minuman Dengan Kandungan Kafein Terendah ( >0 )')
            plt.xlabel('drink')
            plt.ylabel('Caffeine (mg)')
            plt.xticks(rotation = 90)
            plt.bar(a['drink'], a['Caffeine (mg)'], width=0.5, color="black")
            plt.show()
        elif grafik == 't':
            print('Grafik Tidak Ditampilkan')        
    elif coba == 3:
        print ('\n--------------------------DAFTAR MINUMAN NON KAFEIN-----------------------------')
        data = baca[baca['Caffeine (mg)'] == 0].loc[:, ['drink', 'Caffeine (mg)','type']]
        print(data)
    elif coba == 4:
        print ('\n---------------------10 MINUMAN DENGAN KALORI RENDAH ( >0 )---------------------')
        data = baca[baca['Calories'] > 0]
        a = data.nsmallest(10,'Calories').loc[:, ['drink', 'Calories', 'type']]
        print(a)
        grafik = input('Apakah anda ingin menampilkan grafiknya <y/t>? ')
        if grafik == 'y':
            plt.title('Grafik Daftar 10 Minuman Dengan Kalori Rendah (>0)')
            plt.xlabel('drink')
            plt.ylabel('Calories')
            plt.xticks(rotation = 90)
            plt.bar(a['drink'], a['Calories'], width=0.5, color="salmon")
            plt.show()
        elif grafik == 't':
            print('Grafik Tidak Ditampilkan')                     
    elif coba == 5:
        print ('\n----------------10 MINUMAN DENGAN KALORI TERTINGGI-----------------')
        a = baca.nlargest(10,'Calories').loc[:, ['drink', 'Calories', 'type']]
        print(a)
        grafik = input('Apakah anda ingin menampilkan grafiknya <y/t>? ')
        if grafik == 'y':
            plt.title('Grafik 10 Minuman Dengan Kalori Tertinggi')
            plt.xlabel('drink')
            plt.ylabel('Calories')
            plt.xticks(rotation = 90)
            plt.bar(a['drink'], a['Calories'], width=0.5, color="green")
            plt.show()
        elif grafik == 't':
            print('Grafik Tidak Ditampilkan') 
    elif coba == 6:
        print ('\n---------------------DAFTAR MINUMAN NON KALORI-----------------------------')
        data = baca[baca['Calories'] == 0].loc[:, ['drink', 'Calories','type']]
        print(data)
    elif coba == 7:
        print('\n-----------------DAFTAR MINUMAN BERDASARKAN TIPENYA---------------------------')
        try : 
            x = input('Masukkan tipe minuman : ').capitalize()
            a = baca.groupby('type').get_group(x)
            print(a)
        except :
            print('Jenis minuman', x, 'tidak ada pada data')
    elif coba == 8:
        fig = plt.figure()
        ax = fig.add_axes([0,0,1,1])
        ax.axis('equal')
        minuman = ['Coffee', 'Energy Drink', 'Energy Shots', 'Soft Drink', 'Tea', 'Water']
        jumlahdata = [173,219,35,90,66,26]
        ax.pie(jumlahdata, labels=minuman, autopct='%1.2f%%')
        plt.show()
    elif coba == 0:
        print('Keluar Dari Program')
        break
    else:
        break









    