@extends('layout.master')

@section('title')
    welcome
@endsection

@section('content')
    @include('include.message')
    <div class="row">
        <div class="col-md-6">
            <h2>Sign Up</h2>
            <form action="{{route('signup')}}" method="post">
            <div class="form-group {{$errors->has('name') ? 'has-error' : ''}}">
                <label for="name">Name:</label>
                <input type="text" class="form-control" name="name" value="{{Request::old('name')}}">
               
            </div>
            <div class="form-group {{$errors->has('email') ? 'has-error': ''}}">
                <label for="email">Email address:</label>
                <input type="email" class="form-control" name="email"
                 value="{{Request::old('email')}}"
                >
            </div>
              <div class="form-group {{$errors->has('password') ? 'has-error': ''}}">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" name="password"
                 value="{{Request::old('password')}}"
                >
              </div>
 
            <button type="submit" class="btn btn-primary">Submit</button>
            <input type="hidden" name="_token" value="{{Session::token()}}">
            </form>
        </div>
        <div class="col-md-6">
            <h2>Sign In</h2>
            <form action="{{route('signin')}}" method="post">
            <div class="form-group {{$errors->has('email') ? 'has-error': ''}}">
                <label for="email">Email address:</label>
                <input type="email" class="form-control" name="email"
                 value="{{Request::old('email')}}"
                >
            </div>
              <div class="form-group {{$errors->has('password') ? 'has-error': ''}}">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" name="password"
                 value="{{Request::old('password')}}"
                >
              </div>
 
            <button type="submit" class="btn btn-primary">Submit</button>
             <input type="hidden" name="_token" value="{{Session::token()}}">
            </form>
        </div>
    </div>
@endsection