@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h3>Register</h3>
        <form action="{{ route('register')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" class="form-control @error('username') inputError @enderror" id="username"  placeholder="Enter Username" value="{{ old('username')}}">
                @error('username')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control  @error('password') inputError @enderror" id="password" placeholder="Password">
                @error('password')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="cfpassword">Password</label>
                <input type="password" name="password_confirmation" class="form-control" id="cfpassword" placeholder="Confirm Password">
            </div>
            
            <button type="submit" class="btn btn-success">Register</button>
        </form>
    </div>
@endsection