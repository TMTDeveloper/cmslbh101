@extends('layouts.base')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Case Document' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('case_documents.case_document.destroy', $caseDocument->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('case_documents.case_document.index') }}" class="btn btn-primary" title="Show All Case Document">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('case_documents.case_document.create') }}" class="btn btn-success" title="Create Case Document">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('case_documents.case_document.edit', $caseDocument->id ) }}" class="btn btn-primary" title="Edit Case Document">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Case Document" onclick="return confirm(&quot;Delete Case Document??&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Client Case</dt>
            <dd>{{ optional($caseDocument->clientCase)->case_title }}</dd>
            <dt>Surat Polisi</dt>
            <dd>{{ $caseDocument->surat_polisi }}</dd>
            <dt>Surat Gugatan</dt>
            <dd>{{ $caseDocument->surat_gugatan }}</dd>
            <dt>Jwbn Gugatan</dt>
            <dd>{{ $caseDocument->jwbn_gugatan }}</dd>
            <dt>Surat Dakwaan</dt>
            <dd>{{ $caseDocument->surat_dakwaan }}</dd>
            <dt>Eksepsi</dt>
            <dd>{{ $caseDocument->eksepsi }}</dd>
            <dt>Tanggapan Eksepsi</dt>
            <dd>{{ $caseDocument->tanggapan_eksepsi }}</dd>
            <dt>Putusan Sela</dt>
            <dd>{{ $caseDocument->putusan_sela }}</dd>
            <dt>Bukti</dt>
            <dd>{{ $caseDocument->bukti }}</dd>
            <dt>Pledoi</dt>
            <dd>{{ $caseDocument->pledoi }}</dd>
            <dt>Replik</dt>
            <dd>{{ $caseDocument->replik }}</dd>
            <dt>Duplik</dt>
            <dd>{{ $caseDocument->duplik }}</dd>
            <dt>Kesimpulan</dt>
            <dd>{{ $caseDocument->kesimpulan }}</dd>
            <dt>Putusan Pn</dt>
            <dd>{{ $caseDocument->putusan_pn }}</dd>
            <dt>Pernyataan Banding</dt>
            <dd>{{ $caseDocument->pernyataan_banding }}</dd>
            <dt>Memori Banding</dt>
            <dd>{{ $caseDocument->memori_banding }}</dd>
            <dt>Kontra Memori Banding</dt>
            <dd>{{ $caseDocument->kontra_memori_banding }}</dd>
            <dt>Putusan Pt</dt>
            <dd>{{ $caseDocument->putusan_pt }}</dd>
            <dt>Pernyataan Kasasi</dt>
            <dd>{{ $caseDocument->pernyataan_kasasi }}</dd>
            <dt>Memori Kasasi</dt>
            <dd>{{ $caseDocument->memori_kasasi }}</dd>
            <dt>Kontra Memori Kasasi</dt>
            <dd>{{ $caseDocument->kontra_memori_kasasi }}</dd>
            <dt>Putusan Ma</dt>
            <dd>{{ $caseDocument->putusan_ma }}</dd>
            <dt>Surat</dt>
            <dd>{{ $caseDocument->surat }}</dd>
            <dt>Lainnya</dt>
            <dd>{{ $caseDocument->lainnya }}</dd>
            <dt>User</dt>
            <dd>{{ optional($caseDocument->user)->id }}</dd>
            <dt>Deleted At</dt>
            <dd>{{ $caseDocument->deleted_at }}</dd>
            <dt>Created At</dt>
            <dd>{{ $caseDocument->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $caseDocument->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection