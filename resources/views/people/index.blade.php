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
                <h4 class="mt-5 mb-5">Data Person</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('people.person.create') }}" class="btn btn-success" title="Create Person">
                    <span class="fa fa-plus-square" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($people) == 0)
            <div class="panel-body text-center">
                <h4>No People Available!</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            {{--<th>User</th>--}}
                            <th>Nama</th>
                            <th>Nama Panggilan</th>
                            <th>Count Unit</th>
                            <th>Tempat Lahir</th>
                            <th>Tanggal Lahir</th>
                            <th>Gender</th>
                            <!--<th>Agama</th>
                            <th>Jenis Kartu Identitas</th>
                            <th>Golongan Darah</th>
                            <th>Nomor Kartu Identitas</th>
                            <th>Nomor HP</th>
                            <th>Email</th>
                            <th>Surat Keterangan Tidak Mampu</th>
                            <th>Alamat</th> -->
                            <th>Kebangsaan</th>
                            <th>Provinsi</th>
                            <th>Kab/Kota</th>
                            <th>Kecamatan</th>
                            <!-- <th>Penyandang Disabilitas?</th>
                            <th>Pendidikan</th>
                            <th>Status Perkawinan</th>
                            <th>Pekerjaan</th>
                            <th>Penghasilan</th>
                            <th>Status tempat tinggal</th>
                            <th>Pernah menjadi klien LBH?</th>
                            <th>Amda mendapatkan info tentang LBH dari:</th>
                            <th>Alasan datang ke LBH</th>
                            <th>Anda datang ke LBH mewakili:</th>
                            <th>Nama Organisasi</th>
                            <th>Posisi di Organisasi</th>
                            <th>Jumlah anggota organisasi</th> -->

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($people as $person)
                        <tr>
                            {{--<td>{{ optional($person->user)->id }}</td>--}}
                            <td>{{ $person->name }}</td>
                            <td>{{ $person->alias }}</td>
                            <td>{{ $person->count_unit }}</td>
                            <td>{{ $person->pob }}</td>
                            <td>{{ $person->dob }}</td>
                            <td>{{ $person->gender }}</td>
                            {{-- <td>{{ $person->religion }}</td>
                            <td>{{ $person->idcard_type }}</td>
                            <td>{{ $person->blood_type }}</td>
                            <td>{{ $person->idcard_number }}</td>
                            <td>{{ $person->no_contact }}</td>
                            <td>{{ $person->email }}</td>
                            <td>{{ $person->inability_letter }}</td>
                            <td>{{ $person->address }}</td> --}}
                            <td>{{ optional($person->nationality)->name }}</td>
                            <td>{{ optional($person->province)->name }}</td>
                            <td>{{ optional($person->regency)->name }}</td>
                            <td>{{ optional($person->district)->name }}</td>
                            {{--<td>{{ $person->has_disablility }}</td>
                            <td>{{ $person->education }}</td>
                            <td>{{ $person->marital_status }}</td>
                            <td>{{ optional($person->employment)->name }}</td>
                            <td>{{ $person->income }}</td>
                            <td>{{ $person->home_status }}</td>
                            <td>{{ $person->is_client }}</td>
                            <td>{{ $person->info_lbh }}</td>
                            <td>{{ $person->reason_lbh }}</td>
                            <td>{{ $person->represent }}</td>
                            <td>{{ $person->org_name }}</td>
                            <td>{{ $person->org_position }}</td>
                            <td>{{ $person->org_member }}</td>--}}

                            <td>

                                <form method="POST" action="{!! route('people.person.destroy', $person->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('people.person.show', $person->id ) }}" class="btn btn-info" title="Show Person">
                                            <span class="fa fa-eye" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('people.person.edit', $person->id ) }}" class="btn btn-primary" title="Edit Person">
                                            <span class="fa fa-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Person" onclick="return confirm(&quot;Delete Person?&quot;)">
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
            {{--{!! $people->render() !!}--}}
            {{ $people->links("pagination::bootstrap-4") }}
        </div>
        
        @endif
    
    </div>
@endsection