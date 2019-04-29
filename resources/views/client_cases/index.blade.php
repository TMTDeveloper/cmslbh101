@extends('layouts.base')

@section('content')

    @if(Session::has('success_message'))
        <div class="alert alert-success">
            <span class="fa fa-ok"></span>
            {!! session('success_message') !!}

            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>

        </div>
    @endif

    <div class="panel panel-default">

        <div class="panel-heading clearfix">

            <div class="pull-left">
                <h4 class="mt-5 mb-5">Kasus Klien</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('client_cases.client_case.create') }}" class="btn btn-success" title="Create Client Case">
                    <span class="fa fa-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($clientCases) == 0)
            <div class="panel-body text-center">
                <h4>No Client Cases Available!</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Person</th>
                            <th>Permohonan</th>
                            <th>Judul Kasus</th>
                            <!-- <th>Rekomendasi</th> -->
                            <th>PP Piket</th>
                            <th>PP Penerima</th>
                            <th>PP Asisten</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($clientCases as $clientCase)
                        <tr>
                            <td>{{ optional($clientCase->person)->name }}</td>
                            <td>{{ optional($clientCase->application)->no_reg }}</td>
                            <td>{{ $clientCase->case_title }}</td>
                            {{--<td>{{ $clientCase->recommendation }}</td>--}}
                            <td>{{ optional($clientCase->pp_piketUser)->name }}</td>
                            <td>{{ optional($clientCase->pp_penerimaUser)->name }}</td>
                            <td>{{ optional($clientCase->pp_asistenUser)->name }}</td>

                            <td>

                                <form method="POST" action="{!! route('client_cases.client_case.destroy', $clientCase->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('client_cases.client_case.show', $clientCase->id ) }}" class="btn btn-info" title="Show Client Case">
                                            <span class="fa fa-eye" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('client_cases.client_case.edit', $clientCase->id ) }}" class="btn btn-primary" title="Edit Client Case">
                                            <span class="fa fa-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Client Case" onclick="return confirm(&quot;Delete Client Case?&quot;)">
                                            <span class="fa fa-trash" aria-hidden="true"></span>
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
            {!! $clientCases->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection