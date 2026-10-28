<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'RIVOLT Athletic Club')</title>

    <style>
        :root {
            --bg: #0B0D10;
            --surface: #191C20;
            --card: #22262B;
            --accent: #C7F36B;
            --text: #F5F6F1;
            --muted: #9CA3AF;
            --border: #343A40;
        }

        * { box-sizing: border-box; }

        body {
            margin: 0;
            background: var(--bg);
            color: var(--text);
            font-family: Arial, sans-serif;
            line-height: 1.6;
        }

        a { color: var(--accent); }

        .topbar {
            padding: 20px 6%;
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
        }

        .brand {
            color: var(--text);
            font-weight: 900;
            font-size: 24px;
            text-decoration: none;
            letter-spacing: 2px;
        }

        .brand span {
            display: block;
            color: var(--accent);
            font-size: 10px;
            letter-spacing: 3px;
        }

        nav {
            display: flex;
            gap: 18px;
            flex-wrap: wrap;
        }

        nav a {
            text-decoration: none;
            font-size: 14px;
        }

        .container {
            max-width: 1100px;
            margin: 0 auto;
            padding: 36px 20px 70px;
        }

        .eyebrow {
            color: var(--accent);
            font-size: 12px;
            font-weight: bold;
            letter-spacing: 3px;
        }

        h1 { font-size: clamp(32px, 5vw, 52px); line-height: 1.1; }
        h2 { margin-top: 0; }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(230px, 1fr));
            gap: 18px;
        }

        .card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 14px;
            padding: 22px;
            margin-bottom: 18px;
        }

        .price {
            color: var(--accent);
            font-size: 26px;
            font-weight: bold;
        }

        .muted { color: var(--muted); }

        .btn {
            display: inline-block;
            padding: 10px 16px;
            border: 0;
            border-radius: 7px;
            background: var(--accent);
            color: var(--bg);
            font-weight: bold;
            cursor: pointer;
            text-decoration: none;
        }

        .btn-secondary {
            background: var(--card);
            color: var(--text);
            border: 1px solid var(--border);
        }

        input, select, textarea {
            width: 100%;
            margin: 6px 0 14px;
            padding: 11px;
            border-radius: 7px;
            border: 1px solid var(--border);
            background: var(--bg);
            color: var(--text);
        }

        label { font-size: 13px; color: var(--muted); }

        .alert {
            padding: 14px;
            border: 1px solid var(--accent);
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .error { color: #ff8c8c; font-size: 13px; }
        .status { color: var(--accent); font-weight: bold; }
        .actions { display: flex; gap: 10px; flex-wrap: wrap; }

        @media (max-width: 600px) {
            .topbar { align-items: flex-start; flex-direction: column; }
        }
    </style>
</head>

<body>
    <header class="topbar">
        
@auth
    <form method="POST" action="{{ route('logout') }}">
        @csrf

        <button
            type="submit"
            style="
                background: #C7F36B;
                color: #0B0D10;
                padding: 10px 18px;
                border: none;
                border-radius: 6px;
                font-weight: bold;
                cursor: pointer;
            "
        >
            Logout
        </button>
    </form>
@endauth

        <a class="brand" href="/">
            RIVOLT
            <span>ATHLETIC CLUB</span>
        </a>

        <nav>
            @auth
                @if(auth()->user()->role === 'admin')
                    <a href="{{ route('admin.applications.index') }}">
                        Pengajuan
                    </a>
                    <a href="{{ route('admin.payments.index') }}">
                        Pembayaran
                    </a>
                @else
                    <a href="{{ route('member.applications.index') }}">
                        Membership Saya
                    </a>
                @endif
            @endauth
        </nav>
    </header>

    <main class="container">
        @if(session('success'))
            <div class="alert">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert">
                <strong>Periksa kembali data yang dikirim:</strong>
                <ul>
                    @foreach($errors->all() as $error)
                        <li class="error">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')
    </main>
</body>
</html>