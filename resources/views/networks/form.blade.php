
<div class="row form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    <label for="name" class="col-md-2 control-label">Nama Lembaga</label>
    <div class="col-md-10">
        <input class="form-control" name="name" type="text" id="name" value="{{ old('name', optional($network)->name) }}" minlength="1" maxlength="255" required="true" placeholder="Ketik di sini...">
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="row form-group {{ $errors->has('type') ? 'has-error' : '' }}">
    <label for="type" class="col-md-2 control-label">Jenis Lembaga</label>
    <div class="col-md-10">
        <input class="form-control" name="type" type="text" id="type" value="{{ old('type', optional($network)->type) }}" maxlength="255" placeholder="Ketik di sini...">
        {!! $errors->first('type', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="row form-group {{ $errors->has('contact_person') ? 'has-error' : '' }}">
    <label for="contact_person" class="col-md-2 control-label">Kontak Person</label>
    <div class="col-md-10">
        <input class="form-control" name="contact_person" type="text" id="contact_person" value="{{ old('contact_person', optional($network)->contact_person) }}" maxlength="255" placeholder="Ketik di sini...">
        {!! $errors->first('contact_person', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="row form-group {{ $errors->has('no_contact') ? 'has-error' : '' }}">
    <label for="no_contact" class="col-md-2 control-label">No Kontak</label>
    <div class="col-md-10">
        <input class="form-control" name="no_contact" type="text" id="no_contact" value="{{ old('no_contact', optional($network)->no_contact) }}" maxlength="255" placeholder="Ketik di sini...">
        {!! $errors->first('no_contact', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="row form-group {{ $errors->has('email') ? 'has-error' : '' }}">
    <label for="email" class="col-md-2 control-label">Email</label>
    <div class="col-md-10">
        <input class="form-control" name="email" type="text" id="email" value="{{ old('email', optional($network)->email) }}" maxlength="255" placeholder="Ketik di sini...">
        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="row form-group {{ $errors->has('address') ? 'has-error' : '' }}">
    <label for="address" class="col-md-2 control-label">Alamat</label>
    <div class="col-md-10">
        <textarea class="form-control" name="address" type="text" id="address" value="{{ old('address', optional($network)->address) }}" min="-2147483648" max="2147483647" required="true"  placeholder="Ketik di sini..."></textarea>
        {!! $errors->first('address', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="row form-group {{ $errors->has('province_id') ? 'has-error' : '' }}">
    <label for="province_id" class="col-md-2 control-label">Provinsi</label>
    <div class="col-md-10">
        <select class="form-control" id="province_id" name="province_id">
        	    <option value="" style="display: none;" {{ old('province_id', optional($network)->province_id ?: '') == '' ? 'selected' : '' }} disabled selected>Pilih...</option>
        	@foreach ($provinces as $key => $province)
			    <option value="{{ $key }}" {{ old('province_id', optional($network)->province_id) == $key ? 'selected' : '' }}>
			    	{{ $province }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('province_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="row form-group {{ $errors->has('regency_id') ? 'has-error' : '' }}">
    <label for="regency_id" class="col-md-2 control-label">Kota/Kabupaten</label>
    <div class="col-md-10">
        <select class="form-control" id="regency_id" name="regency_id">
        	    <option value="" style="display: none;" {{ old('regency_id', optional($network)->regency_id ?: '') == '' ? 'selected' : '' }} disabled selected>Pilih...</option>
        	@foreach ($regencies as $key => $regency)
			    <option value="{{ $key }}" {{ old('regency_id', optional($network)->regency_id) == $key ? 'selected' : '' }}>
			    	{{ $regency }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('regency_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>



