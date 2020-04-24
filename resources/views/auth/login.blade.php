@extends('main.layouts.app')

@section('content')


<div class="site-section bg-light">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-7 mb-5 aos-init aos-animate" data-aos="fade">

          <h2 class="mb-5 text-black">Log In</h2>

          <form method="POST" action="{{ route('login') }}" class="p-5 bg-white">
            @csrf
            <div class="row form-group">
              
              <div class="col-md-12">
                <label class="text-black" for="email">Email</label> 
                <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
            </div>

            <div class="row form-group">
              
              <div class="col-md-12">
                <label class="text-black" for="subject">Password</label> 
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
            </div>


            <div class="form-group row">
                <div class="col-md-6 offset-md-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>
            </div>

            <div class="row form-group">
              <div class="col-12">
                <p>No account yet? <a href="register.html">Register</a></p>
              </div>
            </div>

          
            <div class="row form-group">
              <div class="col-md-12">
                <input type="submit" value="Sign In" class="btn btn-primary py-2 px-4 text-white">
              </div>

              @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
            </div>


          </form>
        </div>
        
      </div>
    </div>
  </div>
@endsection
