
@include('common.header')

<body class="fixed-left">
    <div class="accountbg"></div>
    <div class="wrapper-page">
        <div class="card">
            <div class="card-body">
                <div class="text-center m-b-15">
                    <a href="/" class="logo" style="color: black !important;"
                    ><i class="mdi mdi-bowling text-success"></i>Zainal Iraq</a
                    >    
                </div>
                <div class="p-3">
                    <form class="form-horizontal m-t-20" action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="form-group row">
                            <div class="col-12"><input id="email" type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12">
                                <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input " type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} required>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group text-center row m-t-20">
                            <div class="col-12">
                                <button type="submit" class="btn btn-danger btn-block waves-effect waves-light">
                                    {{ __('Login') }}
                                </button>


                                </div>
                        </div>
                        <div class="form-group m-t-10 mb-0 row">
                            <div class="col-sm-7 m-t-20">
                                @if (Route::has('password.request'))
                                <a class="text-muted" href="{{ route('password.request') }}"> <i class="mdi mdi-lock"></i> <small>
                                    {{ __('Forgot Your Password?') }} </small>
                                </a>
                            @endif
                            </div>
                            <div class="col-sm-5 m-t-20"><a href="{{ route('register') }}" class="text-muted"><i
                                        class="mdi mdi-account-circle"></i> <small>Create an account ?</small></a></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

