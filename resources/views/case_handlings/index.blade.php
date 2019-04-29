@extends('layouts.base')

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
                <h4 class="mt-5 mb-5">Penanganan Kasus</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('case_handlings.case_handling.create') }}" class="btn btn-success" title="Create Case Handling">
                    <span class="fa fa-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($caseHandlings) == 0)
            <div class="panel-body text-center">
                <h4>No Case Handlings Available!</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Kasus Klien</th>
                            <th>Posisi</th>
                            <th>Litigasi</th>
                            <th>Nonlitigasi</th>
                            <th>Target Advokasi</th>
                            <th>Kondisi yg Sudah Dicapai</th>
                            <th>Hambatan</th>
                            <th>Rencana Strategis</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($caseHandlings as $caseHandling)
                        <tr>
                            <td>{{ optional($caseHandling->clientCase)->case_title }}</td>
                            <td>{{ $caseHandling->position }}</td>
                            <td>{{ $caseHandling->litigation }}</td>
                            <td>{{ $caseHandling->nonlitigation }}</td>
                            <td>{{ $caseHandling->advocacy_target }}</td>
                            <td>{{ $caseHandling->condition_achievement }}</td>
                            <td>{{ $caseHandling->obstacle }}</td>
                            <td>{{ $caseHandling->strategy_plan }}</td>

                            <td>

                                <form method="POST" action="{!! route('case_handlings.case_handling.destroy', $caseHandling->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('case_handlings.case_handling.show', $caseHandling->id ) }}" class="btn btn-info" title="Show Case Handling">
                                            <span class="fa fa-eye" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('case_handlings.case_handling.edit', $caseHandling->id ) }}" class="btn btn-primary" title="Edit Case Handling">
                                            <span class="fa fa-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Case Handling" onclick="return confirm(&quot;Delete Case Handling?&quot;)">
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
            {!! $caseHandlings->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection