
{{--<div class="row form-group {{ $errors->has('person_id') ? 'has-error' : '' }}">
    <label for="person_id" class="col-md-2 control-label">Person</label>
    <div class="col-md-10">
        <select class="form-control" id="person_id" name="person_id" required="true">
        	    <option value="" style="display: none;" {{ old('person_id', optional($clientCase)->person_id ?: '') == '' ? 'selected' : '' }} disabled selected>Pilih...</option>
        	@foreach ($people as $key => $person)
			    <option value="{{ $key }}" {{ old('person_id', optional($clientCase)->person_id) == $key ? 'selected' : '' }}>
			    	{{ $person }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('person_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>--}}

<div class="row form-group {{ $errors->has('application_id') ? 'has-error' : '' }}">
    <label for="application_id" class="col-md-2 control-label">ID Permohonan</label>
    <div class="col-md-10">
        <select class="form-control" id="application_id" name="application_id" required="true">
        	    <option value="" style="display: none;" {{ old('application_id', optional($clientCase)->application_id ?: '') == '' ? 'selected' : '' }} disabled selected>Pilih...</option>
        	@foreach ($applications as $key => $application)
			    <option value="{{ $key }}" {{ old('application_id', optional($clientCase)->application_id) == $key ? 'selected' : '' }}>
			    	{{ $application }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('application_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="row form-group {{ $errors->has('case_title') ? 'has-error' : '' }}">
    <label for="case_title" class="col-md-2 control-label">Judul Kasus</label>
    <div class="col-md-10">
        <input class="form-control" name="case_title" type="text" id="case_title" value="{{ old('case_title', optional($clientCase)->case_title) }}" minlength="1" maxlength="255" required="true" placeholder="Ketik di sini...">
        {!! $errors->first('case_title', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="row form-group {{ $errors->has('recommendation') ? 'has-error' : '' }}">
    <label for="recommendation" class="col-md-2 control-label">Rekomendasi</label>
    <div class="col-md-10">
        <select class="form-control" id="recommendation" name="recommendation">
        	    <option value="" style="display: none;" {{ old('recommendation', optional($clientCase)->recommendation ?: '') == '' ? 'selected' : '' }} disabled selected>Ketik di sini...</option>
        	@foreach (['konsultasi' => 'Konsultasi',
'mediasi' => 'Mediasi',
'advokasi' => 'Advokasi',
'investigasi' => 'Investigasi',
'litigasi' => 'Litigasi',
'lbh daerah' => 'Lbh Daerah',
'ditransfer' => 'Ditransfer'] as $key => $text)
			    <option value="{{ $key }}" {{ old('recommendation', optional($clientCase)->recommendation) == $key ? 'selected' : '' }}>
			    	{{ $text }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('recommendation', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="row form-group {{ $errors->has('pp_piket') ? 'has-error' : '' }}">
    <label for="pp_piket" class="col-md-2 control-label">PP Piket</label>
    <div class="col-md-10">
        <select class="form-control" id="user_id" name="user_id" required="true">
                <option value="" style="display: none;" {{ old('user_id', optional($clientCase)->pp_piket ?: '') == '' ? 'selected' : '' }} disabled selected>Pilih...</option>
            @foreach ($users as $key => $user)
                <option value="{{ $key }}" {{ old('user_id', optional($clientCase)->pp_piket) == $key ? 'selected' : '' }}>
                    {{ $user }}
                </option>
            @endforeach
        </select>
    </div>
</div>

<div class="row form-group {{ $errors->has('pp_piket') ? 'has-error' : '' }}">
    <label for="pp_piket" class="col-md-2 control-label">PP Penerima</label>
    <div class="col-md-10">
        <select class="form-control" id="user_id" name="user_id" required="true">
                <option value="" style="display: none;" {{ old('user_id', optional($clientCase)->pp_penerima ?: '') == '' ? 'selected' : '' }} disabled selected>Pilih...</option>
            @foreach ($users as $key => $user)
                <option value="{{ $key }}" {{ old('user_id', optional($clientCase)->pp_penerima) == $key ? 'selected' : '' }}>
                    {{ $user }}
                </option>
            @endforeach
        </select>
    </div>
</div>

<div class="row form-group {{ $errors->has('pp_piket') ? 'has-error' : '' }}">
    <label for="pp_piket" class="col-md-2 control-label">PP Asisten</label>
    <div class="col-md-10">
        <select class="form-control" id="user_id" name="user_id" required="true">
                <option value="" style="display: none;" {{ old('user_id', optional($clientCase)->pp_asisten ?: '') == '' ? 'selected' : '' }} disabled selected>Pilih...</option>
            @foreach ($users as $key => $user)
                <option value="{{ $key }}" {{ old('user_id', optional($clientCase)->pp_asisten) == $key ? 'selected' : '' }}>
                    {{ $user }}
                </option>
            @endforeach
        </select>
    </div>
</div>

