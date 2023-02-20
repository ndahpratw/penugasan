nama = ["ananda","mahmud","ilham","tamam","ahmad","selma","mufida","karin","sofwan","imam",
"syahrul","putri","layli","gunawan","cahya","dava","putra","rowaldi","annisa","faren"]
nilai = [87,80,90,65,82,69,76,92,60,83,73,95,85,70,66,64,58,91,65,]
rtrn = [87,80,90,65,82,69,76,92,60,83,73,95,85,70,66,64,55,91,65,]
nilai.sort()
nilai.reverse()
syarat_nilai = nilai.index(65)
a = -1
print ("Mahasiswa LULUS : nilai > 65 : ")
for i in range (0,syarat_nilai):
    a = a + 1
    b = nilai[a]
    indx = rtrn.index(b)
    print (nama[indx],":",b)



    