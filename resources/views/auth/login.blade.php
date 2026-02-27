@extends('components.layouts.master_1.auth')

@section('content')
    <div class="wrapper wrapper-login">
        <div class="container container-login animated fadeIn">
            <h3 class="text-center">Sign In</h3>
            <div class="login-form">

                <form action="{{ url('login') }}" method="POST" onsubmit="onSubmitButton(this)">
                    @include('components.form.data', ['method' => 'POST'])

                    <div class="form-sub">
                        @include('components.layouts.master_1.alert.dismissible')
                    </div>
                    <div class="form-sub">
                        <div class="form-floating form-floating-custom mb-3">
                            <input id="email" name="email" value="{{ old('email', '') }}" type="email"
                                class="form-control" placeholder="email" />
                            <label for="email">Email</label>
                        </div>
                        <div class="form-floating form-floating-custom mb-3">
                            <input id="password" name="password" value="{{ old('password', '') }}" type="password"
                                class="form-control" placeholder="password" />
                            <label for="password">Password</label>
                            <div class="show-password">
                                <i class="icon-eye"></i>
                            </div>
                        </div>
                    </div>
                    {{-- 
                    <div class="row m-0">
                        <div class="d-flex form-sub">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="rememberme" />
                                <label class="form-check-label" for="rememberme">Remember Me</label>
                            </div>

                            <a href="#" class="link float-end">Forget Password ?</a>
                        </div>
                    </div> 
                    --}}
                    <div class="form-action mb-3">
                        <button type="submit" class="btn btn-primary w-100 btn-login">Sign In</button>
                    </div>
                    {{-- 
                    <div class="login-account">
                        <span class="msg">Don't have an account yet ?</span>
                        <a href="#" id="show-signup" class="link">Sign Up</a>
                    </div> 
                    --}}
                </form>

            </div>
        </div>
    </div>
@endsection
