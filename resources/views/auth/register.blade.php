@include('common.header')

<body class="fixed-left">
    <div class="accountbg"></div>
    <div class="wrapper-page">
        <div class="card">
            <div class="card-body">
                <div class="text-center m-b-12"><a href="index.html" class="logo logo-admin">
                    {{-- <img src="assets/images/logo.png" height="24" alt="logo"></a> --}}
                    <a href="{{ url('/register') }}" class="logo"  style="color: black !important"><i class="mdi mdi-bowling text-success"></i>
                        zain Al Iraq</a>
                        </div>
                <div class="p-1">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group row">
                            <div class="col-12">
                                <input id="email" type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12">

                                    <input id="name" type="text" placeholder="Username" class="form-control @error('Username') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('Username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12">
                                    <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-12">
                                    {{-- <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password"> --}}
                                <input id="password-confirm" type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation" required autocomplete="new-password">


                                </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12">
                                <div class="custom-control custom-checkbox"><input type="checkbox"
                                        class="custom-control-input" id="customCheck1" required> <label
                                        class="custom-control-label font-weight-normal" for="customCheck1">I accept <a
                                            href="#" class="text-muted">Terms and Conditions</a></label></div>
                            </div>
                        </div>
                        <div class="form-group text-center row m-t-20">
                            <div class="col-12">
                                    <button type="submit" class="btn btn-danger btn-block waves-effect waves-light">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                        </div>
                        <div class="form-group m-t-10 mb-0 row">
                            <div class="col-12 m-t-20 text-center"><a href="{{url('/') }}" class="text-muted">Already
                                    have account?</a></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
