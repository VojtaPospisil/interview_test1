Implementujte třídu Person.

```php
class Person{
}
```

Osoba má tyto informace:
- ID
- jméno
- příjmení
- pohlaví [F,M]
- datum narození

Tyto informace lze z instance třídy získat, ale nelze je již měnit (možnost změny pohlaví a přejmenování neuvažujeme).
Operace:
- získání délky života osoby ve dnech


Implementujte třídu Group, která pracuje s instancemi třídy Person.

```php
class Group{
}
```


Obecné požadavky:
- v jednom okamžiku může existovat pouze jedna instance třídy Group.
- s třídou musí být možné pracovat jako s polem (klíče jsou ID osob) a procházet ji foreach cyklem
Další požadované operace:
- načtení hodnot z datového souboru nestandartního formátů viz níže
- získání osoby dle ID
- možnost získání procentuálního zastoupení vybraného pohlaví ve skupině

Záznam importního souboru je realizován na více řádcích vždy odělen prázdným řádkem. Příklad importního soubru je v ```data.txt```
```
<jméno> <příjmení>
<muž|žena> <datum narození>

```  

```
Jan Novák
muž  01.11.1962

Jana Nováková
žena 01.11.1959
```

Teoretický předpoklad velikosti souboru jsou stovky MB. 




