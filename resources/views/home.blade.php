@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <section>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-xs-3">
                                                <i class="fa fa-th-large fa-5x"></i>
                                            </div>
                                            <div class="col-xs-9 text-right">
                                                <div class="huge italic">Articles</div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href={{ url('/articles/create') }}>
                                        <div class="panel-footer">
                                            <span style="color:#337ab7;" class="pull-left">Add Article</span>
                                            <span style="color:#337ab7;" class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                            <div class="clearfix"></div>
                                        </div>
                                    </a>
                                    <a href="/unpublished-articles/">
                                        <div class="panel-footer">
                                            <span style="color:#337ab7;" class="pull-left">View Scheduled Articles</span>
                                            <span style="color:#337ab7;" class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                            <div class="clearfix"></div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 pull-right">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-xs-3">
                                                <i class="fa fa-users fa-5x"></i>
                                            </div>
                                            <div class="col-xs-9 text-right">
                                                <div class="huge italic">Users</div>
                                                {{--<div>Files &amp; Resources</div>--}}
                                            </div>
                                        </div>
                                    </div>
                                    <a href="{{ url('/register') }}">Register</a>
                                        <div class="panel-footer">
                                            <span style="color:#337ab7;" class="pull-left">Register User</span>
                                            <span style="color:#337ab7;" class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                            <div class="clearfix"></div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
@endsection
