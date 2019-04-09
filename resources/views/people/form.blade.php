
{{-- <div class="form-group {{ $errors->has('user_id') ? 'has-error' : '' }}">
    <label for="user_id" class="col-md-2 control-label">User</label>
    <div class="col-md-10">
        <select class="form-control" id="user_id" name="user_id">
                <option value="" style="display: none;" {{ old('user_id', optional($person)->user_id ?: '') == '' ? 'selected' : '' }} disabled selected>Pilih...</option>
            @foreach ($users as $key => $user)
                <option value="{{ $key }}" {{ old('user_id', optional($person)->user_id) == $key ? 'selected' : '' }}>
                    {{ $user }}
                </option>
            @endforeach
        </select>
        
        {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
    </div>
</div> --}}
<div class="wizards">
    <div class="progressbar">
        <div class="progress-line" data-now-value="12.11" data-number-of-steps="4" style="width: 12.11%;"></div> <!-- 19.66% -->
    </div>
<!--     <div class="form-wizard active">
   <div class="wizard-icon"><i class="fa fa-user  -o"></i></div>
   <p>Cari</p>
   </div> -->
    <div class="form-wizard active">
        <div class="wizard-icon"><i class="fa fa-user  -o"></i></div>
        <p>Identitas</p>
    </div>
    <div class="form-wizard">
        <div class="wizard-icon"><i class="fa fa-map-marker"></i></div>
        <p>Alamat</p>
    </div>

    <div class="form-wizard">
        <div class="wizard-icon"><i class="fa fa-cogs"></i></div>
        <p>Pendidikan & Pekerjaan & Keluarga</p>
    </div>
    <div class="form-wizard">
        <div class="wizard-icon"><i class="fa fa-clone"></i></div>
        <p>Info Lain</p>
    </div>    
</div>

{{--Identitas Personal--}}
<fieldset>
<div class="col-lg-6">    
<div class="card-body">    
<div class="row form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    <label for="name" class="col-md-2 control-label">Nama Lengkap</label>
    <div class="col-md-10">
        <input class="form-control" name="name" type="tel" id="name" value="{{ old('name', optional($person)->name) }}" maxlength="255" placeholder="Ketik di sini..." >
        <small class="form-text text-info">*Wajib diisi</small>
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="row form-group {{ $errors->has('alias') ? 'has-error' : '' }}">
    <label for="alias" class="col-md-2 control-label">Nama Panggilan</label>
    <div class="col-md-10">
        <input class="form-control" name="alias" type="tel" id="alias" value="{{ old('alias', optional($person)->alias) }}" maxlength="255" placeholder="Ketik di sini...">
        {!! $errors->first('alias', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="row form-group {{ $errors->has('count_unit') ? 'has-error' : '' }}">
    <label for="count_unit" class="col-md-2 control-label">Count Unit</label>
    <div class="col-md-10">
        <select class="form-control" id="count_unit" name="count_unit">
        	    <option value="" style="display: none;" {{ old('count_unit', optional($person)->count_unit ?: '') == '' ? 'selected' : '' }} disabled selected>Pilih...</option>
        	@foreach (['individu' => 'Individu',
'kelompok' => 'Kelompok'] as $key => $text)
			    <option value="{{ $key }}" {{ old('count_unit', optional($person)->count_unit) == $key ? 'selected' : '' }}>
			    	{{ $text }}
			    </option>
			@endforeach
        </select>
        <small class="form-text text-info">*Wajib diisi</small>
        {!! $errors->first('count_unit', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="row form-group {{ $errors->has('pob') ? 'has-error' : '' }}">
    <label for="pob" class="col-md-2 control-label">Tempat Lahir</label>
    <div class="col-md-10">
        <input class="form-control" name="pob" type="text" id="pob" value="{{ old('pob', optional($person)->pob) }}" maxlength="255" placeholder="Ketik di sini...">
        <small class="form-text text-info">*Wajib diisi</small>
        {!! $errors->first('pob', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="row form-group {{ $errors->has('dob') ? 'has-error' : '' }}">
    <label for="dob" class="col-md-2 control-label">Tanggal Lahir</label>
    <div class="col-md-10">
        <input class="form-control" name="dob" type="text" id="datepicker" value="{{ old('dob', optional($person)->dob) }}" maxlength="255" placeholder="DD/MM/YYYY">
        <small class="form-text text-info">*Wajib diisi</small>
        {!! $errors->first('dob', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="row form-group {{ $errors->has('gender') ? 'has-error' : '' }}">
    <label for="gender" class="col-md-2 control-label">Gender</label>
    <div class="col-md-6">
        <div class="form-check-inline form-check">
            <label for="gender_lelaki">
                <input id="gender_lelaki" class="" name="gender" type="radio" value="lelaki" {{ old('gender', optional($person)->gender) == 'lelaki' ? 'checked' : '' }}>
                Lelaki
            </label>
            <label for="gender_perempuan">
                <input id="gender_perempuan" class="" name="gender" type="radio" value="perempuan" {{ old('gender', optional($person)->gender) == 'perempuan' ? 'checked' : '' }}>
                Perempuan
            </label>
            <label for="gender_netral">
                <input id="gender_netral" class="" name="gender" type="radio" value="netral" {{ old('gender', optional($person)->gender) == 'netral' ? 'checked' : '' }}>
                Netral
            </label>
        </div>

        {!! $errors->first('gender', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="row form-group {{ $errors->has('religion') ? 'has-error' : '' }}">
    <label for="religion" class="col-md-2 control-label">Agama</label>
    <div class="col-md-8">
        <div class="col-md-4">
        <div class="radio">
            <label for="agama_islam">
                <input id="agama_islam" class="" name="religion" type="radio" value="Islam" {{ old('religion', optional($person)->religion) == 'Islam' ? 'checked' : '' }}>
                Islam
            </label>
        </div>
        <div class="radio">
            <label for="agama_kristen">
                <input id="agama_kristen" class="" name="religion" type="radio" value="Kristen" {{ old('religion', optional($person)->religion) == 'Kristen' ? 'checked' : '' }}>
                Kristen
            </label>
        </div>
        <div class="radio">
            <label for="agama_katolik">
                <input id="agama_katolik" class="" name="religion" type="radio" value="Katolik" {{ old('religion', optional($person)->religion) == 'Katolik' ? 'checked' : '' }}>
                Katolik
            </label>
        </div>
        <div class="radio">
            <label for="agama_hindu">
                <input id="agama_hindu" class="" name="religion" type="radio" value="Hindu" {{ old('religion', optional($person)->religion) == 'Hindu' ? 'checked' : '' }}>
                Hindu
            </label>
        </div>
        </div>
        <div class="col-md-8">
        <div class="radio">
            <label for="agama_budha">
                <input id="agama_budha" class="" name="religion" type="radio" value="Budha" {{ old('religion', optional($person)->religion) == 'Budha' ? 'checked' : '' }}>
                Budha
            </label>
        </div>
        <div class="radio">
            <label for="agama_konghucu">
                <input id="agama_konghucu" class="" name="religion" type="radio" value="Konghucu" {{ old('religion', optional($person)->religion) == 'Konghucu' ? 'checked' : '' }}>
                Konghucu
            </label>
        </div>
        <div class="radio">
            <label for="agama_aliran_kepercayaan">
                <input id="agama_aliran_kepercayaan" class="" name="religion" type="radio" value="Aliran kepercayaan" {{ old('religion', optional($person)->religion) == 'Aliran kepercayaan' ? 'checked' : '' }}>
                Aliran Kepercayaan
            </label>
        </div>
        <div class="radio">
            <label for="agama_lainlain">
                <input id="agama_lainlain" class="" name="religion" type="radio" value="lain-lain" {{ old('religion', optional($person)->religion) == 'lain-lain' ? 'checked' : '' }}>
                Lain-lain
            </label>
        </div>
        </div>
        {!! $errors->first('religion', '<p class="help-block">:message</p>') !!}
    </div>
</div>
</div>
</div>

<div class="col-lg-6">
<div class="card-body">
<div class="row form-group {{ $errors->has('nationality_id') ? 'has-error' : '' }}">
    <label for="nationality_id" class="col-md-2 control-label">Warga Negara</label>
    <div class="col-md-10">
        <select class="form-control" id="nationality_id" name="nationality_id">
                <option value="" style="display: none;" {{ old('nationality_id', optional($person)->nationality_id ?: '') == '' ? 'selected' : '' }} disabled selected>Pilih jika WNA</option>
            @foreach ($nationalities as $key => $nationality)
                <option value="{{ $key }}" {{ old('nationality_id', optional($person)->nationality_id) == $key ? 'selected' : '' }}>
                    {{ $nationality }}
                </option>
            @endforeach
        </select>
        
        {!! $errors->first('nationality_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="row form-group {{ $errors->has('idcard_type') ? 'has-error' : '' }}">
    <label for="idcard_type" class="col-md-2 control-label">Kartu Identitas</label>
    <div class="col-md-10">
        <select class="form-control" id="idcard_type" name="idcard_type">
                <option value="" style="display: none;" {{ old('idcard_type', optional($person)->idcard_type ?: '') == '' ? 'selected' : '' }} disabled selected>Pilih...</option>
            @foreach (['KTP' => 'KTP',
'SIM' => 'SIM',
'PASPOR' => 'PASPOR'] as $key => $text)
                <option value="{{ $key }}" {{ old('idcard_type', optional($person)->idcard_type) == $key ? 'selected' : '' }}>
                    {{ $text }}
                </option>
            @endforeach
        </select>
        <small class="form-text text-info">*Wajib diisi</small>
        {!! $errors->first('idcard_type', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="row form-group {{ $errors->has('idcard_number') ? 'has-error' : '' }}">
    <label for="idcard_number" class="col-md-2 control-label">Nomor Kartu Identitas</label>
    <div class="col-md-10">
        <input class="form-control" name="idcard_number" type="text" id="idcard_number" value="{{ old('idcard_number', optional($person)->idcard_number) }}" min="0" max="255" placeholder="Ketik di sini...">
        <small class="form-text text-info">*Wajib diisi</small>
        {!! $errors->first('idcard_number', '<p class="help-block">:message</p>') !!}
    </div>
</div>



<div class="row form-group {{ $errors->has('blood_type') ? 'has-error' : '' }}">
    <label for="blood_type" class="col-md-2 control-label">Golongan Darah</label>
    <div class="col-md-10">
        <select class="form-control" id="blood_type" name="blood_type">
        	    <option value="" style="display: none;" {{ old('blood_type', optional($person)->blood_type ?: '') == '' ? 'selected' : '' }} disabled selected>Pilih...</option>
        	@foreach (['A' => 'A',
'B' => 'B',
'AB' => 'AB',
'O' => 'O'] as $key => $text)
			    <option value="{{ $key }}" {{ old('blood_type', optional($person)->blood_type) == $key ? 'selected' : '' }}>
			    	{{ $text }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('blood_type', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="row form-group {{ $errors->has('no_contact') ? 'has-error' : '' }}">
    <label for="no_contact" class="col-md-2 control-label">Nomor HP</label>
    <div class="col-md-10">
        <input class="form-control" name="no_contact" type="text" id="no_contact" value="{{ old('no_contact', optional($person)->no_contact) }}" maxlength="255" placeholder="Ketik di sini...">
        <small class="form-text text-info">*Wajib diisi</small>
        {!! $errors->first('no_contact', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="row form-group {{ $errors->has('email') ? 'has-error' : '' }}">
    <label for="email" class="col-md-2 control-label">Email</label>
    <div class="col-md-10">
        <input class="form-control" name="email" type="text" id="email" value="{{ old('email', optional($person)->email) }}" maxlength="255" placeholder="Ketik di sini...">
        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="wizard-buttons">
        <button type="button" class="btn btn-next">Next</button>
</div>
</div>
</div>
</fieldset>

<!--Alamat-->
<fieldset>
<div class="row form-group {{ $errors->has('address') ? 'has-error' : '' }}">
    <label for="address" class="col-md-2 control-label">Alamat</label>
    <div class="col-md-10">
        <textarea class="form-control" name="address" type="text" id="address" value="{{ old('address', optional($person)->address) }}"rows="5" maxlength="255" placeholder="Ketik di sini..."></textarea>
        <small class="form-text text-info">*Wajib diisi</small>
        {!! $errors->first('address', '<p class="help-block">:message</p>') !!}
    </div>
</div>



<div class="row form-group {{ $errors->has('province_id') ? 'has-error' : '' }}">
    <label for="province_id" class="col-md-2 control-label">Provinsi</label>
    <div class="col-md-6">
        <select class="form-control" id="province_id" name="province_id">
                <option value="" style="display: none;" {{ old('province_id', optional($person)->province_id ?: '') == '' ? 'selected' : '' }} disabled selected>Pilih...</option>
            @foreach ($provinces as $key => $province)
                <option value="{{ $key }}" {{ old('province_id', optional($person)->province_id) == $key ? 'selected' : '' }}>
                    {{ $province }}
                </option>
            @endforeach
        </select>
        
        {!! $errors->first('province_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

     
          <div class="row form-group">
            <label for="" class="col-md-2 control-label">Kabupaten/Kota</label>
            <div class="col-md-6">
            <select class="form-control" name="regency_id" id="regency_id">
              <option value="0" disable="true" selected="true">Pilih...</option>
            </select>
            </div>
          </div>
      
          <div class="row form-group">
            <label for="" class="col-md-2 control-label">Kecamatan</label>
            <div class="col-md-6">
            <select class="form-control" name="district_id" id="district_id">
              <option value="0" disable="true" selected="true">Pilih...</option>
            </select>
            </div>
          </div>


{{--<div class="row form-group {{ $errors->has('regency_id') ? 'has-error' : '' }}">
    <label for="regency_id" class="col-md-2 control-label">Kab/Kota</label>
    <div class="col-md-10">
        <select class="form-control" id="regency_id" name="regency_id">
                <option value="" style="display: none;" {{ old('regency_id', optional($person)->regency_id ?: '') == '' ? 'selected' : '' }} disabled selected>Pilih...</option>
            @foreach ($regencies as $key => $regency)
                <option value="{{ $key }}" {{ old('regency_id', optional($person)->regency_id) == $key ? 'selected' : '' }}>
                    {{ $regency }}
                </option>
            @endforeach
        </select>
        
        {!! $errors->first('regency_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="row form-group {{ $errors->has('district_id') ? 'has-error' : '' }}">
    <label for="district_id" class="col-md-2 control-label">Kecamatan</label>
    <div class="col-md-10">
        <select class="form-control" id="district_id" name="district_id">
                <option value="" style="display: none;" {{ old('district_id', optional($person)->district_id ?: '') == '' ? 'selected' : '' }} disabled selected>Pilih...</option>
            @foreach ($districts as $key => $district)
                <option value="{{ $key }}" {{ old('district_id', optional($person)->district_id) == $key ? 'selected' : '' }}>

                    {{ $district }}
                </option>
            @endforeach
        </select>
        
        {!! $errors->first('district_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>--}}

<div class="wizard-buttons">
        <button type="button" class="btn btn-previous">Previous</button>
        <button type="button" class="btn btn-next">Next</button>
</div>
</fieldset>


{{--Pendidikan & Pekerjaan & Keluarga--}}
<fieldset>
<div class="row form-group {{ $errors->has('education') ? 'has-error' : '' }}">
    <label for="education" class="col-md-2 control-label">Pendidikan</label>
    <div class="col-md-10">
        <select class="form-control" id="education" name="education">
                <option value="" style="display: none;" {{ old('education', optional($person)->education ?: '') == '' ? 'selected' : '' }} disabled selected>Pilih...</option>
            @foreach (['Tidak Sekolah' => 'Tidak Sekolah',
'SD' => 'SD',
'SMP' => 'SMP',
'SMA' => 'SMA',
'D1' => 'D1',
'D2' => 'D2',
'D3' => 'D3',
'D4' => 'D4',
'S1' => 'S1',
'S2' => 'S2',
'S3' => 'S3'] as $key => $text)
                <option value="{{ $key }}" {{ old('education', optional($person)->education) == $key ? 'selected' : '' }}>
                    {{ $text }}
                </option>
            @endforeach
        </select>
        
        {!! $errors->first('education', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="row form-group {{ $errors->has('employment_id') ? 'has-error' : '' }}">
    <label for="employment_id" class="col-md-2 control-label">Pekerjaan</label>
    <div class="col-md-10">
        <select class="form-control" id="employment_id" name="employment_id">
                <option value="" style="display: none;" {{ old('employment_id', optional($person)->employment_id ?: '') == '' ? 'selected' : '' }} disabled selected>Pilih...</option>
            @foreach ($employments as $key => $employment)
                <option value="{{ $key }}" {{ old('employment_id', optional($person)->employment_id) == $key ? 'selected' : '' }}>
                    {{ $employment }}
                </option>
            @endforeach
        </select>
        <small class="form-text text-info">*Wajib diisi</small>
        {!! $errors->first('employment_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="row form-group {{ $errors->has('income') ? 'has-error' : '' }}">
    <label for="income" class="col-md-2 control-label">Penghasilan</label>
    <div class="col-md-10">
        <select class="form-control" id="income" name="income">
                <option value="" style="display: none;" {{ old('income', optional($person)->income ?: '') == '' ? 'selected' : '' }} disabled selected>Pilih...</option>
            @foreach (['tidak berpenghasilan' => 'Tidak Berpenghasilan',
'0-2 juta' => '0-2 Juta',
'2-4 juta' => '2-4 Juta',
'4-6 juta' => '4-6 Juta',
'6-8 juta' => '6-8 Juta',
'8-10 juta' => '8-10 Juta',
'>=10 juta' => '>=10 Juta'] as $key => $text)
                <option value="{{ $key }}" {{ old('income', optional($person)->income) == $key ? 'selected' : '' }}>
                    {{ $text }}
                </option>
            @endforeach
        </select>
        <small class="form-text text-info">*Wajib diisi</small>
        {!! $errors->first('income', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="row form-group {{ $errors->has('marital_status') ? 'has-error' : '' }}">
    <label for="marital_status" class="col-md-2 control-label">Status Perkawinan</label>
    <div class="col-md-10">
        <select class="form-control" id="marital_status" name="marital_status">
                <option value="" style="display: none;" {{ old('marital_status', optional($person)->marital_status ?: '') == '' ? 'selected' : '' }} disabled selected>Pilih...</option>
            @foreach (['kawin' => 'Kawin',
'belum kawin' => 'Belum Kawin',
'cerai mati' => 'Cerai Mati',
'cerai hidup' => 'Cerai Hidup'] as $key => $text)
                <option value="{{ $key }}" {{ old('marital_status', optional($person)->marital_status) == $key ? 'selected' : '' }}>
                    {{ $text }}
                </option>
            @endforeach
        </select>
        <small class="form-text text-info">*Wajib diisi</small>
        {!! $errors->first('marital_status', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="row form-group {{ $errors->has('home_status') ? 'has-error' : '' }}">
    <label for="home_status" class="col-md-2 control-label">Status tempat tinggal</label>
    <div class="col-md-10">
        <select class="form-control" id="home_status" name="home_status">
                <option value="" style="display: none;" {{ old('home_status', optional($person)->home_status ?: '') == '' ? 'selected' : '' }} disabled selected>Pilih...</option>
            @foreach (['rumah sendiri' => 'Rumah Sendiri',
'rumah dinas' => 'Rumah Dinas',
'rumah orangtua' => 'Rumah Orangtua',
'rumah orang lain' => 'Rumah Orang Lain',
'rumah saudara' => 'Rumah Saudara',
'rumah penampungan' => 'Rumah Penampungan',
'asrama' => 'Asrama',
'kontrak/sewa' => 'Kontrak/sewa',
'kredit/KPR' => 'Kredit/KPR'] as $key => $text)
                <option value="{{ $key }}" {{ old('home_status', optional($person)->home_status) == $key ? 'selected' : '' }}>
                    {{ $text }}
                </option>
            @endforeach
        </select>
        <small class="form-text text-info">*Wajib diisi</small>
        {!! $errors->first('home_status', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="row form-group {{ $errors->has('inability_letter') ? 'has-error' : '' }}">
    <label for="inability_letter" class="col-md-2 control-label">Surat Keterangan Tidak Mampu</label>
    <div class="col-md-10">
        <select class="form-control" id="inability_letter" name="inability_letter">
                <option value="" style="display: none;" {{ old('inability_letter', optional($person)->inability_letter ?: '') == '' ? 'selected' : '' }} disabled selected>Pilih...</option>
            @foreach (['SKTM' => 'SKTM',
'GAKIN' => 'GAKIN',
'JAMKESMAS' => 'JAMKESMAS',
'Tidak tersedia' => 'Tidak tersedia'] as $key => $text)
                <option value="{{ $key }}" {{ old('inability_letter', optional($person)->inability_letter) == $key ? 'selected' : '' }}>
                    {{ $text }}
                </option>
            @endforeach
        </select>
        
        {!! $errors->first('inability_letter', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="wizard-buttons">
        <button type="button" class="btn btn-previous">Previous</button>
        <button type="button" class="btn btn-next">Next</button>
</div>
</fieldset>

{{--Info Lainnya--}}
<fieldset>
<div class="row form-group {{ $errors->has('has_disability') ? 'has-error' : '' }}">
    <label for="has_disability" class="col-md-2 control-label">Penyandang disabilitas?</label>
    <div class="col-md-6">
        <div class="checkbox">
            <label for="has_disability_1">
                <input id="has_disability_1" class="" name="has_disability" type="checkbox" value="1" {{ old('has_disability', optional($person)->has_disability) == '1' ? 'checked' : '' }}>
                Ya
            </label>
        </div>

        {!! $errors->first('has_disability', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="row form-group {{ $errors->has('represent') ? 'has-error' : '' }}">
    <label for="represent" class="col-md-2 control-label">Anda datang ke LBH mewakili:</label>
    <div class="col-md-10">
        <select class="form-control" id="represent" name="represent">
        	    <option value="" style="display: none;" {{ old('represent', optional($person)->represent ?: '') == '' ? 'selected' : '' }} disabled selected>Pilih...</option>
        	@foreach (['sendiri' => 'Diri sendiri',
'mewakili dan terlibat' => 'Mewakili orang lain dan terlibat',
'mewakili tapi tidak terlibat' => 'Mewakili orang lain tapi tidak terlibat'] as $key => $text)
			    <option value="{{ $key }}" {{ old('represent', optional($person)->represent) == $key ? 'selected' : '' }}>
			    	{{ $text }}
			    </option>
			@endforeach
        </select>
        <small class="form-text text-info">*Wajib diisi</small>
        {!! $errors->first('represent', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="row form-group {{ $errors->has('org_name') ? 'has-error' : '' }}">
    <label for="org_name" class="col-md-2 control-label">Nama Organisasi</label>
    <div class="col-md-10">
        <input class="form-control" name="org_name" type="text" id="org_name" value="{{ old('org_name', optional($person)->org_name) }}" maxlength="255" placeholder="Ketik di sini...">
        {!! $errors->first('org_name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="row form-group {{ $errors->has('org_position') ? 'has-error' : '' }}">
    <label for="org_position" class="col-md-2 control-label">Posisi di Organisasi</label>
    <div class="col-md-10">
        <input class="form-control" name="org_position" type="text" id="org_position" value="{{ old('org_position', optional($person)->org_position) }}" maxlength="255" placeholder="Ketik di sini...">
        {!! $errors->first('org_position', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="row form-group {{ $errors->has('org_member') ? 'has-error' : '' }}">
    <label for="org_member" class="col-md-2 control-label">Jumlah anggota organisasi</label>
    <div class="col-md-10">
        <input class="form-control" name="org_member" type="text" id="org_member" value="{{ old('org_member', optional($person)->org_member) }}" maxlength="255" placeholder="Ketik di sini...">
        {!! $errors->first('org_member', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="wizard-buttons">
        <button type="button" class="btn btn-previous">Previous</button>
        <input class="btn btn-primary" type="submit" value="Submit">
</div>                    
</fieldset>
</div>

<!--Datepicker-->
    <script>
        $('#datepicker').datepicker({
            uiLibrary: 'bootstrap',
            format: 'dd/mm/yyyy'
        });
    </script>

<!--Script Dropdown Wilayah-->
    <script type="text/javascript">
      $('#province_id').on('change', function(e){
        console.log(e);
        var province_id = e.target.value;
        $.get('/json-regencies?province_id=' + province_id,function(data) {
          console.log(data);
          $('#regency_id').empty();
          $('#regency_id').append('<option value="0" disable="true" selected="true">Pilih Kab/Kota...</option>');

          $('#district_id').empty();
          $('#district_id').append('<option value="0" disable="true" selected="true">Pilih Kecamatan...</option>');

          $('#villages').empty();
          $('#villages').append('<option value="0" disable="true" selected="true">Pilih Desa...</option>');

          $.each(data, function(index, regenciesObj){
            $('#regency_id').append('<option value="'+ regenciesObj.id +'">'+ regenciesObj.name +'</option>');
          })
        });
      });

      $('#regency_id').on('change', function(e){
        console.log(e);
        var regencies_id = e.target.value;
        $.get('/json-districts?regencies_id=' + regencies_id,function(data) {
          console.log(data);
          $('#district_id').empty();
          $('#district_id').append('<option value="0" disable="true" selected="true">Pilih Kecamatan...</option>');

          $.each(data, function(index, districtsObj){
            $('#district_id').append('<option value="'+ districtsObj.id +'">'+ districtsObj.name +'</option>');
          })
        });
      });

/*      $('#districts').on('change', function(e){
        console.log(e);
        var districts_id = e.target.value;
        $.get('/json-village?districts_id=' + districts_id,function(data) {
          console.log(data);
          $('#villages').empty();
          $('#villages').append('<option value="0" disable="true" selected="true">Pilih...</option>');

          $.each(data, function(index, villagesObj){
            $('#villages').append('<option value="'+ villagesObj.id +'">'+ villagesObj.name +'</option>');
          })
        });
      });*/


    </script>
