@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 75vh;">
    <div class="col-md-5">
        <div class="card shadow-lg border-0 rounded-4 p-4 bg-white">
            <div class="text-center mb-4">
                <h3 class="fw-bold text-primary">SISFO AKADEMIK</h3>
                <p class="text-muted small">Silakan masuk menggunakan akun terdaftar</p>
            </div>

            <div class="card-body p-0">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="email" class="form-label fw-semibold text-secondary small">Email Address</label>
                        <input id="email" type="email" class="form-control rounded-3 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="nama@email.com">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label fw-semibold text-secondary small">Password</label>
                        <input id="password" type="password" class="form-control rounded-3 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="••••••••">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3 d-flex justify-content-between align-items-center">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label small text-muted" for="remember">
                                Remember Me
                            </label>
                        </div>

                        @if (Route::has('password.request'))
                            <a class="small text-decoration-none text-primary" href="{{ route('password.request') }}">
                                Lupa Password?
                            </a>
                        @endif
                    </div>

                    <div class="d-grid mb-3">
                        <button type="submit" class="p-2 btn btn-primary rounded-3 fw-semibold shadow-sm">
                            LOGIN
                        </button>
                    </div>

                    <div class="text-center">
                        <p class="small text-muted mb-0">Belum punya akun? <a href="{{ route('register') }}" class="text-decoration-none fw-semibold text-primary">Register di sini</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection