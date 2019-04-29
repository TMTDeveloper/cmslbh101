
<div class="row form-group {{ $errors->has('no_reg') ? 'has-error' : '' }}">
    <label for="no_reg" class="col-md-2 control-label">No. Registrasi</label>
    
    <div class="col-md-10">
        <strong>{{substr($names,0,1)}}.{{ $dates }}.00{{ $numbers }}</strong>
        <input type="hidden" id="no_reg" name="no_reg" value="{{substr($names,0,1)}}.{{ $dates }}.00{{ $numbers }}">
        {{--<input class="form-control" name="no_reg" type="text" id="no_reg" value="{{ old('no_reg', optional($application)->no_reg) }}" maxlength="255" placeholder="Ketik di sini...">
        {!! $errors->first('no_reg', '<p class="help-block">:message</p>') !!}--}}
    </div>
</div>

<div class="row form-group {{ $errors->has('reg_date') ? 'has-error' : '' }}">
    <label for="reg_date" class="col-md-2 control-label">Tgl. Registrasi</label>
    <div class="col-md-3">
        <input class="form-control" name="reg_date" type="text" id="datepicker" value="{{ old('reg_date', optional($application)->reg_date) }}" maxlength="255" placeholder="DD/MM/YYYY">
        {!! $errors->first('reg_date', '<p class="help-block">:message</p>') !!}
    </div>
</div>

{{--<div class="row form-group {{ $errors->has('applicant_id') ? 'has-error' : '' }}">
    <label for="applicant_id" class="col-md-2 control-label">Pemohon/Pelapor</label>
    <div class="col-md-10">
        <select class="form-control standardSelect" id="applicant_id" name="applicant_id">
        	    <option value="" style="display: none;" {{ old('applicant_id', optional($application)->applicant_id ?: '') == '' ? 'selected' : '' }} disabled selected>Pilih...</option>
        	@foreach ($people as $key => $person)
			    <option value="{{ $key }}" {{ old('applicant_id', optional($application)->applicant_id) == $key ? 'selected' : '' }}>
			    	{{ $person }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('applicant_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="row form-group {{ $errors->has('client_id') ? 'has-error' : '' }}">
    <label for="client_id" class="col-md-2 control-label">Klien/Penerima</label>
    <div class="col-md-10">
        <select class="form-control standardSelect" id="client_id" name="client_id">
        	    <option value="" style="display: none;" {{ old('client_id', optional($application)->client_id ?: '') == '' ? 'selected' : '' }} disabled selected>Pilih...</option>
        	@foreach ($people as $key => $person)
			    <option value="{{ $key }}" {{ old('client_id', optional($application)->client_id) == $key ? 'selected' : '' }}>
			    	{{ $person }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('client_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>--}}

<div class="row form-group {{ $errors->has('other_org') ? 'has-error' : '' }}">
    <label for="other_org" class="col-md-2 control-label">Organisasi lain yg pernah menangani</label>
    <div class="col-md-10">
        <input class="form-control" name="other_org" type="text" id="other_org" value="{{ old('other_org', optional($application)->other_org) }}" maxlength="255" placeholder="Ketik di sini...">
        {!! $errors->first('other_org', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="row form-group {{ $errors->has('info_lbh') ? 'has-error' : '' }}">
    <label for="info_lbh" class="col-md-2 control-label">Anda tahu LBH dari:</label>
    <div class="col-md-10">
        <select class="form-control standardSelect" id="info_lbh" name="info_lbh">
          <option selected="selected">Media</option>
          <option selected="selected">Rekan</option>
          <option selected="selected">Lainnya</option>
        </select>
        {!! $errors->first('info_lbh', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="row form-group {{ $errors->has('why_lbh') ? 'has-error' : '' }}">
    <label for="why_lbh" class="col-md-2 control-label">Mengapa datang ke LBH</label>
    <div class="col-md-10">
        <textarea class="form-control" name="why_lbh" type="text" id="why_lbh" value="{{ old('why_lbh', optional($application)->why_lbh) }}" maxlength="255" rows="5" placeholder="Ketik di sini..."></textarea>
        {!! $errors->first('why_lbh', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="row form-group {{ $errors->has('problem_desc') ? 'has-error' : '' }}">
    <label for="problem_desc" class="col-md-2 control-label">Deskripsi Masalah</label>
    <div class="col-md-10">
        <textarea class="form-control" name="problem_desc" type="text" id="problem_desc" value="{{ old('problem_desc', optional($application)->problem_desc) }}" rows="5" maxlength="255" placeholder="Ketik di sini..."></textarea>
        {!! $errors->first('problem_desc', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="row form-group {{ $errors->has('is_confirmed') ? 'has-error' : '' }}">
    <label for="is_confirmed" class="col-md-2 control-label">Konfirmasi (setuju & mengerti)</label>
    <div class="col-md-6">
        <div class="checkbox">
            <label for="is_confirmed_1">
                <input id="is_confirmed_1" class="" name="is_confirmed" type="checkbox" value="1" {{ old('is_confirmed', optional($application)->is_confirmed) == '1' ? 'checked' : '' }}>
                Ya. Data yang saya isikan adalah benar. Jika informasi tidak benar, maka saya bersedia menanggung segala resiko yang timbul, termasuk pemutusan sepihak.
            </label>
        </div>

        {!! $errors->first('is_confirmed', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="row form-group {{ $errors->has('is_advocacy') ? 'has-error' : '' }}">
    <label for="is_advokasi" class="col-md-2 control-label">Penggunaan data untuk advokasi</label>
    <div class="col-md-6">
        <div class="checkbox">
            <label for="is_advocacy">
                <input id="is_advocacy" class="" name="is_advocacy" type="checkbox" value="1" {{ old('is_advocacy', optional($application)->is_advocacy) == '1' ? 'checked' : '' }}>
                Saya setuju, mengerti dan bersedia jika data ini digunakan untuk kepentingan advokasi.
            </label>
        </div>

        {!! $errors->first('is_advocacy', '<p class="help-block">:message</p>') !!}
    </div>
</div>

{{--<div class="row form-group {{ $errors->has('user_id') ? 'has-error' : '' }}">
    <label for="user_id" class="col-md-2 control-label">User</label>
    <div class="col-md-10">
        <select class="form-control" id="user_id" name="user_id">
        	    <option value="" style="display: none;" {{ old('user_id', optional($application)->user_id ?: '') == '' ? 'selected' : '' }} disabled selected>Pilih...</option>
        	@foreach ($users as $key => $user)
			    <option value="{{ $key }}" {{ old('user_id', optional($application)->user_id) == $key ? 'selected' : '' }}>
			    	{{ $user }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>--}}

<!--Datepicker-->
    <script>
        $('#datepicker').datepicker({
            uiLibrary: 'bootstrap',
            format: 'dd/mm/yyyy'
        });
    </script>

<!--Select2js-->
    <script>
        $(document).ready(function() {
        $('.standardSelect').select2();
    });
    </script>

<!--Select2 Theme-->
<script>
            anchors.options.placement = 'left';
            anchors.add('.container h1, .container h2, .container h3, .container h4, .container h5');

            // Set the "bootstrap" theme as the default theme for all Select2
            // widgets.
            //
            // @see https://github.com/select2/select2/issues/2927
            $.fn.select2.defaults.set( "theme", "bootstrap" );

            var placeholder = "Select a State";

            $( ".select2-single, .select2-multiple" ).select2( {
                placeholder: placeholder,
                width: null,
                containerCssClass: ':all:'
            } );

            $( ".select2-allow-clear" ).select2( {
                allowClear: true,
                placeholder: placeholder,
                width: null,
                containerCssClass: ':all:'
            } );

            // @see https://select2.github.io/examples.html#data-ajax
            function formatRepo( repo ) {
                if (repo.loading) return repo.text;

                var markup = "<div class='select2-result-repository clearfix'>" +
                    "<div class='select2-result-repository__avatar'><img src='" + repo.owner.avatar_url + "' /></div>" +
                    "<div class='select2-result-repository__meta'>" +
                        "<div class='select2-result-repository__title'>" + repo.full_name + "</div>";

                if ( repo.description ) {
                    markup += "<div class='select2-result-repository__description'>" + repo.description + "</div>";
                }

                markup += "<div class='select2-result-repository__statistics'>" +
                            "<div class='select2-result-repository__forks'><span class='glyphicon glyphicon-flash'></span> " + repo.forks_count + " Forks</div>" +
                            "<div class='select2-result-repository__stargazers'><span class='glyphicon glyphicon-star'></span> " + repo.stargazers_count + " Stars</div>" +
                            "<div class='select2-result-repository__watchers'><span class='glyphicon glyphicon-eye-open'></span> " + repo.watchers_count + " Watchers</div>" +
                        "</div>" +
                    "</div></div>";

                return markup;
            }

            function formatRepoSelection( repo ) {
                return repo.full_name || repo.text;
            }

            $( ".js-data-example-ajax" ).select2({
                width : null,
                containerCssClass: ':all:',
                ajax: {
                    url: "https://api.github.com/search/repositories",
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        return {
                            q: params.term, // search term
                            page: params.page
                        };
                    },
                    processResults: function (data, params) {
                        // parse the results into the format expected by Select2
                        // since we are using custom formatting functions we do not need to
                        // alter the remote JSON data, except to indicate that infinite
                        // scrolling can be used
                        params.page = params.page || 1;

                        return {
                            results: data.items,
                            pagination: {
                                more: (params.page * 30) < data.total_count
                            }
                        };
                    },
                    cache: true
                },
                escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
                minimumInputLength: 1,
                templateResult: formatRepo,
                templateSelection: formatRepoSelection
            });

            $( "button[data-select2-open]" ).click( function() {
                $( "#" + $( this ).data( "select2-open" ) ).select2( "open" );
            });

            $( ":checkbox" ).on( "click", function() {
                $( this ).parent().nextAll( "select" ).prop( "disabled", !this.checked );
            });

            // copy Bootstrap validation states to Select2 dropdown
            //
            // add .has-waring, .has-error, .has-succes to the Select2 dropdown
            // (was #select2-drop in Select2 v3.x, in Select2 v4 can be selected via
            // body > .select2-container) if _any_ of the opened Select2's parents
            // has one of these forementioned classes (YUCK! ;-))
            $( ".select2-single, .select2-multiple, .select2-allow-clear, .js-data-example-ajax" ).on( "select2:open", function() {
                if ( $( this ).parents( "[class*='has-']" ).length ) {
                    var classNames = $( this ).parents( "[class*='has-']" )[ 0 ].className.split( /\s+/ );

                    for ( var i = 0; i < classNames.length; ++i ) {
                        if ( classNames[ i ].match( "has-" ) ) {
                            $( "body > .select2-container" ).addClass( classNames[ i ] );
                        }
                    }
                }
            });
        </script>