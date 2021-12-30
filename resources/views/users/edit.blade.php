@extends('layouts.global')

@section("title") Edit User @endsection

@section('content')
    <div class="col-md-8">

        @if(session('status'))
        <div class="alert alert-success">
            {{session('status')}}
        </div>
        @endif

        <form action="{{route('users.update', [$user->id])}}" enctype="multipart/form-date" class="bg-white shadow-sm p-3" method="POST">
            @csrf
            <input type="hidden" value="PUT" name="_method">

            <label for="name">Name</label>
            <input type="text" value="{{$user->name}}" class="form-control" placeholder="Full Name" name="name" id="name">
            <br>

            <label for="username">Username</label>
            <input type="text" value="{{$user->username}}" disabled class="form-control" placeholder="username" name="username" id="username">
            <br>

            <label for="">Status</label>
            <br>
            <input {{$user->status == "ACTIVE" ? "checked" : ""}} type="radio" value="ACTIVE" class="form-control" name="active" id="status">
            <label for="active">Active</label>

            <input {{$user->status == "INACTIVE" ? "checked" : ""}} type="radio" value="ACTIVE" class="form-control" name="inactive" id="status">
            <label for="inactive">Inactive</label>
            <br><br>

            <label for="">Roles</label>
            <br>
            <input type="checkbox" {{in_array("ADMIN", json_decode($user->roles)) ? "checked" : ""}} name="roles[]" value="ADMIN" id="ADMIN">
            <label for="ADMIN">Administrator</label>

            <input type="checkbox" {{in_array("STAFF", json_decode($user->roles)) ? "checked" : ""}} name="roles[]" value="STAFF" id="STAFF">
            <label for="STAFF">Staff</label>

            <input type="checkbox" {{in_array("CUSTOMER", json_decode($user->roles)) ? "checked" : ""}} name="roles[]" value="CUSTOMER" id="CUSTOMER">
            <label for="CUSTOMER">Customer</label>
            <br><br>

            <label for="phone">Phone number</label>
            <br>
            <input type="text" name="phone" class="form-control" value="{{$user->phone}}">

            <br>
            <label for="address">Address</label>
            <textarea name="address" id="address" class="form-control">{{$user->address}}</textarea>
            <br>

            <label for="avatar">Avatar image</label>
            <br>
            Current avatar: <br>
            @if($user->avatar)
                <img src="{{asset('storage/'.$user->avatar)}}" width="120px">
                <br>
            @else
                No avatar
            @endif
            <br>

            <input type="file" class="form-control" id="avatar" name="avatar">
            <small class="text-muted">Kosongkan jika tidak ingin mengubah avatar</small>

            <hr class="my-3">
            <label for="email">Email</label>
            <input value="{{$user->email}}" disabled class="form-control" placeholder="user@mail.com" type="text" name="email" id="email">
            <br>

            <input class="btn btn-primary" type="submit" value="Save">
        </form>
    </div>
@endsection