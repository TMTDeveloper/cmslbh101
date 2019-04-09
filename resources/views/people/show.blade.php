@extends('layouts.base')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($person->name) ? $person->name : 'Person' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('people.person.destroy', $person->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('people.person.index') }}" class="btn btn-primary" title="Show All Person">
                        <span class="fa fa-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('people.person.create') }}" class="btn btn-success" title="Create Person">
                        <span class="fa fa-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('people.person.edit', $person->id ) }}" class="btn btn-primary" title="Edit Person">
                        <span class="fa fa-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Person" onclick="return confirm(&quot;Delete Person??&quot;)">
                        <span class="fa fa-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>User</dt>
            <dd>{{ optional($person->user)->id }}</dd>
            <dt>Nama</dt>
            <dd>{{ $person->name }}</dd>
            <dt>Nama Panggilan</dt>
            <dd>{{ $person->alias }}</dd>
            <dt>Count Unit</dt>
            <dd>{{ $person->count_unit }}</dd>
            <dt>Tempat Lahir</dt>
            <dd>{{ $person->pob }}</dd>
            <dt>Tanggal Lahir</dt>
            <dd>{{ $person->dob }}</dd>
            <dt>Gender</dt>
            <dd>{{ $person->gender }}</dd>
            <dt>Agama</dt>
            <dd>{{ $person->religion }}</dd>
            <dt>Jenis Kartu Identitas</dt>
            <dd>{{ $person->idcard_type }}</dd>
            <dt>Golongan Darah</dt>
            <dd>{{ $person->blood_type }}</dd>
            <dt>Nomor Kartu Identitas</dt>
            <dd>{{ $person->idcard_number }}</dd>
            <dt>Nomor HP</dt>
            <dd>{{ $person->no_contact }}</dd>
            <dt>Email</dt>
            <dd>{{ $person->email }}</dd>
            <dt>Surat Keterangan Tidak Mampu</dt>
            <dd>{{ $person->inability_letter }}</dd>
            <dt>Alamat</dt>
            <dd>{{ $person->address }}</dd>
            <dt>Kebangsaan</dt>
            <dd>{{ optional($person->nationality)->id }}</dd>
            <dt>Provinsi</dt>
            <dd>{{ optional($person->province)->id }}</dd>
            <dt>Kab/Kota</dt>
            <dd>{{ optional($person->regency)->id }}</dd>
            <dt>Kecamatan</dt>
            <dd>{{ optional($person->district)->id }}</dd>
            <dt>Penyandang Disabilitas?</dt>
            <dd>{{ $person->has_disablility }}</dd>
            <dt>Pendidikan</dt>
            <dd>{{ $person->education }}</dd>
            <dt>Status Perkawinan</dt>
            <dd>{{ $person->marital_status }}</dd>
            <dt>Penghasilan</dt>
            <dd>{{ $person->income }}</dd>
            <dt>Status tempat tinggal</dt>
            <dd>{{ $person->home_status }}</dd>
            <dt>Pernah menjadi klien LBH?</dt>
            <dd>{{ $person->is_client }}</dd>
            <dt>Amda mendapatkan info tentang LBH dari:</dt>
            <dd>{{ $person->info_lbh }}</dd>
            <dt>Alasan datang ke LBH</dt>
            <dd>{{ $person->reason_lbh }}</dd>
            <dt>Anda datang ke LBH mewakili:</dt>
            <dd>{{ $person->represent }}</dd>
            <dt>Nama Organisasi</dt>
            <dd>{{ $person->org_name }}</dd>
            <dt>Posisi di Organisasi</dt>
            <dd>{{ $person->org_position }}</dd>
            <dt>Jumlah anggota organisasi</dt>
            <dd>{{ $person->org_member }}</dd>
            {{--<dt>Deleted At</dt>
            <dd>{{ $person->deleted_at }}</dd>
            <dt>Created At</dt>
            <dd>{{ $person->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $person->updated_at }}</dd>--}}

        </dl>

    </div>
</div>

@endsection