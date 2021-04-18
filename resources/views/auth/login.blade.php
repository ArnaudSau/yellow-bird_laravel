<style>
    * {
        padding: 0;
        margin: 0;
    }

    .container {
        height: 100%;
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        background: center / cover no-repeat url("{{asset('images')}}/background.jpg");
        padding: 0;
        margin: 0;
        font-family: Arial, Helvetica, sans-serif;

    }

    h2{
        margin: 10px;
    }

    .card {
        background-color: white;
        padding: 15px;
        border-radius: 10px;
        opacity: 0.8;
        min-width: 300px;
    }

    .card-header {
        text-align: center;
    }

    .card-body {
        opacity: 1;
    }

    input{
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        box-sizing: border-box;
    }

    .but{
        text-align: center;
    }

    button{
        background-color:#D4C825 ;
        color: white;
        padding: 5 10px;
        border-radius: 5px;
        border:none;
    }

   
</style>

<div class="container">
    <div class="card">
        <div class="card-header"><h2>{{ __('Login') }}</h2></div>

        <div class="card-body">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

               <!--  <div class="form-group row">
                    <div class="col-md-6 offset-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                </div> -->

                <div class="form-group row mb-0">
                    <div class="but">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Login') }}
                        </button>

                       <!--  @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                        @endif -->
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>