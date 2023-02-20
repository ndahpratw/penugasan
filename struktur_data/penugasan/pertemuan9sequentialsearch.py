#menampilkan nilai
def seqSearch(listData, data):
    ind = 0
    found = False
    while ind < len(listData) and not found:
        if listData[ind] == data:
            found = True
        else:
            ind = ind+1
    return found
a=[12,5,9,8,1,10,26]
#print(seqSearch(a,1))


#menampilkan indeks
def seqSearch(listData, data):
    i = 0
    found = False
    while i < len(listData) and not found:
        if listData[i] == data:
            ind = i 
            found = True
        #else:
        i = i+1
    if found :
        return ind
    else:
        return found
a=[12,5,9,8,1,10,26]
#print(seqSearch(a,2))


def orderedSeqSearch(listData, data):
    ind = 0
    found = False
    stop = False
    position=[]
    while ind < len(listData) and not found and not stop:
        if listData[ind] >= data:
            found = True
            position.append(ind)
        else:
            ind = ind+1
    if found:
        return position
    else:
        return ('Data tidak ada')

a=[1,1,5,5,5,8,9,10,12,26]
ind=orderedSeqSearch(a,5)
#print(ind)

def orderedSeqSearch(listData, key):
    found = False
    i = 0
    stop = False
    count = 0
    while not stop and not found:
        if i == len(listData) or listData[i] > key:
            stop = True
        elif listData[i] == key:
            ind = i
            found = True
        i += 1
        count += 1
    print("counter = ", count)
    if found :
        return ind
    else :
        return False

a = [12,12,15,25,30,54,73]
#print(orderedSeqSearch(a, 54))
