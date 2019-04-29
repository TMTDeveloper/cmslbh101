
<div class="row form-group {{ $errors->has('client_case_id') ? 'has-error' : '' }}">
    <label for="client_case_id" class="col-md-2 control-label">Kasus Klien</label>
    <div class="col-md-10">
        <select class="form-control" id="client_case_id" name="client_case_id" required="true">
        	    <option value="" style="display: none;" {{ old('client_case_id', optional($caseClassification)->client_case_id ?: '') == '' ? 'selected' : '' }} disabled selected>Pilih...</option>
        	@foreach ($clientCases as $key => $clientCase)
			    <option value="{{ $key }}" {{ old('client_case_id', optional($caseClassification)->client_case_id) == $key ? 'selected' : '' }}>
			    	{{ $clientCase }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('client_case_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

{{--
<div class="form-group {{ $errors->has('case1_classification_id') ? 'has-error' : '' }}">
    <label for="case1_classification_id" class="col-md-2 control-label">Case1 Classification</label>
    <div class="col-md-10">
        <select class="form-control" id="case1_classification_id" name="case1_classification_id">
        	    <option value="" style="display: none;" {{ old('case1_classification_id', optional($caseClassification)->case1_classification_id ?: '') == '' ? 'selected' : '' }} disabled selected>Pilih...</option>
        	@foreach ($case1Classifications as $key => $case1Classification)
			    <option value="{{ $key }}" {{ old('case1_classification_id', optional($caseClassification)->case1_classification_id) == $key ? 'selected' : '' }}>
			    	{{ $case1Classification }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('case1_classification_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('case2_classification_id') ? 'has-error' : '' }}">
    <label for="case2_classification_id" class="col-md-2 control-label">Case2 Classification</label>
    <div class="col-md-10">
        <select class="form-control" id="case2_classification_id" name="case2_classification_id">
        	    <option value="" style="display: none;" {{ old('case2_classification_id', optional($caseClassification)->case2_classification_id ?: '') == '' ? 'selected' : '' }} disabled selected>Pilih...</option>
        	@foreach ($case2Classifications as $key => $case2Classification)
			    <option value="{{ $key }}" {{ old('case2_classification_id', optional($caseClassification)->case2_classification_id) == $key ? 'selected' : '' }}>
			    	{{ $case2Classification }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('case2_classification_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('case3_classification_id') ? 'has-error' : '' }}">
    <label for="case3_classification_id" class="col-md-2 control-label">Case3 Classification</label>
    <div class="col-md-10">
        <select class="form-control" id="case3_classification_id" name="case3_classification_id">
        	    <option value="" style="display: none;" {{ old('case3_classification_id', optional($caseClassification)->case3_classification_id ?: '') == '' ? 'selected' : '' }} disabled selected>Pilih...</option>
        	@foreach ($case3Classifications as $key => $case3Classification)
			    <option value="{{ $key }}" {{ old('case3_classification_id', optional($caseClassification)->case3_classification_id) == $key ? 'selected' : '' }}>
			    	{{ $case3Classification }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('case3_classification_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('case4_classification_id') ? 'has-error' : '' }}">
    <label for="case4_classification_id" class="col-md-2 control-label">Case4 Classification</label>
    <div class="col-md-10">
        <select class="form-control" id="case4_classification_id" name="case4_classification_id">
        	    <option value="" style="display: none;" {{ old('case4_classification_id', optional($caseClassification)->case4_classification_id ?: '') == '' ? 'selected' : '' }} disabled selected>Pilih...</option>
        	@foreach ($case4Classifications as $key => $case4Classification)
			    <option value="{{ $key }}" {{ old('case4_classification_id', optional($caseClassification)->case4_classification_id) == $key ? 'selected' : '' }}>
			    	{{ $case4Classification }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('case4_classification_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>--}}

{{-- Klasifikasi Kasus --}}
<div class="row form-group {{ $errors->has('klas1_right_id') ? 'has-error' : '' }}">
    <label for="klas1_right_id" class="col-md-2 control-label">Klasifikasi Hak</label>
    <div class="col-md-6">
        <select class="form-control" id="case1_classification_id" name="case1_classification_id">
                <option value="" style="display: none;" {{ old('klas1_right_id', optional($clientCase)->case1_classification_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select Kategori1...</option>
            @foreach ($case1Classifications as $key => $case1Classification)
                <option value="{{ $key }}" {{ old('klas1_right_id', optional($clientCase)->case1_classification_id) == $key ? 'selected' : '' }}>
                    {{ $case1Classification }}
                </option>
            @endforeach
        </select>
        
        {!! $errors->first('klas1_right_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="row form-group">
        <label for="klas2_right_id" class="col-md-2 control-label">.</label>
<div class="col-md-6">
<select class="form-control" name="case2_classification_id" id="case2_classification_id">
  <option value="0" disable="true" selected="true">Select Kategori2...</option>
</select>
</div>
</div>

<div class="row form-group">
        <label for="klas3_right_id" class="col-md-2 control-label">.</label>
<div class="col-md-6">
<select class="form-control" name="case3_classification_id" id="case3_classification_id">
  <option value="0" disable="true" selected="true">Select Kategori3...</option>
</select>
</div>
</div>

<div class="row form-group">
        <label for="klas4_right_id" class="col-md-2 control-label">.</label>
<div class="col-md-6">
<select class="form-control" name="case4_classification_id" id="case4_classification_id">
  <option value="0" disable="true" selected="true">Select Kategori4...</option>
</select>
</div>
</div>


<div class="row form-group {{ $errors->has('violated_right_id') ? 'has-error' : '' }}">
    <label for="violated_right_id" class="col-md-2 control-label">Hak yg Dilanggar</label>
    <div class="col-md-10">
        <select class="form-control" id="violated_right_id" name="violated_right_id" multiple class="standardSelect">
        	    <option value="" style="display: none;" {{ old('violated_right_id', optional($caseClassification)->violated_right_id ?: '') == '' ? 'selected' : '' }} disabled selected>Pilih...</option>
        	@foreach ($violatedRights as $key => $violatedRight)
			    <option value="{{ $key }}" {{ old('violated_right_id', optional($caseClassification)->violated_right_id) == $key ? 'selected' : '' }}>
			    	{{ $violatedRight }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('violated_right_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<script type="text/javascript">
  $('#case1_classification_id').on('change', function(e){
    console.log(e);
    var klas1_rights_id = e.target.value;
    $.get('/json-klas2_rights?klas1_rights_id=' + klas1_rights_id,function(data) {
      console.log(data);
      $('#case2_classification_id').empty();
      $('#case2_classification_id').append('<option value="0" disable="true" selected="true">Pilih...</option>');

      $('#case3_classification_id').empty();
      $('#case3_classification_id').append('<option value="0" disable="true" selected="true">Pilih...</option>');

      $('#case4_classification_id').empty();
      $('#case4_classification_id').append('<option value="0" disable="true" selected="true">Pilih...</option>');

      $.each(data, function(index, klas2_rightsObj){
        $('#case2_classification_id').append('<option value="'+ klas2_rightsObj.id +'">'+ klas2_rightsObj.name +'</option>');
      })
    });
  });

  $('#case2_classification_id').on('change', function(e){
    console.log(e);
    var klas2_rights_id = e.target.value;
    $.get('/json-klas3_rights?klas2_rights_id=' + klas2_rights_id,function(data) {
      console.log(data);
      $('#case3_classification_id').empty();
      $('#case3_classification_id').append('<option value="0" disable="true" selected="true">Pilih...</option>');

      $.each(data, function(index, klas3_rightsObj){
        $('#case3_classification_id').append('<option value="'+ klas3_rightsObj.id +'">'+ klas3_rightsObj.name +'</option>');
      })
    });
  });

  $('#case3_classification_id').on('change', function(e){
    console.log(e);
    var klas3_rights_id = e.target.value;
    console.log(klas3_rights_id)
    $.get('/json-klas4_rights?klas3_rights_id=' + klas3_rights_id,function(data) {
      console.log(data);
      $('#case4_classification_id').empty();
      $('#case4_classification_id').append('<option value="0" disable="true" selected="true">Pilih...</option>');

      $.each(data, function(index, klas4_rightsObj){
        $('#case4_classification_id').append('<option value="'+ klas4_rightsObj.id +'">'+ klas4_rightsObj.name +'</option>');
      })
    });
  });


</script>
