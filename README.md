
HTML5 site that retrieves the user's location and displays which birds are nesting auround her, with photographs and some information on distribution, abundance and endangeredness. Uses open distribution data from Finnish Bird Atlas.

Sivusto, joka hakee käyttäjän sijainnin ja näyttää mitä lintuja hänen ympärillään pesii. Lajeista näytetään valokuva sekä tietoja levinneisyydestä, runsaudesta ja uhanalaisuudesta. Levinneisyysdata perustuu Suomen 3. lintuatlaksen avoimeen aineistoon.

Tuotantoversio: http://www.biomi.org/kotiseudun-linnut/


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
- Google Analytics code juuren alle
- Loggerihakemiston luonti, nimi tiedostoon suomen-linnut.php juuren alle.

TODO & ideat
------------

DONE
- Perus-geolocation
- Virheilmojen käännös suomeksi
- GET security at allspecies_class
- Virheilmot dokumenttiin, ei alertina
- Hallitse tilanne jossa 0 lajia uhaanalaisia
- Jos selain ei tue paikannusta -> ilmoitus sivulle 
- Ruudun metatietojen lataaminen
- Handle coordinates outside Finland
- Datalähteet
- Ulkoasu
- Kuvien croppaus samanmuotoisiksi
- Kuvien credits
- Check GA code
- Logging
- Security in logger.php
- Säilytä ilmoitus epätarkasta paikannuksesta
- Muuta sivuston nimi -> Kotiseudun linnut
- Muuta tuotantoversion hakemiston nimi
- Ikonien toimivuus pienellä näytöllä (<400px)
- FB ja Twitter share buttons
- Varmuustasojen paremmat kuvaukset

MUST
- Kuvaajan tiedot modaaliin

SHOULD
- Toimivuus omalla kännykällä - ja muilla levyksillä
- Tarkista share-elementin toimivuus kännykällä
- Poista kovakoodattu osoite Facebook-napin koodista
- Advanced logging
	- Time to get position
- Redirect -> www. ...
- What if coord conversion fails?
- Help (slide in: http://jsfiddle.net/bR6Fs/)
	- harvinaisuus, harvalukuisuus, uhanalaisuus?
	- ruutu, selvitystapa, linkki lisätietoihin
- Missing images? Ansery, muut?
- Yksinkertaista CSS
- Taustatiedot (selvitystapa, ruudut)
- Lajin tiedot modaaliin
- Lajien välillä liikkuminen (prev, next) ko. ruudun alueella
- Parempi ulkoasu
- Manuaalinen lista ruuduista, miten?
- Kartta ruudusta (simppeli)
- Jos selain ei tue paikannusta -> ja linkki manuaaliseen listaan
- Ruudun vainta kartalta

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

