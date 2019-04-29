
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
    <label for="judicial" class="col-md-2 control-label">Peradilan yg ditempuh</label>
    <div class="col-md-10">
        <textarea class="form-control" name="judicial" type="textarea" id="judicial" rows="5" maxlength="255" placeholder="Ketik di sini...">{{ old('judicial', optional($caseProgress)->judicial) }}</textarea>
        {!! $errors->first('judicial', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="row form-group {{ $errors->has('note') ? 'has-error' : '' }}">
    <label for="note" class="col-md-2 control-label">Catatan</label>
    <div class="col-md-10">
        <textarea class="form-control" name="note" type="textarea" id="note"  rows="5" maxlength="255">{{ old('note', optional($caseProgress)->note) }}</textarea>
        {!! $errors->first('note', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="row form-group">
    <label for="case_closed" class="col-md-2 control-label">Kasus ditutup</label>
    <div class="col-md-6">
        <div class="checkbox">
            <label for="case_closed_1">
                <input id="case_closed_1" class="" name="case_closed" type="checkbox" value="1" >
                Ya
            </label>
        </div>

        {!! $errors->first('has_disability', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="row form-group">
    <label for="surat_kuasa" class="col-md-2 control-label">Surat Kuasa</label>
    <div class="col-md-10">
        <input class="form-control" name="sk" type="text" id="sk" maxlength="255" value="{{ old('sk', optional($caseProgress)->sk) }}"placeholder="Ketik Link File di sini...">
        {!! $errors->first('sk', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="row form-group">
    <label for="surat_pemutusan_kuasa" class="col-md-2 control-label">Surat Keterangan Pemutusan Kuasa</label>
    <div class="col-md-10">
        <input class="form-control" name="skpk" type="text" id="skpk" maxlength="255" placeholder="Ketik Link File di sini..." value="{{ old('skpk', optional($caseProgress)->skpk) }}">
        {!! $errors->first('skpk', '<p class="help-block">:message</p>') !!}
    </div>
</div>
