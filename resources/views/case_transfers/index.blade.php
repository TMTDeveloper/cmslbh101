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
                <h4 class="mt-5 mb-5">Transfer Kasus</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('case_transfers.case_transfer.create') }}" class="btn btn-success" title="Create Case Transfer">
                    <span class="fa fa-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($caseTransfers) == 0)
            <div class="panel-body text-center">
                <h4>No Case Transfers Available!</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Kasus Klien</th>
                            <th>Dokumen</th>
                            <th>Jaringan/Lembaga</th>
                            {{--<th>User</th>--}}

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($caseTransfers as $caseTransfer)
                        <tr>
                            <td>{{ optional($caseTransfer->clientCase)->case_title }}</td>
                            <td><a href="//{{ $caseTransfer->document}}" target="_blank">{{ $caseTransfer->document }}</a></td>
                            <td>{{ optional($caseTransfer->network)->name }}</td>
                            {{--<td>{{ optional($caseTransfer->user)->id }}</td>--}}

                            <td>

                                <form method="POST" action="{!! route('case_transfers.case_transfer.destroy', $caseTransfer->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('case_transfers.case_transfer.show', $caseTransfer->id ) }}" class="btn btn-info" title="Show Case Transfer">
                                            <span class="fa fa-eye" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('case_transfers.case_transfer.edit', $caseTransfer->id ) }}" class="btn btn-primary" title="Edit Case Transfer">
                                            <span class="fa fa-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Case Transfer" onclick="return confirm(&quot;Delete Case Transfer?&quot;)">
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
            {!! $caseTransfers->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection