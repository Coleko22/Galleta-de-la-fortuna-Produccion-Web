<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('titulo', 'Galleta de la Fortuna')</title>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif:ital,wght@0,400;0,700;1,400&family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #d4edaa;
            font-family: 'Nunito', sans-serif;
        }

        .card {
            background: linear-gradient(160deg, #c8e6a0 0%, #a8d470 40%, #7eba3c 100%);
            border-radius: 16px;
            padding: 2.5rem 2rem;
            text-align: center;
            width: 380px;
            box-shadow: 0 8px 32px rgba(60, 120, 0, 0.18);
            position: relative;
        }

        .cookie {
            font-size: 72px;
            display: block;
            margin-bottom: 1rem;
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-8px); }
        }

        h1 {
            font-family: 'Noto Serif', serif;
            font-size: 20px;
            color: #1e4d00;
            margin-bottom: 0.3rem;
        }

        .sub { font-size: 13px; color: #3a7010; margin-bottom: 1.5rem; }

        .input-group { margin-bottom: 10px; text-align: left; }
        .input-group label {
            font-size: 12px; font-weight: 600; color: #2d5e00;
            display: block; margin-bottom: 4px;
        }
        .input-group input {
            width: 100%;
            background: rgba(255, 255, 255, 0.6);
            border: 1px solid rgba(255, 255, 255, 0.8);
            border-radius: 8px;
            padding: 10px 12px;
            font-size: 14px;
            color: #1e4d00;
            font-family: 'Nunito', sans-serif;
            outline: none;
            transition: border 0.15s, background 0.15s;
        }
        .input-group input:focus {
            background: rgba(255, 255, 255, 0.85);
            border-color: #1a7fd4;
        }

        .btn {
            display: block; width: 100%;
            background: #1a7fd4; color: #fff;
            border: none; border-radius: 8px;
            padding: 12px; font-size: 14px; font-weight: 700;
            letter-spacing: 1.5px; text-transform: uppercase;
            cursor: pointer; margin-top: 1rem;
            transition: background 0.18s, transform 0.12s;
            text-decoration: none; font-family: 'Nunito', sans-serif;
        }
        .btn:hover { background: #1565b0; transform: translateY(-2px); }

        .btn-outline {
            display: inline-block;
            background: rgba(255, 255, 255, 0.4);
            color: #1e4d00;
            border: 1px solid rgba(255, 255, 255, 0.7);
            border-radius: 8px;
            padding: 10px 16px;
            font-size: 13px; font-weight: 700;
            cursor: pointer; text-decoration: none;
            transition: background 0.15s;
        }
        .btn-outline:hover { background: rgba(255, 255, 255, 0.65); }

        .link { font-size: 12px; color: #1e4d00; margin-top: 1rem; display: block; }
        .link a { color: #1e4d00; font-weight: 700; }

        .error {
            background: rgba(255, 80, 80, 0.15);
            border: 1px solid rgba(255, 80, 80, 0.3);
            border-radius: 6px; padding: 8px 12px;
            font-size: 13px; color: #8b0000; margin-bottom: 12px;
        }
        .exito {
            background: rgba(50, 180, 50, 0.15);
            border: 1px solid rgba(50, 180, 50, 0.3);
            border-radius: 6px; padding: 8px 12px;
            font-size: 13px; color: #1e4d00; margin-bottom: 12px;
        }

        .mensaje-box {
            background: rgba(255, 255, 255, 0.55);
            border-radius: 10px;
            padding: 1.2rem 1rem;
            margin: 1.2rem 0;
            font-family: 'Noto Serif', serif;
            font-style: italic;
            font-size: 16px;
            color: #1e4d00;
            line-height: 1.6;
        }

        .meta { font-size: 12px; color: #2d5e00; margin: 4px 0; }
        .clima {
            background: rgba(255, 255, 255, 0.4);
            border-radius: 8px; padding: 8px 12px;
            font-size: 13px; color: #1e4d00; margin: 10px 0;
        }

        .acciones {
            display: flex; gap: 8px; justify-content: center;
            margin-top: 10px; flex-wrap: wrap;
        }

        .top-user {
            position: absolute; top: 14px; left: 18px;
            font-size: 12px; font-weight: 700; color: #1e4d00;
        }
        .top-logout {
            position: absolute; top: 10px; right: 14px;
            font-size: 12px; font-weight: 700; color: #1e4d00;
            background: none; border: none; cursor: pointer;
            text-decoration: none; font-family: 'Nunito', sans-serif;
        }

        .hist-item {
            background: rgba(255, 255, 255, 0.5);
            border-radius: 8px; padding: 10px 12px;
            margin-bottom: 8px; text-align: left;
        }
        .hist-item .txt {
            font-family: 'Noto Serif', serif; font-style: italic;
            font-size: 14px; color: #1e4d00;
        }
        .hist-item .fecha { font-size: 11px; color: #3a7010; margin-top: 4px; }
        .card-wide { width: 440px; }

        /* --- Panel de administración --- */
        .card-admin {
            width: 760px;
            max-width: 92vw;
            max-height: 90vh;
            overflow-y: auto;
            text-align: left;
        }
        .card-admin h1, .card-admin .sub { text-align: center; }

        .admin-nav {
            display: flex; flex-wrap: wrap; gap: 8px;
            justify-content: center; margin-bottom: 1.2rem;
        }
        .admin-nav a {
            font-size: 12px; font-weight: 700; color: #1e4d00;
            background: rgba(255,255,255,0.5); border-radius: 8px;
            padding: 8px 12px; text-decoration: none;
        }
        .admin-nav a.activo, .admin-nav a:hover { background: rgba(255,255,255,0.85); }

        .stat-grid {
            display: grid; grid-template-columns: repeat(auto-fit, minmax(140px, 1fr));
            gap: 10px; margin-bottom: 1.2rem;
        }
        .stat-box {
            background: rgba(255,255,255,0.55); border-radius: 10px;
            padding: 14px 10px; text-align: center;
        }
        .stat-box .num { font-size: 26px; font-weight: 700; color: #1e4d00; }
        .stat-box .lbl { font-size: 11px; color: #2d5e00; margin-top: 2px; }

        table.admin-table {
            width: 100%; border-collapse: collapse; font-size: 13px; margin-bottom: 1rem;
        }
        table.admin-table th, table.admin-table td {
            padding: 8px 10px; text-align: left;
            border-bottom: 1px solid rgba(30, 77, 0, 0.15);
            color: #1e4d00;
        }
        table.admin-table th { font-size: 11px; text-transform: uppercase; color: #2d5e00; }
        table.admin-table tr:hover td { background: rgba(255,255,255,0.35); }

        .fila-acciones { display: flex; gap: 6px; flex-wrap: wrap; }
        .btn-sm {
            font-size: 12px; padding: 6px 10px; border-radius: 6px;
            border: none; cursor: pointer; text-decoration: none;
            font-weight: 700; font-family: 'Nunito', sans-serif;
        }
        .btn-editar { background: #1a7fd4; color: #fff; }
        .btn-editar:hover { background: #1565b0; }
        .btn-eliminar { background: #d43a3a; color: #fff; }
        .btn-eliminar:hover { background: #a92b2b; }
        .btn-ver { background: rgba(255,255,255,0.6); color: #1e4d00; }
        .btn-ver:hover { background: rgba(255,255,255,0.9); }

        textarea.form-textarea {
            width: 100%; min-height: 100px; resize: vertical;
            background: rgba(255,255,255,0.6);
            border: 1px solid rgba(255,255,255,0.8);
            border-radius: 8px; padding: 10px 12px;
            font-size: 14px; color: #1e4d00; font-family: 'Nunito', sans-serif;
            outline: none;
        }
        textarea.form-textarea:focus { background: rgba(255,255,255,0.85); border-color: #1a7fd4; }

        .badge {
            display: inline-block; font-size: 11px; font-weight: 700;
            padding: 3px 8px; border-radius: 20px;
        }
        .badge-admin { background: #ffd76e; color: #6b4d00; }
        .badge-usuario { background: rgba(255,255,255,0.6); color: #1e4d00; }
    </style>
</head>
<body>
    @yield('contenido')
</body>
</html>
