@extends('main.layouts.app')

@section('content')




<div class="site-section bg-light">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-7 mb-5 aos-init aos-animate" data-aos="fade">

          <h2 class="mb-5 text-black">Register</h2>

          <form method="POST" action="{{ route('register') }}" class="p-5 bg-white">
            @csrf
            <div class="row form-group">
                <div class="col-md-12">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row form-group">
              <div class="col-md-12">
                <label class="text-black" for="email">Email</label> 
                <input id="emailmobile" type="text" class="form-control @error('emailmobile') is-invalid @enderror" name="emailmobile" value="{{ old('emailmobile') }}" required autocomplete="emailmobile">

                @error('emailmobile')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
            </div>

            <div class="row form-group">
              <div class="col-md-12">
                <label class="text-black" for="subject">Password</label> 
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
            </div>

            <div class="row form-group">
              <div class="col-md-12">
                <label class="text-black" for="subject">Re-type Password</label> 
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
            </div>
            </div>

            <div class="row form-group">
              <div class="col-12">
                <p>Have an account? <a href="login.html">Log In</a></p>
              </div>
            </div>

            <div class="row form-group">
              <div class="col-md-12">
                <input type="submit" value="Sign In" class="btn btn-primary py-2 px-4 text-white">
              </div>
            </div>


          </form>
        </div>
        
      </div>
    </div>
  </div>
@endsection
