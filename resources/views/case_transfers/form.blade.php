
<div class="row form-group {{ $errors->has('client_case_id') ? 'has-error' : '' }}">
    <label for="client_case_id" class="col-md-2 control-label">Kasus Klien</label>
    <div class="col-md-10">
        <select class="form-control" id="client_case_id" name="client_case_id" required="true">
        	    <option value="" style="display: none;" {{ old('client_case_id', optional($caseTransfer)->client_case_id ?: '') == '' ? 'selected' : '' }} disabled selected>Pilih...</option>
        	@foreach ($clientCases as $key => $clientCase)
			    <option value="{{ $key }}" {{ old('client_case_id', optional($caseTransfer)->client_case_id) == $key ? 'selected' : '' }}>
			    	{{ $clientCase }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('client_case_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="row form-group {{ $errors->has('note') ? 'has-error' : '' }}">
    <label for="note" class="col-md-2 control-label">Catatan</label>
    <div class="col-md-10">
        <input class="form-control" name="note" type="text" id="note" value="{{ old('note', optional($caseTransfer)->note) }}" maxlength="255">
        {!! $errors->first('note', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="row form-group {{ $errors->has('document') ? 'has-error' : '' }}">
    <label for="document" class="col-md-2 control-label">Document</label>
    <div class="col-md-10">
        <input class="form-control" name="document" type="file" id="document" value="{{ old('document', optional($caseTransfer)->document) }}" maxlength="255" placeholder="Ketik di sini...">
        {!! $errors->first('document', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="row form-group {{ $errors->has('network_id') ? 'has-error' : '' }}">
    <label for="network_id" class="col-md-2 control-label">Jaringan/Lembaga</label>
    <div class="col-md-10">
        <select class="form-control" id="network_id" name="network_id">
        	    <option value="" style="display: none;" {{ old('network_id', optional($caseTransfer)->network_id ?: '') == '' ? 'selected' : '' }} disabled selected>Pilih...</option>
        	@foreach ($networks as $key => $network)
			    <option value="{{ $key }}" {{ old('network_id', optional($caseTransfer)->network_id) == $key ? 'selected' : '' }}>
			    	{{ $network }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('network_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>


