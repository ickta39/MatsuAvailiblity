import cv2, time

cap = cv2.VideoCapture(0)

while (cap.isOpened()):
        ret, frame = cap.read()
        if ret is True:
            cv2.imwrite("/var/www/html/image.jpg", frame)
            print("Took a image")
        time.sleep(1)

cap.release()