
<div class="row form-group {{ $errors->has('client_case_id') ? 'has-error' : '' }}">
    <label for="client_case_id" class="col-md-2 control-label">Kasus Klien</label>
    <div class="col-md-10">
        <select class="form-control" id="client_case_id" name="client_case_id" required="true">
        	    <option value="" style="display: none;" {{ old('client_case_id', optional($caseHandling)->client_case_id ?: '') == '' ? 'selected' : '' }} disabled selected>Pilih...</option>
        	@foreach ($clientCases as $key => $clientCase)
			    <option value="{{ $key }}" {{ old('client_case_id', optional($caseHandling)->client_case_id) == $key ? 'selected' : '' }}>
			    	{{ $clientCase }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('client_case_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="row form-group {{ $errors->has('position') ? 'has-error' : '' }}">
    <label for="position" class="col-md-2 control-label">Posisi Kasus</label>
    <div class="col-md-10">
        <textarea class="form-control" name="position" type="text" id="position"  rows="5" maxlength="255" placeholder="Ketik di sini...">{{ old('position', optional($caseHandling)->position) }}</textarea>
        {!! $errors->first('position', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="row form-group {{ $errors->has('litigation') ? 'has-error' : '' }}">
    <label for="litigation" class="col-md-2 control-label">Langkah Litigasi</label>
    <div class="col-md-10">
        <textarea class="form-control" name="litigation" type="textarea" id="litigation" rows="5" maxlength="255" placeholder="Ketik di sini...">{{ old('litigation', optional($caseHandling)->litigation) }}</textarea>
        {!! $errors->first('litigation', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="row form-group {{ $errors->has('nonlitigation') ? 'has-error' : '' }}">
    <label for="nonlitigation" class="col-md-2 control-label">Langkah Nonlitigasi</label>
    <div class="col-md-10">
        <select class="form-control" id="nonlitigation" name="nonlitigation">
        	    <option value="" style="display: none;" {{ old('nonlitigation', optional($caseHandling)->nonlitigation ?: '') == '' ? 'selected' : '' }} disabled selected>Ketik di sini...</option>
        	@foreach (['Konsultasi' => 'Konsultasi',
'Korespondensi' => 'Korespondensi',
'Investigasi perkara; baik secara elektronik maupun non elektronik' => 'Investigasi Perkara; Baik Secara Elektronik Maupun Non Elektronik',
'Penelitian hukum' => 'Penelitian Hukum',
'Mediasi' => 'Mediasi',
'Negosiasi' => 'Negosiasi',
'Pendidikan hukum kepada masyarakat' => 'Pendidikan Hukum Kepada Masyarakat',
'Pendampingan di luar pengadilan' => 'Pendampingan Di Luar Pengadilan',
'Drafting dokumen hukum' => 'Drafting Dokumen Hukum',
'Konferensi pers' => 'Konferensi Pers',
'Rapat' => 'Rapat',
'Unjuk rasa' => 'Unjuk Rasa',
'Membuat surat dukungan' => 'Membuat Surat Dukungan'] as $key => $text)
			    <option value="{{ $key }}" {{ old('nonlitigation', optional($caseHandling)->nonlitigation) == $key ? 'selected' : '' }}>
			    	{{ $text }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('nonlitigation', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="row form-group {{ $errors->has('advocacy_target') ? 'has-error' : '' }}">
    <label for="advocacy_target" class="col-md-2 control-label">Target Advokasi</label>
    <div class="col-md-10">
        <textarea class="form-control" name="advocacy_target" type="textarea" id="advocacy_target"  rows="5" maxlength="255" placeholder="Ketik di sini...">{{ old('advocacy_target', optional($caseHandling)->advocacy_target) }}</textarea>
        {!! $errors->first('advocacy_target', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="row form-group {{ $errors->has('condition_achievement') ? 'has-error' : '' }}">
    <label for="condition_achievement" class="col-md-2 control-label">Kondisi Terakhir & Capaian</label>
    <div class="col-md-10">
        <textarea class="form-control" name="condition_achievement" type="textarea" id="condition_achievement" rows="5" maxlength="255" placeholder="Ketik di sini...">{{ old('condition_achievement', optional($caseHandling)->condition_achievement) }}</textarea>
        {!! $errors->first('condition_achievement', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="row form-group {{ $errors->has('obstacle') ? 'has-error' : '' }}">
    <label for="obstacle" class="col-md-2 control-label">Hambatan</label>
    <div class="col-md-10">
        <textarea class="form-control" name="obstacle" type="textarea" id="obstacle"  rows="5" maxlength="255" placeholder="Ketik di sini...">{{ old('obstacle', optional($caseHandling)->obstacle) }}</textarea>
        {!! $errors->first('obstacle', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="row form-group {{ $errors->has('strategy_plan') ? 'has-error' : '' }}">
    <label for="strategy_plan" class="col-md-2 control-label">Rencana Strategis</label>
    <div class="col-md-10">
        <textarea class="form-control" name="strategy_plan" type="textarea" id="strategy_plan"  rows="5" maxlength="255" placeholder="Ketik di sini...">{{ old('strategy_plan', optional($caseHandling)->strategy_plan) }}</textarea>
        {!! $errors->first('strategy_plan', '<p class="help-block">:message</p>') !!}
    </div>
</div>

