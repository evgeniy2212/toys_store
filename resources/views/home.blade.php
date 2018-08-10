@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @include('navigation')
        {{--<nav class="navbar navbar-default">--}}
            {{--<div class="container-fluid">--}}
                {{--<!-- Brand and toggle get grouped for better mobile display -->--}}
                {{--<div class="navbar-header">--}}
                    {{--<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">--}}
                        {{--<span class="sr-only">Toggle navigation</span>--}}
                        {{--<span class="icon-bar"></span>--}}
                        {{--<span class="icon-bar"></span>--}}
                        {{--<span class="icon-bar"></span>--}}
                    {{--</button>--}}
                    {{--<a class="navbar-brand" href="#">Brand</a>--}}
                {{--</div>--}}

                {{--<!-- Collect the nav links, forms, and other content for toggling -->--}}
                {{--<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">--}}
                    {{--<ul class="nav navbar-nav">--}}
                        {{--<li class="active"><a href="#">Товары <span class="sr-only">(current)</span></a></li>--}}
                        {{--<li><a href="#">Новости</a></li>--}}
                    {{--</ul>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</nav>--}}
        {{--<div class="col-md-8 col-md-offset-2">--}}
            {{--<div class="panel panel-default">--}}
                {{--<div class="panel-heading">Dashboard</div>--}}

                {{--<div class="panel-body">--}}
                    {{--@if (session('status'))--}}
                        {{--<div class="alert alert-success">--}}
                            {{--{{ session('status') }}--}}
                        {{--</div>--}}
                    {{--@endif--}}

                    {{--You are logged in!--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    </div>
</div>
@endsection
