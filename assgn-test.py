array = [
    9, 44, 32, 12, 7, 42, 34, 92, 35, 37, 41, 8, 20, 27, 83, 64, 61, 28, 39,
    93, 29, 17, 13, 14, 55, 21, 66, 72, 23, 73, 99, 1, 2, 88, 77, 3, 65, 83,
    84, 62, 5, 11, 74, 68, 76, 78, 67, 75, 69, 70, 22, 71, 24, 25, 26
]


def remove(array):
    array_element = {x: 0 for x in array}
    for x in range(len(array)):
        if x == 0:
            for y in range(2, len(array)):
                if array[y] < array[x]:
                    array_element[array[x]] = array_element[array[y]] + 1
        elif x > 0:
            for y in range(0, x):
                if array[y] > array[x]:
                    array_element[array[x]] = array_element[array[y]] + 1
            for y in range(x + 1, len(array)):
                if array[y] > array[x]:
                    array_element[array[x]] = array_element[array[y]] + 1

    index = -1
    max = 0
    for x in range(len(array)):
        if array_element[array[x]] >= max:
            index = i
            max = array_element[array[x]]

    del (array[index])


while True:
    remove(array)
    cnt = 0
    for x in range(len(array) - 1):
        if array[x] > array[x + 1]:
            cnt = cnt + 1
    if cnt == 0:
        break
for x in array:
    print(x)
