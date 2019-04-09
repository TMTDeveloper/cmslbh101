@extends('layouts.base')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Kasus Klien' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('client_cases.client_case.destroy', $clientCase->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('client_cases.client_case.index') }}" class="btn btn-primary" title="Show All Client Case">
                        <span class="fa fa-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('client_cases.client_case.create') }}" class="btn btn-success" title="Create Client Case">
                        <span class="fa fa-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('client_cases.client_case.edit', $clientCase->id ) }}" class="btn btn-primary" title="Edit Client Case">
                        <span class="fa fa-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Client Case" onclick="return confirm(&quot;Delete Client Case??&quot;)">
                        <span class="fa fa-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Person</dt>
            <dd>{{ optional($clientCase->person)->name }}</dd>
            <dt>Application</dt>
            <dd>{{ optional($clientCase->application)->no_reg }}</dd>
            <dt>Case Title</dt>
            <dd>{{ $clientCase->case_title }}</dd>
            <dt>Recommendation</dt>
            <dd>{{ $clientCase->recommendation }}</dd>
            <dt>PP Piket</dt>
            <dd>{{ $clientCase->pp_piket }}</dd>
            <dt>PP Penerima</dt>
            <dd>{{ $clientCase->pp_penerima }}</dd>
            <dt>PP Asisten</dt>
            <dd>{{ $clientCase->pp_asisten }}</dd>
            {{--<dt>Deleted At</dt>
            <dd>{{ $clientCase->deleted_at }}</dd>
            <dt>Created At</dt>
            <dd>{{ $clientCase->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $clientCase->updated_at }}</dd>--}}

        </dl>

    </div>
</div>

@endsection