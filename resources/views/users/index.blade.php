@extends('layouts.base')

@section('content')
    

    <hr class="my-3">

    @if(session('status'))
    <div class="alert alert-success">
      {{session('status')}}
    </div>
    @endif 

    <div class="row">
      <div class="col-md-12 text-right">
          <a href="{{route('users.create')}}" class="btn btn-primary">Tambah User</a>
      </div>
    </div>
    <br>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th><b>Name</b></th>
          <th><b>Username</b></th>
          <th><b>Email</b></th>
          <th><b>Jabatan</b></th>
          <th><b>Role</b></th>
          <th><b>Status</b></th>
          <th><b>Action</b></th>
        </tr>
      </thead>
      <tbody>
        @foreach($users as $user)
          <tr>
            <td>{{$user->name}}</td>
            <td>{{$user->username}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->jabatan}}</td>
            <td>@foreach (json_decode($user->roles) as $role)
              {{$role}}
        	  @endforeach</td>
            <td>
              @if($user->status == "ACTIVE")
                <span class="badge badge-success">
                  {{$user->status}}
                </span>
              @else 
                <span class="badge badge-danger">
                  {{$user->status}}
                </span>
              @endif
            </td>
            <td>
              <a class="btn btn-info text-white btn-sm" href="{{route('users.edit', ['id'=>$user->id])}}">
              	<span class="fa fa-edit" aria-hidden="true"></span></a>

              <a href="{{route('users.show', ['id' => $user->id])}}" class="btn btn-primary btn-sm">
                <span class="fa fa-eye" aria-hidden="true"></span></a>

              <form onsubmit="return confirm('Delete this user permanently?')" class="d-inline" action="{{route('users.destroy', ['id' => $user->id ])}}" method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="DELETE">
                <input type="submit" value="Delete" class="btn btn-danger btn-sm">               
              </form>
            </td>
          </tr>
        @endforeach 
        <tfoot>
          <tr>
            <td colspan=10>
              {{$users->appends(Request::all())->links()}}
            </td>
          </tr>
        </tfoot>
      </tbody>
    </table>

@endsection