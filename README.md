
HTML5 site that retrieves the user's location and displays which birds are nesting auround her, with photographs and some information on distribution, abundance and endangeredness. Uses open distribution data from Finnish Bird Atlas.

Sivusto, joka hakee käyttäjän sijainnin ja näyttää mitä lintuja hänen ympärillään pesii. Lajeista näytetään valokuva sekä tietoja levinneisyydestä, runsaudesta ja uhanalaisuudesta. Levinneisyysdata perustuu Suomen 3. lintuatlaksen avoimeen aineistoon.


Toimintalogiikka
----------------

index.php
Sivupohja, yleinen HTML-rakenne. Lataa allspecies.php:n jQuerylla.

allspecies.php
Lintuluettelo-HTML. Includes allspecies_class.

allspecies_class.php
Skripti, joka hakee lintujen tiedot json-tiedostoista.

js/main.js
Javascriptit

conversionwrapper.php
Tekee koordinaattimuunnoksen (wgs84 -> ykj) Luomuksen rajapinnassa.

gridjsoncreator.php
Generoi ruutukohtaiset JSON-tiedostot tekstitaulukkodatasta.


Julkaiseminen
-------------

Ennen julkaisua
- Kuvat
- korjaa conversiowrapper:in URL main.js-tiedostossa
- Luo griddata-hakemisto ja generoi sisältö
- MUST-asiat alta

TODO & ideat
------------
DONE
- Perus-geolocation
- Virheilmojen käännös suomeksi
- GET security at allspecies_class
- Virheilmot dokumenttiin, ei alertina

MUST (ennen julkaisua)
- Ruudun metatietojen lataaminen
- Ulkoasu
- Kuvien croppaus samanmuotoisiksi
- Jos selain ei tue paikannusta -> ilmoitus sivulle ja linkki manuaaliseen listaan

SHOULD
- Lajin tiedot modaaliin
- Lajien välillä liikkuminen (prev, next) ko. ruudun alueella
- Parempi ulkoasu
- Manuaalinen lista ruuduista, miten?
- Kartta ruudusta (simppeli)

NICE
- Huomaa siirtymisen uudelle ruudulle
- Erikoisuuden laskeminen lähiruutujen avulla (ja rannikko huomioiden)
- abbr ja sci -nimien yhtenäisempi käyttö
- Lajin peruskuvaus laji.fi:sta tai Wikipediasta
- Paikallisyhdistys ja linkki verkkosivuille ("Liity jäseneksi jos lintu- tai luontoharrastus kiinnostaa!") utm_source=suomenlinnut


Data
----

Uhanalaisuustiedot:

Tiainen, Juha; Mikkola-Roos, Markku; Below, Antti; Jukarainen, Aili; Lehikoinen, Aleksi; Lehtiniemi, Teemu; Pessa, Jorma; Rajasärkkä, Ari; Rintala, Jukka; Sirkiä, Päivi; Valkama, Jari 2015: Suomen lintujen uhanalaisuus 2015. http://hdl.handle.net/10138/159435 ISBN 978-952-11-4552-0


Levinneisyystiedot:

Suomen 1., 2. ja 3. lintuatlaksen tulokset. Luonnontieteellinen keskusmuseo Luomus, Helsingin yliopisto. Käyttö Creative Commons Nimeä 4.0 -lisenssillä.

Valkama, Jari, Vepsäläinen, Ville & Lehikoinen, Aleksi 2011: Suomen III Lintuatlas. – Luonnontieteellinen keskusmuseo ja ympäristöministeriö. <http://atlas3.lintuatlas.fi> (viitattu 24.1.2015) ISBN 978-952-10-6918-5


Tekstisuunnitelmia
------------------

Grid

Tällä alueella (Kirkkonummi, Kirkkonummen keskusta) pesii 99-135 lintulajia, joista 22 on uhanalaisia. Alueen linnusto tunnetaan erinomaisesti. (Lue lisää miten linnustoa tutkittiin &raquo;)


Species

Hömötiainen (<em>Parus montanus</em>)
Elää ensisijassa metsissä, mutta myös ...
Uhanalainen (vaarantunut) - uhanalaistumisen syynä tehometsätalous.
Harvinainen, esiintyy vain pienellä osalla tutkimusruuduista.
Harvalukuinen...

