@extends('layouts.base')

@section('content')

    @if(Session::has('success_message'))
        <div class="alert alert-success">
            <span class="glyphicon glyphicon-ok"></span>
            {!! session('success_message') !!}

            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>

        </div>
    @endif

    <div class="panel panel-default">

        <div class="panel-heading clearfix">

            <div class="pull-left">
                <h4 class="mt-5 mb-5">Aset & Keluarga</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('family_assets.family_asset.create') }}" class="btn btn-success" title="Create Family Asset">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($familyAssets) == 0)
            <div class="panel-body text-center">
                <h4>No Family Assets Available!</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Person</th>
                            <th>Anak</th>
                            <th>Suami/Istri</th>
                            <th>Keluarga</th>
                            <th>Lainnya</th>
                            <th>Bangunan</th>
                            <th>Rumah</th>
                            <th>Toko</th>
                            <th>Kios</th>
                            <th>Warung</th>
                            <th>Lapak</th>
                            <th>Lahan</th>
                            <th>Lahan Garapan</th>
                            <th>Mobil</th>
                            <th>Motor</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($familyAssets as $familyAsset)
                        <tr>
                            <td>{{ optional($familyAsset->person)->name }}</td>
                            <td>{{ $familyAsset->children }}</td>
                            <td>{{ $familyAsset->spouse }}</td>
                            <td>{{ $familyAsset->family }}</td>
                            <td>{{ $familyAsset->other }}</td>
                            <td>{{ $familyAsset->bangunan }}</td>
                            <td>{{ $familyAsset->rumah }}</td>
                            <td>{{ $familyAsset->toko }}</td>
                            <td>{{ $familyAsset->kios }}</td>
                            <td>{{ $familyAsset->warung }}</td>
                            <td>{{ $familyAsset->lapak }}</td>
                            <td>{{ $familyAsset->lahan }}</td>
                            <td>{{ $familyAsset->lahan_garapan }}</td>
                            <td>{{ $familyAsset->mobil }}</td>
                            <td>{{ $familyAsset->motor }}</td>

                            <td>

                                <form method="POST" action="{!! route('family_assets.family_asset.destroy', $familyAsset->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('family_assets.family_asset.show', $familyAsset->id ) }}" class="btn btn-info" title="Show Family Asset">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('family_assets.family_asset.edit', $familyAsset->id ) }}" class="btn btn-primary" title="Edit Family Asset">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Family Asset" onclick="return confirm(&quot;Delete Family Asset?&quot;)">
                                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                        </button>
                                    </div>

                                </form>
                                
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>

        <div class="panel-footer">
            {!! $familyAssets->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection