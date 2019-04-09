@extends('layouts.base')

@section('content')

    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Users</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Admin</a></li>
                        <li class="active">Users</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-body">
        
		  <div class="col-md-8">

		    @if(session('status'))
		      <div class="alert alert-success">
		        {{session('status')}}
		      </div>
		    @endif 

		    <form enctype="multipart/form-data" class="bg-white shadow-sm p-3" action="{{route('users.store')}}" method="POST">
		      {{ csrf_field() }}
		      <label for="name">Name</label>
		      <input value="{{old('name')}}" class="form-control {{$errors->first('name') ? "is-invalid": ""}}" placeholder="Nama Lengkap" type="text" name="name" id="name"/>
		      <div class="invalid-feedback">
		        {{$errors->first('name')}}
		      </div>
		      <br>

		      <label for="username">Username</label>
		      <input value="{{old('username')}}" class="form-control {{$errors->first('username') ? "is-invalid" : ""}}" placeholder="username" type="text" name="username" id="username"/>
		      <div class="invalid-feedback">
		        {{$errors->first('username')}}
		      </div>
		      <br>


		      <label for="username">Jabatan</label>
		      <input value="{{old('position')}}" class="form-control {{$errors->first('position') ? "is-invalid" : ""}}" placeholder="position" type="text" name="position" id="position"/>
		      <div class="invalid-feedback">
		        {{$errors->first('position')}}
		      </div>
		      <br>
		      
		      <label for="">Role: </label>
		      <div class="form-check">
		      <input class="form-check-input {{$errors->first('roles') ? "is-invalid" : "" }}" type="checkbox" name="roles[]" id="ADMIN" value="ADMIN"> <label for="ADMIN">Administrator</label>
		      </div>
		      <div class="form-check">
		      <input class="form-check-input {{$errors->first('roles') ? "is-invalid" : "" }}" type="checkbox" name="roles[]" id="KABID" value="KABID"> <label for="KABID">Transfer Kasus</label>
		      </div>
		      <div class="form-check">
		      <input class="form-check-input {{$errors->first('roles') ? "is-invalid" : "" }}" type="checkbox" name="roles[]" id="LAWYER" value="LAWYER"> <label for="LAWYER">Manage Kasus</label>
		      </div>
		      <div class="form-check">
		      <input class="form-check-input {{$errors->first('roles') ? "is-invalid" : "" }}" type="checkbox" name="roles[]" id="RECEPTIONIST" value="RECEPTIONIST"> <label for="RECEPTIONIST">Manage Data Input Person</label>
		      </div>
		      <div class="invalid-feedback">
		        {{$errors->first('roles')}}
		      </div>
		      <br>

		      <br>
		      <label for="phone">Nomor HP</label> 
		      <br>
		      <input value="{{old('phone')}}" type="text" name="phone" class="form-control {{$errors->first('phone') ? "is-invalid" : ""}} ">
		      <div class="invalid-feedback">
		        {{$errors->first('phone')}}
		      </div>

		      <br>
		      <label for="address">Alamat</label>
		      <textarea name="address" id="address" class="form-control {{$errors->first('address') ? "is-invalid" : ""}}">{{old('address')}}</textarea>
		      <div class="invalid-feedback">
		        {{$errors->first('address')}}
		      </div>

		      <br>
		      <label for="avatar">Foto Profil</label>
		      <br>
		      <input id="avatar" name="avatar" type="file" class="form-control {{$errors->first('avatar') ? "is-invalid" : ""}}">
		      <div class="invalid-feedback">
		        {{$errors->first('avatar')}}
		      </div>


		      <hr class="my-4">

		      <label for="email">Email</label>
		      <input value="{{old('email')}}" class="form-control {{$errors->first('email') ? "is-invalid" : ""}}" placeholder="user@mail.com" type="text" name="email" id="email"/>
		      <div class="invalid-feedback">
		        {{$errors->first('email')}}
		      </div>
		      <br>

		      <label for="password">Password</label>
		      <input class="form-control {{$errors->first('password') ? "is-invalid" : ""}}" placeholder="password" type="password" name="password" id="password"/>
		      <div class="invalid-feedback">
		        {{$errors->first('password')}}
		      </div>
		      <br>

		      <label for="password_confirmation">Password Confirmation</label>
		      <input class="form-control {{$errors->first('password_confirmation') ? "is-invalid" : ""}}" placeholder="password confirmation" type="password" name="password_confirmation" id="password_confirmation"/>
		      <div class="invalid-feedback">
		        {{$errors->first('password_confirmation')}}
		      </div>
		      <br>

		      <input class="btn btn-primary" type="submit" value="Save"/>
		    </form>
		  </div>
            
        </div>
    </div>

@endsection


