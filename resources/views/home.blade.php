@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <img class="img-rounded img-front" src="{{ asset('img/front.jpg') }}" alt="BK postjes pakken">
        </div>
    </div>

    <div class="row row-padding">
        {{-- Content --}}
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-body">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-8">
                                        <h4><strong><a href="#">Title of the post</a></strong></h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <a href="#" class="thumbnail">
                                            <img src="http://placehold.it/260x180" alt="">
                                        </a>
                                    </div>
                                    <div class="col-md-8">
                                        <p>
                                            Lorem ipsum dolor sit amet, id nec conceptam conclusionemque. Et eam tation option.
                                            Utinam salutatus ex eum. Ne mea dicit tibique facilisi, ea mei omittam explicari conclusionemque,
                                            ad nobis propriae quaerendum sea.
                                        </p>
                                        <p><a class="btn btn-sm btn-primary" href="">Lees meer</a></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12" style="margin-top: -12px;">
                                        <p>
                                            <i class="fa fa-user"></i> Autheur: <a href="#">John</a>
                                            | <i class="fa fa-calendar"></i> 2017-02-18 18:54:08
                                            | <i class="fa fa-comment"></i> <a href="#">3 Reacties</a>
                                            | <i class="icon-share"></i> <a href="#">39 Shares</a>
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-8">
                                        <h4><strong><a href="#">Title of the post</a></strong></h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <a href="#" class="thumbnail">
                                            <img src="http://placehold.it/260x180" alt="">
                                        </a>
                                    </div>
                                    <div class="col-md-8">
                                        <p>
                                            Lorem ipsum dolor sit amet, id nec conceptam conclusionemque. Et eam tation option.
                                            Utinam salutatus ex eum. Ne mea dicit tibique facilisi, ea mei omittam explicari conclusionemque,
                                            ad nobis propriae quaerendum sea.
                                        </p>
                                        <p><a class="btn btn-sm btn-primary" href="">Lees meer</a></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 post-header-line" style="margin-top: -12px;">
                                        <p>
                                            <i class="fa fa-user"></i> Autheur: <a href="#">John</a>
                                            | <i class="fa fa-calendar"></i> 2017-02-18 18:54:08
                                            | <i class="fa fa-comment"></i> <a href="#">3 Reacties</a>
                                            | <i class="icon-share"></i> <a href="#">39 Shares</a>
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-8">
                                        <h4><strong><a href="#">Title of the post</a></strong></h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <a href="#" class="thumbnail">
                                            <img src="http://placehold.it/260x180" alt="">
                                        </a>
                                    </div>
                                    <div class="col-md-8">
                                        <p>
                                            Lorem ipsum dolor sit amet, id nec conceptam conclusionemque. Et eam tation option.
                                            Utinam salutatus ex eum. Ne mea dicit tibique facilisi, ea mei omittam explicari conclusionemque,
                                            ad nobis propriae quaerendum sea.
                                        </p>
                                        <p><a class="btn btn-sm btn-primary" href="">Lees meer</a></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 post-header-line" style="margin-top: -12px;">
                                        <p>
                                            <i class="fa fa-user"></i> Autheur: <a href="#">John</a>
                                            | <i class="fa fa-calendar"></i> 2017-02-18 18:54:08
                                            | <i class="fa fa-comment"></i> <a href="#">3 Reacties</a>
                                            | <i class="icon-share"></i> <a href="#">39 Shares</a>
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <ul class="pagination pagination-sm">
                                    <li><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li><a href="#">5</a></li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        {{-- /Content --}}

        {{-- Activities --}}
            <div class="col-sm-12 col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading">Activiteiten</div>

                    {{-- Listing --}}
                        <div class="list-group">
                            <a href="" class="list-group-item">Test</a>
                        </div>
                    {{-- /Listing --}}
                </div>
            </div>
        {{-- /Activities --}}
    </div>
@endsection