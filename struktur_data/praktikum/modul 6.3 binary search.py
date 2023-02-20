def binarySearch(listData, data):
    first = 0
    last = len(listData) - 1
    found = False
    stop = True
    iterasi = 0
    hasil = []

    while first <= last and stop:

        midpoint = int((first + last) // 2)

        if listData[midpoint] == data:
            found = True
            hasil.append(midpoint)
            if len(hasil) == listData.count(data):
                stop = False
            else :
                if iterasi % 2 == 0 and iterasi > 1:
                    first = midpoint + 1
                else:
                    last =  midpoint - 1

        elif data > listData[midpoint]:
            first = midpoint + 1
        elif data < listData[midpoint]:
            last = midpoint - 1
                
        iterasi = iterasi + 1

    if hasil == []:
        hasil = "data tidak ada"

    if found :
        print("Posisi data : ", hasil)
    else:
        print("Posisi data : ", hasil)
    print("Jumlah Iterasi = ", iterasi)

    
print("---------------CONTOH 1---------------")
a = [1,1,5,5,5,8,9,10,12,26]
binarySearch(a,5)

print("\n---------------CONTOH 2---------------")
a = [1,1,5,5,5,8,9,10,12,26]
binarySearch(a,10)

print("\n---------------CONTOH 3---------------")
a = [1,1,5,5,5,8,9,10,12,26]
binarySearch(a,1)

print("\n---------------CONTOH 4---------------")
a = [1,1,5,5,5,8,9,10,12,26]
binarySearch(a,20)