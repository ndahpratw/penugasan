print("Pengurutan Acsending antara indeks genap dan indeks ganjil pada suatu Data")

def urutData(urutanacak):
    print("Data yang akan diurutkan : ", urutanacak)
    n = len(urutanacak)
    indeks = 0

    while indeks == 0 :
        indeks = 1
        #loop untuk indeks genap
        for a in range(0, n-1, 2): 
            if urutanacak[a] > urutanacak[a+1]:
                urutanacak[a], urutanacak[a+1] = urutanacak[a+1], urutanacak[a]
                indeks = 0
        print("Genap - Ganjil Sorting")
        print(urutanacak) 

        #loop untuk indeks ganjil
        for b in range(1, n-1, 2): 
            if urutanacak[b] > urutanacak[b+1]:
                urutanacak[b], urutanacak[b+1] = urutanacak[b+1], urutanacak[b]
                indeks = 0
        print("Ganjil - Genap Sorting")
        print(urutanacak)
    return urutanacak


urutanacak = [13,12,10,8,7,5,11,2]
terurut = urutData(urutanacak)
print("Data yang sudah terurut  : ", terurut)