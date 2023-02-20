print("Algoritma Modifikasi Selection Sort")
def selectionSort(list):
    print("Data Awal = ", list)
    indeks = 0
    n = len(list)
    while indeks < len(list) // 2:
        print("Iterasi ke - ", indeks + 1)

        #indeks nilai minimal
        minFlag = indeks
        for j in range(indeks+1, len(list)):
            if list[minFlag] > list[j]:
                minFlag = j
        list[indeks], list[minFlag] = list[minFlag], list[indeks]
        print("Urutan data minimal : ", list)

        #indeks nilai maksimal
        maksFlag = n - 1
        for k in range(n-2, indeks, -1):
            if list[maksFlag] < list[k]:
                maksFlag = k
        list[n-1], list[maksFlag] = list[maksFlag], list[n-1]
        n = n - 1
        indeks = indeks + 1
        print("Urutan data maksimal : ", list)
    return list

list = [10,2,5,8,1,20,7,12,4]
dataurut = selectionSort(list)
print("Data Urut = ", dataurut)