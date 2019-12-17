<div align="center">

# Dokumentacja projektu: Forum Informatyczne
</div>

## Wykonali: 
- Kamil Kłósek 
- Norbert Marchut
- Łukasz Janowski
- Ireneusz Kiełtyka

<div align="center">

# Opis

Przedmiotem projektu jest forum informatyczne. Powstało ono dla pogłębiania wiedzy o tematyce informatycznej. Forum informatyczne skierowane jest do  graczy, diagnostyków, programistów, maniaków sprzętowych, a także osób które miewają problemy z programowaniem w różnych językach. 
</div>


## 1. Typy użytkowników
1.	Administrator:  Posiada takie sama prawa jak moderator.
2.	Moderator: Posiada prawa do: tworzenia działów/tematów/postów/komentarzy, banowania i odbanowywania użytkowników.
3.	Zalogowany użytkownik: Posiada prawa do: tworzenia postów.
4.	Gość: Posiada prawa do: Przeglądania forum.

## 2.  System rang
System rang będzie klasyfikował użytkowników na podstawie ich udzielania się na forum. Zdobycie rangi, będzie zależne od zdobycia łapek polubień. Im większa ilość łapek polubień tym wyższa ranga. Zakładamy, że wyższy stopień rangi użytkownika będzie go określał jako bardziej pomocnego na forum.
Dodawanie łapek jest w tym projekcie ograniczone. Użytkownik danej przeglądarki ma możliwość dodania tylko jednej oceny. Jest to zasługa użycia biblioteki Fingerprint, która wykorzystuje ustawienia przeglądarki oraz mechanizm hashowania. Po wykonaniu Fingerprinta dostajemy hash przeglądarki, który jest zapisywany do bazy do późniejszych porównań.

## 3. Zamykanie postów
•	Administrator/Moderator  posiadają prawa do zamykania postów.
•	Użytkownik, który stworzył post ma prawo do zamknięcia własnych postów.
## 4. Działy dostępne na forum:
1.	Hardware
1.	„Moje maszyny”
1.	Software
1. Języki programowania
1. Frameworki

## 5. Zarządzanie profilem
-	Administrator posiada opcję zarządzania listą moderatów w której może nadawać prawa zwykłemu użytkownikowi do roli moderatora jak i odbierać.
-	Administrator posiada opcję zarządzania listą użytkowników, dzięki której może banować i odbanowywać.
-	Administrator posiada opcję tworzenia tematów i przypisywanie do wybranej zakładki.

## 6. System tworzenia kont
-	Na forum został zaimplementowany system rejestracji i logowania.

## 7. Technologie wykorzystane w projekcie
- Forum zostało stworzone w środowisku PHPStorm. Mechanizmem kieruje język PHP wraz z Frameworkiem Laravel. Baza danych została wygenerowana w MySQL.

### W projekcie wykorzystano wzorzec MVC
Model-View-Controller (pol. Model-Widok-Kontroler) – to wzorzec architektoniczny służący do organizowania struktury aplikacji posiadających graficzne interfejsy użytkownika.
Wzorzec zakłada podział aplikacji na trzy główne części:
- Model – jest pewną reprezentacją problemu bądź logiki aplikacji.
- Widok – opisuje, jak wyświetlić pewną część modelu w ramach interfejsu użytkownika. Może składać się z podwidoków odpowiedzialnych za mniejsze części interfejsu.
- Kontroler – przyjmuje dane wejściowe od użytkownika i reaguje na jego poczynania, zarządzając aktualizacje modelu oraz odświeżenie widoków.

Struktura katalogów w Laravel przewiduje miejsca, gdzie umieszcza się pliki w zależności od tego czy są to kontrolery, widoki czy modele.

#### Kontrolery
Kontrolery przechowywane są w kalalogu Controllers znajdującym się w katalogu Http w katalogu app.
Są swoistymi łącznikami pomiędzy modelem a widokiem. Odpowiadają za przetwarzanie danych wejściowych i przekazywaniem ich do modelu. Następnie tak przetworzone dane są odbierane i wyświetlone użytkownikowi w widoku w którym wysyłał żądanie albo zostaje przekierowany na inną stronę.

#### Modele
Znajdują się w katalogu app. Stanowią mózg aplikacji. To w nich są zdefiniowane obiekty. Zakładając, że piszemy bloga to w modelu zdefiniujemy klasy opisujące Posty, Tagi, Kategorie, Użytkowników itp. ale to nie wszytko. Żeby taki blog mógł prawidłowo funkcjonować trzeba te klasy i ich obiekty powiązać ze sobą. Powiązania są realizowane przy użyciu kilku rodzajów relacji.

#### Widoki
Pliki widoków umieszczone są w katalogu views znajdującym się w katalogu resources. W Laravel widoki umieszczane są w szablonach Blade. Są to podstawowe pliki HTML, które ładowane są podczas pracy kontrolera. Jest to element z punktu widzenia Back end’owych programistów mało doceniany, ale to właśnie tu użytkownik styka się ze stroną. Dane pobrane z bazy danych, obliczone w modelu poprzez kontroler wysłane do widoku.

<a href="https://github.com/kamile890/Forum_Informatyczne/blob/master/zdj/model-view-controller-mvc.png">
<img src="https://github.com/kamile890/Forum_Informatyczne/blob/master/zdj/model-view-controller-mvc.png"
     alt="MVC"
 >
</a>

#### FingerPrint
Fingerprint ma unikalne podejście do zapobiegania oszustwom w naszej witrynie. Biblioteka generuje unikalny identyfikator przeglądarki bez użycia plików cookie ani żadnych informacji, które może łatwo zmodyfikować złośliwy użytkownik. Przechowując ten identyfikator w bazie danych, zapobiegamy oszustwom, jeśli ktoś próbuje użyć tego samego urządzenia (komputera, tabletu lub telefonu) w celu dwukrotnej rejestracji, wielokrotnego przesłania głosu polubień lub wykonania dowolnego innego podejrzanego działania .
Biblioteka automatycznie wykrywa funkcje przeglądarki i selektywnie sprawdza dostępne parametry przeglądarki.

# Prezentacja forum
<a href="https://github.com/kamile890/Forum_Informatyczne/blob/master/zdj/screeny%20dokumentacja/glowna1.PNG"><img src="https://github.com/kamile890/Forum_Informatyczne/blob/master/zdj/screeny%20dokumentacja/glowna1.PNG" alt="Obraz"></a>

<a href="https://github.com/kamile890/Forum_Informatyczne/blob/master/zdj/screeny%20dokumentacja/glowna2.PNG"><img src="https://github.com/kamile890/Forum_Informatyczne/blob/master/zdj/screeny%20dokumentacja/glowna2.PNG" alt="Obraz"></a>

<a href="https://github.com/kamile890/Forum_Informatyczne/blob/master/zdj/screeny%20dokumentacja/glowna3.PNG"><img src="https://github.com/kamile890/Forum_Informatyczne/blob/master/zdj/screeny%20dokumentacja/glowna3.PNG" alt="Obraz"></a>

<a href="https://github.com/kamile890/Forum_Informatyczne/blob/master/zdj/screeny%20dokumentacja/glowna4.PNG"><img src="https://github.com/kamile890/Forum_Informatyczne/blob/master/zdj/screeny%20dokumentacja/glowna4.PNG" alt="Obraz"></a>

<a href="https://github.com/kamile890/Forum_Informatyczne/blob/master/zdj/screeny%20dokumentacja/glowna5.PNG"><img src="https://github.com/kamile890/Forum_Informatyczne/blob/master/zdj/screeny%20dokumentacja/glowna5.PNG" alt="Obraz"></a>


## Główna strona forum komputerowego.
Przedstawione działy  Software, Hardware, Moje Maszyny, Języki programowania i Frameworki posiadają tematy. W tych tematach można umieszczać posty przez zalogowanego użytkownika.
Post utworzony przez użytkownika w dziale Software. Informuje o tytule postu, opisem problemu, a także ilością odpowiedzi i data utworzenia.


<a href="https://github.com/kamile890/Forum_Informatyczne/blob/master/zdj/screeny%20dokumentacja/post.jpg"><img src="https://github.com/kamile890/Forum_Informatyczne/blob/master/zdj/screeny%20dokumentacja/post.jpg" alt="Obraz"></a>

<a href="https://github.com/kamile890/Forum_Informatyczne/blob/master/zdj/screeny%20dokumentacja/post_z_komentarzami.PNG"><img src="https://github.com/kamile890/Forum_Informatyczne/blob/master/zdj/screeny%20dokumentacja/post_z_komentarzami.png" alt="Obraz"></a>


Wnętrze postu charakteryzuje się komentarzami wraz z informacją przez kogo został napisany post/komentarz. Informacje o użytkownikach widnieją obok treści komentarza. Są to: nazwa użytkownika, ranga, typ konta 
(Admin, Moderator, Zwykły Użytkownik) i ilość napisanych łącznie komentarzy na forum. Możliwość komentowania jest przydzielona tylko
 dla zalogowanych użytkowników.


## System rejestracji

<a href="https://github.com/kamile890/Forum_Informatyczne/blob/master/zdj/screeny%20dokumentacja/rejestracja.PNG"><img src="https://github.com/kamile890/Forum_Informatyczne/blob/master/zdj/screeny%20dokumentacja/rejestracja.png" alt="Obraz"></a>

 
System ten umożliwia każdemu otrzymane dostępu do członkostwa w naszym forum. Wystarczy uzupełnić odpowiednimi danymi formularz, a po zatwierdzeniu danych przyciskiem „Rejestruj” strona przeniesie nowo utworzonego użytkownika na stronę główną.
Nowo utworzony użytkownik ma możliwość wylogowania i ponownego zalogowania.

 
 <a href="https://github.com/kamile890/Forum_Informatyczne/blob/master/zdj/screeny%20dokumentacja/nowy_uzytkownik.png"><img src="https://github.com/kamile890/Forum_Informatyczne/blob/master/zdj/screeny%20dokumentacja/nowy_uzytkownik.png" alt="Obraz"></a>
 
 <a href="https://github.com/kamile890/Forum_Informatyczne/blob/master/zdj/screeny%20dokumentacja/Logowanie.PNG"><img src="https://github.com/kamile890/Forum_Informatyczne/blob/master/zdj/screeny%20dokumentacja/Logowanie.png" alt="Obraz"></a>


Po zalogowaniu, pojawiła się opcja utworzenia postu po wybraniu dowolnego tematu znajdującego się na stronie forum.
 
<a href="https://github.com/kamile890/Forum_Informatyczne/blob/master/zdj/screeny%20dokumentacja/Tworzenie_postu.png"><img src="https://github.com/kamile890/Forum_Informatyczne/blob/master/zdj/screeny%20dokumentacja/Tworzenie_postu.png" alt="Obraz"></a>

## Stwórzmy post!
 
 <a href="https://github.com/kamile890/Forum_Informatyczne/blob/master/zdj/screeny%20dokumentacja/tworzenie_postu2.png"><img src="https://github.com/kamile890/Forum_Informatyczne/blob/master/zdj/screeny%20dokumentacja/tworzenie_postu2.png" alt="Obraz"></a>
 
Do stworzenia postu został utworzony formularz zgłoszeniowy. Podajemy nazwę tematu zgodną z wybranym działem oraz niezbędny jest szczegółowy opis. Gdy to już zostanie zrealizowane – kliknij Dodaj!

Po stworzeniu postu, pojawił się komunikat o pomyślnie utworzonym poście, a tym samym nasz nowo utworzony post!
 
<a href="https://github.com/kamile890/Forum_Informatyczne/blob/master/zdj/screeny%20dokumentacja/post_komunikat.png"><img src="https://github.com/kamile890/Forum_Informatyczne/blob/master/zdj/screeny%20dokumentacja/post_komunikat.png" alt="Obraz"></a>


## Witaj w swoim poście! 
Można z komentować swój własny post jeśli otrzyma się odpowiedź zwrotną lub dodając coś od siebie klikając „Dodaj komentarz” 
 
<a href="https://github.com/kamile890/Forum_Informatyczne/blob/master/zdj/screeny%20dokumentacja/dodaj_komentarz.png"><img src="https://github.com/kamile890/Forum_Informatyczne/blob/master/zdj/screeny%20dokumentacja/dodaj_komentarz.png" alt="Obraz"></a>

<a href="https://github.com/kamile890/Forum_Informatyczne/blob/master/zdj/screeny%20dokumentacja/dodaj_komentarz2.png"><img src="https://github.com/kamile890/Forum_Informatyczne/blob/master/zdj/screeny%20dokumentacja/dodaj_komentarz2.png" alt="Obraz"></a>

<a href="https://github.com/kamile890/Forum_Informatyczne/blob/master/zdj/screeny%20dokumentacja/dodaj_komentarz3.png"><img src="https://github.com/kamile890/Forum_Informatyczne/blob/master/zdj/screeny%20dokumentacja/dodaj_komentarz3.png" alt="Obraz"></a>

##### Możliwość polubień komentarzy.
Wystarczy kliknąć łapkę w górę lub w dół.

## Przejdźmy do panelu użytkownika!

 <a href="https://github.com/kamile890/Forum_Informatyczne/blob/master/zdj/screeny%20dokumentacja/panel.png"><img src="https://github.com/kamile890/Forum_Informatyczne/blob/master/zdj/screeny%20dokumentacja/panel.png" alt="Obraz"></a>

W panelu można zmienić Avatar i login. Ponadto możemy dowiedzieć się o własnej randze i na jakim poziomie uprawnień jest nasze konto.

## Panel zarządzania przez administratora!

<a href="https://github.com/kamile890/Forum_Informatyczne/blob/master/zdj/screeny%20dokumentacja/zarzadzanie.png"><img src="https://github.com/kamile890/Forum_Informatyczne/blob/master/zdj/screeny%20dokumentacja/zarzadzanie.png" alt="Obraz"></a>
 
Administrator posiada opcję zarządzania listą moderatów, w której może nadawać prawa zwykłemu użytkownikowi do roli moderatora jak i odbierać je. Znajduje się tam także opcja zarządzania listą użytkowników, dzięki której może banować i odbanowywać. Posiada również opcję tworzenia tematów i przypisywanie do wybranej zakładki.

Opcja zarządzania listą moderatów, w której administrator może nadawać prawa zwykłemu użytkownikowi do roli moderatora 
oraz odbierać je.


Opcja do zarządzania listą użytkowników, dzięki której administrator może banować i odbanowywać użytkowników i moderatorów.


<a href="https://github.com/kamile890/Forum_Informatyczne/blob/master/zdj/screeny%20dokumentacja/lista_moderatorow.png"><img src="https://github.com/kamile890/Forum_Informatyczne/blob/master/zdj/screeny%20dokumentacja/lista_moderatorow.png" alt="Obraz"></a>

Opcję do tworzenia tematów i przypisywanie do wybranej zakładki.

<a href="https://github.com/kamile890/Forum_Informatyczne/blob/master/zdj/screeny%20dokumentacja/tworzenie_tematu.png"><img src="https://github.com/kamile890/Forum_Informatyczne/blob/master/zdj/screeny%20dokumentacja/tworzenie_tematu.png" alt="Obraz"></a>

Opcja do zarządzania listą użytkowników, dzięki której administrator może banować i odbanowywać użytkowników i moderatorów.

<a href="https://github.com/kamile890/Forum_Informatyczne/blob/master/zdj/screeny%20dokumentacja/lista_userow.png"><img src="https://github.com/kamile890/Forum_Informatyczne/blob/master/zdj/screeny%20dokumentacja/lista_userow.png" alt="Obraz"></a>

Administrator i moderator mogą banować użytkowników bezpośrednio z poziomu komentowania postów.

<a href="https://github.com/kamile890/Forum_Informatyczne/blob/master/zdj/screeny%20dokumentacja/ban.png"><img src="https://github.com/kamile890/Forum_Informatyczne/blob/master/zdj/screeny%20dokumentacja/ban.png" alt="Obraz"></a>



Zbanowany użytkownik nie posiada dostępu do treści strony po zalogowaniu. Odblokowanie konta może wykonać administrator.

<a href="https://github.com/kamile890/Forum_Informatyczne/blob/master/zdj/screeny%20dokumentacja/ban2.png"><img src="https://github.com/kamile890/Forum_Informatyczne/blob/master/zdj/screeny%20dokumentacja/ban2.png" alt="Obraz"></a>

Funkcja zrobiona, aby nie wpisywać różnych dziwnych rzeczy w pasku adresu. Poniżej przykład:
 

<a href="https://github.com/kamile890/Forum_Informatyczne/blob/master/zdj/screeny%20dokumentacja/pasekadresu.PNG"><img src="https://github.com/kamile890/Forum_Informatyczne/blob/master/zdj/screeny%20dokumentacja/pasekadresu.PNG" alt="Obraz"></a>

<a href="https://github.com/kamile890/Forum_Informatyczne/blob/master/zdj/screeny%20dokumentacja/nieZnalezionoStrony.PNG"><img src="https://github.com/kamile890/Forum_Informatyczne/blob/master/zdj/screeny%20dokumentacja/nieZnalezionoStrony.PNG" alt="Obraz"></a>


## Zainstalowanie Aplikacji

1.	Instalacja pakietu XAMPP.
2.	 Uruchomienie aplikacji w PhpStorm:
    - Sklonowanie aplikacji z GitHuba
    - Instalacja Composera komendą w terminalu: ***Composer install***
    - Następnie wpisujemy komendę do wygenerowania klucza: ***php artisan key:generate***
    - Po tych komendach wpisujemy komendę do uruchomenia serwera i uruchomienia strony: ***php artisan serve*** (klikamy w link do localhosta lub wpisujemy w przeglądarkę http://127.0.0.1:8000)
3.	Import bazy do phpMyAdmin:
- utworzenie bazy danych o nazwie „baza2”
- import bazy z pliku o nazwie „baza2.sql”

# Szkic wyglądu strony w programie Axure (całościowy plik znajduję się w folderze ***projekt***)
<a href="https://github.com/kamile890/Forum_Informatyczne/blob/master/zdj/home.png"><img src="../master/zdj/home.png" alt="Obraz"></a>

<a href="https://github.com/kamile890/Forum_Informatyczne/blob/master/zdj/strona_z_postami_dzialu.png"><img src="../master/zdj/strona_z_postami_dzialu.png" alt="Obraz"></a>

<a href="https://github.com/kamile890/Forum_Informatyczne/blob/master/zdj/pojedynczy_post_z_komentarzami.png"><img src="../master/zdj/pojedynczy_post_z_komentarzami.png" alt="Obraz"></a>

<a href="https://github.com/kamile890/Forum_Informatyczne/blob/master/zdj/zarzadzanie.png"><img src="../master/zdj/zarzadzanie.png" alt="Obraz"></a>

<a href="https://github.com/kamile890/Forum_Informatyczne/blob/master/zdj/rejestracja.png"><img src="../master/zdj/rejestracja.png" alt="Obraz"></a>

<a href="https://github.com/kamile890/Forum_Informatyczne/blob/master/zdj/logowanie.png"><img src="../master/zdj/logowanie.png" alt="Obraz"></a>


# Projekt bazy oraz diagram UML.
### Projekt bazy:
<a href="https://github.com/kamile890/Forum_Informatyczne/blob/master/zdj/baza%20erd.PNG"><img src="../master/zdj/baza%20erd.PNG" alt="Obraz"></a>

### Diagram przypadków użycia:
<a href="https://github.com/kamile890/Forum_Informatyczne/blob/master/zdj/uml.png"><img src="../master/zdj/uml.png" alt="Obraz"></a>

## License

The Laravel framework is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).
