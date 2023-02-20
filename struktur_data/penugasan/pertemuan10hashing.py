def remainderFunction(data, slot):
    return (data % slot)

def linearProbing(ind,hashTable,data):
    count = ind
    found = False
    while (count != ind - 1) and not(found):
        if hashTable[count] == 'none':
            found = True
            hashTable[count] = data
        else:
            count = count + 1
        if count == len(hashTable) - 1:
            count = 0
    return(hashTable)


a = [54, 26, 93, 17, 77, 31]
