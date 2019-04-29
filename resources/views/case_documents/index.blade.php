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
                <h4 class="mt-5 mb-5">Dokumen Kasus</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('case_documents.case_document.create') }}" class="btn btn-success" title="Create Case Document">
                    <span class="fa fa-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($caseDocuments) == 0)
            <div class="panel-body text-center">
                <h4>No Case Documents Available!</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Kasus Klien</th>
                            <th>Surat Polisi</th>
                            <th>Surat Gugatan</th>
                            <th>Jwbn Gugatan</th>
                            <th>Surat Dakwaan</th>
                            <th>Eksepsi</th>
                            <th>Tanggapan Eksepsi</th>
                            <th>Putusan Sela</th>
                            <th>Bukti</th>
                            <th>Pledoi</th>
                            <th>Replik</th>
                            <th>Duplik</th>
                            <th>Kesimpulan</th>
                            <th>Putusan Pn</th>
                            <th>Pernyataan Banding</th>
                            <th>Memori Banding</th>
                            <th>Kontra Memori Banding</th>
                            <th>Putusan Pt</th>
                            <th>Pernyataan Kasasi</th>
                            <th>Memori Kasasi</th>
                            <th>Kontra Memori Kasasi</th>
                            <th>Putusan Ma</th>
                            <th>Surat</th>
                            <th>Lainnya</th>
                            <th>User</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($caseDocuments as $caseDocument)
                        <tr>
                            <td>{{ optional($caseDocument->clientCase)->case_title }}</td>
                            <td>{{ $caseDocument->surat_polisi }}</td>
                            <td>{{ $caseDocument->surat_gugatan }}</td>
                            <td>{{ $caseDocument->jwbn_gugatan }}</td>
                            <td>{{ $caseDocument->surat_dakwaan }}</td>
                            <td>{{ $caseDocument->eksepsi }}</td>
                            <td>{{ $caseDocument->tanggapan_eksepsi }}</td>
                            <td>{{ $caseDocument->putusan_sela }}</td>
                            <td>{{ $caseDocument->bukti }}</td>
                            <td>{{ $caseDocument->pledoi }}</td>
                            <td>{{ $caseDocument->replik }}</td>
                            <td>{{ $caseDocument->duplik }}</td>
                            <td>{{ $caseDocument->kesimpulan }}</td>
                            <td>{{ $caseDocument->putusan_pn }}</td>
                            <td>{{ $caseDocument->pernyataan_banding }}</td>
                            <td>{{ $caseDocument->memori_banding }}</td>
                            <td>{{ $caseDocument->kontra_memori_banding }}</td>
                            <td>{{ $caseDocument->putusan_pt }}</td>
                            <td>{{ $caseDocument->pernyataan_kasasi }}</td>
                            <td>{{ $caseDocument->memori_kasasi }}</td>
                            <td>{{ $caseDocument->kontra_memori_kasasi }}</td>
                            <td>{{ $caseDocument->putusan_ma }}</td>
                            <td>{{ $caseDocument->surat }}</td>
                            <td>{{ $caseDocument->lainnya }}</td>
                            <td>{{ optional($caseDocument->user)->id }}</td>

                            <td>

                                <form method="POST" action="{!! route('case_documents.case_document.destroy', $caseDocument->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('case_documents.case_document.show', $caseDocument->id ) }}" class="btn btn-info" title="Show Case Document">
                                            <span class="fa fa-eye" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('case_documents.case_document.edit', $caseDocument->id ) }}" class="btn btn-primary" title="Edit Case Document">
                                            <span class="fa fa-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Case Document" onclick="return confirm(&quot;Delete Case Document?&quot;)">
                                            <span class="fa fa-trash" aria-hidden="true"></span>
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
            {!! $caseDocuments->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection