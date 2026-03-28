@extends('components.layouts.master_1.auth')

@section('content')
    <div class="wrapper wrapper-login">
        <div class="container container-login animated fadeIn" style="width: 425px;">
            <h3 class="text-center">Masuk</h3>
            <div class="login-form">
                <form action="{{ route('login') }}" method="POST" onsubmit="formOnSubmitButton(this)">
                    @include('components.custom.form.data', ['method' => 'POST'])
                    <div class="form-group">
                        @include('components.layouts.master_1.alert.dismissible')
                    </div>
                    <div class="form-group">
                        <label for="email"><b>Email</b></label>
                        <input id="email" name="email" type="email" class="form-control"
                            value="{{ old('email', '') }}">
                    </div>
                    <div class="form-group">
                        <label for="password"><b>Password</b></label>
                        <div class="position-relative">
                            <input id="password" name="password" type="password" class="form-control"">
                            <div class="show-password">
                                <i class="icon-eye"></i>
                            </div>
                        </div>
                    </div>
                    <div class="form-action mb-3">
                        <button type="submit" class="btn btn-primary w-100 btn-login">Masuk</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
