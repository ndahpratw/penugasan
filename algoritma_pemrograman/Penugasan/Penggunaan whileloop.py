print ("Membuat Program List")
list_alat_tulis = ['buku','pensil','bolpoin','penghapus','penggaris','stabilo']

print('''Opsi :
1) untuk melihat isi list
2) untuk menginput list
3) untuk menghapus 1 list dari depan
4) selesai
''')
while (True):
    listku = int(input('Masukan list alat tulis :'))
    if listku == 1 :
        print(list_alat_tulis)
    elif listku == 2 :
        n = str(input('Masukan tambahan list alat tulis :'))
        list_alat_tulis.insert(1,n)
        print(list_alat_tulis)
    elif listku == 3 :
        n = str(input('List alat tulis yang ingin dihapus :'))
        list_alat_tulis.remove(n)
        print(list_alat_tulis)
    elif listku == 4 :
        print('Selesai')
    else :
        print('Opsi Salah')

        
