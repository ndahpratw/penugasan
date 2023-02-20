#Reminder Function merupakan fungsi hash yang digunakan untuk menentukan posisi atau slot data pada hash tabel
def remainderFunction(data, slot):
    return (data % slot)
#print("Data berada di posisi ke - ",remainderFunction(55,10))

#Create Hash Tabel merupakan fungsi untuk membuat hash tabel
def createHashTable (slot):
    temp = []
    for i in range(slot):
        temp.append([])
        temp[i].append(None)
    return temp
#print(createHashTable(11))

#Chaining merupakan fungsi yang bertujuan menempatkan sejumlah data pada hash tabel yang telah dibuat
def chaining(data, hashTabel):
    for i in range(len(data)):
        indeks = remainderFunction(data[i], len(hashTabel))
        hashTabel[indeks].append(data[i])
        if hashTabel[indeks][0]==None:
            hashTabel[indeks].remove(None)
    return hashTabel

a = [54, 26, 93, 17, 77, 31, 44, 55, 20]
hashTabel = createHashTable(11)
print(chaining(a, hashTabel))

#Search Hash merupakan fungsi pencarian suatu data berdasarkan fungsi hash yang telah dibuat sebelumnya
def searchHash(data,hashTabel):
    found = False
    slot = 0
    while slot < len(hashTabel) and not found:
        indeks = 0
        while indeks < len(hashTabel[slot]) and not found:
            if data == hashTabel[slot][indeks]:
                found = True
            if found == False:
                indeks = indeks + 1
        if found == False:
            slot = slot + 1
    if found == True:
        print("Data", data, "berada pada slot ke ", slot, "dan indeks ke -", indeks)
    else:
        print("Data", data, "tidak ada dalam tabel")
        
searchHash(66,hashTabel)
searchHash(54,hashTabel)
searchHash(20,hashTabel)
searchHash(55,hashTabel)
searchHash(100,hashTabel)