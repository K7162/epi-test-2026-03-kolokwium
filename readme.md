# Zadanie

Szablon projektu został skonfigurowany na podstawie [Symfony Starter Kit](https://bitbucket.org/tchojna/docker-symfony-starter-kit/src/master/). W projekcie zostały przygotowane encje `Contact`, `Group` oraz pliki pozwalające na zasilenie bazy danych losowymi danymi.

Przygotuj mechanizm edycji kontaktu (encja `Contact`). 

Pamiętaj o walidacji danych, tłumaczeniach, komentarzach. Po zapisaniu rekordu do bazy danych użytkownik powinien zostać przekierowany do porcjowanej listy kontaktów.

## Reguły walidacji

* `firstName` - pole wymagane o minimalnej długości 3 znaki, a maksymalnej będącej długością pola w bazie danych,
* `lastName` - pole wymagane o minimalnej długości 3 znaki, a maksymalnej będącej długością pola w bazie danych,
* `email` - pole wymagane będące poprawnym adresem email, o długości maksymalnej będącej długością pola w bazie danych,
* `phone_number` - pole opcjonalne, numer telefonu (w formacie +48 123 456 789 lub +48 12 345 67 89),
* `phone_number_type ` - pole wymagane, tylko i wyłącznie, wtedy gdy pole `phone_number` jest poprawnym numerem telefonu,
* `contactGroups ` - pole pozwalające przypisać kontakt to wielu grup.

## Informacje ogólne
* przesłana praca ma być pracą samodzielną,
* kod zadania ma być zgodny ze składnią zaprezentowaną na zajęciach (podział na klasy, walidacja danych, stosowanie warstwy serwisów, optymalizacja zapytań Doctrine),
* powinien przechodzić poprawnie statyczną analizę kodu zgodnie ze standardem Symfony (w katalogu projektu, w konsoli wystarczy wykonać polecenie `composer static-analysis`; komenda nie modyfikuje kodu), 
* proszę pamiętać o uzupełnieniu tłumaczeń,
* wszystkie klasy i metody powinny być poprawnie udokumentowane zgodnie ze standardem _PHPDoc_,
* w odpowiedzi proszę przesłać link do repozytorium _Git_ na adres: **tomasz.chojna@uj.edu.pl**