print("Membuat Counter")

push = 0
while (True) :
    control = str(input("Tekan tombol :"))
    if control == "p" :
        push += 1 # p = p+1
        print (push)
    elif control == "r" :
        push = 0
        print(push)
    else :
        print ("inputan salah")