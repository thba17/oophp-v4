---
...
Redovisning
=========================

[Kmom01](#kmom01) [Kmom02](#kmom02) [Kmom03](#kmom03) [Kmom04](#kmom04)
[Kmom05](#kmom05) [Kmom06](#kmom06) [Kmom07-10](#kmom07-10)

Kmom01<a name="kmom01"></a>
-------------------------

######Hur känns det att hoppa rakt in i objekt och klasser med PHP, gick det bra och kan du relatera till andra objektorienterade språk?  
Det gick relativt bra. Har aldrig jobbat med OO förut men bara nosat lite kort i andra kurser. Så det övergripande konceptet var OK. Av erfarenhet vet jag att har man bara jobbat med t.ex. C så är konceptet OO knepigt att komma in i. Man kan ju ändå få till ngn form av kvasi-OO genom att bygga upp structar. Konceptet OO är så vitt jag vet samma för alla OO-språk med klasser, attribut och metoder.

######Berätta hur det gick det att utföra uppgiften “Gissa numret” med GET, POST och SESSION?  
Det var kul att komma igång med PHP igen. Videoserien till denna kurs har börjat mycket bra tycker jag. Bra med korta och tydliga genomgångar som fokuserar på ett ämne i taget. Fick fundera en del runt GET-varianten men när den var gjord så var POST-varianten klar på två minuter. Däremot rörde jag ihop det i SESSION-varianten eftersom jag inte kan se programflödet framför mig. Tänkte att objektet var persistent och att jag hade en "handle" till samma instans i min sessionsvariabel. Till slut fick jag dock ihop en lösning som blev relativt enkel.

######Har du några inledande reflektioner kring me-sidan och dess struktur?  
Tycker det var en jättebra inledning till strukturen som mos gjorde i videoserien. Bra genomgång av strukturen och vad som ligger var och hur de samspelar. Hade varit bra med en sådan till designkursen också. Så här inledningsvis känns det relativt överskådligt men lite förvirrande i början med stylningen som görs i css-katalogen och inte som i designkursen. I upgiftsbeskrivningen står det att vi kan styla med LESS/SASS men det kräver väl att man kompilerar dessa? Jag valde i stället att lägga till en stylesheet från bootstrap.

######Vilken är din TIL för detta kmom?  
Min TIL är att det var relativt enkelt att lägga till stylesheet från bootstrap. Den verkar länka in en miniferad stylesheet. Däremot vet man ju inte hur denna är definierad eller hur en sida reagerar om man inte når denna.

<a href="#top">Back to top</a>



Kmom02<a name="kmom02"></a>
-------------------------

######Hur gick det att överföra spelet “Gissa mitt nummer” in i din me-sida?
Tack vare den utförliga videoserien gick det relativt bra. GET och POST gick bra men jag fick lite huvudbry på SESSION-delen. Till slut fungerar det som tänkt.

######Berätta om hur du löste uppgiften med Tärningsspelet 100, hur du tänkte, planerade och utförde uppgiften samt hur du organiserade din kod?
Initialt tänkte jag börja från början för att få bättre struktur på klasser och metoder. Insåg efter allt för lång tid att min bristande erfarenhet av OO satte begränsningar. Själva konceptet med OO är inte svårt (längre) men att designa koden med rätt metoder på rätt plats med arv blev en annan sak. Jag tog då över gissaspelets kod och utgick från den. Efter att spenderat allt för lång tid igen på att hitta vettig lösning med GET eller POST valde jag en SESSION baserad lösning.  
Jag vet inte vad vi kommer göra i kommande kmom så tänker att $_SESSION kanske kommer användas till annat också. Jag valde då att arbeta med en multidimensionell array med ($_SESSION['game']) som "rot" och allt som hör till spelet under denna. När man startar om spelet blir det då lätt att resetta denna utan att påverka annat i $_SESSION. Vartefter jag utvecklade spelet blev denna array större och det vore intressant att veta hur en sådan lösning förhåller sig till en "professionell" variant. Jag har fortfarande svårt att få ihop i mitt huvud att objekten förstörs när sidan är klar.  
Jag har bara en spelare mot datorn och man kan välja mellan 1-6 tärningar. När man gjort valet disablas denna funktion tills spelet startas om. Jag valde också att visa de grafiska tärningarna för både spelare och dator. När någon vinnit, disablas knapparna för att kasta och stoppa spelomgången. För att få lite bättre överblick av min SESSION array lade jag till en checkbox som när den är aktiverad visar hela $_SESSION['game'].  
Förmodligen kanske det gått smidigare att lösa uppgiften om jag börjat med att skissa ett flödesschema för spelet. En sådan övning hade varit mer givande än UML-diagrammet för klasserna.  
Jag gjorde extrauppgift 2 med valbart antal tärningar.

######Berätta om din syn på modellering likt UML jämfört med verktyg som phpDocumentor. Fördelar, nackdelar, användningsområde? Vad tycker du om konceptet make doc?
UML-diagrammet gick lätt att skapa med videon som förebild. Känns dock lite krystad och i det här läget mer som ett krav av akademisk karaktär men jag har inte så mycket erfarenhet av OO och kanske är det viktigare om man har en stor kodbas.  
Att använda ett verktyg som automatiskt genererar dokumentation typ phpDocumentor och make doc är en strålande lösning och är även användbart i verkliga livet. Att kunna tagga koden med förklarande beskrivningar av funktioner, metoder, variabler och argument gör det enklare att dokumentera eftersom man kan ändra nära den kod som skall beskrivas. På jobbet använder vi SourceDoc för samma ändamål och jag fick använda Doxygen på en distanskurs i Linux vid UMU.

######Hur känns det att skriva kod utanför och inuti ramverket, ser du fördelar och nackdelar med de olika sätten?
Det är mycket enklare att skriva och testa koden utanför ramverket när man kan köra direkt från shellet utan att behöva fundera över routrar och vyer mm. Skall man bygga en webapplikation kan detta ge en kodbas. Däremot måste man fortsätta i ramverket för att få allt på plats så det ser bra ut och fungerar vettigt.

######Vilken är din TIL för detta kmom?
Min TIL är att det inte är att "bara" implementera något i ramverket även om denna variant hittills varit mer överskådlig än i databas-kursen. Har varit kul att hitta lite kluriga lösningar på olika HTML/PHP konstruktioner. Eftersom jag redan nu hamnat långt efter i planeringen har jag tappat stressmomentet och jag försöker hinna bättre förstå vad vi håller på med och hitta lösningar på olika saker. Efter att ha kikat lite på gjorda inlämningar ser jag att de som ligger på bana har längre erfarenhet av OO (JAVA, C# mm).

<a href="#top">Back to top</a>



Kmom03<a name="kmom03"></a>
-------------------------

######Har du tidigare erfarenheter av att skriva kod som testar annan kod?
Nej inte på riktigt. Vi gjorde ett "testprogram" på distanskursen C-programmering vid OU. Grundtanken var samma som nu, att testa funktioner och utfall. Att göra det mer strukturerat och på riktigt har jag inte gjort.

######Hur ser du på begreppen enhetstestning och att skriva testbar kod?
Gör man ett eget litet hobbyprojekt kanske det inte behövs. Har man däremot en större eller kommersiell applikation är det nödvändigt. Dels för att säkerställa att koden gör det man tänkt sig men också för att kunna visa på kvalitet mot kunder. Vid eventuella felfall kan man gå tillbaka till sina tester och få insikt i varför ett fel uppstått och varför det inte fastnat i testen. I ett enhetstest kan man testa olika funktioner och metoder med ingångsvärden. Det är då viktigta att även titta på giltiga och ogiltiga värden men också gränsvärden. Flyttal och avrundningar kan ge oväntat resultat. Även variabelstorlekar kan spela in om man blandar t. ex. 32 och 64 bitars värden.

######Förklara kort begreppen white/grey/black box testing samt positiva och negativa tester, med dina egna ord.
Vid white box testing har man kännedom om källkoden och man vill test de olika funktioner och metoder som finns. Detta kan dock även utsträckas till ett exekveringsflöde som inbegriper flera funktioner eller enheter i mjukvaran. Vid black box testing lämnar man källkodsnivån och fokuserar mer på en övergripande funktion. Gray box testing är ett mellenting mellan white och black där man har tillgång till delar av kod och strukturer samtidigt som man utvecklar test för funktionstestning på black-nivå.

######Hur gick det att genomföra uppgifterna med enhetstester, använde du egna klasser som bas för din testning?
Det gick gansk snabbt och smidigt. Jag använde den kod som kom med exempelbiblioteket enligt uppgiftsbeskrivningen. Lade till testmetoder för makeGuess() och lade även till ett test för exceptions. Här fick jag lite huvudbry eftersom i mitt tycke dokumentation och exempel är lite väl kortfattat.

######Vilken är din TIL för detta kmom?
Det var intressant att få bekantskap med phpUnit. Det var relativt lätt att komma igång med olika testfall.

<a href="#top">Back to top</a>

Kmom04<a name="kmom04"></a>
-------------------------

Här är redovisningstexten


<a href="#top">Back to top</a>

Kmom05<a name="kmom05"></a>
-------------------------

Här är redovisningstexten


<a href="#top">Back to top</a>

Kmom06<a name="kmom06"></a>
-------------------------

Här är redovisningstexten


<a href="#top">Back to top</a>

Kmom07-10<a name="kmom07-10"></a>
-------------------------

Här är redovisningstexten


<a href="#top">Back to top</a>
