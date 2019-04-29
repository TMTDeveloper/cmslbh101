@extends('layouts.base')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Case Consultation' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('case_consultations.case_consultation.destroy', $caseConsultation->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('case_consultations.case_consultation.index') }}" class="btn btn-primary" title="Show All Case Consultation">
                        <span class="fa fa-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('case_consultations.case_consultation.create') }}" class="btn btn-success" title="Create Case Consultation">
                        <span class="fa fa-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('case_consultations.case_consultation.edit', $caseConsultation->id ) }}" class="btn btn-primary" title="Edit Case Consultation">
                        <span class="fa fa-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Case Consultation" onclick="return confirm(&quot;Delete Case Consultation??&quot;)">
                        <span class="fa fa-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Client Case</dt>
            <dd>{{ optional($caseConsultation->clientCase)->case_title }}</dd>
            <dt>Case Position</dt>
            <dd>{{ $caseConsultation->case_position }}</dd>
            <dt>Case Analysis</dt>
            <dd>{{ $caseConsultation->case_analysis }}</dd>
            <dt>Case Note</dt>
            <dd>{{ $caseConsultation->case_note }}</dd>
            <dt>User</dt>
            <dd>{{ optional($caseConsultation->user)->name }}</dd>
            {{-- <dt>Deleted At</dt>
            <dd>{{ $caseConsultation->deleted_at }}</dd>
            <dt>Created At</dt>
            <dd>{{ $caseConsultation->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $caseConsultation->updated_at }}</dd> --}}

        </dl>

    </div>
</div>

@endsection