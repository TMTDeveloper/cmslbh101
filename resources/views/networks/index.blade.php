@extends('layouts.app')

@section('content')

    @if(Session::has('success_message'))
        <div class="alert alert-success">
            <span class="glyphicon glyphicon-ok"></span>
            {!! session('success_message') !!}

            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>

        </div>
    @endif

    <div class="panel panel-default">

        <div class="panel-heading clearfix">

            <div class="pull-left">
                <h4 class="mt-5 mb-5">Networks</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('networks.network.create') }}" class="btn btn-success" title="Create Network">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($networks) == 0)
            <div class="panel-body text-center">
                <h4>No Networks Available!</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Contact Person</th>
                            <th>No Contact</th>
                            <th>Email</th>
                            <th>Province</th>
                            <th>Regency</th>
                            <th>Address</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($networks as $network)
                        <tr>
                            <td>{{ $network->name }}</td>
                            <td>{{ $network->type }}</td>
                            <td>{{ $network->contact_person }}</td>
                            <td>{{ $network->no_contact }}</td>
                            <td>{{ $network->email }}</td>
                            <td>{{ optional($network->province)->name }}</td>
                            <td>{{ optional($network->regency)->name }}</td>
                            <td>{{ $network->address }}</td>

                            <td>

                                <form method="POST" action="{!! route('networks.network.destroy', $network->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('networks.network.show', $network->id ) }}" class="btn btn-info" title="Show Network">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('networks.network.edit', $network->id ) }}" class="btn btn-primary" title="Edit Network">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Network" onclick="return confirm(&quot;Delete Network?&quot;)">
                                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                        </button>
                                    </div>

                                </form>
                                
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>

        <div class="panel-footer">
            {!! $networks->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection