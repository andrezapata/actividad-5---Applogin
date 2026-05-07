<x-app-layout>

    <style>
        body {
            background: #f1f5f9 !important;
        }

        .dashboard-wrapper {
            padding: 40px 20px;
            max-width: 1100px;
            margin: auto;
            font-family: 'Segoe UI', sans-serif;
        }

        .card-pro {
            background: #ffffff;
            border: 1px solid #dbeafe;
            border-radius: 18px;
            transition: 0.3s ease;
            box-shadow: 0 10px 25px rgba(0,0,0,0.05);
        }

        .card-pro:hover {
            transform: translateY(-3px);
            border-color: #60a5fa;
        }

        .action-btn {
            background: #eff6ff;
            border: 1px solid #bfdbfe;
            color: #1e3a8a;
            padding: 12px;
            border-radius: 10px;
            font-size: 0.85rem;
            cursor: pointer;
            transition: 0.3s ease;
            width: 100%;
            text-align: left;
            font-weight: 600;
        }

        .action-btn:hover {
            background: #dbeafe;
        }

        .logout-btn {
            background: #ef4444;
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 10px;
            font-weight: 700;
            cursor: pointer;
            transition: 0.3s ease;
        }

        .logout-btn:hover {
            background: #dc2626;
        }

        .google-btn {
            width: 100%;
            background: #ffffff;
            border: 2px solid #dbeafe;
            padding: 14px;
            border-radius: 12px;
            font-weight: 700;
            color: #334155;
            cursor: pointer;
            transition: 0.3s ease;
            margin-top: 15px;
        }

        .google-btn:hover {
            background: #eff6ff;
            border-color: #60a5fa;
        }
    </style>

    <x-slot name="header">
        <h2 style="font-size:1.3rem; font-weight:800; color:#2563eb;">
            Dashboard Principal
        </h2>
    </x-slot>

    <div class="dashboard-wrapper">

        <!-- BIENVENIDA -->
        <div class="card-pro" style="padding:40px; margin-bottom:30px; position:relative; overflow:hidden;">
            <div style="position:absolute; top:-40px; right:-40px; width:180px; height:180px; background:rgba(59,130,246,0.08); border-radius:50%;"></div>

            <h3 style="font-size:2rem; font-weight:800; color:#0f172a; margin-bottom:10px;">
                Hola, <span style="color:#2563eb;">{{ Auth::user()->name }}</span> 👋
            </h3>

            <p style="color:#64748b; max-width:600px; line-height:1.7;">
                Bienvenido a tu panel de control. Aquí puedes gestionar tu cuenta, revisar accesos y volver a iniciar sesión con Google cuando quieras.
            </p>
        </div>

        <!-- INFO -->
        <div style="display:grid; grid-template-columns:repeat(auto-fit,minmax(280px,1fr)); gap:20px; margin-bottom:30px;">

            <div class="card-pro" style="padding:25px;">
                <div style="font-size:0.75rem; color:#64748b; font-weight:700; margin-bottom:10px;">
                    ID DE USUARIO
                </div>

                <div style="font-size:1.1rem; font-weight:700; color:#0f172a;">
                    #{{ Auth::user()->id }}
                </div>
            </div>

            <div class="card-pro" style="padding:25px;">
                <div style="font-size:0.75rem; color:#64748b; font-weight:700; margin-bottom:10px;">
                    CORREO ELECTRÓNICO
                </div>

                <div style="font-size:1rem; font-weight:700; color:#0f172a; word-break:break-all;">
                    {{ Auth::user()->email }}
                </div>
            </div>

            <div class="card-pro" style="padding:25px;">
                <div style="font-size:0.75rem; color:#64748b; font-weight:700; margin-bottom:10px;">
                    ÚLTIMO ACCESO
                </div>

                <div style="font-size:1rem; font-weight:700; color:#0f172a;">
                    {{ now()->format('d/m/Y') }}
                </div>
            </div>

        </div>

        <!-- ACTIVIDAD -->
        <div style="display:grid; grid-template-columns:2fr 1fr; gap:20px;">

            <div class="card-pro" style="padding:25px;">

                <h4 style="font-size:1rem; color:#0f172a; margin-bottom:20px; font-weight:800;">
                    🛡️ Actividad reciente
                </h4>

                <div style="display:flex; flex-direction:column; gap:15px;">

                    <div style="background:#f8fafc; border:1px solid #dbeafe; padding:15px; border-radius:12px; display:flex; justify-content:space-between; align-items:center;">

                        <div style="display:flex; align-items:center; gap:12px;">

                            <div style="width:45px; height:45px; background:#eff6ff; border-radius:10px; display:flex; align-items:center; justify-content:center; font-size:1.2rem;">
                                🌐
                            </div>

                            <div>
                                <div style="font-weight:700; color:#0f172a;">
                                    Inicio con Google
                                </div>

                                <div style="font-size:0.8rem; color:#64748b;">
                                    Cuenta sincronizada correctamente
                                </div>
                            </div>

                        </div>

                        <span style="background:#dcfce7; color:#15803d; padding:6px 10px; border-radius:999px; font-size:0.7rem; font-weight:700;">
                            ACTIVO
                        </span>

                    </div>

                </div>

            </div>

            <!-- ACCIONES -->
            <div class="card-pro" style="padding:25px;">

                <h4 style="font-size:1rem; color:#0f172a; margin-bottom:20px; font-weight:800;">
                    Acciones rápidas
                </h4>

                <div style="display:flex; flex-direction:column; gap:12px;">

                    <button class="action-btn">
                        ⚙️ Editar Perfil
                    </button>

                    <button class="action-btn">
                        🔒 Seguridad
                    </button>

                    <!-- BOTON GOOGLE -->
                    <a href="{{ route('google.redirect') }}">
                        <button class="google-btn">
                            🔑 Elegir otra cuenta Google
                        </button>
                    </a>

                    <!-- LOGOUT -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <button type="submit" class="logout-btn" style="width:100%; margin-top:10px;">
                            Cerrar sesión
                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>