@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Family Asset' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('family_assets.family_asset.destroy', $familyAsset->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('family_assets.family_asset.index') }}" class="btn btn-primary" title="Show All Family Asset">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('family_assets.family_asset.create') }}" class="btn btn-success" title="Create Family Asset">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('family_assets.family_asset.edit', $familyAsset->id ) }}" class="btn btn-primary" title="Edit Family Asset">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Family Asset" onclick="return confirm(&quot;Delete Family Asset??&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Person</dt>
            <dd>{{ optional($familyAsset->person)->name }}</dd>
            <dt>Children</dt>
            <dd>{{ $familyAsset->children }}</dd>
            <dt>Spouse</dt>
            <dd>{{ $familyAsset->spouse }}</dd>
            <dt>Family</dt>
            <dd>{{ $familyAsset->family }}</dd>
            <dt>Other</dt>
            <dd>{{ $familyAsset->other }}</dd>
            <dt>Bangunan</dt>
            <dd>{{ $familyAsset->bangunan }}</dd>
            <dt>Rumah</dt>
            <dd>{{ $familyAsset->rumah }}</dd>
            <dt>Toko</dt>
            <dd>{{ $familyAsset->toko }}</dd>
            <dt>Kios</dt>
            <dd>{{ $familyAsset->kios }}</dd>
            <dt>Warung</dt>
            <dd>{{ $familyAsset->warung }}</dd>
            <dt>Lapak</dt>
            <dd>{{ $familyAsset->lapak }}</dd>
            <dt>Lahan</dt>
            <dd>{{ $familyAsset->lahan }}</dd>
            <dt>Lahan Garapan</dt>
            <dd>{{ $familyAsset->lahan_garapan }}</dd>
            <dt>Mobil</dt>
            <dd>{{ $familyAsset->mobil }}</dd>
            <dt>Motor</dt>
            <dd>{{ $familyAsset->motor }}</dd>
            <dt>Created At</dt>
            <dd>{{ $familyAsset->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $familyAsset->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection