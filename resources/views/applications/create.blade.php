@extends('layouts.base')

@section('content')

    <div class="panel panel-default">

        <div class="panel-heading clearfix">
            
            <span class="pull-left">
                <h4 class="mt-5 mb-5">Permohonan</h4>
            </span>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('applications.application.index') }}" class="btn btn-primary" title="Show All Application">
                    <span class="fa fa-th-list" aria-hidden="true"></span>
                </a>
            </div>

        </div>

        <div class="panel-body">
        
            @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <form method="POST" action="{{ route('applications.application.store') }}" accept-charset="UTF-8" id="create_application_form" name="create_application_form" class="form-horizontal">
            {{ csrf_field() }}
            @include ('applications.form', [
                                        'application' => null,
                                      ])

                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <input class="btn btn-primary" type="submit" value="Submit">
                    </div>
                </div>

            </form>

        </div>
    </div>

@endsection


