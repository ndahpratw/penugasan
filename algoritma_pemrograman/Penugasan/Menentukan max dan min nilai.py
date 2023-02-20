nama = ["ananda","mahmud","ilham","tamam","ahmad","selma","mufida","karin","sofwan","imam",
"syahrul","putri","layli","gunawan","cahya","dava","putra","rowaldi","annisa","faren"]
nilai = [87,80,90,65,82,69,76,92,60,83,73,95,85,70,66,64,95,91,65,88]
x = len(nama)
max = max(nilai)
index_a = nilai.index(max)

min = min (nilai)
index_b = nilai.index(min)

for y in range(0,x):
    print ("nama :",nama[y],":",nilai[y])
    
print ("nilai tertinggi :",nama[index_a],":",max)
print ("nilai terendah :",nama[index_b],":",min)


