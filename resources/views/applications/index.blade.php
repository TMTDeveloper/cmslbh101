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
                <h4 class="mt-5 mb-5">Permohonan</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('applications.application.create') }}" class="btn btn-success" title="Tambah Permohonan">
                    <span class="fa fa-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($applications) == 0)
            <div class="panel-body text-center">
                <h4>No Applications Available!</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>No Reg</th>
                            <th>Tgl Registrasi</th>
                            {{-- <th>Pemohon</th>
                            <th>Penerima</th> --}}
                            {{--<th>Pernah Menjadi Klien</th>
                            <th>Lembaga yg Pernah Menangani</th>
                            <th>Mengetahui Info LBH</th>
                            <th>Alasan Datang ke LBH</th>--}}
                            <th>Masalah</th>
                            {{--<th>User</th>--}}

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($applications as $application)
                        <tr>
                            <td>{{ $application->no_reg }}</td>
                            <td>{{ $application->reg_date }}</td>
                            {{-- <td>{{ optional($application->applicant)->deleted_at }}</td>
                            <td>{{ optional($application->client)->deleted_at }}</td> --}}
                            {{--<td>{{ ($application->is_client) ? 'Yes' : 'No' }}</td>
                            <td>{{ $application->other_org }}</td>
                            <td>{{ $application->info_lbh }}</td>
                            <td>{{ $application->why_lbh }}</td>--}}
                            <td>{{ $application->problem_desc }}</td>
                            {{--<td>{{ optional($application->user)->id }}</td>--}}

                            <td>

                                <form method="POST" action="{!! route('applications.application.destroy', $application->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('applications.application.show', $application->id ) }}" class="btn btn-info" title="Show Application">
                                            <span class="fa fa-eye" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Application" onclick="return confirm(&quot;Delete Application?&quot;)">
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
            {{--{!! $applications->render() !!}--}}
            {{ $applications->links("pagination::bootstrap-4") }}
        </div>
        
        @endif
    
    </div>
@endsection
