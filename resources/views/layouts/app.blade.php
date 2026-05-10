<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YOUTHEAL.ID - Platform Anti Bullying & Kesehatan Mental</title>
    <meta name="description" content="Platform aman dan anonim untuk melaporkan perundungan dan mendapatkan dukungan kesehatan mental bagi siswa.">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,400&display=swap" rel="stylesheet">
    <style>
        /* ═══════════════════════════════════════════
           DESIGN SYSTEM — SAFESPACE HIGH-TECH
        ═══════════════════════════════════════════ */
        :root {
            --bg: #fdfdfd;
            --bg-card: rgba(255, 255, 255, 0.85);
            --bg-card-solid: #ffffff;
            --bg-elevated: #f9fafb;
            --primary: #D32F2F;
            --primary-light: #E11D48;
            --primary-glow: rgba(211, 47, 47, 0.25);
            --secondary: #C62828;
            --secondary-glow: rgba(198, 40, 40, 0.15);
            --accent-green: #059669;
            --accent-cyan: #0284c7;
            --text: #111827;
            --text-muted: #4b5563;
            --text-dim: #9ca3af;
            --border: rgba(0, 0, 0, 0.08);
            --border-hover: rgba(211, 47, 47, 0.3);
            --danger: #ef4444;
            --success: #10b981;
            --warning: #f59e0b;
            --radius: 16px;
            --radius-sm: 10px;
            --radius-lg: 24px;
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        html { scroll-behavior: smooth; }

        body {
            font-family: 'Poppins', system-ui, sans-serif;
            background: var(--bg);
            color: var(--text);
            min-height: 100vh;
            line-height: 1.6;
            -webkit-font-smoothing: antialiased;
            overflow-x: hidden;
        }

        /* Scrollbar */
        ::-webkit-scrollbar { width: 5px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: var(--primary); border-radius: 10px; }

        a { color: inherit; text-decoration: none; transition: var(--transition); }

        /* ═══ ANIMATED BACKGROUND ═══ */
        /* Orbs removed to keep styling flat and developer-made */

        /* Grid pattern overlay */
        .bg-grid {
            position: fixed;
            top: 0; left: 0;
            width: 100vw; height: 100vh;
            pointer-events: none;
            z-index: 0;
            background-image:
                linear-gradient(rgba(0,0,0,0.03) 1px, transparent 1px),
                linear-gradient(90deg, rgba(0,0,0,0.03) 1px, transparent 1px);
            background-size: 60px 60px;
            mask-image: radial-gradient(ellipse 80% 50% at 50% 0%, rgba(0,0,0,1) 70%, rgba(0,0,0,0) 100%);
            -webkit-mask-image: radial-gradient(ellipse 80% 50% at 50% 0%, rgba(0,0,0,1) 70%, rgba(0,0,0,0) 100%);
        }

        /* ═══ FLOATING PARTICLES (CSS-only) ═══ */
        .particles {
            position: fixed;
            top: 0; left: 0;
            width: 100%; height: 100%;
            pointer-events: none;
            z-index: 0;
            overflow: hidden;
        }

        .particle {
            position: absolute;
            border-radius: 50%;
            animation: particleFloat linear infinite;
            opacity: 0;
        }

        @keyframes particleFloat {
            0% { opacity: 0; transform: translateY(100vh) scale(0); }
            10% { opacity: 1; }
            90% { opacity: 1; }
            100% { opacity: 0; transform: translateY(-10vh) scale(1); }
        }

        /* ═══ NAVBAR ═══ */
        .navbar {
            position: sticky;
            top: 0;
            z-index: 999;
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }

        .nav-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1.5rem;
            height: 68px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 0.6rem;
            font-size: 1.2rem;
            font-weight: 800;
            letter-spacing: -0.03em;
        }

        .logo-icon {
            width: 32px; height: 32px;
            border-radius: 6px;
            display: flex; align-items: center; justify-content: center;
        }
        .logo-icon svg { width: 100%; height: 100%; stroke: var(--primary); }

        .logo-text span { color: var(--primary-light); }

        .nav-links { display: flex; align-items: center; gap: 0.25rem; }

        .nav-link {
            padding: 0.5rem 1rem;
            border-radius: 8px;
            font-size: 0.875rem;
            font-weight: 600;
            color: var(--text-muted);
            transition: var(--transition);
            position: relative;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            bottom: 4px;
            left: 50%;
            width: 0;
            height: 2px;
            background: var(--primary);
            border-radius: 1px;
            transition: all 0.3s;
            transform: translateX(-50%);
        }

        .nav-link:hover { color: var(--text); }
        .nav-link:hover::after { width: 20px; }
        .nav-link.active { color: var(--primary-light); }
        .nav-link.active::after { width: 20px; background: var(--primary-light); }

        .nav-cta {
            padding: 0.5rem 1.25rem;
            border-radius: var(--radius-sm);
            font-size: 0.85rem;
            font-weight: 700;
            color: white;
            background: var(--primary);
            transition: var(--transition);
            border: 1px solid transparent;
            cursor: pointer;
        }

        .nav-cta:hover {
            background: transparent;
            border-color: var(--primary);
            color: var(--primary);
        }

        /* Mobile menu toggle */
        .nav-toggle {
            display: none;
            background: none;
            border: none;
            cursor: pointer;
            padding: 0.5rem;
        }

        .nav-toggle span {
            display: block;
            width: 22px;
            height: 2px;
            background: var(--text);
            margin: 5px 0;
            transition: var(--transition);
            border-radius: 1px;
        }

        /* ═══ PAGE WRAPPER ═══ */
        .page-wrapper {
            max-width: 1200px;
            margin: 0 auto;
            padding: 3rem 1.5rem 5rem;
            position: relative;
            z-index: 1;
        }

        /* ═══ FLASH MESSAGES ═══ */
        .flash-success {
            background: rgba(34,211,165,0.08);
            border: 1px solid rgba(34,211,165,0.25);
            color: var(--accent-green);
            padding: 1rem 1.25rem;
            border-radius: var(--radius-sm);
            margin-bottom: 2rem;
            font-weight: 600;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            animation: slideDown 0.5s cubic-bezier(0.4, 0, 0.2, 1) both;
        }

        .flash-error {
            background: rgba(244,63,94,0.08);
            border: 1px solid rgba(244,63,94,0.25);
            color: var(--danger);
            padding: 1rem 1.25rem;
            border-radius: var(--radius-sm);
            margin-bottom: 2rem;
            font-weight: 600;
            font-size: 0.9rem;
            animation: slideDown 0.5s cubic-bezier(0.4, 0, 0.2, 1) both;
        }

        @keyframes slideDown {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* ═══ GLASSMORPHISM CARDS ═══ */
        .card {
            background: var(--bg-card);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 2rem;
            transition: var(--transition);
            position: relative;
            overflow: hidden;
        }

        .card::before {
            content: '';
            position: absolute;
            inset: 0;
            border-radius: inherit;
            border: 2px solid transparent;
            background: linear-gradient(135deg, rgba(0,0,0,0.03), rgba(0,0,0,0.01)) border-box;
            -webkit-mask: linear-gradient(#fff 0 0) padding-box, linear-gradient(#fff 0 0);
            -webkit-mask-composite: destination-out;
            mask-composite: exclude;
            opacity: 1;
            pointer-events: none;
        }

        .card:hover { border-color: rgba(0,0,0,0.1); transform: translateY(-2px); box-shadow: 0 4px 20px rgba(0,0,0,0.08); }

        /* ═══ TYPOGRAPHY ═══ */
        h1 {
            font-size: clamp(2.2rem, 5vw, 3.75rem);
            font-weight: 800;
            letter-spacing: -0.04em;
            line-height: 1.1;
            color: var(--text);
        }

        h2 { font-size: 1.8rem; font-weight: 700; color: var(--text); letter-spacing: -0.03em; margin-bottom: 0.75rem; }
        h3 { font-size: 1.2rem; font-weight: 700; color: var(--text); margin-bottom: 0.5rem; }
        h4 { font-size: 1rem; font-weight: 700; color: var(--text); margin-bottom: 0.35rem; }

        .text-muted { color: var(--text-muted); }
        .text-primary { color: var(--primary-light); }
        .text-gradient {
            background: linear-gradient(135deg, var(--primary-light), var(--secondary), var(--accent-cyan));
            background-size: 200% 200%;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: gradientShift 4s ease-in-out infinite;
        }

        @keyframes gradientShift {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }

        /* ═══ BUTTONS ═══ */
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            padding: 0.75rem 1.75rem;
            border-radius: var(--radius-sm);
            font-size: 0.9rem;
            font-weight: 700;
            font-family: inherit;
            cursor: pointer;
            border: none;
            transition: var(--transition);
            text-decoration: none;
            position: relative;
            overflow: hidden;
        }

        .btn::after {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(255,255,255,0.2), transparent);
            opacity: 0;
            transition: opacity 0.3s;
        }

        .btn:hover::after { opacity: 1; }

        .btn-primary {
            background: var(--primary);
            color: white;
            border: 1px solid transparent;
        }

        .btn-primary:hover {
            background: transparent;
            border-color: var(--primary);
            color: var(--primary);
            transform: translateY(-2px);
        }

        .btn-secondary {
            background: rgba(0,0,0,0.03);
            color: var(--text);
            border: 1px solid var(--border);
            backdrop-filter: blur(8px);
        }

        .btn-secondary:hover {
            background: rgba(0,0,0,0.06);
            border-color: rgba(0,0,0,0.15);
            transform: translateY(-2px);
        }

        .btn-danger {
            background: rgba(244,63,94,0.12);
            color: var(--danger);
            border: 1px solid rgba(244,63,94,0.25);
        }

        .btn-danger:hover { background: rgba(244,63,94,0.2); }

        .btn-lg { padding: 1rem 2.5rem; font-size: 1rem; border-radius: 12px; }
        .btn-full { width: 100%; }

        /* ═══ FORMS ═══ */
        .form-group { margin-bottom: 1.5rem; }

        .form-label {
            display: block;
            font-size: 0.78rem;
            font-weight: 700;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.08em;
            margin-bottom: 0.6rem;
        }

        .form-input, .form-textarea, .form-select {
            width: 100%;
            background: rgba(255, 255, 255, 0.9);
            border: 1px solid var(--border);
            border-radius: var(--radius-sm);
            padding: 0.85rem 1rem;
            font-size: 0.95rem;
            font-family: inherit;
            color: var(--text);
            transition: var(--transition);
            appearance: none;
        }

        .form-input::placeholder, .form-textarea::placeholder { color: var(--text-dim); }

        .form-input:focus, .form-textarea:focus, .form-select:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px var(--primary-glow), 0 0 20px rgba(238,45,36,0.1);
            background: rgba(238,45,36,0.04);
        }

        .form-select {
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 24 24' fill='%237e7ea0'%3E%3Cpath d='M7 10l5 5 5-5z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 1rem center;
            padding-right: 2.5rem;
            cursor: pointer;
        }

        .form-select option { background: var(--bg-elevated); color: var(--text); }

        /* ═══ BADGES / STATUS ═══ */
        .badge {
            display: inline-flex;
            align-items: center;
            padding: 0.3rem 0.85rem;
            border-radius: 99px;
            font-size: 0.68rem;
            font-weight: 800;
            letter-spacing: 0.08em;
            text-transform: uppercase;
        }

        .badge-red { background: rgba(237,28,36,0.12); color: var(--primary-light); border: 1px solid rgba(237,28,36,0.25); }
        .badge-maroon   { background: rgba(182,37,42,0.12); color: var(--secondary); border: 1px solid rgba(182,37,42,0.25); }
        .badge-green  { background: rgba(34,211,165,0.12); color: var(--accent-green); border: 1px solid rgba(34,211,165,0.25); }
        .badge-yellow { background: rgba(245,158,11,0.12); color: var(--warning); border: 1px solid rgba(245,158,11,0.25); }

        .status-Pending   { background: rgba(245,158,11,0.12); color: var(--warning); border: 1px solid rgba(245,158,11,0.25); padding: 0.3rem 0.8rem; border-radius: 99px; font-size: 0.75rem; font-weight: 700; }
        .status-Ditanggapi { background: rgba(34,211,165,0.12); color: var(--accent-green); border: 1px solid rgba(34,211,165,0.25); padding: 0.3rem 0.8rem; border-radius: 99px; font-size: 0.75rem; font-weight: 700; }

        /* ═══ ARTICLE GRID ═══ */
        .article-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 1.5rem; }

        .article-card {
            background: var(--bg-card);
            backdrop-filter: blur(12px);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            overflow: hidden;
            transition: var(--transition);
            cursor: pointer;
            position: relative;
        }

        .article-card::before {
            content: '';
            position: absolute;
            top: 0; left: 0;
            width: 100%; height: 3px;
            background: linear-gradient(90deg, var(--primary), var(--secondary));
            opacity: 0;
            transition: opacity 0.3s;
        }

        .article-card:hover::before { opacity: 1; }

        .article-card:hover {
            transform: translateY(-8px);
            border-color: rgba(211,47,47,0.3);
            box-shadow: 0 20px 60px rgba(0,0,0,0.08), 0 0 40px rgba(211,47,47,0.05);
        }

        .article-card-img {
            width: 100%; height: 180px;
            object-fit: cover; display: block;
            transition: transform 0.5s;
        }

        .article-card:hover .article-card-img { transform: scale(1.05); }
        .article-card-body { padding: 1.5rem; }

        /* ═══ DATA TABLE ═══ */
        .data-table { width: 100%; border-collapse: collapse; font-size: 0.875rem; }
        .data-table thead tr { border-bottom: 1px solid var(--border); }
        .data-table th {
            padding: 0.75rem 1rem;
            text-align: left;
            font-size: 0.72rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            color: var(--text-muted);
        }
        .data-table tbody tr {
            border-bottom: 1px solid rgba(0,0,0,0.04);
            transition: var(--transition);
        }
        .data-table tbody tr:hover { background: rgba(237,28,36,0.04); }
        .data-table td { padding: 1rem; vertical-align: middle; }

        /* ═══ FOOTER ═══ */
        footer {
            border-top: 1px solid var(--border);
            padding: 3rem 1.5rem;
            text-align: center;
            color: var(--text-dim);
            font-size: 0.85rem;
            position: relative;
            z-index: 1;
        }

        footer a { color: var(--text-muted); }
        footer a:hover { color: var(--primary-light); }

        /* ═══ ANIMATIONS ═══ */
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-14px); }
        }

        @keyframes pulse-glow {
            0%, 100% { box-shadow: 0 0 10px currentColor; opacity: 0.7; }
            50% { box-shadow: 0 0 25px currentColor; opacity: 1; }
        }

        @keyframes spin-slow {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        @keyframes shimmer {
            0% { background-position: -200% 0; }
            100% { background-position: 200% 0; }
        }

        .animate-fade-up { animation: fadeInUp 0.7s cubic-bezier(0.4, 0, 0.2, 1) both; }
        .animate-fade-up-d1 { animation: fadeInUp 0.7s cubic-bezier(0.4, 0, 0.2, 1) 0.1s both; }
        .animate-fade-up-d2 { animation: fadeInUp 0.7s cubic-bezier(0.4, 0, 0.2, 1) 0.2s both; }
        .animate-fade-up-d3 { animation: fadeInUp 0.7s cubic-bezier(0.4, 0, 0.2, 1) 0.3s both; }
        .animate-fade-up-d4 { animation: fadeInUp 0.7s cubic-bezier(0.4, 0, 0.2, 1) 0.4s both; }
        .animate-fade { animation: fadeIn 0.5s ease both; }
        .animate-float { animation: float 5s ease-in-out infinite; }

        /* Scroll reveal */
        .reveal {
            opacity: 0;
            transform: translateY(40px);
            transition: all 0.8s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .reveal.visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* Utility */
        .divider { border: none; border-top: 1px solid var(--border); margin: 2rem 0; }

        /* ═══ CURSOR GLOW (desktop) ═══ */
        .cursor-glow {
            position: fixed;
            width: 400px; height: 400px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(237,28,36,0.06), transparent 70%);
            pointer-events: none;
            z-index: 0;
            transform: translate(-50%, -50%);
            transition: left 0.6s ease, top 0.6s ease;
        }

        /* ═══ SOS BUTTON (INNOVATION) ═══ */
        .sos-btn {
            position: fixed;
            bottom: 30px;
            right: 30px;
            z-index: 9999;
            background: rgba(244,63,94,0.15);
            border: 2px solid var(--danger);
            color: var(--danger);
            border-radius: 50px;
            padding: 0.8rem 1.5rem;
            font-family: inherit;
            font-weight: 800;
            font-size: 1rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            cursor: pointer;
            box-shadow: 0 0 20px rgba(244,63,94,0.4);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            overflow: hidden;
            animation: sosPulse 2s infinite;
        }

        .sos-btn::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, var(--danger), #be123c);
            opacity: 0;
            transition: opacity 0.3s;
            z-index: -1;
        }

        .sos-btn:hover {
            transform: translateY(-5px) scale(1.05);
            color: white;
            box-shadow: 0 10px 30px rgba(244,63,94,0.6);
            border-color: transparent;
        }

        .sos-btn:hover::before { opacity: 1; }

        @keyframes sosPulse {
            0% { box-shadow: 0 0 0 0 rgba(244,63,94,0.6); }
            70% { box-shadow: 0 0 0 20px rgba(244,63,94,0); }
            100% { box-shadow: 0 0 0 0 rgba(244,63,94,0); }
        }

        /* ═══ RESPONSIVE ═══ */
        @media (max-width: 768px) {
            .nav-toggle { display: block; }
            .nav-links {
                position: fixed;
                top: 68px; left: 0; right: 0;
                background: rgba(255,255,255,0.98);
                backdrop-filter: blur(20px);
                flex-direction: column;
                padding: 1.5rem;
                gap: 0.5rem;
                border-bottom: 1px solid var(--border);
                transform: translateY(-120%);
                transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            }
            .nav-links.open { transform: translateY(0); }
            .nav-link, .nav-cta { width: 100%; text-align: center; padding: 0.75rem; }
            .page-wrapper { padding: 2rem 1rem 3rem; }

            .sos-btn { 
                bottom: 20px; right: 20px; 
                padding: 0.8rem; border-radius: 50%;
            }
            .sos-btn .sos-text { display: none; }
        }
    </style>
</head>
<body>

<!-- Animated Background -->
<div class="bg-mesh">
    <div class="orb orb-1"></div>
    <div class="orb orb-2"></div>
    <div class="orb orb-3"></div>
</div>
<div class="bg-grid"></div>

<!-- CSS-only floating particles -->
<div class="particles" id="particles"></div>

<!-- Cursor Glow -->
<div class="cursor-glow" id="cursorGlow"></div>

<!-- Navbar -->
<nav class="navbar">
    <div class="nav-content">
        <a href="{{ route('home') }}" class="logo">
            <img src="{{ asset('images/youthheal_done-removebg-preview.png') }}" alt="Youtheal Logo" style="height: 44px; width: auto; max-width: 180px; object-fit: contain;">
        </a>

        <button class="nav-toggle" onclick="document.querySelector('.nav-links').classList.toggle('open')" aria-label="Menu">
            <span></span><span></span><span></span>
        </button>

        <div class="nav-links">
            <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Beranda</a>
            <a href="{{ route('report.create') }}" class="nav-link {{ request()->routeIs('report.create') ? 'active' : '' }}">Lapor</a>
            <a href="{{ route('track.index') }}" class="nav-link {{ request()->routeIs('track.index') ? 'active' : '' }}">Lacak</a>
            @auth
                <a href="{{ route('admin.index') }}" class="nav-cta">⚙️ Admin</a>
            @else
                <a href="{{ route('login') }}" class="nav-cta">Staff Login</a>
            @endauth
        </div>
    </div>
</nav>

<!-- Main Content -->
<main class="page-wrapper">
    @if(session('success'))
        <div class="flash-success">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div class="flash-error">⚠️ {{ session('error') }}</div>
    @endif

    @yield('content')
</main>

<!-- Floating SOS Button -->
<button class="sos-btn" id="sosButton" onclick="window.location.replace('https://classroom.google.com')" title="Keadaan Darurat? Klik 1x atau tekan ESC 3x untuk Keluar Cepat">
    <span class="sos-icon" style="font-size:1.2rem;">⚡</span>
    <span class="sos-text">QUICK EXIT</span>
</button>

<!-- Footer -->
<footer>
    <div style="max-width:1200px; margin:0 auto;">
        <div style="display:flex; align-items:center; justify-content:center; gap:0.6rem; margin-bottom:1rem;">
            <div class="logo-icon" style="width:28px;height:28px;font-size:0.8rem;">🛡️</div>
            <span style="font-weight:800; color:var(--text-muted); letter-spacing: 1px;">YOUTHEAL.ID</span>
        </div>
        <p>Platform anti-perundungan anonim untuk lingkungan sekolah yang lebih sehat dan aman.</p>
        <p style="margin-top:0.5rem;">© 2026 YOUTHEAL.ID. Semua laporan dilindungi sepenuhnya.</p>
    </div>
</footer>

<!-- Global JS -->
<script>
// Cursor glow follow
const cursorGlow = document.getElementById('cursorGlow');
if (window.innerWidth > 768) {
    document.addEventListener('mousemove', (e) => {
        cursorGlow.style.left = e.clientX + 'px';
        cursorGlow.style.top = e.clientY + 'px';
    });
}

// Generate floating particles
(function () {
    const container = document.getElementById('particles');
    const colors = ['#ed1c24', '#b6252a', '#22d3a5', '#06b6d4', '#d946ef', '#3b82f6'];
    for (let i = 0; i < 20; i++) {
        const p = document.createElement('div');
        p.className = 'particle';
        const size = Math.random() * 4 + 2;
        p.style.cssText = `
            width: ${size}px;
            height: ${size}px;
            left: ${Math.random() * 100}%;
            background: ${colors[Math.floor(Math.random() * colors.length)]};
            animation-duration: ${Math.random() * 15 + 10}s;
            animation-delay: ${Math.random() * 10}s;
        `;
        container.appendChild(p);
    }
})();

// Scroll reveal
const revealElements = document.querySelectorAll('.reveal');
const revealObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('visible');
        }
    });
}, { threshold: 0.1, rootMargin: '0px 0px -50px 0px' });

document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.reveal').forEach(el => revealObserver.observe(el));
});

// Navbar scroll effect
let lastScroll = 0;
window.addEventListener('scroll', () => {
    const navbar = document.querySelector('.navbar');
    const current = window.scrollY;
    if (current > 50) {
        navbar.style.background = 'rgba(255, 255, 255, 0.95)';
        navbar.style.borderBottom = '1px solid rgba(211, 47, 47, 0.2)';
        navbar.style.boxShadow = '0 4px 20px rgba(0,0,0,0.05)';
    } else {
        navbar.style.background = 'rgba(255, 255, 255, 0.9)';
        navbar.style.borderBottom = '1px solid rgba(0, 0, 0, 0.05)';
        navbar.style.boxShadow = 'none';
    }
    lastScroll = current;
});

// SOS Panic Feature (ESC 3x to Exit instantly)
let escCount = 0;
let escTimer = null;
document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') {
        escCount++;
        clearTimeout(escTimer);
        
        if (escCount >= 3) {
            window.location.replace("https://classroom.google.com");
        } else {
            escTimer = setTimeout(() => { escCount = 0; }, 1000);
        }
    }
});
</script>

</body>
</html>
