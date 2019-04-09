
<div class="row form-group {{ $errors->has('client_case_id') ? 'has-error' : '' }}">
    <label for="client_case_id" class="col-md-2 control-label">Kasus Klien</label>
    <div class="col-md-10">
        <select class="form-control" id="client_case_id" name="client_case_id" required="true">
        	    <option value="" style="display: none;" {{ old('client_case_id', optional($caseMeetingResult)->client_case_id ?: '') == '' ? 'selected' : '' }} disabled selected>Pilih...</option>
        	@foreach ($clientCases as $key => $clientCase)
			    <option value="{{ $key }}" {{ old('client_case_id', optional($caseMeetingResult)->client_case_id) == $key ? 'selected' : '' }}>
			    	{{ $clientCase }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('client_case_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="row form-group {{ $errors->has('status') ? 'has-error' : '' }}">
    <label for="status" class="col-md-2 control-label">Status</label>
    <div class="col-md-10">
        <input class="form-control" name="status" type="text" id="status" value="{{ old('status', optional($caseMeetingResult)->status) }}" minlength="1" maxlength="255" placeholder="Ketik di sini...">
        {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="row form-group {{ $errors->has('legal_memo') ? 'has-error' : '' }}">
    <label for="legal_memo" class="col-md-2 control-label">Legal Memo</label>
    <div class="col-md-10">
        <textarea class="form-control" name="legal_memo" type="textarea" id="legal_memo" value="{{ old('legal_memo', optional($caseMeetingResult)->legal_memo) }}" rows="5" minlength="1" maxlength="255" placeholder="Ketik di sini..."></textarea>
        {!! $errors->first('legal_memo', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="row form-group {{ $errors->has('notula') ? 'has-error' : '' }}">
    <label for="notula" class="col-md-2 control-label">Notula</label>
    <div class="col-md-10">
        <textarea class="form-control" name="notula" type="textarea" id="notula" value="{{ old('notula', optional($caseMeetingResult)->notula) }}" rows="5" minlength="1" maxlength="255" placeholder="Ketik di sini..."></textarea> 
        {!! $errors->first('notula', '<p class="help-block">:message</p>') !!}
    </div>
</div>

