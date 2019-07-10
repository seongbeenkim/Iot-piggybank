import smbus
import time
 # for RPI version 1, use “bus = smbus.SMBus(0)”
bus = smbus.SMBus(1)

# This is the Arduino_address we setup in the Arduino Program
Arduino_address = 0x04

def writeNumber(value):
    bus.write_byte(Arduino_address, value)
    # bus.write_byte_data(Arduino_address, 0, value)
    return -1

def readNumber():
    number = bus.read_byte(Arduino_address)
    # number = bus.read_byte_data(Arduino_address, 1)
    return number


while True:
    try:
        var = int(input("Enter 0 - 12: "))
    except ValueError:
        print ("Could you at least give me an actual number?")
        continue
    
    #writeNumber(var)
    if var == 9:
        writeNumber(9)
    elif var == 8:
        writeNumber(8)
    elif var == 7:
        writeNumber(7)
    elif var == 6:
        writeNumber(6)
    elif var == 5:
        writeNumber(5)
    elif var == 4:
        writeNumber(4)
    elif var == 3:
        writeNumber(3)
    elif var == 2:
        writeNumber(2)
    elif var == 1:
        writeNumber(1)
    elif var == 0:
        writeNumber(0)
    elif var == 10:
        writeNumber(10)
    elif var == 11:
        writeNumber(11)
    elif var == 12:
        writeNumber(12)
    elif var == 13:
        writeNumber(13)
    elif var == 14:
        writeNumber(14)
    elif var == 15:
        writeNumber(15)
    elif var == 16:
        writeNumber(16)
    elif var == 17:
        writeNumber(17)
    elif var == 18:
        writeNumber(18)
    elif var == 19:
        writeNumber(19)
    elif var == 20:
        writeNumber(20)
    elif var == 100:
        writeNumber(100)       
    print ("RPI: Hi Arduino, I sent you ", var)
    # sleep one second
    time.sleep(1)
    #number = readNumber()
    #print ("Arduino: Hey RPI, I received a digit ", number)

