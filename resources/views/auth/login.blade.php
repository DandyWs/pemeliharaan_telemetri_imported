@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">{{ __('Masuk dengan Akun yang sudah terdaftar') }}</div>

                <div class="card-body">
                <form action="{{ url('user/signin') }}" method="POST" autocomplete="off" id="LoginAjax" parsley-validate novalidate>
                        <div class="mb-3">
                            <input name="email" id="email" type="email" class="form-control" placeholder="Username" autocomplete="off">
                        </div>
                        <div class="mb-2">
                            <div class="input-group input-group-flat">
                                <input name="password" id="password" type="password" class="form-control" placeholder="Password" autocomplete="off">
                            </div>
                        </div>
                    </form>

                        <div class="mb-2">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
