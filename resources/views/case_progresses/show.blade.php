@extends('layouts.base')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Case Progress' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('case_progresses.case_progress.destroy', $caseProgress->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('case_progresses.case_progress.index') }}" class="btn btn-primary" title="Show All Case Progress">
                        <span class="fa fa-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('case_progresses.case_progress.create') }}" class="btn btn-success" title="Create Case Progress">
                        <span class="fa fa-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('case_progresses.case_progress.edit', $caseProgress->id ) }}" class="btn btn-primary" title="Edit Case Progress">
                        <span class="fa fa-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Case Progress" onclick="return confirm(&quot;Delete Case Progress??&quot;)">
                        <span class="fa fa-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Client Case</dt>
            <dd>{{ optional($caseProgress->clientCase)->case_title }}</dd>
            <dt>User</dt>
            <dd>{{ optional($caseProgress->user)->name }}</dd>
            <dt>Judicial</dt>
            <dd>{{ $caseProgress->judicial }}</dd>
            <dt>Note</dt>
            <dd>{{ $caseProgress->note }}</dd>
            <dt>Surat Kuasa</dt>
            <dd><a href="//{{ $caseProgress->sk }}" target="_blank">{{ $caseProgress->sk }}</a></dd>
            <dt>Surat Keterangan Pemutusan Kuasa</dt>
            <dd><a href="//{{ $caseProgress->skpk }}" target="_blank">{{ $caseProgress->skpk }}</a></dd>
          

        </dl>

    </div>
</div>

@endsection