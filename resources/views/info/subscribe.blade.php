@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <img class="img-rounded img-front" src="{{ asset('img/front.jpg') }}" alt="BK postjes pakken">
        </div>
    </div>

    <div class="row row-padding">
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div style="margin-top: -20px;" class="page-header">
                        <h2 style="margin-bottom: -5px;">Inschrijven &amp; Lidgeld</h2>
                    </div>

                    <p>
                        Dit jaar bedraagt het lidgeld €32,40. Dit is de standaardprijs van Scouts en Gidsen Vlaanderen,
                        wij vragen geen extra werkingsgeld. Aansluiten (lidgeld betalen) bij Scouts & Gidsen Vlaanderen
                        betekent verzekerd zijn op alle activiteiten van de scouts.
                    </p>

                    <p>
                        Betalen kan via overschrijving: <code>Rekening nr</code>. Vermeld in de mededeling van de overschrijving van het lidgeld zeker naam,
                        voornaam en tak (die mag u afkorten naar KAP, W, K, JV, JG, V, G of J) van je zoon/dochter.
                    </p>

                    <p>
                        Wij hopen dat deze en andere kosten van scouting betaalbaar zijn. Mocht dat niet zo zijn,
                        dan zoeken wij in alle vertrouwen graag mee naar een oplossing hiervoor.
                    </p>

                    <h3>Lid worden</h3>

                    <p>
                        Via deze links kan u online inschrijven. Uw aanvraag zal dan door de groepsleiding goedgekeurd worden.
                        Na uw inschrijving dient u ook lidgeld te betalen (zie hierboven).
                        Het is zeker niet nodig om voor (of na) de eerste vergadering in te schrijven en lidgeld te betalen.
                        Elk nieuw lid kan tot 3 keer mee spelen zonder in te schrijven.
                    </p>

                    <p>
                        <a href="">Inschrijven</a>
                    </p>

                    <h3>Het uniform</h3>

                    <p>
                        Het uniform bestaat uit een das, een beige hemd of trui en een groene lange broek, korte broek of rok.
                        Bij kapoenen is enkel de das verplicht. Bij welpen en kabouters enkel de das en het hemd. De das kan je kopen bij de leiding,
                        de rest van het uniform is te verkrijgen bij de Hoppper winkels.
                    </p>

                    <h3>Verdere informatie</h3>

                    <h5><strong>Verminderd lidgeld:</strong></h5>

                    <p>
                        We vragen jaarlijks om voor elk kind lidgeld te betalen. Dankzij dit bedrag is uw zoon/dochter verzekerd tijdens scoutsactiviteiten.
                        Een ander deel van dit bedrag gaat naar het maken en verzenden van de tijdschriften voor leiding en leden, en de algemene werkingskosten.
                        We begrijpen dat dit lidgeld voor u misschien een groot bedrag is om te betalen.
                        Wij hebben de mogelijkheid om hierop een korting te bieden, voor wie dit echt nodig heeft. Spreek hiervoor simpelweg een (groeps)leid(st)er  aan!
                    </p>

                    <h5><strong>Fonds op maat:</strong></h5>

                    <p>
                        Naast het jaarlijkse lidgeld komen er nog andere kosten kijken bij een scoutsjaar: weekends en kampen,
                        maar ook de prijs voor een bus- of treinticket bij een uitstap, de inkom voor het zwembad, …
                        Dit kan een grote kost zijn voor uw gezin. Wij kunnen als groep, samen met Scouts en Gidsen Vlaanderen,
                        het kamp- en weekendgeld of de prijs van andere betalende activiteiten verlagen.
                        De (groeps)leid(st)er van uw zoon of dochter kan u hiermee verder helpen.
                        Spreek hem/haar hier gerust eens over aan! Het gaat enkel om de kostprijs die verbonden is aan activiteiten!
                        Het uniform of kampmateriaal zoals een slaapzak of matje kan hiermee niet terugbetaald worden. Hiervoor zijn andere oplossingen mogelijk (zie verder).
                    </p>

                    <h5><strong>Betalen in schijven</strong></h5>

                    <p>
                        Wanneer het voor uw gezin moeilijk is om het weekend- of kampgeld in 1 keer te betalen,
                        dan is het mogelijk om de betaling ervan te spreiden. U kan dan het totale bedrag in kleinere delen op verschillende momenten tijdens het jaar betalen.
                        Spreek gerust een leid(st)er aan om samen te kijken wat de mogelijkheden zijn.
                    </p>

                    <h5><strong>Voordelen bij ziekenfondsen</strong></h5>

                    <p>
                        Mutualiteiten dragen vaak ook bij aan de kosten van vrijetijdsbesteding van uw kinderen.
                        Welke voordelen dit precies zijn, hangt af van bij welk ziekenfonds u bent.
                        Ga gerust langs bij het lokale kantoor van uw mutualiteit en vraag na op welke voordelen u recht hebt.
                    </p>

                    <h5><strong>Belastingvoordelen</strong></h5>

                    <p>
                        De kostprijs voor kampen en weekends van alle kinderen jonger dan 12 jaar of kinderen met een zware handicap jonger dan 18 jaar, kan door middel van een fiscaal attest afgetrokken worden van de belastingen.
                        Hiervoor moet de (groeps)leiding het ‘Attest inzake uitgaven voor de opvang van kinderen’ invullen en aan u bezorgen.
                        U moet dit formulier dan bij uw belastingaangifte voegen. Als u dit formulier nog niet gekregen heeft van de scoutsleiding, vraag hen er dan tijdig naar. Meer info vindt u hier.
                    </p>
                </div>
            </div>
        </div>

        <div class="col-sm-3">
            <div class="panel panel-default">
                <div class="panel-heading">Nieuws:</div>

                @if((int) count($news) > 0)
                    {{ dd($news) }}
                @else
                    <div class="panel-body">
                        <span class="text-muted">
                            <i>
                                (Geen nieuws gevonden)
                            </i>
                        </span>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection