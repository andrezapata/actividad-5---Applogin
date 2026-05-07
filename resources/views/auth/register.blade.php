@extends('layouts.app')

@section('content')

<style>
    /* FONDO GENERAL */
    body {
        margin: 0;
        background: linear-gradient(135deg, #e0f2fe, #f8fafc) !important;
    }

    .auth-container {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        padding: 20px;
        font-family: 'Segoe UI', sans-serif;
    }

    /* TARJETA */
    .auth-card {
        width: 100%;
        max-width: 460px;
        background: #ffffff;
        padding: 40px;
        border-radius: 24px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        border: 1px solid #dbeafe;
    }

    /* TITULO */
    .auth-title {
        text-align: center;
        font-size: 2.2rem;
        font-weight: 800;
        color: #0f172a !important;
        margin-bottom: 10px;
    }

    .auth-subtitle {
        text-align: center;
        color: #475569 !important;
        margin-bottom: 35px;
        font-size: 1rem;
    }

    /* INPUTS */
    .form-group {
        margin-bottom: 22px;
    }

    .form-label {
        display: block;
        margin-bottom: 8px;
        color: #334155 !important;
        font-weight: 700;
        font-size: 0.85rem;
        letter-spacing: 1px;
    }

    .form-input {
        width: 100%;
        padding: 15px;
        border-radius: 14px;
        border: 2px solid #cbd5e1 !important;
        background: #f8fafc !important;
        color: #111827 !important;
        font-size: 1rem;
        outline: none;
        transition: 0.3s ease;
        box-sizing: border-box;
    }

    .form-input::placeholder {
        color: #64748b !important;
    }

    .form-input:focus {
        border-color: #06b6d4 !important;
        background: #ffffff !important;
        box-shadow: 0 0 0 4px rgba(6,182,212,0.15);
    }

    /* AUTOFILL */
    input:-webkit-autofill {
        -webkit-box-shadow: 0 0 0 1000px #f8fafc inset !important;
        -webkit-text-fill-color: #111827 !important;
    }

    /* BOTON */
    .btn-submit {
        width: 100%;
        padding: 15px;
        border: none;
        border-radius: 14px;
        background: linear-gradient(135deg, #06b6d4, #3b82f6) !important;
        color: #ffffff !important;
        font-size: 1rem;
        font-weight: 700;
        cursor: pointer;
        transition: 0.3s ease;
        margin-top: 10px;
    }

    .btn-submit:hover {
        transform: translateY(-2px);
        background: linear-gradient(135deg, #0891b2, #2563eb) !important;
        box-shadow: 0 10px 20px rgba(59,130,246,0.25);
    }

    /* LINK */
    .auth-link {
        display: block;
        text-align: center;
        margin-top: 22px;
        color: #475569 !important;
        text-decoration: none;
        font-size: 0.95rem;
    }

    .auth-link span {
        color: #06b6d4 !important;
        font-weight: 700;
    }

    .auth-link:hover span {
        text-decoration: underline;
    }

    /* ERROR */
    .error-box {
        background: #fee2e2;
        color: #dc2626;
        border: 1px solid #fecaca;
        padding: 12px;
        border-radius: 12px;
        margin-bottom: 20px;
        font-size: 0.85rem;
    }
</style>

<div class="auth-container">
    <div class="auth-card">
        
        <h2 class="auth-title">Crear Cuenta</h2>
        <p class="auth-subtitle">Regístrate para comenzar</p>
        
        <form method="POST" action="{{ route('register') }}">
            @csrf

            @if($errors->any())
                <div style="background:#fff5f5; border:1px solid #feb2b2; color:#c53030; font-size:0.8rem; padding:12px; border-radius:10px; margin-bottom:20px;">
                    {{ $errors->first() }}
                </div>
            @endif

            <div class="form-group">
                <label class="form-label">Nombre completo</label>
                <input type="text" name="name" value="{{ old('name') }}" required autofocus class="form-input" placeholder="Tu nombre">
            </div>

            <div class="form-group">
                <label class="form-label">Correo electrónico</label>
                <input type="email" name="email" value="{{ old('email') }}" required class="form-input" placeholder="correo@ejemplo.com">
            </div>

            <div class="form-group">
                <label class="form-label">Contraseña</label>
                <input type="password" name="password" required class="form-input" placeholder="••••••••">
            </div>

            <div class="form-group">
                <label class="form-label">Confirmar Contraseña</label>
                <input type="password" name="password_confirmation" required class="form-input" placeholder="••••••••">
            </div>

            <button type="submit" class="btn-submit">
                REGISTRARSE
            </button>

            <a href="{{ url('/login') }}" class="auth-link">
                ¿Ya tienes cuenta? <span>Inicia sesión</span>
            </a>
        </form>
    </div>
</div>
@endsection