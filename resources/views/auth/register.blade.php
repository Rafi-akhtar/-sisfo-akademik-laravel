@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="col-md-6">
        <div class="card shadow-lg border-0 rounded-4 p-4 bg-white">
            <div class="text-center mb-4">
                <h3 class="fw-bold text-primary">DAFTAR AKUN BARU</h3>
                <p class="text-muted small">Lengkapi data berikut untuk mendaftar ke SISFO Akademik</p>
            </div>

            <div class="card-body p-0">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label fw-semibold text-secondary small">Nama Lengkap</label>
                        <input id="name" type="text" class="form-control rounded-3 @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Nama Anda">

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label fw-semibold text-secondary small">Email Address</label>
                        <input id="email" type="email" class="form-control rounded-3 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="nama@email.com">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label fw-semibold text-secondary small">Password</label>
                        <input id="password" type="password" class="form-control rounded-3 @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Minimal 8 karakter">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="password-confirm" class="form-label fw-semibold text-secondary small">Konfirmasi Password</label>
                        <input id="password-confirm" type="password" class="form-control rounded-3" name="password_confirmation" required autocomplete="new-password" placeholder="Ulangi password">
                    </div>

                    <div class="d-grid mb-3">
                        <button type="submit" class="p-2 btn btn-primary rounded-3 fw-semibold shadow-sm">
                            REGISTER
                        </button>
                    </div>

                    <div class="text-center">
                        <p class="small text-muted mb-0">Sudah punya akun? <a href="{{ route('login') }}" class="text-decoration-none fw-semibold text-primary">Login di sini</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection