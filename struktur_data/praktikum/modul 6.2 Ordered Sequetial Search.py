def OrderedSeqSearch(listData, data):
    i = 0
    found = False
    stop = False
    iterasi = 0
    hasil = []

    while not stop and not found:
        if listData[i] > data:
            stop = True
        elif listData[i] == data:
            hasil.append(i)
            if listData[i + 1] == data:
                found = False
        i += 1
        iterasi += 1
    found = True

    if hasil == []:
        hasil = "Data tidak ada"

    if found:
        print("Posisi data = ", hasil)
    else:
        print("Posisi data = ", hasil)
    print("Jumlah iterasi = ", iterasi)


print("---------------CONTOH 1---------------")
a = [1,1,5,5,5,8,9,10,12,26]
OrderedSeqSearch(a,0)

print("\n---------------CONTOH 2---------------")
a = [1,1,5,5,5,8,9,10,12,26]
OrderedSeqSearch(a,9)

print("\n---------------CONTOH 3---------------")
a = [1,1,5,5,5,8,9,10,12,26]
OrderedSeqSearch(a,5)