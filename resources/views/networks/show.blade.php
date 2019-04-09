@extends('layouts.base')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($network->name) ? $network->name : 'Network' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('networks.network.destroy', $network->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('networks.network.index') }}" class="btn btn-primary" title="Show All Network">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('networks.network.create') }}" class="btn btn-success" title="Create Network">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('networks.network.edit', $network->id ) }}" class="btn btn-primary" title="Edit Network">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Network" onclick="return confirm(&quot;Delete Network??&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Nama Lembaga</dt>
            <dd>{{ $network->name }}</dd>
            <dt>Jenis Lembaga</dt>
            <dd>{{ $network->type }}</dd>
            <dt>Kontak Person</dt>
            <dd>{{ $network->contact_person }}</dd>
            <dt>No Kontak</dt>
            <dd>{{ $network->no_contact }}</dd>
            <dt>Email</dt>
            <dd>{{ $network->email }}</dd>
            <dt>Alamat</dt>
            <dd>{{ $network->address }}</dd>
            <dt>Province</dt>
            <dd>{{ optional($network->province)->name }}</dd>
            <dt>Regency</dt>
            <dd>{{ optional($network->regency)->name }}</dd>
            <dt>Created At</dt>
            <dd>{{ $network->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $network->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection