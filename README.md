# OpenScope szótár
A magyar honosítási közösség szótár alkalmazása

## Használat

### Adatbázis

Szükséges egy MariaDB/MySQL telepítés, valamint kell egy felhasználó:

* Felhasználónév: openscope
* Jelszó: openscope
* Tudjon távolról bejelentkezni

Majd le kell futtatni a **database** mappában lévő SQL fájlt.

## DOcker

Ezután indítható a Docker konténer, a következő parancsokkal:

```
docker build -t glossary .
docker run -v /path/to/glossary:/var/www/html glossary
```

A böngészőben itt lesz elérhető a projekt:

```
http://172.17.0.2/
```
