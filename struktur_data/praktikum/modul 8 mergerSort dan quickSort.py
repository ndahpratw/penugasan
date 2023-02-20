#----------------------------- ASCENDING MERGER SORT -----------------------------
iterasi,banding,geser = 0,0,0
def mergerSortAsc(listData):
    global iterasi,banding,geser
    if len(listData) > 1:
        mid = len(listData) // 2
        leftData = listData[:mid]
        rightData = listData[mid:]
        mergerSortAsc(leftData)
        mergerSortAsc(rightData)
        i,j,k = 0,0,0
        while i < len(leftData) and j < len(rightData):
            if leftData[i] < rightData[j]:
                listData[k] = leftData[i]
                i += 1
                geser +=1
            else:
                listData[k] = rightData[j]
                j += 1
            k += 1
            banding +=1
        while i < len(leftData):
            listData[k] = leftData[i]
            i += 1
            k += 1
        while j < len(rightData):
            listData[k] = rightData[j]
            j += 1
            k += 1
    if len(listData) > 1:
        iterasi +=1
        print("Iterasi Ke - ", iterasi)
        print("Merging : ", listData)
    return geser,banding

#----------------------------- DESCENDING MERGER SORT -----------------------------
def mergerSortDesc(listData):
    global iterasi,banding,geser
    if len(listData) > 1:
        mid = len(listData) // 2
        leftData = listData[:mid]
        rightData = listData[mid:]
        mergerSortDesc(leftData)
        mergerSortDesc(rightData)
        i,j,k = 0,0,0
        while i < len(leftData) and j < len(rightData):
            if leftData[i] > rightData[j]:
                listData[k] = leftData[i]
                i += 1
                geser +=1
            else:
                listData[k] = rightData[j]
                j += 1
            k += 1
            banding +=1
        while i < len(leftData):
            listData[k] = leftData[i]
            i += 1
            k += 1
        while j < len(rightData):
            listData[k] = rightData[j]
            j += 1
            k += 1
    if len(listData) > 1:
        iterasi +=1
        print("Iterasi ke - ", iterasi)
        print("Merging ", listData)
    return geser,banding

#----------------------------- ASCENDING QUICK SORT -----------------------------
iterasi  = 0
banding = 0
geser = 0

def partitionAsc(listData, indeksAwal, indeksAkhir):
    global iterasi,banding,geser
    pivot = listData[indeksAwal]
    indAwal = indeksAwal + 1
    indAkhir = indeksAkhir

    while True:
        while indAwal <= indAkhir and listData[indAkhir] >= pivot:
            indAkhir = indAkhir - 1
            banding +=1
        while indAwal <= indAkhir and listData[indAwal] <= pivot:
            indAwal = indAwal + 1
            banding +=1
        if indAwal <= indAkhir:
            listData[indAwal], listData[indAkhir] = listData[indAkhir], listData[indAwal]
            geser +=1
        else:
            break
    listData[indeksAwal], listData[indAkhir] = listData[indAkhir], listData[indeksAwal]
    geser +=1
    iterasi +=1
    print("Iterasi ke - ", iterasi)
    print(listData, "Pivot ---> ", pivot)
    return indAkhir

def quickSortAsc(listData, indeksAwal, indeksAkhir):
    if indeksAwal < indeksAkhir:
        p = partitionAsc(listData, indeksAwal, indeksAkhir)
        quickSortAsc(listData, indeksAwal, p-1)
        quickSortAsc(listData, p+1, indeksAkhir)
    return banding,geser


#----------------------------- DESCENDING QUICK SORT -----------------------------
def partitionDesc(listData, indeksAwal, indeksAkhir):
    global iterasi,banding,geser
    pivot = listData[indeksAwal]
    left = indeksAwal + 1
    right = indeksAkhir
    while True:
        while left <= right and listData[left] >= pivot:
            left = left + 1
            banding +=1
        while left <= right and listData[right] <= pivot:
            right = right - 1
            banding +=1
        if right<left:
            break
        else:
            listData[left], listData[right] = listData[right], listData[left]
            geser +=1
    listData[indeksAwal], listData[right] = listData[right], listData[indeksAwal]
    geser +=1
    iterasi +=1
    print("Iterasi ke - ", iterasi)
    print(listData, "Pivot ---> ", pivot)
    return right

def quickSortDesc(listData, indeksAwal, indeksAkhir):
    if indeksAwal < indeksAkhir:
        p = partitionDesc(listData, indeksAwal, indeksAkhir)
        quickSortDesc(listData, indeksAwal, p-1)
        quickSortDesc(listData, p+1, indeksAkhir)
    return banding,geser


#----------------------------- PROGRAM SORT - nya -----------------------------
print("----- PROGRAM PENGURUTAN DATA MENGGUNAKAN METODE MERGE SORT DAN QUICK SORT -----")
listData = [37,83,10,1,45,25,12,90,54]

while True:
    print ('''
    Metode Pengurutan :
    1. Merge Sort
    2. Quick Sort
    ''')
    inputMetodeSort = int(input("Pilih Metode Pengurutan (1/2) : "))

    if inputMetodeSort == 1:
        print ('''
    Pengurutan dilakukan secara :
    1. Ascending (naik)
    2. Descending (turun)
    ''')
        inputUrutan = int(input("Pilih Urutan (1/2) : "))
        if inputUrutan == 1:
            print("\n--------------- PENGURUTAN DATA MENGGUNAKAN MERGER SORT SECARA ASCENDING ---------------")
            print("List Data Awal = ", listData)
            [geser,banding] = mergerSortAsc(listData)
            print("\nBanyaknya perbandingan = ", banding)
            print("Banyaknya pergeseran = ", geser)
        elif inputUrutan == 2:
            print("\n--------------- PENGURUTAN DATA MENGGUNAKAN MERGER SORT SECARA DESCENDING ---------------")
            print("List Data Awal = ", listData)
            [geser,banding] = mergerSortDesc(listData)
            print("\nBanyaknya perbandingan = ", banding)
            print("Banyaknya pergeseran = ", geser)
        else:
            print("Mohon Mengisi Inputan Dengan Tepat")

    elif inputMetodeSort == 2:
        print ('''
    Pengurutan dilakukan secara :
    1. Ascending (naik)
    2. Descending (turun)
    ''')
        inputUrutan = int(input("Pilih Urutan (1/2) : "))
        if inputUrutan == 1:
            print("\n--------------- PENGURUTAN DATA MENGGUNAKAN QUICK SORT SECARA ASCENDING ---------------")
            print("List data sebelum pengurutan = ", listData)
            n = len(listData)
            [banding,geser] = quickSortAsc(listData,0,n-1)
            print("List data setelah pengurutan = ", listData)
            print("\nBanyaknya perbandingan = ", banding)
            print("Banyaknya pergeseran = ", geser)
        elif inputUrutan == 2:
            print("\n--------------- PENGURUTAN DATA MENGGUNAKAN QUICK SORT SECARA ASCENDING ---------------")
            print("List data sebelum pengurutan = ", listData)
            n = len(listData)
            [banding,geser] = quickSortDesc(listData,0,n-1)
            print("List data setelah pengurutan = ", listData)
            print("\nBanyaknya perbandingan = ", banding)
            print("Banyaknya pergeseran = ", geser)
        else:
            print("Mohon Mengisi Inputan Dengan Tepat")
    else:
        print("Mohon Mengisi Inputan Dengan Tepat")


    akhir = input("\nApakah Anda masih ingin menjalankan program ini (y/t) ? ")
    if akhir == "y":
        pass
    else:
        break