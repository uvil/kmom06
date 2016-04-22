Redovisningar av kursmomenten
====================================

Kmom07/10: Projekt och examination
-------------------------------------

Kmom06: Verktyg och CI
-------------------------------------

Kmom05: Bygg ut ramverket
-------------------------------------

[Länk till Me-sida](http://www.student.bth.se/~urvi15/phpmvc/kmom05/webroot/)

Här nedan hittar du svar på redovisningsfrågorna:

**Var hittade du inspiration till ditt val av modul och var hittade du kodbasen som du använde?**

Inspirationen till min modul kommer från projektet i denna kurs. Via
[specifikationen](http://dbwebb.se/phpmvc/kmom10#projspec) kom jag fram 
till att en modul som hanterar inloggning av användare vore behändig att ha. Det kändes naturligt 
och intressant för mig. Jag ville att modulen skulle kunna 
ge besked om användare är inloggad - och i sådana fall kunna tala om med vilket namn, 
akronym och e-post som hen har. Dessutom ville jag att den skulle kunna erbjuda 
ett elegant inloggningformulär baserat på bootstrap. Eftersom jag ville använda 
bootstrap (det finns ju många färdiga kod-snippets på webben för detta) kändes det
enklast att strunta i att använda klassen cForm.

**Hur gick det att utveckla modulen och integrera i ditt ramverk?**

Som start på projektet gjorde jag en testimplementation. Det gick rätt snabbt och 
smidigt faktiskt (ett par tre timmar bara). 

Svårast för mig var faktiskt komma ihåg hur man använde ramverkets stödfunktioner
för sessionsvariabler och databashantering. Men efter att ha tjuvtittat 
lite i tidigare kod i kursen så var det inga problem.

Därefter läste jag kraven och blev tveksam om jag hade gjort rätt. Därför ställde jag en några frågor i 
[forumet](http://dbwebb.se/forum/viewtopic.php?f=12&t=2324#p43995) för att kolla 
om jag hade misstolkat uppgiften. 

Såvitt jag förstod Mikaels svar ansåg han att det var bättre att använda en direkt 
injection än ett arv. Dessutom ville han inte att jag ska kopiera kod från moduler som min
modul är beroende av. Istället tyckte han att jag borde använda dem som de var 
- trots att det innebär en hel del överflödig kod.

Jag justerade koden enligt hans önskemål (tog bort arvet och lade till
en interface implementation och en trait). På den här demo-webbplatsen ligger klasen i src-mappen,
[här kan du se koden](http://www.student.bth.se/~urvi15/phpmvc/kmom05/webroot/source?p=code&path=src/UVC/CUserBase.php).

Efter att ha tolkat det som att jag gjort någorlunda rätt utifrån 
[kraven](http://dbwebb.se/uppgift/utveckla-ett-php-paket-och-publicera-pa-packagist#krav).
Gick jag vidare till att publicera paketet på github och packagist.

**Hur gick det att publicera paketet på Packagist?**

För att publicera på packagist var det bara att se till att composer-filen (som 
ligger på github) innehöll tillräckligt med information och sedan använda github
länken. Inga större problem faktiskt. En liten justering fick jag göra för att 
packagist skulle uppdatera informationen när pushar till github-repot. Men det var
bara att göra några inställningar på github (under settings/Webhooks & services) med mitt
packagist API tooken. Det gick rätt snabbt och smidigt.

[Här hittar du github-repot](https://github.com/uvil/cuserbase) 
och [här hittar du packagist-publiceringen](https://packagist.org/packages/urbvik/cuserbase).


**Hur gick det att skriva dokumentationen och testa att modulen fungerade tillsammans med Anax MVC?**

Som dokumentationen gjorde jag en liten tutorial, 
[som finns i README.md filen på github](https://github.com/uvil/cuserbase/blob/master/README.md),
utifrån den testimplementation av den paketintegrering (med en ren AnaxMVC installation) 
som jag genomförde. 

Det mesta fungerade fint. Jag stötte egentligen bara på ett par mindre problem: 1) de beroenden
som mitt paket behöver ville inte att laddas ner av composer och 2) när jag använde paket ovanpå
AnaxMVC ville php-motorn inte hitta klassen CDatabaseBasics. 

Tydligen berodde problem ett på att composer inte kunde hitta STABILA versioner av
Mikaels paket och då inte ville ladda ner och installera dem. För att lösa det kan
man säga till att composer att han/hon skall tillåta paket som är under utveckling genom att
ta infoga stabilitetsflaggorna "minimum-stability": "dev", "prefer-stable" : true, i **projektets
composer fil**.

Problem två berodde på att php inte automatladdar (autoloader) den databasklass som 
behövs av mitt paket. I alla fall inte när man den hamnar i vendor-mappen som den gör 
när man kör composer. En enkel lösning av det kan vara att inkludera nödvändig autoloader-fil
i index.php-filen. Jag har klistrat in en förslag på kod-rad i tidigare nämt README dokument.

**Om du testar mitt paket** enligt min guide så krävs det en databaskoppling och en
tabell för  att få [inloggnings-sidan](http://localhost/phpmvc/kmom052/webroot/loginform) 
att fungera. Se filen 
[user.sql](https://github.com/uvil/cuserbase/blob/master/user.sql) för att skapa
 en user-tabell. Anslutningarna till databasen juserar du [i filen config_mysql
databasen](https://github.com/uvil/cuserbase/blob/master/app/config/config_mysql.php).

**Gjorde du extrauppgiften? Beskriv i så fall hur du tänkte och vilket resultat du fick.**

Nope det gjorde jag inte. Således finns inget resultat att redovisa.


Kmom04: Databasdrivna modeller
-------------------------------------

[Länk till Me-sida](http://www.student.bth.se/~urvi15/phpmvc/kmom04/webroot/)

Som start av detta kunskapsmoment skapade jag en klass (app/src/Users/CFormUser.php) 
som används av kontrollen UserController. Jag förstod först inte riktigt hur det
var tänkt, men eftera att ha tittat lite på medföljande exmpel vid importen av paketet
gick det enklare.

I uppgiften stod, konstigt nog, inget om validering av korrekt inmatning av vare sig
användarnamn, e-post eller lösenord. Därför struntade jag i att implementera det 
- även om jag tycker att det vore bra, kanske till och med nödvändigt.
Men eftersom jag försöker att lära mig att inte lägga tid på saker som inte står i 
specifikationerna ignorerade jag den impulsen. Jag övar lite på att hålla en god-enough-nivå
eftersom jag ibland har blivit lite stressad då jag gärna hålla saker lite väl välgjorda. 

När jag testade lite visade det sig att jag fick ett fel när man försökte skapa en post
med samma akroymn som en tidigare post (akronym-kolumnen är satt till UNIK i databasen). 
Därför implementerade jag en liten kontroll av detta, så att användaren meddelas om 
akronymet redan är upptaget. Min lösning blev att skapa en metod i users-klassen som 
jag kallade för acroynymExists.

För att underlätta testning och eftersom det stod i uppgiften så skapade jag en förstasida 
med en meny för alla routes (vyn users/index). Däremot tyckte jag inte att det blev enkelt och lättförståeligt
att använda den. Så här såg den ut:

<img src='img/users/users1.jpg' alt='det röriga första användargränssnittet' style='width:1000px; display:block; margin:0 auto;'>

Med tanke på användarna (dvs jag, du som rättar detta och eventuellt någon ytterligare) 
gjorde jag om gränssnittet.Jag gör en enkel redirect innan det första gränssnittet (i indexAction i klassen
UsersController) laddas hoppar jag direkt till det andra gränssnittet.  Det visar direkt
alla aktiva användare med knappar för att visa andra användare, visa enskild, uppdatera, 
inaktivera, radera, skapa ny och initiera. Tycker att det blev lite tydligare. Vad tycker du?
Så här ser det ut:

<img src='img/users/users2.jpg' alt='ett smidigare användargränssnitt?'style='width:1000px; display:block; margin:0 auto;'>


En anmärkning om det gränssnittet är att det inte är riktigt responsivt.
Det finns fortfarnde en hel del kvar att göra påUX-sidan. Exempelvis borde
det finnas funktionalitet för att bara byta/uppdatera lösnord. Som det är nu måste man 
lämna den gamla användarinfon intakt och endast skriva in nytt lösenord, följt av spara (om man vill sätta ett nytt). 
All inmatning borde även valideras. Men eftersom det här inte är en komersiell produkt 
så lade jag inte tid på detta.

I stället gick jag vidare till att lagra kommentarerna, med tillhörande ämnes-kategori
i databasen. Det gick relativt smidig att implementera. Jag bara skrev om klassen 
CommentsInSessionstill klassen Comment (de ärver flesta av sina egenskaperna från 
databasklassen CDatabaseModel).

För att skapa nya kommentarer och editera befintliga skapade jag klassen CFormComment. I 
konstruktorn skapar den formuläret som behövs. Callback funktionen DoSubmit används 
för att spara de värden som matats in till databasen. En nackdel med CFroms lösning som jag
ser det är användandet av en callback. När man vill, som jag ville, göra en redirect
tillbaka till den sida som man utgick ifrån när man anropade edit/add, blir det lite 
besvärligare tycker jag. Dessutom krävs ett anrop av funktionen Check, t.ex. ifrån 
controllern för att callbacken skall triggas. Dessa två faktorer gör att jag ställer mig 
lite tveksam till hur smidig klassen CForm faktiskt är. I mitt tycke är det lika enkelt 
att koda upp det/de forumlär som behövs direkt i vyn. Men smaken om den saken är säkerligen
delad. Sammanfattningsvis vill jag säga att jag tycker sådär om forumlärhanteringen
som visas i kursmomentet.

Däremot själva databashanteringen i momentet tycker jag är bra. Det tog lite tid 
i att sätta sig in i hur Mikael har tänkt att det skulle fungera/användas fungera. På 
det sättet är traditionell SQL enklare för mig, eftersom det är välbekant område. 
Men på sikt om jag skulle jobba dagligen med databasklasserna så skulle även det 
bli enkelt, kanske enklare på sikt än vanlig SQL.

I det här kursmomentet vill jag  säga att jag tycker att anax-mvc börjar 
bli lite rörigt. Det är en del onödig kod som inte används (genom att
man importerar hela paket och inte riktigt orkar rensa hela tiden), det blir flera 
settingsfiler och flera autoloaders. Personligen börjar jag nästan luta åt att 
ASP.net MVC ger bättre struktur på koden. Där jag speciellt gillar att modellerna 
läggs i en egen mapp (models). Som det är här i anax-mvc finns tre src, i app, 
i rooten och i vendor. Det blir lite kladdigt tycker jag. 

Jag valde att inte göra extrauppgiften, eftersom jag har lite av tidsbrist i mitt liv.



Kmom03: Bygg ett eget tema
-------------------------------------

[Länk till Me-sida](http://www.student.bth.se/~urvi15/phpmvc/kmom03/webroot/)

Jag hade sedan tidigare skapat ett personligt stylat tema. I detta kunskapsmoment
utökade jag det lite med LESS. Jag gjorde så att jag följde guiden utifrån mitt
tema. På så sätt kom jag att landa i ett tema med 16 regioner baserat på sematic
grid, med horisontellt och vertikalt rutnät samt font-awesome. Jag gjorde även 
temat responsivt med tre brytpunkter.

Till temat skapade jag en testsida där jag lade in lite font-awesome ikoner, typografiskt
innehåll samt en möjlighet att aktivera/avaktivera bakgrundsrutnätet.

Rent tekniskt är kanske lösningen för att aktivera eller inaktivera rutnätet det
mest intressanta (i alla fall enligt min mening). Istället för att implementera
detta via en controller/action tog jag den enklare, fast kanske inte lika eleganta,
vägen att använda en get-parameter (verticalgrid=1). Den  kontrolleras sedan
i routen regions, via en if-sats, som i sin tur sätter tema variabeln style:

<pre>
$app->router->add('regions', function() use($app)
{
  if(isset($_GET['verticalgrid']))
    $app->theme->setVariable('style', "#wrapper{background-image: url('img/grid_12_60_20.png');"); 
  ...
}

</pre>

Hade jag skapat temat mer fritt utifrån mina egna tankar och önskningar så hade
jag baserat temat på Bootstrap. I det fallet hade jag på ett enkelt sätt fått tillgång
till både grid-system och mycket färdig styling CSS/LESS. Jag vet inte om jag hade
brytt mig om typografi annat än att välja typsnitt (tycker personligen inte att 
det tillför något till det visuella intrycket - fast det kan man naturligtvis 
ha delade meningar om).

Ett problem jag fick när jag ladda över projektet till studentservern var att css:en
inte laddades korrekt. Jag kollade då källan och hittade problemet. Mappen anax-grid var inte 
skrivbar. Jag fixade det med en chmod 777 och graderade style.less.php samt style.css.
Efter två omladdningar (cachie-miss) så fungerade det fint.

Det som är en svårighet med front-end tycker jag är att få struktur på less/CSS.
Det är enligt min erfarenhet lätt att det blir lite grötigt. Då blir kan det ju bli
lite besvärligt skall uppdatera och underhålla webbplatsen. Men antar att ju mer 
man övar på att hålla struktur desto enklare blir det...

Nu följer mina svar på redovisningsfrågorna:

<strong>Vad tycker du om CSS-ramverk i allmänhet och vilka tidigare erfarenheter har du av dem?</strong>

Min personliga åsikt är att CSS-ramverk är smidiga och trevliga att jobba med. Jag
har i och för sig bara provat bootstrap och html-css-templates men dem som jag testat
har varit rejält arbetsbesparande. Alltid trevligt när någon annan gör stora delar
av jobbet.

<strong>Vad tycker du om LESS, lessphp och Semantic.gs?</strong>

LESS tycker jag fungerar men har inte kännt så stort behov av. Det tar nog lite
tid att vänja om sig från ren CSS till LESS (att bli van att deklarera variabler och
mixins för gemensamma inställningar på en webbplats menar jag). LessPHP fungerar men 
känns lite trögt att ladda tycker jag. Semantic.gs är som jag ser det ett alternativ
till 960-grid-system och bootstrap. Fast jag föredrar nog bootstrap där finns ju redan
brytpunkter m.m. klart.

<strong>Vad tycker du om gridbaserad layout, vertikalt och horisontellt?</strong>

Gridbaserad layout har jag ännu lite lite erfarenhet av för att uttala mig mycket om.
Det som är smidigt är ju att det är enkelt att skapa kolumner. Däremot tycker jag
det är fult att de blir olika höga. Tycker även att exemplen i guiden kändes
lite väl pixel-baserade. Det blir ju inte så responsivt så. Jag ändrade det till procent.

Vertikalt rutnät (typografiskt) tycker jag som sagt inte tillför något.

<strong>Har du några kommentarer om Font Awesome, Bootstrap, Normalize?</strong>

Normalize är jättebra - viktigt att alla webbläsare har lika initiala startvärden.
Bootstrap likaså - jättebra. Font Awesome är fantastiskt - snygga, enkla ikoner
som tillför jättemycket till en webbplats. Super!

<strong>Beskriv ditt tema, hur tänkte du när du gjorde det, gjorde du några utsvävningar?</strong>

När jag skapade mitt tema, tjuvkikade jag lite på examinationsuppgiften i kursen.
Där stod ju något om "We Gonna Take Over The World". Utifrån detta satte jag 
en banner-rubrik och en ikon/bild. I övrigt valde jag ljus färgsättning, open-sans
typsnitt (light), och en blå förtroendeingivande ton. Inte mer tankar och arbete
än så ligger bakom i nuläget...


Antog du utmaningen som extra uppgift?

Eftersom jag inte inte är helt nöjd med uppbyggnaden av mitt tema (kodmässigt och meny-mässigt)
så gjorde jag inte de föreslagna extra-uppgifterna med att förbereda för styling och 
lägga upp det på GitHub.

Avslutningsvis vill jag återigen betona att jag inte är riktigt nöjd med resultatet.
Det ser i och för sig okej ut men kodens struktur tycker jag har mer att önska. 
Men eftersom detta är en övning och inte en produktionssite så antar jag att det får duga
(det får lov att vara good enough).

Under detta moment tycker jag att jag har lärt mig  mer om LESS och typografi.
Det var trevligt. Alltid roligt att lära sig lite mer...

Kmom02: Kontroller och Modeller
-------------------------------------

[Länk till Me-sida](http://www.student.bth.se/~urvi15/phpmvc/kmom02/webroot/)

Jag har under detta moment skapat ett eget kommentarssystem som jag integrerat på 
två sidor: comment och debate.

Jag inledde jobbet med att installera paketet (comment/vendor) via Composer. 
Det gick fint. Däremot tyckte jag att det kändes som att det blev väldigt mycket 
onödiga filer i projektet. Därför kopierade jag in de filer som jag behövde och 
raderade katalogen. Blev bättre (mer städat) så tycker jag.

Jag tittade lite på de paket som finss i packagist, men tyckte inte riktig att 
jag hittade något som behövdes för att lösa uppgiften i detta moment. Däremot 
kommer jag sannolikt att leta där först i framtiden innan jag börjar utveckla 
nått (som kanske redan finns).

Klasser hade jag rätt så god koll på sedan tidigare, att använda dem som 
kontroller kändes naturligt. Jag fick ihop allt (tror jag). Det som jag fick 
leta lite i källkoden var hur man skulle skicka parametrar till tjänster via 
dispatchern. Men efter lite läsande och testande kom jag fram till att det bara 
var att skicka dem som en array och ta emot dem som vanliga funktionsparametrar. 
Enkelt och smidigt när man väl förstod hur det var tänkt att fungera.

I koden som följde med comment så ändrade jag en del. Jag skrev om lite i både 
i klassen CommentController liksom i klassen CommentsInSection. Jag utökade deras 
funktionalitet. Speciellt kul tyckte jag det var att se hur man kunde infoga en 
vy via kontrollern (liknar det i index-filen bara det att man använder $this 
istället för $app). Jag tyckte att det blev mer renodlad design (ur ett UX-perspektiv) 
att skilja på visa ingress + kommentarer på en sida. En annan sida för att 
lägga till nya kommentarer och ytterligare en som hanterar editering. Ett annat 
alternativ vore ju att ha allt detta på samma sida. Men det tror jag blir både 
enklare och snyggare att lösa med lite javascript/ajax. Genom att preventa 
default-actions och sedan DOM-manipulera och animera lite så blir det nog det 
en bättre användarupplevelse tror jag.  Hur som helst så är formuläret, som skapar nya 
kommentarer eller editerar en befintlig kommentar, dolt tills man klickar på respektive knapp. 


En detalj som jag fixade i MOS-kod-underlag var att formuläret var använde 
sig av att JavaSript. Jag ändrade det så att det nu ska gå att skicka 
kommentarer även om man som användare har inte har det aktivt.

Lika så infogade jag upp knappar för radera alla kommentarer och för 
att infoga förvalda kommentarer.

Comment-form justerade jag så att den gick att använda både vid skapandet 
av ny post samt vid editerande av befintlig post (via ett antal parametrar).

Jag lade även till bild på användaren via  Gravatar.

Jag tycker att jag, under detta kursmoment har börjat få en känsla för hur 
de olika delarna i Anax MVC hänger ihop. Jag har fått en förståelse för hur en 
klass kan vara en kontroller. Likaså har begreppen routing och dispatching blivit 
allt klarare för mig.

Sammanfattningsvis ett trevligt och bra kunskapsmoment.





Kmom01: PHP MVC ramverk
------------------------------------

[Länk till Me-sida](http://www.student.bth.se/~urvi15/phpmvc/kmom01/webroot/)

Då var första momentet i den här kursen klart. 
Det var lärorikt och intressant att få prova på ANAX-ramverket. Jag har tidigare
lekt lite med CMS/ramverken WordPress och Umbraco. Men det här tycker jag var lite 
annorlunda - kul och intressant!

Jag hade inga större problem. I alla fall uppstod inga som jag inte kunde lösa genom
att läsa instruktionerna en gång till och eller genom att googla lite.

Jag tycker att resultatet utseendemässigt blev okej. Kodmässigt känner jag att det 
finns vissa små förbättringar jag skulle kunna göra. Men det får duga som det är nu.

Jag har lite tidigare erfarenhet av begrepp som routing, rewrite-rule mfl.
Däremot var dependency injection och service locator nya för mig. Så där har jag 
lärt mig något nytt.

Min uppfattning om AnaxMVC så här långt är att det käns väldigt mycket bättre med
uppdelningen mellan källkod, vyer och innehåll. 

Det känns även betydligt enklare att skriva redovisningstexter nu när det 
finns stöd för content i form av markdownfiler. Mycket bra. 

Jag använder NetBeans utvecklingsmiljö.

Som lite extra grej skapade jag egen template och css. Dessutom lade jag till
 tärningsspelet (som det redan fanns med kod-filer för).


