@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <img class="img-rounded img-front" src="http://www.wansmaak.activisme.be/assets/img/front.jpg" alt="BK postjes pakken">
        </div>
    </div>

    <div class="row row-padding">
        <div class="col-sm-9">
            <div class="panel panel-default border">
                <div class="panel-body">
                    <div style="margin-top: -20px;" class="page-header">
                        <h2 style="margin-bottom: -5px;">Verhuur bereikbaarheid</h2>
                    </div>

                    <h4>Openbaar vervoer:</h4>

                    <p>
                        U kunt de trein of bus naar turnhout nemen. En vervolgens kunt met de bus verder naar de scoutsdomeinen. (Sint-Jorislaan 11).
                        De bus die u kunt nemen heeft de nr 2. vervolgens stapt u af aan in de rozenlaan. En vanaf daar is het nog slechts 500 meter wandelen.
                    </p>

                    <h4>Eigen vervoer:</h4>

                    <p>
                        - Neem de E34 afslag 24 Turnhout-centrum. <br>
                        - Neem vervolgens de N19 richting Steenweg op Zevendonk.v <br>
                        - Sla vervolgens Steenweg op Zevendonk in. <br>
                        - Sla vervolgens de Sint-Jorislaan in <br>
                    </p>

                </div>
            </div>
        </div>

        <div class="col-sm-3">
            @include('lease.partials.sidebar')
        </div>
    </div>
@endsection