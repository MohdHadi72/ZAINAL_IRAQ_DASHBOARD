@include('common.header')
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
                        <form method="POST" action="{{ route('login') }}"
                            class="form-horizontal m-t-20"
                        >
                        @csrf

                            <div class="form-group row">
                                <div class="col-12">
                                    <input
                                        class="form-control"
                                        type="text"
                                        required=""
                                        placeholder="Username"
                                    />
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <input
                                        class="form-control"
                                        type="password"
                                        required=""
                                        placeholder="Password"
                                    />
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <div class="custom-control custom-checkbox">
                                        <input
                                            type="checkbox"
                                            class="custom-control-input"
                                            id="customCheck1"
                                        />
                                        <label
                                            class="custom-control-label"
                                            for="customCheck1"
                                            >Remember me</label
                                        >
                                    </div>
                                </div>
                            </div>
                            <div class="form-group text-center row m-t-20">
                                <div class="col-12">
                                    <button
                                        class="btn btn-danger btn-block waves-effect waves-light"
                                        type="submit"
                                    >
                                        Log In
                                    </button>
                                </div>
                            </div>
                            <div class="form-group m-t-10 mb-0 row">
                                <div class="col-sm-7 m-t-20">
                                    <a
                                        href="pages-recoverpw.html"
                                        class="text-muted"
                                        ><i class="mdi mdi-lock"></i>
                                        <small>Forgot your password ?</small></a
                                    >
                                </div>
                                <div class="col-sm-5 m-t-20">
                                    <a
                                        href="pages-register.html"
                                        class="text-muted"
                                        ><i class="mdi mdi-account-circle"></i>
                                        <small>Create an account ?</small></a
                                    >
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@include('common.footer')
