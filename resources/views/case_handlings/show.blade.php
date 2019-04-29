@extends('layouts.base')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Case Handling' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('case_handlings.case_handling.destroy', $caseHandling->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('case_handlings.case_handling.index') }}" class="btn btn-primary" title="Show All Case Handling">
                        <span class="fa fa-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('case_handlings.case_handling.create') }}" class="btn btn-success" title="Create Case Handling">
                        <span class="fa fa-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('case_handlings.case_handling.edit', $caseHandling->id ) }}" class="btn btn-primary" title="Edit Case Handling">
                        <span class="fa fa-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Case Handling" onclick="return confirm(&quot;Delete Case Handling??&quot;)">
                        <span class="fa fa-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Client Case</dt>
            <dd>{{ optional($caseHandling->clientCase)->case_title }}</dd>
            <dt>Position</dt>
            <dd>{{ $caseHandling->position }}</dd>
            <dt>Litigation</dt>
            <dd>{{ $caseHandling->litigation }}</dd>
            <dt>Nonlitigation</dt>
            <dd>{{ $caseHandling->nonlitigation }}</dd>
            <dt>Advocacy Target</dt>
            <dd>{{ $caseHandling->advocacy_target }}</dd>
            <dt>Condition Achievement</dt>
            <dd>{{ $caseHandling->condition_achievement }}</dd>
            <dt>Obstacle</dt>
            <dd>{{ $caseHandling->obstacle }}</dd>
            <dt>Strategy Plan</dt>
            <dd>{{ $caseHandling->strategy_plan }}</dd>
            {{-- <dt>Created At</dt>
            <dd>{{ $caseHandling->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $caseHandling->updated_at }}</dd> --}}

        </dl>

    </div>
</div>

@endsection