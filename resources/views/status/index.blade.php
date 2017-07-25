@extends('master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">statusses</div>
                <div class="panel-body">
                    <a href="{{route("status.create") }}" class="btn btn-success">status toevoegen</a>
                </div>
                    <div class="col-md-12">
                        <div id="reviewstatussen">
                            <h3>Reviewstatussen</h3>
                        @foreach($statusArray as $statusid => $statusreview)
                                <div style="min-height: 45px;">
                                    {{$statusreview}}
                                    <div style="float:right;">
                                        <a href="{{ route('status.edit', $statusid) }}" class="btn btn-default"><span class="glyphicon glyphicon-pencil"></span></a>
                                    </div>
                                </div>
                        @endforeach
                        </div>
                        <div id="reviewstatussen">
                            <h3>Toolsstatussen</h3>
                            @foreach($statusArray1 as $statusid => $statusreview)
                                <div style="min-height: 45px;">
                                    {{$statusreview}}
                                    <div style="float:right;">
                                        <a href="{{ route('status.edit', $statusid) }}" class="btn btn-default"><span class="glyphicon glyphicon-pencil"></span></a>

                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div id="reviewstatussen">
                            <h3>Internshipstatussen</h3>
                            @foreach($statusArray2 as $statusid => $statusreview)
                                <div style="min-height: 45px;">
                                    {{$statusreview}}
                                    <div style="float:right;">
                                        <a href="{{ route('status.edit', $statusid) }}" class="btn btn-default"><span class="glyphicon glyphicon-pencil"></span></a>

                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection
