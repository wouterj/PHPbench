Op deze pagina leg ik de basis uit van het maken van een test.

### Hoe is een test opgebouwd?

Een test in PHPbench bestaat minimaal uit 2 objecten: 1 object voor het bundelen van 1 test, deze heet Research, en het andere object voor het maken van de tests, deze heet Test.
De test bevat de functie met daarin de test en het Research object zorgt dat de tests worden gemeten en een paar keer herhaalt, om vervolgens de resultaten weer te geven.

### Je eerste test

Laten we een simpele test aanmaken die kijkt of [str\_replace](http://php.net/str-replace) sneller is als [preg\_replace](http://php.net/preg-replace) bij het vervangen van het woordje Hello.

#### Stap 1: Nieuw bestand aanmaken

Als eerst moeten we in de map `PHPbench/tests/` een nieuw bestand aanmaken met de naam van onze test (zoals die in het menu zichtbaar is). Laten we die _replace test_ noemen. Ons bestand heet dan `replace-test.php`.

#### Stap 2: Research object aanmaken

Laten we dan nu onze test beginnen met het aanmaken van een Research object. De constructor van Research wil 1 parameter, de naam van de test. In PHPbench 1 is het verplicht om het research object in de variabele `$research` te stoppen. De code zal nu dus zoiets worden:

    $research = new Research('Str_replace vs Preg_match');

#### Stap 3: Een test aanmaken

Nu moeten we een test aanmaken, deze kunnen we eerst in een variabele stoppen en vervolgens aan de `Research::addTest()` method meegeven, of we kunnen de stap van het opslaan in een variabele overslaan. Het Test object verwacht 2 parameters. De eerste is een korte omschrijving van de test, de 2e is de functie die moet worden aangeroepen. Vanaf PHP5.3 kun je [closures](http://php.net/closures) gebruiken voor de 2e parameter, maar alles daaronder moet je de functie eerst ergens anders maken. In deze functie staat de code die getest moet worden.

In ons voorbeeld zou het dan dit worden, merk op dat ik alle methodes gebruik:

    $research->addTest( new Test("preg_replace('/Hello/', 'Hey', 'Hello World')", function() {
      $str = preg_replace('/Hello/', 'Hey', 'Hello World');
    });

    function strReplaceTest() {
      $str = str_replace('Hello', 'Hey', 'Hello World');
    }
    $strReplace = new Test("str_replace('Hello', 'Hey', 'Hello World')", strReplaceTest);

    $research->addTest($strReplace);


#### Stap 4: De tests uitvoeren

Als laatst moeten we dan de testen uitvoeren. Dit moet je doen door de `Research::runTests()` method aan te roepen:

    $research->runTests();

Nu zijn  we klaar en kunnen we onze resultaten bekijken.

### Timer

PHPbench gebruikt een apart object voor de timer. Deze timer bevat ook een setMarker optie. Hiermee kun je op een bepaalde plek de tijd bepalen. Aan het eind kan je dan het tijd verschil tussen verschillende markers bepalen. De start en eind marker heten _start_ en _end_. Een voorbeeldje:

    $research->addTest( new Test('test something', function() {
      $foo = 'bar';
      if( $foo == 'bar' || $foo = 'foo' )
         $foo = 'foo';
      Timer::setMarker('endOfIf');

      echo $foo;
    });
    $research->runTests();
    echo Timer::getDiff('start', 'endOfIf');
