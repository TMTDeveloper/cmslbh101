@extends('layouts.base')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Permohonan' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('applications.application.destroy', $application->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('applications.application.index') }}" class="btn btn-primary" title="Show All Application">
                        <span class="fa fa-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('applications.application.create') }}" class="btn btn-success" title="Create Application">
                        <span class="fa fa-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('applications.application.edit', $application->id ) }}" class="btn btn-primary" title="Edit Application">
                        <span class="fa fa-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Application" onclick="return confirm(&quot;Delete Application??&quot;)">
                        <span class="fa fa-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>No Reg</dt>
            <dd>{{ $application->no_reg }}</dd>
            <dt>Tgl Registrasi</dt>
            <dd>{{ $application->reg_date }}</dd>
            <dt>Pemohon</dt>
            <dd>{{ optional($application->applicant)->deleted_at }}</dd>
            <dt>Klien/Penerima</dt>
            <dd>{{ optional($application->client)->deleted_at }}</dd>
            <dt>Pernah Mjd Klien</dt>
            <dd>{{ ($application->is_client) ? 'Yes' : 'No' }}</dd>
            <dt>Lembaga yg Pernah Menangani</dt>
            <dd>{{ $application->other_org }}</dd>
            <dt>Info LBH</dt>
            <dd>{{ $application->info_lbh }}</dd>
            <dt>Alasan Datang ke LBH</dt>
            <dd>{{ $application->why_lbh }}</dd>
            <dt>Masalah</dt>
            <dd>{{ $application->problem_desc }}</dd>
            {{--<dt>User</dt>
            <dd>{{ optional($application->user)->id }}</dd>
            <dt>Deleted At</dt>
            <dd>{{ $application->deleted_at }}</dd>
            <dt>Created At</dt>
            <dd>{{ $application->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $application->updated_at }}</dd>--}}

        </dl>

    </div>
</div>

@endsection