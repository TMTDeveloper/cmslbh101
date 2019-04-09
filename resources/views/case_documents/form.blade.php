<div class="col-lg-6">    
<div class="card-body">
<div class="row form-group {{ $errors->has('client_case_id') ? 'has-error' : '' }}">
    <label for="client_case_id" class="col-md-2 control-label">Kasus Klien</label>
    <div class="col-md-10">
        <select class="form-control" id="client_case_id" name="client_case_id" required="true">
        	    <option value="" style="display: none;" {{ old('client_case_id', optional($caseDocument)->client_case_id ?: '') == '' ? 'selected' : '' }} disabled selected>Pilih...</option>
        	@foreach ($clientCases as $key => $clientCase)
			    <option value="{{ $key }}" {{ old('client_case_id', optional($caseDocument)->client_case_id) == $key ? 'selected' : '' }}>
			    	{{ $clientCase }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('client_case_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="row form-group {{ $errors->has('surat_polisi') ? 'has-error' : '' }}">
    <label for="surat_polisi" class="col-md-2 control-label">Surat Polisi</label>
    <div class="col-md-10">
        <input class="form-control" name="surat_polisi" type="file" id="surat_polisi" value="{{ old('surat_polisi', optional($caseDocument)->surat_polisi) }}" maxlength="255" placeholder="Ketik di sini...">
        {!! $errors->first('surat_polisi', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="row form-group {{ $errors->has('surat_gugatan') ? 'has-error' : '' }}">
    <label for="surat_gugatan" class="col-md-2 control-label">Surat Gugatan</label>
    <div class="col-md-10">
        <input class="form-control" name="surat_gugatan" type="file" id="surat_gugatan" value="{{ old('surat_gugatan', optional($caseDocument)->surat_gugatan) }}" maxlength="255" placeholder="Ketik di sini...">
        {!! $errors->first('surat_gugatan', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="row form-group {{ $errors->has('jwbn_gugatan') ? 'has-error' : '' }}">
    <label for="jwbn_gugatan" class="col-md-2 control-label">Jwbn Gugatan</label>
    <div class="col-md-10">
        <input class="form-control" name="jwbn_gugatan" type="file" id="jwbn_gugatan" value="{{ old('jwbn_gugatan', optional($caseDocument)->jwbn_gugatan) }}" maxlength="255" placeholder="Ketik di sini...">
        {!! $errors->first('jwbn_gugatan', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="row form-group {{ $errors->has('surat_dakwaan') ? 'has-error' : '' }}">
    <label for="surat_dakwaan" class="col-md-2 control-label">Surat Dakwaan</label>
    <div class="col-md-10">
        <input class="form-control" name="surat_dakwaan" type="file" id="surat_dakwaan" value="{{ old('surat_dakwaan', optional($caseDocument)->surat_dakwaan) }}" maxlength="255" placeholder="Ketik di sini...">
        {!! $errors->first('surat_dakwaan', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="row form-group {{ $errors->has('eksepsi') ? 'has-error' : '' }}">
    <label for="eksepsi" class="col-md-2 control-label">Eksepsi</label>
    <div class="col-md-10">
        <input class="form-control" name="eksepsi" type="file" id="eksepsi" value="{{ old('eksepsi', optional($caseDocument)->eksepsi) }}" maxlength="255" placeholder="Ketik di sini...">
        {!! $errors->first('eksepsi', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="row form-group {{ $errors->has('tanggapan_eksepsi') ? 'has-error' : '' }}">
    <label for="tanggapan_eksepsi" class="col-md-2 control-label">Tanggapan Eksepsi</label>
    <div class="col-md-10">
        <input class="form-control" name="tanggapan_eksepsi" type="file" id="tanggapan_eksepsi" value="{{ old('tanggapan_eksepsi', optional($caseDocument)->tanggapan_eksepsi) }}" maxlength="255" placeholder="Ketik di sini...">
        {!! $errors->first('tanggapan_eksepsi', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="row form-group {{ $errors->has('putusan_sela') ? 'has-error' : '' }}">
    <label for="putusan_sela" class="col-md-2 control-label">Putusan Sela</label>
    <div class="col-md-10">
        <input class="form-control" name="putusan_sela" type="file" id="putusan_sela" value="{{ old('putusan_sela', optional($caseDocument)->putusan_sela) }}" maxlength="255" placeholder="Ketik di sini...">
        {!! $errors->first('putusan_sela', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="row form-group {{ $errors->has('bukti') ? 'has-error' : '' }}">
    <label for="bukti" class="col-md-2 control-label">Bukti</label>
    <div class="col-md-10">
        <input class="form-control" name="bukti" type="file" id="bukti" value="{{ old('bukti', optional($caseDocument)->bukti) }}" maxlength="255" placeholder="Ketik di sini...">
        {!! $errors->first('bukti', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="row form-group {{ $errors->has('pledoi') ? 'has-error' : '' }}">
    <label for="pledoi" class="col-md-2 control-label">Pledoi</label>
    <div class="col-md-10">
        <input class="form-control" name="pledoi" type="file" id="pledoi" value="{{ old('pledoi', optional($caseDocument)->pledoi) }}" maxlength="255" placeholder="Ketik di sini...">
        {!! $errors->first('pledoi', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="row form-group {{ $errors->has('replik') ? 'has-error' : '' }}">
    <label for="replik" class="col-md-2 control-label">Replik</label>
    <div class="col-md-10">
        <input class="form-control" name="replik" type="file" id="replik" value="{{ old('replik', optional($caseDocument)->replik) }}" maxlength="255" placeholder="Ketik di sini...">
        {!! $errors->first('replik', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="row form-group {{ $errors->has('duplik') ? 'has-error' : '' }}">
    <label for="duplik" class="col-md-2 control-label">Duplik</label>
    <div class="col-md-10">
        <input class="form-control" name="duplik" type="file" id="duplik" value="{{ old('duplik', optional($caseDocument)->duplik) }}" maxlength="255" placeholder="Ketik di sini...">
        {!! $errors->first('duplik', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="row form-group {{ $errors->has('kesimpulan') ? 'has-error' : '' }}">
    <label for="kesimpulan" class="col-md-2 control-label">Kesimpulan</label>
    <div class="col-md-10">
        <input class="form-control" name="kesimpulan" type="file" id="kesimpulan" value="{{ old('kesimpulan', optional($caseDocument)->kesimpulan) }}" maxlength="255" placeholder="Ketik di sini...">
        {!! $errors->first('kesimpulan', '<p class="help-block">:message</p>') !!}
    </div>
</div>
</div>
</div>

<div class="col-lg-6">    
<div class="card-body">
<div class="row form-group {{ $errors->has('putusan_pn') ? 'has-error' : '' }}">
    <label for="putusan_pn" class="col-md-2 control-label">Putusan PN</label>
    <div class="col-md-10">
        <input class="form-control" name="putusan_pn" type="file" id="putusan_pn" value="{{ old('putusan_pn', optional($caseDocument)->putusan_pn) }}" maxlength="255" placeholder="Ketik di sini...">
        {!! $errors->first('putusan_pn', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="row form-group {{ $errors->has('pernyataan_banding') ? 'has-error' : '' }}">
    <label for="pernyataan_banding" class="col-md-2 control-label">Pernyataan Banding</label>
    <div class="col-md-10">
        <input class="form-control" name="pernyataan_banding" type="file" id="pernyataan_banding" value="{{ old('pernyataan_banding', optional($caseDocument)->pernyataan_banding) }}" maxlength="255" placeholder="Ketik di sini...">
        {!! $errors->first('pernyataan_banding', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="row form-group {{ $errors->has('memori_banding') ? 'has-error' : '' }}">
    <label for="memori_banding" class="col-md-2 control-label">Memori Banding</label>
    <div class="col-md-10">
        <input class="form-control" name="memori_banding" type="file" id="memori_banding" value="{{ old('memori_banding', optional($caseDocument)->memori_banding) }}" maxlength="255" placeholder="Ketik di sini...">
        {!! $errors->first('memori_banding', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="row form-group {{ $errors->has('kontra_memori_banding') ? 'has-error' : '' }}">
    <label for="kontra_memori_banding" class="col-md-2 control-label">Kontra Memori Banding</label>
    <div class="col-md-10">
        <input class="form-control" name="kontra_memori_banding" type="file" id="kontra_memori_banding" value="{{ old('kontra_memori_banding', optional($caseDocument)->kontra_memori_banding) }}" maxlength="255" placeholder="Ketik di sini...">
        {!! $errors->first('kontra_memori_banding', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="row form-group {{ $errors->has('putusan_pt') ? 'has-error' : '' }}">
    <label for="putusan_pt" class="col-md-2 control-label">Putusan PT</label>
    <div class="col-md-10">
        <input class="form-control" name="putusan_pt" type="file" id="putusan_pt" value="{{ old('putusan_pt', optional($caseDocument)->putusan_pt) }}" maxlength="255" placeholder="Ketik di sini...">
        {!! $errors->first('putusan_pt', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="row form-group {{ $errors->has('pernyataan_kasasi') ? 'has-error' : '' }}">
    <label for="pernyataan_kasasi" class="col-md-2 control-label">Pernyataan Kasasi</label>
    <div class="col-md-10">
        <input class="form-control" name="pernyataan_kasasi" type="file" id="pernyataan_kasasi" value="{{ old('pernyataan_kasasi', optional($caseDocument)->pernyataan_kasasi) }}" maxlength="255" placeholder="Ketik di sini...">
        {!! $errors->first('pernyataan_kasasi', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="row form-group {{ $errors->has('memori_kasasi') ? 'has-error' : '' }}">
    <label for="memori_kasasi" class="col-md-2 control-label">Memori Kasasi</label>
    <div class="col-md-10">
        <input class="form-control" name="memori_kasasi" type="file" id="memori_kasasi" value="{{ old('memori_kasasi', optional($caseDocument)->memori_kasasi) }}" maxlength="255" placeholder="Ketik di sini...">
        {!! $errors->first('memori_kasasi', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="row form-group {{ $errors->has('kontra_memori_kasasi') ? 'has-error' : '' }}">
    <label for="kontra_memori_kasasi" class="col-md-2 control-label">Kontra Memori Kasasi</label>
    <div class="col-md-10">
        <input class="form-control" name="kontra_memori_kasasi" type="file" id="kontra_memori_kasasi" value="{{ old('kontra_memori_kasasi', optional($caseDocument)->kontra_memori_kasasi) }}" maxlength="255" placeholder="Ketik di sini...">
        {!! $errors->first('kontra_memori_kasasi', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="row form-group {{ $errors->has('putusan_ma') ? 'has-error' : '' }}">
    <label for="putusan_ma" class="col-md-2 control-label">Putusan MA</label>
    <div class="col-md-10">
        <input class="form-control" name="putusan_ma" type="file" id="putusan_ma" value="{{ old('putusan_ma', optional($caseDocument)->putusan_ma) }}" maxlength="255" placeholder="Ketik di sini...">
        {!! $errors->first('putusan_ma', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="row form-group {{ $errors->has('surat') ? 'has-error' : '' }}">
    <label for="surat" class="col-md-2 control-label">Surat</label>
    <div class="col-md-10">
        <input class="form-control" name="surat" type="file" id="surat" value="{{ old('surat', optional($caseDocument)->surat) }}" maxlength="255" placeholder="Ketik di sini...">
        {!! $errors->first('surat', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="row form-group {{ $errors->has('lainnya') ? 'has-error' : '' }}">
    <label for="lainnya" class="col-md-2 control-label">Lainnya</label>
    <div class="col-md-10">
        <input class="form-control" name="lainnya" type="file" id="lainnya" value="{{ old('lainnya', optional($caseDocument)->lainnya) }}" maxlength="255" placeholder="Ketik di sini...">
        {!! $errors->first('lainnya', '<p class="help-block">:message</p>') !!}
    </div>
</div>
</div>
</div>