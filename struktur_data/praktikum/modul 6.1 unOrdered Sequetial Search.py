def unOrderedSeqSearch(listData, data):
    i = 0
    found = False
    hasil = []
    iterasi = 0
    
    for i in range (0, len(listData)):
        if listData[i] == data:
            found = True
            hasil.append(i)
        i = i+1
        iterasi = iterasi + 1

    if hasil == []:
        hasil = "Data tidak ada"
    
    if found:
        print("Posisi data = ", hasil)
    else:
        print("Posisi data = ", hasil)
    print("Jumlah iterasi = ", iterasi)


print("---------------CONTOH 1---------------")
a = [1,5,9,8,1,5,10,26,5,12]
unOrderedSeqSearch(a,0)

print("\n---------------CONTOH 2---------------")
a = [1,5,9,8,1,5,10,26,5,12]
unOrderedSeqSearch(a,9)

print("\n---------------CONTOH 3---------------")
a = [1,5,9,8,1,5,10,26,5,12]
unOrderedSeqSearch(a,5)