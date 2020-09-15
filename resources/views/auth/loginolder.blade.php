
  <form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
    @csrf
    <span class="login100-form-logo">
      <i class="zmdi zmdi-landscape"></i>
    </span>

    <span class="login100-form-title p-b-34 p-t-27">
      Log in
    </span>
    <div class="wrap-input100 validate-input" data-validate = "Enter username">
      <input class="input100" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
        <span class="focus-input100" data-placeholder="&#xf207;"></span>
        @error('email')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>

      <div class="wrap-input100 validate-input" data-validate="Enter password">
        <input class="input100" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
          <span class="focus-input100" data-placeholder="&#xf191;"></span>
          @error('password')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>
        <div class="contact100-form-checkbox">
          <input class="input-checkbox100" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
          <label class="label-checkbox100" for="ckb1">
            Remember me
          </label>
        </div>
        <div class="container-login100-form-btn">
          <button type="submit" class="login100-form-btn">
            {{ __('Login') }}
          </button>
        </div>
        <div class="text-center p-t-90">
          @if (Route::has('password.request'))
            <a class="txt1" href="{{ route('password.request') }}">
              {{ __('Forgot Your Password?') }}
            </a>
          @endif
        </div>
      </form>
