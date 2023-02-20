#iterasi dalam
a = [4,6,1]
for i in range(len(a)-1,0,-1):
    print('iterasi - ', i)
    #iterasi dalam
    for j in range(i):
        if a[j]>a[j+1]:
            a[j], a[j+1] = a[j+1], a[j]
        print(a)
print('data terurut = ', a)

print('\n----------ACSENDING----------')

a = [10,6,7,1]
#iterasi luar
for i in range(len(a)-1,0,-1): #(awal, akhir, interval(-1))
    print('iterasi - ', i)
    #iterasi dalam
    for j in range(i):
        if a[j]>a[j+1]: #jika data pada indeks i < indeks di (i +1) 
            a[j], a[j+1] = a[j+1], a[j] #maka terjadi pertukaran data
        print(j+1,' = ',a)
print('data terurut = ', a)

print('\n----------HEMAT ITERASI----------')

a = [10,6,7,1]
for i in range(len(a)-1,0,-1): 
    print("iterasi ke-",len(a)-i)
    for j in range(i):
        if a[j] < a[j+1]:
            continue
        else:
            a[j], a[j+1] = a[j+1], a[j]
        print(j + 1,"=", a)
print("data yang sudah terurut = ",a)

print('\n----------DESCENDING----------')

a = [10,6,7,1]   
for i in range(len(a)-1,0,-1): #(awal, akhir, interval(-1))
    print('iterasi - ', i)
    for j in range(i):
        if a[j]<a[j+1]: #jika data i < i +1
            a[j], a[j+1] = a[j+1], a[j] #maka terjadi pertukaran data
        print(j+1,' = ',a)
print('data terurut = ', a)

