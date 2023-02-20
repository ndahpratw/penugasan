import turtle

pola = turtle.Turtle()
layar = turtle.Screen

def fractal(level, dis):
    warna = ["white", "white", "white", "white"]
    garis = level % 4

    if level == 0:
        print()
        print("outer")
        pola.begin_fill()
        pola.color("black", warna[garis])
        pola.forward(dis * 2)
        pola.right(90)
        pola.forward(dis * 2)
        pola.right(90)
        pola.forward(dis * 2)
        pola.right(90)
        pola.forward(dis * 2)
        pola.right(90)

        #inline
        print("inline2")
        pola.forward(dis)
        pola.right(90)
        pola.forward(dis * 2)
        pola.right(90)
        pola.forward(dis)
        pola.right(90)
        pola.forward(dis * 2)
        pola.right(90)

        #inline2
        print("inline2")
        pola.forward(dis * 2)
        pola.right(90)
        pola.forward(dis)
        pola.right(90)
        pola.forward(dis * 2)
        pola.right(90)
        pola.forward(dis)
        pola.right(90)
        pola.end_fill()

        fractal(level - 1, dis / 2)
    else:
        #outer
        print
        print("garis luar")
        pola.begin_fill()
        pola.color("black", warna[garis])
        pola.forward(dis * 2)
        pola.right(90)
        pola.forward(dis * 2)
        pola.right(90)
        pola.forward(dis * 2)
        pola.right(90)
        pola.forward(dis * 2)
        pola.right(90)

        #inline1
        print("garis 1")
        pola.forward(dis)
        pola.right(90)
        pola.forward(dis)
        pola.right(90)
        pola.forward(dis)
        pola.right(90)
        pola.forward(dis)
        pola.right(90)

        #inline2
        print("garis 2")
        pola.forward(dis)
        pola.right(90)
        pola.forward(dis * 2)
        pola.right(90)
        pola.forward(dis)
        pola.right(90)
        pola.forward(dis * 2)
        pola.right(90)

        #inline3
        print("garis 3")
        pola.forward(dis * 2)
        pola.right(90)
        pola.forward(dis)
        pola.right(90)
        pola.forward(dis * 2)
        pola.right(90)
        pola.forward(dis)
        pola.right(90)
        pola.end_fill()

        fractal(level - 1, dis / 2)


def main():
    pola.penup()
    pola.goto(-200, 200)
    pola.pendown()

    fractal(3, 200)

    return main

main()