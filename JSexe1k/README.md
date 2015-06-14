# JSexe1k
Proof of concept: making JSexe compatible with js1k!

## Demo:
https://rawgit.com/xem/JSexe1k/gh-pages/index2.html

- This demo index2.html contains an iframe. (to imitate js1k demo page)
- This iframe loads index.html (it's the demo itself)
- index.html contains all bytes from 0x00 to 0xFF (starting from byte 33).
- index.html makes an ajax request to itself and takes the bytes 33-289, logs each char and makes a base64 string.
- It works. That base64 represents all the bytes 0x00-0xFF!
- Next time: try with a real png, and try to bootstrap some JS code with it.