<a href='{!! url('/SteamAuth'); !!}'>About</a>

@extends('layouts.default')

@section('content')
<div class="container">
  <div class="row">
        <div class="col-md-12 row-block">
            <a href="{{ url('auth/google') }}" class="btn btn-lg btn-primary btn-block">
                <strong>Login With Google</strong>
            </a>     
        </div>
    </div>
</div>
<br>
<div class="container">
    <div class="row">
          <div class="col-md-12 row-block">
              <a href="{{ url('/SteamAuth') }}" class="btn btn-lg btn-primary btn-block">
                  <strong>Login With Steam</strong>
              </a>     
          </div>
      </div>
  </div>
@endsection