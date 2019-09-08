from PIL import Image
import codecs

img1 = Image.open("banksy.png")
img2 = Image.open("banksy2.png")

img1Data = img1.getdata()
img2Data = img2.getdata()

output = ""

def hexToStr(h):
    print(h)
    return bytearray.fromhex(h).decode()

def extractHex(pixel):
    if len(pixel) == 4:
        pixel = pixel[:-1]

    pixelHex = '%02x%02x%02x' % (pixel)
    return pixelHex[-1:]

for index in range(len(img1Data)):
    if img1Data[index] != img2Data[index]:
        output = output + extractHex(img2Data[index])
        
print(hexToStr(output))