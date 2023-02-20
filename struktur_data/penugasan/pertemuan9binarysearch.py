def binarySearch(listData, data):
    first = 0
    last = len(listData) - 1
    found = False
    while first <= last and not found:

        midpoint = (first + last) // 2
        if listData[midpoint] == data:
            found = True
        else:
            if data < listData[midpoint]:
                last = midpoint - 1
            else:
                first = midpoint + 1

    return found
    
a=[4,6,10,34,56,78,99]
#print(binarySearch(a,34))


#SECARA REKURSIF
def binarySearch2(listData, data):
    first = 0
    last = len(listData) - 1
    if len(listData) == 0:
        return False
    else:
        midpoint = len(listData) // 2
        if listData[midpoint] == data:
            return True
        else:
            if data < listData[midpoint]:
                return binarySearch2(listData[first:last+1], data)
            else:
                return binarySearch2(listData[midpoint + 1:], data)
a=[4,6,10,34,56,78,99]
print(binarySearch2(a,78))
