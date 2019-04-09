
<div class="row form-group {{ $errors->has('client_case_id') ? 'has-error' : '' }}">
    <label for="client_case_id" class="col-md-2 control-label">ID Kasus</label>
    <div class="col-md-10">
        <select class="form-control" id="client_case_id" name="client_case_id" required="true">
        	    <option value="" style="display: none;" {{ old('client_case_id', optional($caseConsultation)->client_case_id ?: '') == '' ? 'selected' : '' }} disabled selected>Pilih...</option>
        	@foreach ($clientCases as $key => $clientCase)
			    <option value="{{ $key }}" {{ old('client_case_id', optional($caseConsultation)->client_case_id) == $key ? 'selected' : '' }}>
			    	{{ $clientCase }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('client_case_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="row form-group {{ $errors->has('case_position') ? 'has-error' : '' }}">
    <label for="case_position" class="col-md-2 control-label">Posisi Kasus</label>
    <div class="col-md-10">
        <textarea class="form-control" name="case_position" type="text" id="case_position" value="{{ old('case_position', optional($caseConsultation)->case_position) }}" min="-2147483648" max="2147483647" required="true" placeholder="Ketik di sini..."></textarea>
        {!! $errors->first('case_position', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="row form-group {{ $errors->has('case_analysis') ? 'has-error' : '' }}">
    <label for="case_analysis" class="col-md-2 control-label">Analisis Kasus</label>
    <div class="col-md-10">
        <textarea class="form-control" name="case_analysis" type="text" id="case_analysis" value="{{ old('case_analysis', optional($caseConsultation)->case_analysis) }}" min="-2147483648" max="2147483647" required="true" placeholder="Ketik di sini..."></textarea>
        {!! $errors->first('case_analysis', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="row form-group {{ $errors->has('case_note') ? 'has-error' : '' }}">
    <label for="case_note" class="col-md-2 control-label">Catatan Kasus</label>
    <div class="col-md-10">
        <textarea class="form-control" name="case_note" type="text" id="case_note" value="{{ old('case_note', optional($caseConsultation)->case_note) }}" min="-2147483648" max="2147483647" required="true" placeholder="Ketik di sini..."></textarea>
        {!! $errors->first('case_note', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="row form-group {{ $errors->has('user_id') ? 'has-error' : '' }}">
    <label for="user_id" class="col-md-2 control-label">User</label>
    <div class="col-md-10">
        <select class="form-control" id="user_id" name="user_id" required="true">
        	    <option value="" style="display: none;" {{ old('user_id', optional($caseConsultation)->user_id ?: '') == '' ? 'selected' : '' }} disabled selected>Pilih...</option>
        	@foreach ($users as $key => $user)
			    <option value="{{ $key }}" {{ old('user_id', optional($caseConsultation)->user_id) == $key ? 'selected' : '' }}>
			    	{{ $user }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

