@extends('layouts.app')

@section('styles')
<style>
* {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}

/* FONDO GENERAL */
body {
    background: #f1f5f9 !important;
}

.min-h-screen {
    background: #f1f5f9 !important;
}

/* NAVBAR */
nav {
    background: #ffffff !important;
    border-bottom: 1px solid #dbeafe !important;
}

/* CONTENEDOR */
.auth-wrapper {
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    background:
        radial-gradient(circle at top left, rgba(59,130,246,0.08), transparent 35%),
        radial-gradient(circle at bottom right, rgba(6,182,212,0.08), transparent 35%),
        #f1f5f9;
    padding: 2rem;
}

/* TARJETA */
.auth-card {
    width: 100%;
    max-width: 420px;
    background: #ffffff;
    border: 1px solid #dbeafe;
    border-radius: 22px;
    padding: 2.5rem;
    box-shadow: 0 10px 25px rgba(0,0,0,0.08);
}

/* LOGO */
.auth-logo {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 2rem;
}

.auth-brand {
    font-size: 1.1rem;
    font-weight: 700;
    color: #0f172a;
}

/* TITULOS */
.auth-title {
    font-size: 1.9rem;
    font-weight: 800;
    color: #2563eb;
    margin-bottom: 8px;
    text-align: center;
}

.auth-subtitle {
    font-size: 0.95rem;
    color: #64748b;
    margin-bottom: 2rem;
    text-align: center;
}

/* ERROR */
.auth-error {
    display: flex;
    align-items: center;
    gap: 8px;
    background: #fee2e2;
    border: 1px solid #fecaca;
    color: #dc2626;
    font-size: 0.82rem;
    padding: 12px 14px;
    border-radius: 12px;
    margin-bottom: 1.25rem;
}

/* INPUTS */
.form-group {
    margin-bottom: 1.2rem;
}

.form-group label {
    display: block;
    font-size: 0.75rem;
    font-weight: 700;
    color: #334155;
    margin-bottom: 8px;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.form-group input[type="text"],
.form-group input[type="email"],
.form-group input[type="password"] {
    width: 100%;
    background: #f8fafc !important;
    border: 2px solid #cbd5e1 !important;
    border-radius: 12px !important;
    padding: 14px !important;
    color: #0f172a !important;
    font-size: 0.95rem !important;
    transition: 0.2s;
    outline: none !important;
    box-shadow: none !important;
}

.form-group input::placeholder {
    color: #94a3b8;
}

.form-group input:focus {
    border-color: #06b6d4 !important;
    box-shadow: 0 0 0 4px rgba(6,182,212,0.15) !important;
    background: #ffffff !important;
}

/* CHECKBOX Y LINKS */
.form-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 1.5rem;
    margin-top: 0.5rem;
}

.checkbox-label {
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 0.82rem;
    color: #475569;
    cursor: pointer;
}

.checkbox-label input[type="checkbox"] {
    width: 15px;
    height: 15px;
    accent-color: #06b6d4;
    cursor: pointer;
}

.link-muted {
    font-size: 0.82rem;
    color: #64748b;
    text-decoration: none;
    transition: 0.2s;
}

.link-muted:hover {
    color: #06b6d4;
}

/* BOTON */
.btn-primary {
    width: 100%;
    padding: 14px;
    background: linear-gradient(135deg, #06b6d4, #3b82f6);
    color: white;
    border: none;
    border-radius: 12px;
    font-size: 0.95rem;
    font-weight: 700;
    cursor: pointer;
    letter-spacing: 0.3px;
    transition: 0.25s;
}

.btn-primary:hover {
    background: linear-gradient(135deg, #0891b2, #2563eb);
    transform: translateY(-2px);
    box-shadow: 0 10px 20px rgba(59,130,246,0.2);
}

.btn-primary:active {
    transform: scale(0.98);
}

/* DIVIDER */
.divider {
    display: flex;
    align-items: center;
    gap: 12px;
    margin: 1.5rem 0;
    color: #94a3b8;
    font-size: 0.78rem;
}

.divider::before,
.divider::after {
    content: '';
    flex: 1;
    height: 1px;
    background: #dbeafe;
}

/* GOOGLE BUTTON */
.btn-google {
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    padding: 13px;
    background: #f8fafc;
    border: 2px solid #dbeafe;
    border-radius: 12px;
    color: #334155;
    font-size: 0.9rem;
    font-weight: 600;
    text-decoration: none;
    transition: 0.2s;
}

.btn-google:hover {
    border-color: #93c5fd;
    background: #eff6ff;
    color: #2563eb;
}

/* FOOTER */
.auth-footer {
    text-align: center;
    margin-top: 1.5rem;
    font-size: 0.85rem;
    color: #64748b;
}

.link-accent {
    color: #2563eb;
    text-decoration: none;
    font-weight: 700;
}

.link-accent:hover {
    color: #06b6d4;
}
</style>
@endsection

@section('content')
<div class="auth-wrapper">
    <div class="auth-card">

        <div class="auth-logo">
            <svg width="36" height="36" viewBox="0 0 36 36" fill="none">
                <rect width="36" height="36" rx="10" fill="#EAB308"/>
                <path d="M10 26L18 10L26 26" stroke="#000" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M13 21h10" stroke="#000" stroke-width="2.5" stroke-linecap="round"/>
            </svg>
            <span class="auth-brand">LoginApp</span>
        </div>

        <h1 class="auth-title">Bienvenido de vuelta</h1>
        <p class="auth-subtitle">Ingresa tus credenciales para continuar</p>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            @if($errors->any())
                <div class="auth-error">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="10"/>
                        <line x1="12" y1="8" x2="12" y2="12"/>
                        <line x1="12" y1="16" x2="12.01" y2="16"/>
                    </svg>
                    {{ $errors->first() }}
                </div>
            @endif

            <div class="form-group">
                <label for="email">Correo electrónico</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus placeholder="tu@correo.com">
            </div>

            <div class="form-group">
                <label for="password">Contraseña</label>
                <input id="password" type="password" name="password" required placeholder="••••••••">
            </div>

            <div class="form-row">
                <label class="checkbox-label">
                    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <span>Recordarme</span>
                </label>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="link-muted">¿Olvidaste tu contraseña?</a>
                @endif
            </div>

<button type="submit" class="btn-primary">Iniciar sesión</button>

            <div class="divider"><span>o continúa con</span></div>

            {{-- Se cambió la URL manual por la ruta nombrada para evitar errores 500 --}}
            <a href="{{ route('google.redirect') }}" class="btn-google" style="text-decoration: none; display: flex; align-items: center; justify-content: center; gap: 10px; width: 100%; padding: 12px; background: #fff; border: 1px solid #ddd; border-radius: 10px; transition: 0.3s;">
                <svg width="18" height="18" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
                    <path fill="#EA4335" d="M24 9.5c3.54 0 6.71 1.22 9.21 3.6l6.85-6.85C35.9 2.38 30.47 0 24 0 14.62 0 6.51 5.38 2.56 13.22l7.98 6.19C12.43 13.72 17.74 9.5 24 9.5z"/>
                    <path fill="#4285F4" d="M46.98 24.55c0-1.57-.15-3.09-.38-4.55H24v9.02h12.94c-.58 2.96-2.26 5.48-4.78 7.18l7.73 6c4.51-4.18 7.09-10.36 7.09-17.65z"/>
                    <path fill="#FBBC05" d="M10.53 28.59c-.48-1.45-.76-2.99-.76-4.59s.27-3.14.76-4.59l-7.98-6.19C.92 16.46 0 20.12 0 24c0 3.88.92 7.54 2.56 10.78l7.97-6.19z"/>
                    <path fill="#34A853" d="M24 48c6.48 0 11.93-2.13 15.89-5.81l-7.73-6c-2.18 1.48-4.97 2.31-8.16 2.31-6.26 0-11.57-4.22-13.47-9.91l-7.98 6.19C6.51 42.62 14.62 48 24 48z"/>
                </svg>
                <span style="color: #555; font-weight: 600;">Iniciar sesión con Google</span>
            </a>

            <p class="auth-footer" style="text-align: center; margin-top: 20px; font-size: 0.85rem; color: #666;">
                ¿No tienes cuenta? <a href="{{ route('register') }}" class="link-accent" style="color: #eab308; font-weight: 700; text-decoration: none;">Regístrate</a>
            </p>
        </form>
    </div>
</div>
@endsection