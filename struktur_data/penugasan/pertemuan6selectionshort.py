print("Program Selection Sort Secara Ascending\n")

def selectionSort(listData):
    for outerloop in range(len(listData)-1):
        minFlag = outerloop
        for j in range(outerloop + 1, len(listData)): 
            if listData[minFlag] > listData[j]:
                minFlag = j
                print("Proses Pemilihan Data Terkecil")
                print("Data terkecil :", listData[minFlag])
        listData[outerloop], listData[minFlag] = listData[minFlag], listData[outerloop]
        print("Iterasi ke -", outerloop+1, ":", listData)
        print("\n---------------------------------------------\n")
        
data = [7,6,3,5,4]
print("Sebelum diurutkan :", data, "\n")
selectionSort(data)
print("Setelah diurutkan", data)

# def selectionSort(listData):
#     print('Algoritma Selection Sort konvensional')
#     print('Data Awal=',listData)
#     for outIter in range(len(listData)-1):
#         minIndex=outIter
#         for i in range(outIter+1,len(listData)):
#             if listData[i]<listData[minIndex]:
#                 minIndex=i
#                 print("Data terkecil :", listData[i])
#         temp=listData[outIter]
#         listData[outIter]=listData[minIndex]
#         listData[minIndex]=temp
#         # listData[outIter] = listData[minIndex]
#         # listData[minIndex] = listData[outIter]
#         print('Iterasi ke-',outIter+1,':',listData)
#     print('Data Urut=',listData)

# a=[7,6,3,5,4]
# #a=[10,2,5,8,1,7,12,4]
# selectionSort(a)