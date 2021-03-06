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
                <h4 class="mt-5 mb-5">Perkembangan Kasus</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('case_progresses.case_progress.create') }}" class="btn btn-success" title="Create Case Progress">
                    <span class="fa fa-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($caseProgresses) == 0)
            <div class="panel-body text-center">
                <h4>No Case Progresses Available!</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Kasus Klien</th>
                            <th>Catatan</th>
                            <th>Peradilan yg Ditempuh</th>
                            <th>Kasus ditutup</th>
                            <th>Surat Kuasa</th>
                            <th>Surat Pemutusan Kuasa</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($caseProgresses as $caseProgress)
                        <tr>
                            <td>{{ optional($caseProgress->clientCase)->case_title }}</td>
                            <td>{{ optional($caseProgress->note)->id }}</td>
                            <td>{{ $caseProgress->judicial }}</td>
                            <td></td>
                            <td><a href="//{{ $caseProgress->sk }}" target="_blank">{{ $caseProgress->sk }}</a></td>
                            <td><a href="//{{ $caseProgress->skpk }}" target="_blank">{{ $caseProgress->skpk }}</a></td>

                            <td>

                                <form method="POST" action="{!! route('case_progresses.case_progress.destroy', $caseProgress->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('case_progresses.case_progress.show', $caseProgress->id ) }}" class="btn btn-info" title="Show Case Progress">
                                            <span class="fa fa-eye" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('case_progresses.case_progress.edit', $caseProgress->id ) }}" class="btn btn-primary" title="Edit Case Progress">
                                            <span class="fa fa-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Case Progress" onclick="return confirm(&quot;Delete Case Progress?&quot;)">
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
            {!! $caseProgresses->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection