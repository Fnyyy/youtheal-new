@extends('layouts.app')

@section('content')
<div style="max-width: 620px; margin: 0 auto;">

    {{-- Header --}}
    <div style="text-align:center; margin-bottom:3rem;" class="animate-fade-up">
        <div style="display:inline-flex; align-items:center; justify-content:center; width:72px; height:72px; background:rgba(34,211,165,0.12); border:1px solid rgba(34,211,165,0.3); border-radius:8px; margin-bottom:1.5rem; font-size:2rem;">🔍</div>
        <h1 style="font-size:2.25rem; margin-bottom:0.75rem;">Lacak <span class="text-gradient">Laporan</span></h1>
        <p class="text-muted" style="font-size:0.95rem; line-height:1.8;">Masukkan kode 6 karakter yang kamu terima saat mengirim laporan untuk melihat tanggapan terbaru dari Guru BK.</p>
    </div>

    {{-- Search Form --}}
    <div class="card animate-fade-up-d1" style="padding:2rem; margin-bottom:2rem;">
        @if(session('error'))
            <div style="background:rgba(255,71,87,0.1); border:1px solid rgba(255,71,87,0.3); color:var(--danger); padding:1rem; border-radius:10px; margin-bottom:1.5rem; font-size:0.875rem; font-weight:600;">
                ❌ {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('track.check') }}" method="POST">
            @csrf
            <div class="form-group" style="margin-bottom:1.25rem;">
                <label class="form-label">Kode Pelacakan</label>
                <input
                    type="text"
                    name="tracking_code"
                    class="form-input"
                    placeholder="Contoh: AB12CD"
                    style="text-align:center; font-size:1.75rem; font-weight:800; letter-spacing:0.3em; text-transform:uppercase; height:4rem; font-family:monospace;"
                    autocomplete="off"
                    maxlength="6"
                    required
                    value="{{ old('tracking_code') }}"
                    oninput="this.value=this.value.toUpperCase().replace(/[^A-Z0-9]/g,'')">
                <p style="font-size:0.75rem; color:var(--text-dim); text-align:center; margin-top:0.5rem;">Kode terdiri dari 6 karakter huruf & angka</p>
            </div>
            <button type="submit" class="btn btn-primary btn-full btn-lg">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
                Cek Status Laporan
            </button>
        </form>
    </div>

    @if(isset($report))
    {{-- ══ REPORT RESULT ══ --}}
    <div class="card animate-fade" style="border-color:rgba(237,28,36,0.3); border-left:4px solid var(--primary);">

        {{-- Report header --}}
        <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:1.5rem; flex-wrap:wrap; gap:0.75rem;">
            <div>
                <span class="badge badge-red" style="margin-bottom:0.5rem;">{{ $report->category->name ?? 'Laporan' }}</span>
                <h3 style="font-family:monospace; font-size:1.1rem; color:var(--primary-light);">#{{ $report->tracking_code }}</h3>
            </div>
            <span class="status-{{ $report->status }}">
                @if($report->status == 'Pending')
                    Pending
                @elseif($report->status == 'Investigating')
                    Sedang Diproses
                @else
                    Ditanggapi
                @endif
            </span>
        </div>

        {{-- Timeline progress (Futuristic Vertical) --}}
        <div style="margin-bottom:2rem; padding:2rem; background:var(--bg-elevated); border-radius:16px; border:1px solid var(--border); box-shadow: inset 0 0 20px rgba(0,0,0,0.3);">
            <p style="font-size:0.75rem; font-weight:700; text-transform:uppercase; letter-spacing:0.08em; color:var(--text-muted); margin-bottom:1.5rem;">Status Pelacakan</p>
            <div style="display:flex; flex-direction:column; gap:0; position:relative; padding-left:1rem;">
                
                <div style="position:relative; padding-bottom:2.5rem; padding-left:2.5rem;">
                    <div style="position:absolute; left:0; top:0; width:36px; height:36px; transform:translateX(-50%); border-radius:8px; background:var(--accent-green); border:1px solid rgba(34,211,165,0.8); color:white; display:flex; align-items:center; justify-content:center; font-size:1rem; z-index:2;">✓</div>
                    <div style="position:absolute; left:0; top:36px; bottom:0; width:2px; transform:translateX(-50%); background:{{ in_array($report->status, ['Investigating', 'Ditanggapi']) ? 'var(--accent-green)' : 'var(--border)' }}; z-index:1;"></div>
                    <p style="font-size:1rem; color:var(--text); font-weight:800; margin-bottom:0.25rem;">Laporan Diterima</p>
                    <p style="font-size:0.8rem; color:var(--text-dim);">Sistem telah mencatat laporan anonim Anda dengan aman.</p>
                </div>
                
                <div style="position:relative; padding-bottom:2.5rem; padding-left:2.5rem;">
                    <div style="position:absolute; left:0; top:0; width:36px; height:36px; transform:translateX(-50%); border-radius:8px; background:{{ in_array($report->status, ['Investigating', 'Ditanggapi']) ? 'var(--accent-green)' : 'var(--bg-card)' }}; border:1px solid {{ in_array($report->status, ['Investigating', 'Ditanggapi']) ? 'rgba(34,211,165,0.8)' : 'var(--border)' }}; color:{{ in_array($report->status, ['Investigating', 'Ditanggapi']) ? 'white' : 'var(--text-dim)' }}; display:flex; align-items:center; justify-content:center; font-size:1rem; z-index:2;">{{ $report->status == 'Ditanggapi' ? '✓' : '⏳' }}</div>
                    <div style="position:absolute; left:0; top:36px; bottom:0; width:2px; transform:translateX(-50%); background:{{ $report->status == 'Ditanggapi' ? 'var(--accent-green)' : 'var(--border)' }}; z-index:1;"></div>
                    <p style="font-size:1rem; color:{{ in_array($report->status, ['Investigating', 'Ditanggapi']) ? 'var(--text)' : 'var(--text-dim)' }}; font-weight:800; margin-bottom:0.25rem;">Sedang Ditinjau</p>
                    <p style="font-size:0.8rem; color:var(--text-muted);">Staff BK sedang memverifikasi detail laporan.</p>
                </div>
                
                <div style="position:relative; padding-left:2.5rem;">
                    <div style="position:absolute; left:0; top:0; width:36px; height:36px; transform:translateX(-50%); border-radius:8px; background:{{ $report->status == 'Ditanggapi' ? 'var(--accent-green)' : 'var(--bg-card)' }}; border:1px solid {{ $report->status == 'Ditanggapi' ? 'rgba(34,211,165,0.8)' : 'var(--border)' }}; color:{{ $report->status == 'Ditanggapi' ? 'white' : 'var(--text-dim)' }}; display:flex; align-items:center; justify-content:center; font-size:1rem; z-index:2;">{{ $report->status == 'Ditanggapi' ? '💬' : '—' }}</div>
                    <p style="font-size:1rem; color:{{ $report->status == 'Ditanggapi' ? 'var(--text)' : 'var(--text-dim)' }}; font-weight:800; margin-bottom:0.25rem;">Tanggapan Resmi</p>
                    <p style="font-size:0.8rem; color:var(--text-muted);">Tindakan lanjut dari Staff BK tersedia.</p>
                </div>

            </div>
        </div>

        {{-- Report content --}}
        <div style="margin-bottom:2rem;">
            <p style="font-size:0.75rem; font-weight:700; text-transform:uppercase; letter-spacing:0.08em; color:var(--text-muted); margin-bottom:0.75rem;">Isi Laporan</p>
            <blockquote style="border-left:3px solid rgba(237,28,36,0.4); padding:1rem 1.25rem; background:var(--bg-elevated); border-radius:0 10px 10px 0; font-size:0.925rem; line-height:1.8; color:var(--text);">
                {{ $report->description }}
            </blockquote>
            <p style="font-size:0.75rem; color:var(--text-dim); margin-top:0.5rem;">
                Dikirim pada: {{ $report->created_at->format('d M Y, H:i') }} WIB
            </p>
        </div>

        {{-- Photo evidence --}}
        @if($report->photo_path)
        <div style="margin-bottom:2rem;">
            <p style="font-size:0.75rem; font-weight:700; text-transform:uppercase; letter-spacing:0.08em; color:var(--text-muted); margin-bottom:0.75rem;">📎 Bukti Terlampir</p>
            <img src="{{ Storage::url($report->photo_path) }}" alt="Bukti Laporan"
                 style="max-width:100%; border-radius:12px; border:1px solid var(--border); cursor:pointer;"
                 onclick="this.style.maxWidth = this.style.maxWidth=='100%' ? '60%' : '100%'">
            <p style="font-size:0.7rem; color:var(--text-dim); margin-top:0.4rem;">Klik gambar untuk zoom</p>
        </div>
        @endif

        {{-- Response section --}}
        <div style="padding:1.5rem; background:var(--bg-elevated); border-radius:12px; border:1px solid var(--border);">
            <div style="display:flex; align-items:center; gap:0.6rem; margin-bottom:1rem;">
                <span style="font-size:1.25rem;">💬</span>
                <h4 style="color:var(--text); font-weight:800;">Tanggapan Staff BK</h4>
            </div>

            @if($report->response)
                <div style="background:rgba(34,211,165,0.07); border:1px solid rgba(34,211,165,0.2); border-radius:10px; padding:1.25rem;">
                    <p style="font-size:0.925rem; line-height:1.8; color:var(--text); margin-bottom:0.75rem;">
                        {{ $report->response->message }}
                    </p>
                    <p style="font-size:0.75rem; color:var(--accent-green); font-weight:600;">
                        ✅ Dibalas pada {{ $report->response->created_at->format('d M Y, H:i') }} WIB
                    </p>
                </div>
            @else
                <div style="display:flex; align-items:center; gap:1rem; color:var(--text-muted);">
                    <div style="flex-shrink:0; width:36px; height:36px; border-radius:50%; background:rgba(255,165,2,0.12); border:1px solid rgba(255,165,2,0.3); display:flex; align-items:center; justify-content:center; font-size:1rem;">⏳</div>
                    <div>
                        <p style="font-size:0.875rem; color:var(--text);">Laporan sedang dalam antrian peninjauan.</p>
                        <p style="font-size:0.8rem; color:var(--text-muted);">Staff BK biasanya merespons dalam 1-2 hari kerja.</p>
                    </div>
                </div>
            @endif
        </div>

        <div style="margin-top:1.5rem; display:flex; gap:0.75rem;">
            <a href="{{ route('track.index') }}" class="btn btn-secondary" style="flex:1; justify-content:center;">Cek Kode Lain</a>
            <a href="{{ route('home') }}" class="btn btn-secondary" style="flex:1; justify-content:center;">Ke Beranda</a>
        </div>
    </div>
    @endif

    {{-- Help section (when no report shown) --}}
    @unless(isset($report))
    <div style="background:rgba(0,0,0,0.03); border:1px solid rgba(0,0,0,0.08); border-radius:var(--radius); padding:1.5rem; margin-top:1rem;" class="animate-fade-up-d2">
        <p style="font-size:0.8rem; font-weight:700; color:var(--primary-light); margin-bottom:0.75rem;">💡 Tips</p>
        <ul style="list-style:none; display:flex; flex-direction:column; gap:0.5rem;">
            <li style="font-size:0.825rem; color:var(--text-muted); display:flex; gap:0.6rem;"><span>•</span> Kode pelacakan dikirimkan saat kamu berhasil mengirim laporan</li>
            <li style="font-size:0.825rem; color:var(--text-muted); display:flex; gap:0.6rem;"><span>•</span> Kode terdiri dari 6 karakter (huruf & angka), contoh: <code style="color:var(--text); background:rgba(0,0,0,0.05); padding:0.1rem 0.4rem; border-radius:4px; font-family:monospace;">AB12CD</code></li>
            <li style="font-size:0.825rem; color:var(--text-muted); display:flex; gap:0.6rem;"><span>•</span> Kode bersifat case-insensitive (huruf besar/kecil tidak masalah)</li>
        </ul>
    </div>
    @endunless
</div>
@endsection
