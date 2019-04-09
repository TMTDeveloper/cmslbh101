
<div class="row form-group {{ $errors->has('client_case_id') ? 'has-error' : '' }}">
    <label for="client_case_id" class="col-md-2 control-label">Kasus Klien</label>
    <div class="col-md-10">
        <select class="form-control" id="client_case_id" name="client_case_id" required="true">
        	    <option value="" style="display: none;" {{ old('client_case_id', optional($caseProgress)->client_case_id ?: '') == '' ? 'selected' : '' }} disabled selected>Pilih...</option>
        	@foreach ($clientCases as $key => $clientCase)
			    <option value="{{ $key }}" {{ old('client_case_id', optional($caseProgress)->client_case_id) == $key ? 'selected' : '' }}>
			    	{{ $clientCase }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('client_case_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="row form-group {{ $errors->has('judicial') ? 'has-error' : '' }}">
    <label for="judicial" class="col-md-2 control-label">Judicial</label>
    <div class="col-md-10">
        <textarea class="form-control" name="judicial" type="textarea" id="judicial" value="{{ old('judicial', optional($caseProgress)->judicial) }}" rows="5" maxlength="255" placeholder="Ketik di sini..."></textarea>
        {!! $errors->first('judicial', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="row form-group {{ $errors->has('note') ? 'has-error' : '' }}">
    <label for="note" class="col-md-2 control-label">Catatan</label>
    <div class="col-md-10">
        <textarea class="form-control" name="note" type="textarea" id="note" value="{{ old('note', optional($caseProgress)->note) }}" rows="5" maxlength="255"></textarea>
        {!! $errors->first('note', '<p class="help-block">:message</p>') !!}
    </div>
</div>

