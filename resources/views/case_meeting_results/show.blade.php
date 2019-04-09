@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Case Meeting Result' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('case_meeting_results.case_meeting_result.destroy', $caseMeetingResult->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('case_meeting_results.case_meeting_result.index') }}" class="btn btn-primary" title="Show All Case Meeting Result">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('case_meeting_results.case_meeting_result.create') }}" class="btn btn-success" title="Create Case Meeting Result">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('case_meeting_results.case_meeting_result.edit', $caseMeetingResult->id ) }}" class="btn btn-primary" title="Edit Case Meeting Result">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Case Meeting Result" onclick="return confirm(&quot;Delete Case Meeting Result??&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Client Case</dt>
            <dd>{{ optional($caseMeetingResult->clientCase)->case_title }}</dd>
            <dt>Status</dt>
            <dd>{{ $caseMeetingResult->status }}</dd>
            <dt>Legal Memo</dt>
            <dd>{{ $caseMeetingResult->legal_memo }}</dd>
            <dt>Notula</dt>
            <dd>{{ $caseMeetingResult->notula }}</dd>
            <dt>User</dt>
            <dd>{{ optional($caseMeetingResult->user)->id }}</dd>
            <dt>Deleted At</dt>
            <dd>{{ $caseMeetingResult->deleted_at }}</dd>
            <dt>Created At</dt>
            <dd>{{ $caseMeetingResult->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $caseMeetingResult->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection