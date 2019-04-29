@extends('layouts.base')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Case Classification' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('case_classifications.case_classification.destroy', $caseClassification->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('case_classifications.case_classification.index') }}" class="btn btn-primary" title="Show All Case Classification">
                        <span class="fa fa-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('case_classifications.case_classification.create') }}" class="btn btn-success" title="Create Case Classification">
                        <span class="fa fa-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('case_classifications.case_classification.edit', $caseClassification->id ) }}" class="btn btn-primary" title="Edit Case Classification">
                        <span class="fa fa-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Case Classification" onclick="return confirm(&quot;Delete Case Classification??&quot;)">
                        <span class="fa fa-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Client Case</dt>
            <dd>{{ optional($caseClassification->clientCase)->case_title }}</dd>
            <dt>User</dt>
            <dd>{{ optional($caseClassification->user)->name }}</dd>
            <dt>Case1 Classification</dt>
            <dd>{{ optional($caseClassification->case1Classification)->name }}</dd>
            <dt>Case2 Classification</dt>
            <dd>{{ optional($caseClassification->case2Classification)->name }}</dd>
            <dt>Case3 Classification</dt>
            <dd>{{ optional($caseClassification->case3Classification)->name }}</dd>
            <dt>Case4 Classification</dt>
            <dd>{{ optional($caseClassification->case4Classification)->name }}</dd>
            <dt>Violated Right</dt>
            <dd>{{ optional($caseClassification->violatedRight)->name }}</dd>
            {{-- <dt>Created At</dt>
            <dd>{{ \Carbon\Carbon::parse($caseClassification->created_at->timezone(Auth::user()->timezone))->format('j/n/Y g:i A')}}</dd>
            <dt>Updated At</dt>
            <dd>{{ \Carbon\Carbon::parse($caseClassification->updated_at->timezone(Auth::user()->timezone))->format('j/n/Y g:i A') }}</dd> --}}

        </dl>

    </div>
</div>

@endsection