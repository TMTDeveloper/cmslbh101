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
                <h4 class="mt-5 mb-5">Konsultasi Kasus</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('case_consultations.case_consultation.create') }}" class="btn btn-success" title="Create Case Consultation">
                    <span class="fa fa-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($caseConsultations) == 0)
            <div class="panel-body text-center">
                <h4>No Case Consultations Available!</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Kasus Klien</th>
                            <th>Posisi Kasus</th>
                            <th>Analisis Kasus</th>
                            <th>Catatan Kasus</th>
                            {{--<th>User</th>--}}

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($caseConsultations as $caseConsultation)
                        <tr>
                            <td>{{ optional($caseConsultation->clientCase)->case_title }}</td>
                            <td>{{ $caseConsultation->case_position }}</td>
                            <td>{{ $caseConsultation->case_analysis }}</td>
                            <td>{{ $caseConsultation->case_note }}</td>
                            {{--<td>{{ optional($caseConsultation->user)->id }}</td>--}}

                            <td>

                                <form method="POST" action="{!! route('case_consultations.case_consultation.destroy', $caseConsultation->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('case_consultations.case_consultation.show', $caseConsultation->id ) }}" class="btn btn-info" title="Show Case Consultation">
                                            <span class="fa fa-eye" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('case_consultations.case_consultation.edit', $caseConsultation->id ) }}" class="btn btn-primary" title="Edit Case Consultation">
                                            <span class="fa fa-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Case Consultation" onclick="return confirm(&quot;Delete Case Consultation?&quot;)">
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
            {!! $caseConsultations->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection