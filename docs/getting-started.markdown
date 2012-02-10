Welkom bij deze tutorial over PHPbench. Hierin leer je de basis van de PHPbench libary.

### Wat is PHPbench?

PHPbench is een libary met een paar handige classes waarmee je je code kunt testen. Hiermee kun je ervoor zorgen dat je altijd de snelste code krijgt.
Met PHPbench kun je meerdere tests met elkaar vergelijken, je ziet dan de tijd die de code duurt (in microseconde) en het procentuele verschil tussen de tests. Hiermee kun je de snelheidse code vinden en zo weten welke je moet gebruiken. Als je de test bekijkt via de browser zie je een mooie overzichtelijke tabel waarin al deze gegevens staan, __refresh (F5) de pagina wel een paar keer voor de beste resultaten__.

### PHPbench Installatie

Het installeren van PHPbench is heel eenvoudig. Je hoeft alleen de bestanden op een server te downloaden en je bent klaar.
Om documenten te krijgen kun je het best gebruik maken van GIT. In GIT roep je dan de volgende code aan:

    cd path/to/localhost/
    git clone http://github.com/WouterJ/PHPbench.git

Hiermee wordt PHPbench geïnstalleerd in path/to/localhost, verander dit naar jou localhost path.

Mocht je geen GIT hebben dan kun je de zip file downloaden van de github pagina, deze zip file pak je vervolgens uit op de plaats waar je het wilt hebben.

#### Vereisten

 - PHP5.0 of hoger
 - Een server of een localhost


### Een test bekijken

Om een test te bekijken ga je naar `%domein%/phpbench/` en je komt dan op de homepagina van PHPbench. Je ziet hier een overzicht van alle tests. Bovenin zit een menu bar waarbij je snel naar elke test kunt gaan die je wilt.
Klik op de test die je wilt om hem te bekijken. Je ziet dan een overzicht van de resultaten. Het is verstandig om deze pagina een paar keer te refreshen om een goed beeld te krijgen, vooral bij tests die maar kort duren.
De tests zijn geschreven in &micro;s dit betekend microseconde en 1 microseconde is 0,000001 seconde.

Voor het aanmaken van tests verwijs ik hier graag door naar de [test aanmaken](?title=test-aanmaken) pagina.
