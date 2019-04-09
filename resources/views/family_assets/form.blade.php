
<div class="row form-group {{ $errors->has('person_id') ? 'has-error' : '' }}">
    <label for="person_id" class="col-md-2 control-label">Person</label>
    <div class="col-md-10">
        <select class="form-control" id="person_id" name="person_id" required="true">
        	    <option value="" style="display: none;" {{ old('person_id', optional($familyAsset)->person_id ?: '') == '' ? 'selected' : '' }} disabled selected>Pilih...</option>
        	@foreach ($people as $key => $person)
			    <option value="{{ $key }}" {{ old('person_id', optional($familyAsset)->person_id) == $key ? 'selected' : '' }}>
			    	{{ $person }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('person_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="col-lg-6">    
<div class="card-body"> 
<div class="row form-group {{ $errors->has('children') ? 'has-error' : '' }}">
    <label for="children" class="col-md-2 control-label">Anak</label>
    <div class="col-md-10">
        <input class="form-control" name="children" type="text" id="children" value="{{ old('children', optional($familyAsset)->children) }}" minlength="1" maxlength="255" placeholder="Ketik di sini...">
        {!! $errors->first('children', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="row form-group {{ $errors->has('spouse') ? 'has-error' : '' }}">
    <label for="spouse" class="col-md-2 control-label">Suami/Istri</label>
    <div class="col-md-10">
        <input class="form-control" name="spouse" type="text" id="spouse" value="{{ old('spouse', optional($familyAsset)->spouse) }}" minlength="1" maxlength="255" placeholder="Ketik di sini...">
        {!! $errors->first('spouse', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="row form-group {{ $errors->has('family') ? 'has-error' : '' }}">
    <label for="family" class="col-md-2 control-label">Keluarga</label>
    <div class="col-md-10">
        <input class="form-control" name="family" type="text" id="family" value="{{ old('family', optional($familyAsset)->family) }}" minlength="1" maxlength="255" placeholder="Ketik di sini...">
        {!! $errors->first('family', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="row form-group {{ $errors->has('other') ? 'has-error' : '' }}">
    <label for="other" class="col-md-2 control-label">Lainnya</label>
    <div class="col-md-10">
        <input class="form-control" name="other" type="text" id="other" value="{{ old('other', optional($familyAsset)->other) }}" minlength="1" maxlength="255" placeholder="Ketik di sini...">
        {!! $errors->first('other', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="row form-group {{ $errors->has('bangunan') ? 'has-error' : '' }}">
    <label for="bangunan" class="col-md-2 control-label">Bangunan</label>
    <div class="col-md-10">
        <input class="form-control" name="bangunan" type="text" id="bangunan" value="{{ old('bangunan', optional($familyAsset)->bangunan) }}" minlength="1" maxlength="255" placeholder="Ketik di sini...">
        {!! $errors->first('bangunan', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="row form-group {{ $errors->has('rumah') ? 'has-error' : '' }}">
    <label for="rumah" class="col-md-2 control-label">Rumah</label>
    <div class="col-md-10">
        <input class="form-control" name="rumah" type="text" id="rumah" value="{{ old('rumah', optional($familyAsset)->rumah) }}" minlength="1" maxlength="255" placeholder="Ketik di sini...">
        {!! $errors->first('rumah', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="row form-group {{ $errors->has('toko') ? 'has-error' : '' }}">
    <label for="toko" class="col-md-2 control-label">Toko</label>
    <div class="col-md-10">
        <input class="form-control" name="toko" type="text" id="toko" value="{{ old('toko', optional($familyAsset)->toko) }}" minlength="1" maxlength="255" placeholder="Ketik di sini...">
        {!! $errors->first('toko', '<p class="help-block">:message</p>') !!}
    </div>
</div>
</div>
</div>

<div class="col-lg-6">    
<div class="card-body"> 
<div class="row form-group {{ $errors->has('kios') ? 'has-error' : '' }}">
    <label for="kios" class="col-md-2 control-label">Kios</label>
    <div class="col-md-10">
        <input class="form-control" name="kios" type="text" id="kios" value="{{ old('kios', optional($familyAsset)->kios) }}" minlength="1" maxlength="255" placeholder="Ketik di sini...">
        {!! $errors->first('kios', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="row form-group {{ $errors->has('warung') ? 'has-error' : '' }}">
    <label for="warung" class="col-md-2 control-label">Warung</label>
    <div class="col-md-10">
        <input class="form-control" name="warung" type="text" id="warung" value="{{ old('warung', optional($familyAsset)->warung) }}" minlength="1" maxlength="255" placeholder="Ketik di sini...">
        {!! $errors->first('warung', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="row form-group {{ $errors->has('lapak') ? 'has-error' : '' }}">
    <label for="lapak" class="col-md-2 control-label">Lapak</label>
    <div class="col-md-10">
        <input class="form-control" name="lapak" type="text" id="lapak" value="{{ old('lapak', optional($familyAsset)->lapak) }}" minlength="1" maxlength="255" placeholder="Ketik di sini...">
        {!! $errors->first('lapak', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="row form-group {{ $errors->has('lahan') ? 'has-error' : '' }}">
    <label for="lahan" class="col-md-2 control-label">Lahan</label>
    <div class="col-md-10">
        <input class="form-control" name="lahan" type="text" id="lahan" value="{{ old('lahan', optional($familyAsset)->lahan) }}" minlength="1" maxlength="255" placeholder="Ketik di sini...">
        {!! $errors->first('lahan', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="row form-group {{ $errors->has('lahan_garapan') ? 'has-error' : '' }}">
    <label for="lahan_garapan" class="col-md-2 control-label">Lahan Garapan</label>
    <div class="col-md-10">
        <input class="form-control" name="lahan_garapan" type="text" id="lahan_garapan" value="{{ old('lahan_garapan', optional($familyAsset)->lahan_garapan) }}" minlength="1" maxlength="255" placeholder="Ketik di sini...">
        {!! $errors->first('lahan_garapan', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="row form-group {{ $errors->has('mobil') ? 'has-error' : '' }}">
    <label for="mobil" class="col-md-2 control-label">Mobil</label>
    <div class="col-md-10">
        <input class="form-control" name="mobil" type="text" id="mobil" value="{{ old('mobil', optional($familyAsset)->mobil) }}" minlength="1" maxlength="255" placeholder="Ketik di sini...">
        {!! $errors->first('mobil', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="row form-group {{ $errors->has('motor') ? 'has-error' : '' }}">
    <label for="motor" class="col-md-2 control-label">Motor</label>
    <div class="col-md-10">
        <input class="form-control" name="motor" type="text" id="motor" value="{{ old('motor', optional($familyAsset)->motor) }}" minlength="1" maxlength="255" placeholder="Ketik di sini...">
        {!! $errors->first('motor', '<p class="help-block">:message</p>') !!}
    </div>
</div>
</div>
</div>
