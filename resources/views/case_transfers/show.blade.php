@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Case Transfer' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('case_transfers.case_transfer.destroy', $caseTransfer->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('case_transfers.case_transfer.index') }}" class="btn btn-primary" title="Show All Case Transfer">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('case_transfers.case_transfer.create') }}" class="btn btn-success" title="Create Case Transfer">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('case_transfers.case_transfer.edit', $caseTransfer->id ) }}" class="btn btn-primary" title="Edit Case Transfer">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Case Transfer" onclick="return confirm(&quot;Delete Case Transfer??&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Client Case</dt>
            <dd>{{ optional($caseTransfer->clientCase)->case_title }}</dd>
            <dt>Note</dt>
            <dd>{{ $caseTransfer->note }}</dd>
            <dt>Document</dt>
            <dd>{{ $caseTransfer->document }}</dd>
            <dt>Network</dt>
            <dd>{{ optional($caseTransfer->network)->id }}</dd>
            <dt>User</dt>
            <dd>{{ optional($caseTransfer->user)->id }}</dd>
            <dt>Deleted At</dt>
            <dd>{{ $caseTransfer->deleted_at }}</dd>
            <dt>Created At</dt>
            <dd>{{ $caseTransfer->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $caseTransfer->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection