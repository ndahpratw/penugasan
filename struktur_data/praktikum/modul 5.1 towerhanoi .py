print("Pemindahan 4 Lempengan dari A ke C dengan menggunakan bantuan B\n")

def setting(asal, tujuan): #setting perpindahan lempengan
    if asal == "A" and tujuan == "B" :
        asal = A
        tujuan = B
    elif asal == "A" and tujuan == "C" :
        asal = A
        tujuan = C
    elif asal == "B" and tujuan == "A" :
        asal = B
        tujuan = A
    elif asal == "B" and tujuan == "C" :
        asal = B
        tujuan = C
    elif asal == "C" and tujuan == "A" :
        asal = C
        tujuan = A
    elif asal == "C" and tujuan == "B" :
        asal = C
        tujuan = B

    tujuan.insert(0, asal.pop(0)) #lempengan di tower tujuan merupakan lempengan di tower asal yang paling atas
    
    #menampilkan lempengan di tiap tower
    print('A : ')
    for i in A:
        print("|", i, "|")
    print('B : ')
    for i in B:
        print("|", i, "|")
    print('C : ')
    for i in C:
        print("|", i, "|")

def tower(n, asal, bantuan, tujuan): #fungsi towerhanoi
    if n == 1:
        print("Lempengan - 1 dari - ", asal, "ke - ", tujuan)
        setting(asal, tujuan)
    else:
        tower(n-1, asal, tujuan, bantuan)
        print("Lempengan - ", n, "dari", asal, "ke - ", tujuan)
        setting(asal, tujuan)
        tower(n-1, bantuan, asal, tujuan)

A = [1, 2, 3, 4]
B = []
C = []

print("A : ")
for i in A:
    print("|", i, "|")

tower(4, "A", "B", "C")
