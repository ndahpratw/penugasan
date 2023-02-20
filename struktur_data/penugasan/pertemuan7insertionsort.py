a = [3, 7, 5, 10, 1]
for i in range(1, len(a)):
    key = a[i] #key = data ke i
    print("key : ",key) #tampilkan key
    j = i - 1 #penanda iterasi awal
    while j >= 0 and key <= a[j]:
        a[j+1] = a[j] # data pada j akan berada di posisi j+1
        print(j, ' = ', a) #tampilakan data
        j = j - 1 
    #jika perulangan sudah tidak terpenuhi maka baris ini dijalankan :
    a[j+1] = key #key berada di posisi j+1
    print(j," = ",a) #tampilkan data