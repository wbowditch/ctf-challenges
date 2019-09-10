from PIL import Image
border = [(255,255,255),(255,255,255),(255,255,255),(255, 105, 180),(255, 105, 180),(255, 105, 180),(255, 105, 180),(255, 105, 180),(255, 105, 180),(255,255,255),(255,255,255),(255,255,255)]

#flag ltdh19{python_is_a_weapon}

img = Image.open("whatdoisay.png")
imgData = img.getdata()
width, height = img.size

def rearrangeBorder(pixelList, borderList):
    tempList = []
    rearrangedList = []
    counter = 0
    for index in range(len(pixelList)):
        tempList.append(pixelList[index])
        if tempList[-len(borderList):] != borderList:
            counter+=1
        else:
            rearrangedList += pixelList[counter+1:]
            rearrangedList += pixelList[:counter+1]
    return(rearrangedList)


newImg = []
newnewImg = []
counter = 0
totalPixels = 0


for index in range(height):
    newRow = []
    for index in range(width):
        newRow.append(imgData[counter][:-1])
        counter+=1
    rearrRow = rearrangeBorder(newRow, border)
    for aTuple in rearrRow:
        newImg.append(aTuple)


img.putdata(newImg)
img.save("flag_unscrambled.png", "PNG")
