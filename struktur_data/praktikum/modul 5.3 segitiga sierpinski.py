import turtle

def draw_triangle(poin, warna, pola):
    pola.speed('slowest')
    pola.fillcolor(warna)
    pola.up()
    pola.goto(poin[0][0],poin[0][1])
    pola.down()
    pola.begin_fill()
    pola.goto(poin[1][0], poin[1][1])
    pola.goto(poin[2][0], poin[2][1])
    pola.goto(poin[0][0], poin[0][1])
    pola.end_fill()

def get_mid(p1, p2):
    return ((p1[0] + p2[0]) / 2, (p1[1] + p2[1]) / 2)

def sierpinski(poin, level, pola):
    warnaSegitiga = ["blue", "gray" , "black"]
    draw_triangle(poin, warnaSegitiga[level], pola)
    if level > 0:
        sierpinski([poin[0],get_mid(poin[0], poin[1]), get_mid(poin[0], poin[2])], level-1, pola)
        sierpinski([poin[1],get_mid(poin[0], poin[1]), get_mid(poin[1], poin[2])], level-1, pola)
        sierpinski([poin[2],get_mid(poin[2], poin[1]), get_mid(poin[0], poin[2])], level-1, pola)

def main():
    pola = turtle.Turtle()
    layar = turtle.Screen()
    points = [[-100, -100], [0, 150], [100, -100]]
    sierpinski(points, 2, pola)
    layar.exitonclick()
    
main()

