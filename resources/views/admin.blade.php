@extends('layouts.app')

@section('content')

<style>
    /* Hide default layout elements for Workspace mode */
    .navbar, footer, .sos-btn, .cursor-glow, .bg-mesh, .bg-grid, #particles { display: none !important; }
    
    /* Remove page wrapper constraints for full-screen workspace */
    .page-wrapper {
        max-width: 100% !important;
        padding: 0 !important;
        margin: 0 !important;
    }

    body {
        background: #fdfdfd !important;
        font-family: 'Plus Jakarta Sans', system-ui, sans-serif !important;
        margin: 0; padding: 0;
        overflow: hidden; /* Prevent body scroll, let main-content scroll */
    }

    /* Workspace Layout */
    .workspace {
        display: flex;
        height: 100vh;
        width: 100%;
        max-width: 100vw;
        color: #111827;
        overflow-x: hidden;
    }

    /* Sidebar */
    .sidebar {
        width: 280px;
        background: rgba(255, 255, 255, 0.95);
        border-right: 1px solid rgba(0, 0, 0, 0.08);
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
        display: flex;
        flex-direction: column;
        padding: 2rem 1.5rem;
        flex-shrink: 0;
        z-index: 10;
    }

    .sidebar-logo {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        margin-bottom: 3rem;
        padding: 0 0.5rem;
    }

    .nav-item {
        display: flex;
        align-items: center;
        gap: 0.85rem;
        padding: 0.85rem 1rem;
        border-radius: 8px;
        color: #4b5563;
        text-decoration: none;
        font-weight: 600;
        font-size: 0.95rem;
        transition: all 0.2s ease;
        margin-bottom: 0.5rem;
        border: 1px solid transparent;
    }

    .nav-item:hover {
        color: #111827;
        background: rgba(0, 0, 0, 0.05);
    }

    .nav-item.active {
        color: #D32F2F;
        background: rgba(211, 47, 47, 0.08);
        border: 1px solid rgba(211, 47, 47, 0.2);
    }

    /* Main Content Area */
    .main-area {
        flex: 1;
        min-width: 0; /* Prevents flex item from expanding past viewport */
        overflow-y: auto;
        padding: 2.5rem 3.5rem;
        background: #f9fafb;
    }

    /* Content Sections */
    .content-section {
        display: none;
        animation: fadeIn 0.3s ease forwards;
        max-width: 1300px;
        margin: 0 auto;
        width: 100%;
    }
    .content-section.active {
        display: block;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    /* Top Bar */
    .top-bar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2.5rem;
    }

    .top-bar h1 {
        font-size: 1.75rem;
        margin: 0;
        font-weight: 700;
        letter-spacing: -0.5px;
    }

    /* Summary Cards */
    .metric-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 1.25rem;
        margin-bottom: 3rem;
    }

    .metric-card {
        background: #ffffff;
        border: 1px solid rgba(0, 0, 0, 0.08);
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.02);
        border-radius: 12px;
        padding: 1.5rem;
        display: flex;
        flex-direction: column;
        gap: 0.75rem;
        transition: all 0.2s ease;
    }

    .metric-card:hover {
        border-color: rgba(0, 0, 0, 0.15);
        box-shadow: 0 10px 15px rgba(0, 0, 0, 0.05);
        transform: translateY(-2px);
    }

    .metric-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        color: #4b5563;
        font-size: 0.85rem;
        font-weight: 600;
    }

    .metric-value {
        font-size: 2rem;
        font-weight: 800;
        color: #111827;
    }

    /* Data Table Section */
    .table-container {
        background: #ffffff;
        border: 1px solid rgba(0, 0, 0, 0.08);
        border-radius: 12px;
        padding: 1.5rem;
        margin-bottom: 3rem;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.02);
    }

    .table-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1.5rem;
    }

    .admin-table {
        width: 100%;
        border-collapse: collapse;
    }

    .admin-table th {
        text-align: left;
        padding: 1rem;
        color: #6b7280;
        font-weight: 600;
        font-size: 0.8rem;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        border-bottom: 1px solid rgba(0, 0, 0, 0.08);
    }

    .admin-table td {
        padding: 1.25rem 1rem;
        border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        font-size: 0.9rem;
        color: #374151;
        vertical-align: middle;
    }

    .admin-table tr:hover td {
        background: rgba(0, 0, 0, 0.02);
    }

    /* Badges */
    .tag {
        display: inline-flex;
        align-items: center;
        padding: 0.25rem 0.6rem;
        border-radius: 4px;
        font-size: 0.75rem;
        font-weight: 700;
        letter-spacing: 0.5px;
    }

    .tag-red { background: rgba(238, 45, 36, 0.1); color: #d1151c; border: 1px solid rgba(238, 45, 36, 0.2); }
    .tag-yellow { background: rgba(245, 158, 11, 0.1); color: #b45309; border: 1px solid rgba(245, 158, 11, 0.2); }
    .tag-green { background: rgba(16, 185, 129, 0.1); color: #047857; border: 1px solid rgba(16, 185, 129, 0.2); }
    .tag-gray { background: rgba(0, 0, 0, 0.05); color: #4b5563; border: 1px solid rgba(0, 0, 0, 0.1); }

    /* Buttons */
    .btn-ws {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.6rem 1.25rem;
        border-radius: 6px;
        font-size: 0.85rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.2s;
        border: 1px solid transparent;
        text-decoration: none;
    }

    .btn-ws-primary {
        background: #D32F2F;
        color: white;
    }
    .btn-ws-primary:hover { background: #b71c1c; }

    .btn-ws-outline {
        background: #ffffff;
        color: #374151;
        border-color: rgba(0, 0, 0, 0.15);
    }
    .btn-ws-outline:hover {
        background: #f9fafb;
        border-color: rgba(0, 0, 0, 0.3);
    }

    .btn-icon {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 32px; height: 32px;
        border-radius: 6px;
        background: #ffffff;
        border: 1px solid rgba(0, 0, 0, 0.15);
        color: #4b5563;
        cursor: pointer;
        transition: all 0.2s;
    }
    .btn-icon:hover {
        color: #111827;
        background: #f3f4f6;
    }

    /* Modal / Expanded Row */
    .detail-row {
        background: #f9fafb;
    }
    .detail-panel {
        padding: 2rem;
        border-left: 2px solid #D32F2F;
        margin: 1rem;
        background: #ffffff;
        border-radius: 0 8px 8px 0;
        border: 1px solid rgba(0, 0, 0, 0.08);
        border-left: 3px solid #D32F2F;
        box-shadow: 0 4px 6px rgba(0,0,0,0.02);
    }

    /* Print Styles - no longer used, printing is handled via a new window */
</style>

<div class="workspace">
    
    {{-- ── SIDEBAR NAVIGATION ── --}}
    <aside class="sidebar">
        <div class="sidebar-logo" style="margin-bottom: 2rem;">
            <img src="{{ asset('images/youthheal_done-removebg-preview.png') }}" alt="Youtheal Logo" style="height: 48px; width: auto; max-width: 100%; object-fit: contain;">
        </div>

        <nav style="flex:1;" id="sidebar-nav">
            <p style="font-size:0.75rem; color:#71717a; font-weight:700; text-transform:uppercase; letter-spacing:0.05em; margin-bottom:1rem; padding-left:0.5rem;">Menu Utama</p>
            <a href="#" class="nav-item active" onclick="switchTab('dashboard', this); return false;">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
                Dashboard
            </a>
            <a href="#" class="nav-item" onclick="switchTab('reports', this); return false;">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                Semua Laporan
            </a>
            <a href="#" class="nav-item" onclick="switchTab('education', this); return false;">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path></svg>
                Materi Edukasi
            </a>
            <a href="#" class="nav-item" onclick="switchTab('settings', this); return false;">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>
                Pengaturan
            </a>
        </nav>

        <form action="{{ route('logout') }}" method="POST" style="margin-top:auto;">
            @csrf
            <button type="submit" class="nav-item" style="width:100%; text-align:left; background:transparent; cursor:pointer;">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
                Keluar (Logout)
            </button>
        </form>
    </aside>

    {{-- ── MAIN CONTENT ── --}}
    <main class="main-area">
        @php
            $pending = $reports->where('status','Pending')->count();
            $processing = 0; // Placeholder for investigating
            $resolved = $reports->where('status','Ditanggapi')->count();
            $total = $reports->count();
        @endphp

        <!-- DASHBOARD SECTION -->
        <div id="section-dashboard" class="content-section active">
            <div class="top-bar">
            <div>
                <p style="color:#EE2D24; font-weight:700; font-size:0.85rem; letter-spacing:1px; margin-bottom:0.25rem;">ADMINISTRATOR</p>
                <h1>Tinjauan Konselor</h1>
            </div>
            <div style="display:flex; gap:1rem;">
                <div style="text-align:right;">
                    <p style="font-size:0.9rem; font-weight:600; margin:0;">Staff BK Aktif</p>
                    <p style="font-size:0.75rem; color:#71717a; margin:0;">Online</p>
                </div>
                <div style="width:40px; height:40px; border-radius:50%; background:#EE2D24; display:flex; align-items:center; justify-content:center; font-weight:700;">
                    BK
                </div>
            </div>
        </div>

        {{-- ── SUMMARY ANALYTICS ── --}}
        <div class="metric-grid">
            <div class="metric-card">
                <div class="metric-header">
                    Total Laporan
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                </div>
                <div class="metric-value">{{ $total }}</div>
            </div>
            <div class="metric-card" style="border-left: 2px solid #ef4444;">
                <div class="metric-header" style="color:#ef4444;">
                    Perlu Tindakan
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
                </div>
                <div class="metric-value">{{ $pending }}</div>
            </div>
            <div class="metric-card" style="border-left: 2px solid #f59e0b;">
                <div class="metric-header" style="color:#f59e0b;">
                    Sedang Diproses
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                </div>
                <div class="metric-value">{{ $processing }}</div>
            </div>
            <div class="metric-card" style="border-left: 2px solid #10b981;">
                <div class="metric-header" style="color:#10b981;">
                    Laporan Selesai
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                </div>
                <div class="metric-value">{{ $resolved }}</div>
            </div>
        </div>

        {{-- ── REPORT MANAGEMENT TABLE ── --}}
        <div class="table-container">
            <div class="table-header">
                <div>
                    <h2 style="font-size:1.25rem; margin:0 0 0.25rem 0;">Manajemen Laporan</h2>
                    <p style="font-size:0.85rem; color:#71717a; margin:0;">Filter dan kelola antrean pelaporan siswa.</p>
                </div>
                <div style="display:flex; gap:0.75rem;">
                    <div style="position:relative;">
                        <input type="text" id="searchInput" placeholder="Cari ID Tracking..." style="background:#ffffff; border:1px solid rgba(0,0,0,0.15); padding:0.6rem 1rem 0.6rem 2.5rem; border-radius:6px; color:#111827; font-size:0.85rem; width:200px; font-family:inherit;" onkeyup="filterTable()">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#71717a" stroke-width="2" style="position:absolute; left:10px; top:50%; transform:translateY(-50%);"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                    </div>
                    <button onclick="switchTab('reports', document.querySelector('.nav-item:nth-child(3)'))" class="btn-ws btn-ws-outline">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path></svg>
                        Buka Rekap Bulanan
                    </button>
                </div>
            </div>

            @if($reports->isEmpty())
                <div style="text-align:center; padding:4rem; color:#71717a;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" style="margin-bottom:1rem; opacity:0.5;"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="9" y1="3" x2="9" y2="21"></line></svg>
                    <p>Belum ada data laporan tersedia.</p>
                </div>
            @else
                <table class="admin-table" id="reportTable">
                    <thead>
                        <tr>
                            <th>Tracking ID</th>
                            <th>Tanggal Masuk</th>
                            <th>Kategori</th>
                            <th>Keparahan</th>
                            <th>Status</th>
                            <th style="text-align:right;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($reports as $report)
                        <tr>
                            <td><span style="font-family:monospace; font-weight:700; color:#111827;">{{ $report->tracking_code }}</span></td>
                            <td>{{ $report->created_at->format('d M Y, H:i') }}</td>
                            <td><span class="tag tag-gray">{{ $report->category->name ?? 'Lainnya' }}</span></td>
                            <td>
                                @if($report->severity == 'Parah')
                                    <span class="tag tag-red">Tinggi</span>
                                @elseif($report->severity == 'Sedang')
                                    <span class="tag tag-yellow">Sedang</span>
                                @else
                                    <span class="tag tag-green">Rendah</span>
                                @endif
                            </td>
                            <td>
                                @if($report->status == 'Pending')
                                    <span style="display:flex; align-items:center; gap:0.4rem; color:#ff4f47; font-size:0.85rem; font-weight:600;">
                                        <div style="width:6px;height:6px;border-radius:50%;background:#ff4f47;"></div> Perlu Tindakan
                                    </span>
                                @else
                                    <span style="display:flex; align-items:center; gap:0.4rem; color:#34d399; font-size:0.85rem; font-weight:600;">
                                        <div style="width:6px;height:6px;border-radius:50%;background:#34d399;"></div> Ditanggapi
                                    </span>
                                @endif
                            </td>
                            <td style="text-align:right;">
                                <div style="display:flex; justify-content:flex-end; gap:0.5rem;">
                                    <button class="btn-icon" title="Cetak Laporan" onclick="printReport('{{$report->id}}')">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 6 2 18 2 18 9"></polyline><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path><rect x="6" y="14" width="12" height="8"></rect></svg>
                                    </button>
                                    <button onclick="toggleElement('detail-{{$report->id}}')" class="btn-ws btn-ws-outline" style="padding:0.4rem 0.75rem; font-size:0.8rem;">
                                        Tinjau
                                    </button>
                                </div>
                            </td>
                        </tr>

                        {{-- Report Resolution Workflow (Expandable Row) --}}
                        <tr id="detail-{{$report->id}}" class="detail-row" style="display:none;">
                            <td colspan="6" style="padding:0;">
                                <div class="detail-panel">
                                    <div style="display:grid; grid-template-columns: 1fr 1fr; gap:2rem;">
                                        {{-- Left side: Info --}}
                                        <div>
                                            <h4 style="font-size:0.8rem; text-transform:uppercase; color:#71717a; margin-bottom:1rem;">Detail Laporan</h4>
                                            
                                            <div style="background:#f9fafb; border:1px solid rgba(0,0,0,0.08); padding:1rem; border-radius:6px; font-size:0.9rem; line-height:1.6; margin-bottom:1rem;">
                                                <strong>Deskripsi Kejadian:</strong><br>
                                                {{ $report->description }}
                                            </div>

                                            @if($report->photo_path)
                                            <div style="margin-bottom: 1.5rem; background:#f9fafb; border:1px solid rgba(0,0,0,0.08); padding:1rem; border-radius:6px;">
                                                <strong style="display:block; margin-bottom: 0.75rem; font-size: 0.9rem;">Bukti Kejadian Terlampir:</strong>
                                                <div style="border:1px solid rgba(255,255,255,0.1); border-radius: 8px; overflow: hidden; display: inline-block; background: #000;">
                                                    <a href="{{ Storage::url($report->photo_path) }}" target="_blank" title="Buka gambar ukuran penuh">
                                                        <img src="{{ Storage::url($report->photo_path) }}" alt="Bukti Pembullyan" style="max-height: 250px; max-width: 100%; display: block; object-fit: contain; cursor: zoom-in; transition: transform 0.2s;" onmouseover="this.style.transform='scale(1.02)'" onmouseout="this.style.transform='scale(1)'">
                                                    </a>
                                                </div>
                                                <p style="font-size:0.75rem; color:#71717a; margin-top:0.5rem; margin-bottom:0;">*Klik gambar untuk memperbesar di tab baru.</p>
                                            </div>
                                            @endif


                                            <div style="display:flex; gap:2rem; font-size:0.85rem;">
                                                <div>
                                                    <span style="color:#71717a;">Terduga:</span><br>
                                                    <strong>{{ $report->perpetrator_name ?: 'Dirahasiakan' }}</strong>
                                                </div>
                                                <div>
                                                    <span style="color:#71717a;">Waktu Kejadian:</span><br>
                                                    <strong>{{ $report->incident_date ? \Carbon\Carbon::parse($report->incident_date)->format('d/m/Y') : '-' }}</strong>
                                                </div>
                                                <div>
                                                    <span style="color:#71717a;">Lokasi:</span><br>
                                                    <strong>{{ $report->incident_location ?: '-' }}</strong>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Right side: Resolution Workflow --}}
                                        <div style="background:#f9fafb; border:1px solid rgba(0,0,0,0.08); padding:1.5rem; border-radius:8px;">
                                            <h4 style="font-size:0.8rem; text-transform:uppercase; color:#71717a; margin-bottom:1rem;">Alur Penyelesaian</h4>
                                            
                                            <form action="{{ route('admin.response.store', $report->id) }}" method="POST">
                                                @csrf
                                                <div style="margin-bottom:1rem;">
                                                    <label style="display:block; font-size:0.8rem; color:#a1a1aa; margin-bottom:0.4rem;">Perbarui Status</label>
                                                    <select name="status" style="width:100%; background:#ffffff; border:1px solid rgba(0,0,0,0.15); color:#111827; padding:0.6rem; border-radius:6px; font-family:inherit; font-size:0.85rem;">
                                                        <option value="Pending" {{ $report->status == 'Pending' ? 'selected' : '' }}>Pending (Perlu Tindakan)</option>
                                                        <option value="Investigating">Sedang Diproses (Investigasi)</option>
                                                        <option value="Ditanggapi" {{ $report->status == 'Ditanggapi' ? 'selected' : '' }}>Selesai (Ditanggapi)</option>
                                                    </select>
                                                </div>

                                                <div style="margin-bottom:1.5rem;">
                                                    <label style="display:block; font-size:0.8rem; color:#a1a1aa; margin-bottom:0.4rem;">Pesan / Feedback Staff (Dikirim ke Pelapor)</label>
                                                    <textarea name="message" rows="3" style="width:100%; background:#ffffff; border:1px solid rgba(0,0,0,0.15); color:#111827; padding:0.6rem; border-radius:6px; font-family:inherit; font-size:0.85rem; resize:vertical;" placeholder="Tuliskan tindakan yang telah diambil atau pesan dukungan..."></textarea>
                                                </div>

                                                <button type="submit" class="btn-ws btn-ws-primary" style="width:100%; justify-content:center;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                                    Selesaikan Laporan
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
        </div> <!-- END DASHBOARD SECTION -->

        <!-- SEMUA LAPORAN SECTION -->
        <div id="section-reports" class="content-section">
            <div class="top-bar">
                <div>
                    <p style="color:#EE2D24; font-weight:700; font-size:0.85rem; letter-spacing:1px; margin-bottom:0.25rem;">MANAJEMEN</p>
                    <h1>Rekap Laporan Bulanan</h1>
                </div>
            </div>
            
            <div class="table-container" style="max-width: 800px;">
                <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:2rem;">
                    <div>
                        <h3 style="margin:0 0 0.5rem 0;">Pilih Bulan Rekapitulasi</h3>
                        <p style="font-size:0.85rem; color:#71717a; margin:0;">Lihat statistik dan rekap keseluruhan berdasarkan bulan tertentu.</p>
                    </div>
                    <div style="display:flex; gap:1rem;">
                        <select id="recapMonthSelect" style="background:#ffffff; border:1px solid rgba(0,0,0,0.15); color:#111827; padding:0.6rem 1rem; border-radius:6px; font-family:inherit; min-width:150px;" onchange="updateRecap()">
                            @php
                                $months = [];
                                foreach($reports as $r) {
                                    $m = $r->created_at->format('Y-m');
                                    $label = $r->created_at->translatedFormat('F Y');
                                    if(!isset($months[$m])) $months[$m] = $label;
                                }
                                krsort($months); // Sort descending
                            @endphp
                            <option value="all">Keseluruhan Waktu</option>
                            @foreach($months as $val => $label)
                                <option value="{{ $val }}" {{ $loop->first ? 'selected' : '' }}>{{ $label }}</option>
                            @endforeach
                        </select>
                        <button class="btn-ws btn-ws-primary" onclick="printRecap()">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 6 2 18 2 18 9"></polyline><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path><rect x="6" y="14" width="12" height="8"></rect></svg>
                            Cetak PDF
                        </button>
                    </div>
                </div>

                <div id="recapPrintArea" style="background:#ffffff; padding:1.5rem; border-radius:8px; border:1px solid rgba(0,0,0,0.08); box-shadow: 0 4px 6px rgba(0,0,0,0.02);">
                    <div style="text-align:center; margin-bottom:2rem; padding-bottom:1rem; border-bottom:1px solid rgba(0,0,0,0.1);">
                        <h2 style="font-size:1.4rem; margin-bottom:0.25rem;">Laporan Konselor SafeSpace</h2>
                        <p style="color:#a1a1aa; font-size:0.9rem;" id="recapLabel">Rekapitulasi: -</p>
                    </div>
                    
                    <div style="display:grid; grid-template-columns:1fr 1fr; gap:1.5rem;">
                        <div style="background:#f9fafb; padding:1.25rem; border-radius:8px; border:1px solid rgba(0,0,0,0.05);">
                            <p style="color:#71717a; font-size:0.8rem; text-transform:uppercase; margin-bottom:0.5rem; font-weight:700;">Total Kasus Masuk</p>
                            <p style="font-size:2rem; font-weight:800; color:#111827; margin:0;" id="recapTotal">0</p>
                        </div>
                        <div style="background:rgba(238,45,36,0.05); padding:1.25rem; border-radius:8px;">
                            <p style="color:#EE2D24; font-size:0.8rem; text-transform:uppercase; margin-bottom:0.5rem; font-weight:700;">Masih Pending / Perlu Tindakan</p>
                            <p style="font-size:2rem; font-weight:800; color:#EE2D24; margin:0;" id="recapPending">0</p>
                        </div>
                        <div style="background:rgba(16,185,129,0.05); padding:1.25rem; border-radius:8px;">
                            <p style="color:#10b981; font-size:0.8rem; text-transform:uppercase; margin-bottom:0.5rem; font-weight:700;">Kasus Telah Ditanggapi</p>
                            <p style="font-size:2rem; font-weight:800; color:#10b981; margin:0;" id="recapResolved">0</p>
                        </div>
                        <div style="background:rgba(245,158,11,0.05); padding:1.25rem; border-radius:8px;">
                            <p style="color:#fbbf24; font-size:0.8rem; text-transform:uppercase; margin-bottom:0.5rem; font-weight:700;">Kategori Terbanyak</p>
                            <p style="font-size:1.2rem; font-weight:700; color:#fbbf24; margin:0; line-height:1.2;" id="recapTopCategory">-</p>
                        </div>
                    </div>
                    
                    <div style="margin-top:2rem;">
                        <p style="color:#71717a; font-size:0.8rem; text-transform:uppercase; margin-bottom:1rem; font-weight:700;">Rincian Berdasarkan Keparahan</p>
                        <div style="display:flex; justify-content:space-between; border-bottom:1px solid rgba(0,0,0,0.05); padding-bottom:0.5rem; margin-bottom:0.5rem;">
                            <span>Tinggi (Darurat)</span> <strong id="recapHigh" style="color:#ff4f47;">0</strong>
                        </div>
                        <div style="display:flex; justify-content:space-between; border-bottom:1px solid rgba(0,0,0,0.05); padding-bottom:0.5rem; margin-bottom:0.5rem;">
                            <span>Sedang</span> <strong id="recapMedium" style="color:#fbbf24;">0</strong>
                        </div>
                        <div style="display:flex; justify-content:space-between; padding-bottom:0.5rem;">
                            <span>Rendah</span> <strong id="recapLow" style="color:#34d399;">0</strong>
                        </div>
                    </div>
                </div>
            </div>
            
            <script>
                // Data laporan dikirim dari backend ke JS
                const reportsData = [
                    @foreach($reports as $r)
                        {
                            month: "{{ $r->created_at->format('Y-m') }}",
                            status: "{{ $r->status }}",
                            severity: "{{ $r->severity }}",
                            category: "{{ $r->category->name ?? 'Lainnya' }}"
                        },
                    @endforeach
                ];

                function updateRecap() {
                    const sel = document.getElementById('recapMonthSelect');
                    const selectedMonth = sel.value;
                    const selectedLabel = sel.options[sel.selectedIndex].text;
                    
                    document.getElementById('recapLabel').innerText = "Rekapitulasi: " + selectedLabel;

                    let filtered = reportsData;
                    if(selectedMonth !== 'all') {
                        filtered = reportsData.filter(r => r.month === selectedMonth);
                    }

                    document.getElementById('recapTotal').innerText = filtered.length;
                    document.getElementById('recapPending').innerText = filtered.filter(r => r.status === 'Pending').length;
                    document.getElementById('recapResolved').innerText = filtered.filter(r => r.status === 'Ditanggapi').length;
                    
                    document.getElementById('recapHigh').innerText = filtered.filter(r => r.severity === 'Parah').length;
                    document.getElementById('recapMedium').innerText = filtered.filter(r => r.severity === 'Sedang').length;
                    document.getElementById('recapLow').innerText = filtered.filter(r => r.severity !== 'Parah' && r.severity !== 'Sedang').length;

                    // Calculate top category
                    let cats = {};
                    let maxCount = 0;
                    let topCat = '-';
                    filtered.forEach(r => {
                        cats[r.category] = (cats[r.category] || 0) + 1;
                        if(cats[r.category] > maxCount) {
                            maxCount = cats[r.category];
                            topCat = r.category;
                        }
                    });
                    document.getElementById('recapTopCategory').innerText = topCat !== '-' ? `${topCat} (${maxCount})` : '-';
                }

                // Initial load
                document.addEventListener('DOMContentLoaded', () => {
                    if(document.getElementById('recapMonthSelect')) updateRecap();
                });
            </script>
        </div>

        <!-- MATERI EDUKASI SECTION -->
        <div id="section-education" class="content-section">
            <div class="top-bar">
                <div>
                    <p style="color:#EE2D24; font-weight:700; font-size:0.85rem; letter-spacing:1px; margin-bottom:0.25rem;">KONTEN</p>
                    <h1>Materi Edukasi</h1>
                </div>
            </div>
            
            <div class="table-container" style="max-width: 600px;">
                <h3 style="margin-bottom:1.5rem; display:flex; align-items:center; gap:0.6rem;">
                    <span>✍️</span> Publikasi Artikel Baru
                </h3>
                @if(session('article_success'))
                    <div style="background:rgba(16, 185, 129, 0.1); color:#34d399; padding:1rem; border-radius:8px; margin-bottom:1.5rem;">✅ {{ session('article_success') }}</div>
                @endif
                <form action="{{ route('admin.article.store') }}" method="POST" style="display:flex; flex-direction:column; gap:1rem;">
                    @csrf
                    <div>
                        <label style="display:block; font-size:0.8rem; color:#a1a1aa; margin-bottom:0.4rem;">Judul Artikel</label>
                        <input type="text" name="title" required style="width:100%; background:#ffffff; border:1px solid rgba(0,0,0,0.15); color:#111827; padding:0.8rem; border-radius:6px; font-family:inherit;">
                    </div>
                    <div>
                        <label style="display:block; font-size:0.8rem; color:#a1a1aa; margin-bottom:0.4rem;">Kategori Edukasi</label>
                        <select name="category_id" required style="width:100%; background:#ffffff; border:1px solid rgba(0,0,0,0.15); color:#111827; padding:0.8rem; border-radius:6px; font-family:inherit;">
                            <option value="">— Pilih Kategori —</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label style="display:block; font-size:0.8rem; color:#a1a1aa; margin-bottom:0.4rem;">Isi Konten</label>
                        <textarea name="content" rows="6" required style="width:100%; background:#ffffff; border:1px solid rgba(0,0,0,0.15); color:#111827; padding:0.8rem; border-radius:6px; font-family:inherit; resize:vertical;"></textarea>
                    </div>
                    <button type="submit" class="btn-ws btn-ws-primary" style="justify-content:center; padding:0.8rem;">Publish Artikel</button>
                </form>
            </div>
        </div>

        <!-- PENGATURAN SECTION -->
        <div id="section-settings" class="content-section">
            <div class="top-bar">
                <div>
                    <p style="color:#EE2D24; font-weight:700; font-size:0.85rem; letter-spacing:1px; margin-bottom:0.25rem;">KONFIGURASI</p>
                    <h1>Pengaturan Kategori</h1>
                </div>
            </div>

            <div class="table-container" style="max-width: 600px;">
                <h3 style="margin-bottom:1.5rem; display:flex; align-items:center; gap:0.6rem;">
                    <span>🏷️</span> Tambah Kategori Baru
                </h3>
                @if(session('category_success'))
                    <div style="background:rgba(16, 185, 129, 0.1); color:#34d399; padding:1rem; border-radius:8px; margin-bottom:1.5rem;">✅ {{ session('category_success') }}</div>
                @endif
                <form action="{{ route('admin.category.store') }}" method="POST" style="display:flex; flex-direction:column; gap:1rem;">
                    @csrf
                    <div>
                        <label style="display:block; font-size:0.8rem; color:#a1a1aa; margin-bottom:0.4rem;">Nama Kategori</label>
                        <input type="text" name="name" required style="width:100%; background:#ffffff; border:1px solid rgba(0,0,0,0.15); color:#111827; padding:0.8rem; border-radius:6px; font-family:inherit;">
                    </div>
                    <button type="submit" class="btn-ws btn-ws-outline" style="justify-content:center; padding:0.8rem;">Simpan Kategori</button>
                </form>
                
                <hr style="border:0; border-top:1px solid rgba(0,0,0,0.1); margin:2rem 0;">
                
                <h3 style="margin-bottom:1rem; font-size:1rem; color:#374151;">Kategori Aktif</h3>
                <div style="display:flex; flex-wrap:wrap; gap:0.5rem;">
                    @foreach($categories as $cat)
                        <span class="tag tag-red" style="font-size:0.85rem; padding:0.4rem 0.8rem;">{{ $cat->name }}</span>
                    @endforeach
                </div>
            </div>
        </div>

    </main>
</div>

<script>
// Toggle expanded row
function toggleElement(id) {
    const el = document.getElementById(id);
    if (el) {
        if (el.style.display === 'none' || el.style.display === '') {
            el.style.display = 'table-row';
            setTimeout(() => { el.scrollIntoView({ behavior: 'smooth', block: 'nearest' }); }, 50);
        } else {
            el.style.display = 'none';
        }
    }
}

// Switch Tabs Navigation
function switchTab(tabId, element) {
    // Hide all sections
    document.querySelectorAll('.content-section').forEach(sec => sec.classList.remove('active'));
    // Show target section
    document.getElementById('section-' + tabId).classList.add('active');
    
    // Update active state on nav
    document.querySelectorAll('.nav-item').forEach(nav => nav.classList.remove('active'));
    element.classList.add('active');
}

// Print specific report row
function printReport(id) {
    // First make sure the detail row is visible so we can read its content
    const detailRow = document.getElementById('detail-' + id);
    if (!detailRow) return;

    const wasHidden = (detailRow.style.display === 'none' || detailRow.style.display === '');
    if (wasHidden) detailRow.style.display = 'table-row';

    const detailPanel = detailRow.querySelector('.detail-panel');
    if (!detailPanel) return;

    // Gather report info from the table row before the detail row
    const reportRow = detailRow.previousElementSibling;
    let trackingId = '', tanggal = '', kategori = '', keparahan = '', status = '';
    if (reportRow) {
        const cells = reportRow.querySelectorAll('td');
        trackingId = cells[0] ? cells[0].innerText.trim() : '';
        tanggal = cells[1] ? cells[1].innerText.trim() : '';
        kategori = cells[2] ? cells[2].innerText.trim() : '';
        keparahan = cells[3] ? cells[3].innerText.trim() : '';
        status = cells[4] ? cells[4].innerText.trim() : '';
    }

    // Get detail content
    const leftPanel = detailPanel.querySelector('div > div:first-child');
    let deskripsi = '', terduga = '', waktu = '', lokasi = '', buktiSrc = '';
    if (leftPanel) {
        const descBox = leftPanel.querySelector('div[style*="background"]');
        if (descBox) {
            // Get text after 'Deskripsi Kejadian:'
            const fullText = descBox.innerText.trim();
            deskripsi = fullText.replace('Deskripsi Kejadian:', '').trim();
        }
        const infoDiv = leftPanel.querySelector('div[style*="display:flex"]');
        if (infoDiv) {
            const infoDivs = infoDiv.querySelectorAll(':scope > div');
            infoDivs.forEach(d => {
                const label = d.querySelector('span');
                const value = d.querySelector('strong');
                if (label && value) {
                    const l = label.innerText.trim().toLowerCase();
                    if (l.includes('terduga')) terduga = value.innerText.trim();
                    if (l.includes('waktu')) waktu = value.innerText.trim();
                    if (l.includes('lokasi')) lokasi = value.innerText.trim();
                }
            });
        }
        const img = leftPanel.querySelector('img');
        if (img) buktiSrc = img.src;
    }

    // Open print window
    const printWin = window.open('', '_blank', 'width=800,height=600');
    printWin.document.write(`
    <html><head><title>Laporan ${trackingId}</title>
    <style>
        * { margin:0; padding:0; box-sizing:border-box; }
        body { font-family: 'Segoe UI', system-ui, sans-serif; color: #111; padding: 2rem; }
        .header { text-align:center; border-bottom:2px solid #D32F2F; padding-bottom:1rem; margin-bottom:1.5rem; }
        .header h1 { font-size:1.4rem; color:#D32F2F; margin-bottom:0.25rem; }
        .header p { font-size:0.85rem; color:#555; }
        .info-grid { display:grid; grid-template-columns:1fr 1fr; gap:0.75rem 2rem; margin-bottom:1.5rem; }
        .info-item label { display:block; font-size:0.75rem; color:#888; text-transform:uppercase; font-weight:700; margin-bottom:0.2rem; }
        .info-item p { font-size:0.95rem; font-weight:600; }
        .section-title { font-size:0.8rem; color:#888; text-transform:uppercase; font-weight:700; letter-spacing:0.5px; margin-bottom:0.5rem; border-bottom:1px solid #eee; padding-bottom:0.3rem; }
        .desc-box { background:#f9fafb; border:1px solid #e5e7eb; padding:1rem; border-radius:6px; line-height:1.7; font-size:0.9rem; margin-bottom:1.5rem; white-space:pre-wrap; }
        .bukti-img { max-width:100%; max-height:300px; border:1px solid #e5e7eb; border-radius:6px; margin-top:0.5rem; }
        .footer { margin-top:2rem; border-top:1px solid #eee; padding-top:1rem; text-align:center; font-size:0.75rem; color:#aaa; }
        @media print { body { padding:1.5rem; } }
    </style>
    </head><body>
        <div class="header">
            <h1>YOUTHEAL.ID &mdash; Laporan Kasus</h1>
            <p>Dokumen Cetak Otomatis &bull; Rahasia</p>
        </div>
        <div class="info-grid">
            <div class="info-item"><label>Tracking ID</label><p>${trackingId}</p></div>
            <div class="info-item"><label>Tanggal Masuk</label><p>${tanggal}</p></div>
            <div class="info-item"><label>Kategori</label><p>${kategori}</p></div>
            <div class="info-item"><label>Keparahan</label><p>${keparahan}</p></div>
            <div class="info-item"><label>Status</label><p>${status}</p></div>
            <div class="info-item"><label>Terduga Pelaku</label><p>${terduga || '-'}</p></div>
            <div class="info-item"><label>Waktu Kejadian</label><p>${waktu || '-'}</p></div>
            <div class="info-item"><label>Lokasi Kejadian</label><p>${lokasi || '-'}</p></div>
        </div>
        <p class="section-title">Deskripsi Kejadian</p>
        <div class="desc-box">${deskripsi || '-'}</div>
        ${buktiSrc ? '<p class="section-title">Bukti Terlampir</p><img class="bukti-img" src="' + buktiSrc + '">' : ''}
        <div class="footer">Dicetak pada ${new Date().toLocaleString('id-ID')} &bull; YOUTHEAL.ID Platform Anti Bullying</div>
    </body></html>
    `);
    printWin.document.close();
    // Wait for images to load then print
    printWin.onload = function() {
        printWin.focus();
        printWin.print();
    };
    // Fallback if onload doesn't fire (some browsers)
    setTimeout(() => { printWin.focus(); printWin.print(); }, 500);

    // Restore hidden state
    if (wasHidden) detailRow.style.display = 'none';
}

// Print Monthly Recap
function printRecap() {
    const recapPanel = document.getElementById('recapPrintArea');
    if (!recapPanel) return;

    const printWin = window.open('', '_blank', 'width=800,height=600');
    printWin.document.write(`
    <html><head><title>Rekap Laporan Bulanan</title>
    <style>
        * { margin:0; padding:0; box-sizing:border-box; }
        body { font-family: 'Segoe UI', system-ui, sans-serif; color: #111; padding: 2rem; }
        @media print { body { padding:1.5rem; } }
    </style>
    </head><body>
        ${recapPanel.innerHTML}
        <div style="margin-top:2rem; border-top:1px solid #eee; padding-top:1rem; text-align:center; font-size:0.75rem; color:#aaa;">
            Dicetak pada ${new Date().toLocaleString('id-ID')} &bull; YOUTHEAL.ID Platform Anti Bullying
        </div>
    </body></html>
    `);
    printWin.document.close();
    printWin.onload = function() {
        printWin.focus();
        printWin.print();
    };
    setTimeout(() => { printWin.focus(); printWin.print(); }, 500);
}

// Download Table to CSV (Kept as fallback just in case)
function downloadCSV() {
    const table = document.getElementById('reportTable');
    if(!table) return alert('Tidak ada data tabel untuk diunduh.');
    
    let csv = [];
    const rows = table.querySelectorAll('tr');
    
    for (let i = 0; i < rows.length; i++) {
        // Skip detail rows
        if(rows[i].classList.contains('detail-row')) continue;
        
        let row = [], cols = rows[i].querySelectorAll('td, th');
        for (let j = 0; j < cols.length - 1; j++) { // Skip "Aksi" column
            // Clean text content to avoid newlines breaking CSV
            let data = cols[j].innerText.replace(/(\r\n|\n|\r)/gm, " ").trim();
            row.push('"' + data + '"');
        }
        csv.push(row.join(','));
    }
    
    const csvString = csv.join('\n');
    const blob = new Blob([csvString], { type: 'text/csv;charset=utf-8;' });
    const link = document.createElement("a");
    const url = URL.createObjectURL(blob);
    
    link.setAttribute("href", url);
    link.setAttribute("download", "Rekap_Laporan_SafeSpace.csv");
    link.style.visibility = 'hidden';
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
}

// Simple filter for Tracking ID
function filterTable() {
    let input = document.getElementById("searchInput").value.toUpperCase();
    let table = document.getElementById("reportTable");
    if(!table) return;
    let tr = table.getElementsByTagName("tr");
    
    for (let i = 1; i < tr.length; i++) {
        if(tr[i].classList.contains('detail-row')) continue; // Skip expanded row
        let td = tr[i].getElementsByTagName("td")[0]; // Tracking ID column
        if (td) {
            let txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(input) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
                // Hide its detail row if filtered out
                let detailRow = tr[i].nextElementSibling;
                if(detailRow && detailRow.classList.contains('detail-row')) {
                    detailRow.style.display = 'none';
                }
            }
        }       
    }
}
</script>

@endsection
