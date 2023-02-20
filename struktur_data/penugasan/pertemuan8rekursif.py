#FAKTORIAL
#secara iteratif
def factorialIteratif(bilangan):
    if bilangan <= 1:
        return(1)
    else:
        temp = bilangan
        hasil = 1
        while temp > 1:
            hasil = hasil * temp
            temp = temp-1
        return(hasil)

print(factorialIteratif(4))

#secara rekursif
def factorialRekursif(bilangan):
    if bilangan <= 1:
        return(1)
    else:
        return(bilangan * factorialRekursif(bilangan-1))
 
print(factorialRekursif(4))


#TRIANGULAR NUMBERS
#secara iteratif
def triangularNumbers1(n):
    total = 0
    temp = n
    while temp>=1:
        total = total + temp
        temp = temp - 1
    return(total)
print(triangularNumbers1(4))

#secara rekursif
def triangularNumbers(n):
    if n == 1:
        return(1)
    else:
        return(n + triangularNumbers(n-1))
print(triangularNumbers(4))


#KONVERSI DESIMAL
#secara iteratif
def konversiDesimal(bilangan,base):
    charBilangan = '0123456789ABCDEF'
    if bilangan < base:
        return(charBilangan[bilangan])
    else:
        temp = bilangan // base
        ind = bilangan % base
        print(type(temp),temp,type(ind),ind)
    return(konversiDesimal(temp,base)+charBilangan[ind])

konversiDesimal(5,2)

#TURTLE
import turtle
my_turtle = turtle.Turtle()
my_win = turtle.Screen()
def draw_spiral(my_turtle, line_len):
    if line_len > 0:
        my_turtle.forward(line_len)
        my_turtle.right(90)
        draw_spiral(my_turtle, line_len - 5)
        draw_spiral(my_turtle, 90)
        my_win.exitonclick()

#draw_spiral(my_turtle, 90)
#my_win.exitonclick()


#FRACTAL
import turtle
def tree(branch_len, t):
    t.speed('slowest')
    if branch_len > 5:
        t.forward(branch_len)
        t.right(20)
        tree(branch_len - 15, t)
        t.left(40)
        tree(branch_len - 15, t)
        t.right(20)
        t.backward(branch_len)
def main():
    my_win = turtle.Screen()
    t = turtle.Turtle()
    
    t.shape("turtle")
    t.left(90)
    t.up()
    t.backward(100)
    t.down()
    t.color("green")
    tree(60, t)
    my_win.exitonclick()

main()
