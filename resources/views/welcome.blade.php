@extends('layouts.app')

@section('content')

{{-- ═════════════════════════════════════
     HERO SECTION — Full Impact
═════════════════════════════════════ --}}
<section style="display:grid; grid-template-columns:1fr 1fr; gap:3rem; align-items:center; padding:2rem 0 6rem; min-height:88vh;" id="hero">

    {{-- Left: Text --}}
    <div class="animate-fade-up">

        {{-- Status pill --}}
        <div style="display:inline-flex; align-items:center; gap:0.5rem; background:rgba(237,28,36,0.1); border:1px solid rgba(237,28,36,0.25); border-radius:99px; padding:0.35rem 1rem; margin-bottom:2rem;">
            <span style="display:inline-block; width:7px; height:7px; background:var(--accent-green); border-radius:50%; box-shadow:0 0 6px var(--accent-green); animation: pulse-glow 2s infinite;"></span>
            <span style="font-size:0.72rem; font-weight:700; color:var(--primary-light); letter-spacing:0.06em;">PLATFORM ANTI-BULLYING #1 UNTUK SISWA</span>
        </div>

        <h1 style="margin-bottom:1.5rem;">
            Hentikan<br>
            <span class="text-gradient" id="typewriter-text">Perundungan.</span><br>
            <span style="color:var(--text-muted); font-size:0.6em; font-weight:600;">Mulai Bersuara Sekarang.</span>
        </h1>

        <p style="font-size:1.05rem; color:var(--text-muted); line-height:1.9; margin-bottom:2.5rem; max-width:480px;">
            YOUTHEAL.ID adalah platform <strong style="color:var(--text);">100% anonim</strong> dan terpercaya. Laporkan segala bentuk
            <span style="color:var(--primary-light);">cyberbullying</span>,
            <span style="color:var(--secondary);">kekerasan</span>, atau
            <span style="color:var(--warning);">perundungan</span>
            tanpa rasa takut.
        </p>

        {{-- CTA Buttons --}}
        <div style="display:flex; gap:1rem; flex-wrap:wrap; margin-bottom: 3rem;">
            <a href="{{ route('report.create') }}" class="btn btn-primary btn-lg" id="cta-report">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M12 2L2 7l10 5 10-5-10-5z"/><path d="M2 17l10 5 10-5M2 12l10 5 10-5"/></svg>
                Lapor Sekarang
            </a>
            <a href="{{ route('track.index') }}" class="btn btn-secondary btn-lg">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
                Lacak Laporan
            </a>
        </div>

        {{-- Animated counter stats --}}
        <div style="display:flex; gap:2.5rem; padding-top:2rem; border-top:1px solid var(--border);">
            <div>
                <p style="font-size:1.8rem; font-weight:800; color:var(--text);" class="counter" data-target="100">0</p>
                <p style="font-size:0.75rem; color:var(--text-muted); font-weight:600;">% Anonim</p>
            </div>
            <div style="width:1px; background:var(--border);"></div>
            <div>
                <p style="font-size:1.8rem; font-weight:800; color:var(--text);"><span class="counter" data-target="24">0</span>/7</p>
                <p style="font-size:0.75rem; color:var(--text-muted); font-weight:600;">Selalu Tersedia</p>
            </div>
            <div style="width:1px; background:var(--border);"></div>
            <div>
                <p style="font-size:1.8rem; font-weight:800; color:var(--text);"><span class="counter" data-target="5">0</span>+</p>
                <p style="font-size:0.75rem; color:var(--text-muted); font-weight:600;">Kategori Laporan</p>
            </div>
        </div>
    </div>

    {{-- Right: Hero Image (Minimalist SVG) --}}
    <div class="animate-fade-up-d2" style="position:relative; display:flex; justify-content:center; align-items:center;">
        
        {{-- Main SVG Icon --}}
        <div style="width:100%; max-width:320px; color:var(--primary);">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" style="width:100%; height:auto;">
                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                <path d="M9 12l2 2 4-4"/>
            </svg>
        </div>

        {{-- Developer Info Chips --}}
        <div style="position:absolute; bottom:20px; right:-20px; background:rgba(15,15,15,0.8); border:1px solid rgba(255,255,255,0.1); border-radius:4px; padding:0.8rem 1.1rem; backdrop-filter:blur(8px); z-index:2;">
            <div style="display:flex; align-items:center; gap:0.5rem;">
                <div style="width:8px;height:8px;background:var(--success);border-radius:50%;"></div>
                <span style="font-size:0.72rem; font-weight:700; color:var(--text-muted); font-family:monospace;">ENCRYPTED</span>
            </div>
        </div>

        <div style="position:absolute; top:20px; left:-20px; background:rgba(15,15,15,0.8); border:1px solid rgba(255,255,255,0.1); border-radius:4px; padding:0.8rem 1.1rem; backdrop-filter:blur(8px); z-index:2;">
            <div style="display:flex; align-items:center; gap:0.5rem;">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="color:var(--text-muted);"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg>
                <span style="font-size:0.72rem; font-weight:700; color:var(--text-muted); font-family:monospace;">SYSTEM_ACTIVE</span>
            </div>
        </div>
    </div>
</section>

{{-- ═════════════════════════════════════
     BENTO GRID (STATISTICS, MOOD, QUIZ)
═════════════════════════════════════ --}}
<section style="padding:2rem 0 5rem;" class="reveal">
    <div style="display:grid; grid-template-columns: repeat(12, 1fr); gap: 1rem; align-items: stretch;">

        {{-- Bento Item: Mood Check-in (Span 8) --}}
        <div style="grid-column: span 8; background:var(--bg-card); border:1px solid var(--border); border-radius:var(--radius); padding:2.5rem; text-align:center; display:flex; flex-direction:column; justify-content:center;">
            <div style="margin-bottom: 1.5rem; display: flex; justify-content: center;">
                <span class="badge badge-maroon" style="display: inline-flex; align-items: center; gap: 0.5rem; padding: 0.4rem 1rem;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
                    CEK KONDISI EMOSIONALMU
                </span>
            </div>
            <div style="display:flex; justify-content:center; gap:1.5rem; flex-wrap:wrap;" id="mood-selector">
                <button class="mood-btn" data-mood="sad" onclick="selectMood('sad')">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M16 16s-1.5-2-4-2-4 2-4 2"/><line x1="9" y1="9" x2="9.01" y2="9"/><line x1="15" y1="9" x2="15.01" y2="9"/></svg>
                    <span>Sedih</span>
                </button>
                <button class="mood-btn" data-mood="anxious" onclick="selectMood('anxious')">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M8 14s1.5 2 4 2 4-2 4-2"/><line x1="9" y1="9" x2="9.01" y2="9"/><line x1="15" y1="9" x2="15.01" y2="9"/></svg>
                    <span>Cemas</span>
                </button>
                <button class="mood-btn" data-mood="angry" onclick="selectMood('angry')">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M8 15h8"/><line x1="9" y1="9" x2="9.01" y2="9"/><line x1="15" y1="9" x2="15.01" y2="9"/></svg>
                    <span>Marah</span>
                </button>
                <button class="mood-btn" data-mood="good" onclick="selectMood('good')">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M8 14s1.5 2 4 2 4-2 4-2"/><line x1="9" y1="9" x2="9.01" y2="9"/><line x1="15" y1="9" x2="15.01" y2="9"/></svg>
                    <span>Baik</span>
                </button>
            </div>
            <div id="mood-response" style="margin-top:1.5rem; font-size:0.95rem; font-family:monospace; color:var(--primary); min-height:20px; transition:all 0.3s; opacity:0;"></div>
        </div>

        {{-- Bento Item: Security Badge (Span 4) --}}
        <div style="grid-column: span 4; background:var(--bg-card); border:1px solid var(--border); border-radius:var(--radius); padding:2.5rem; display:flex; flex-direction:column; justify-content:center; align-items:center; text-align:center;">
            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="var(--primary)" stroke-width="1.5" style="margin-bottom:1rem;"><path d="M21 2l-2 2m-7.61 7.61a5.5 5.5 0 1 1-7.778 7.778 5.5 5.5 0 0 1 7.777-7.777zm0 0L15.5 7.5m0 0l3 3L22 7l-3-3m-3.5 3.5L19 4"/></svg>
            <h4 style="font-family:monospace; color:var(--text); margin-bottom:0.5rem; letter-spacing:1px;">END-TO-END</h4>
            <p style="font-size:0.8rem; color:var(--text-muted);">Sistem anonim tanpa retensi IP atau Data Pribadi.</p>
        </div>

        {{-- Bento Item: Mini Quiz (Span 12) --}}
        <div style="grid-column: span 12; background:var(--bg-card); border:1px solid var(--border); border-radius:var(--radius); padding:3rem;">
            <div style="display:flex; justify-content:space-between; align-items:flex-end; border-bottom:1px solid var(--border); padding-bottom:1.5rem; margin-bottom:2rem;">
                <div>
                    <span class="badge badge-red" style="margin-bottom:0.8rem; display:inline-flex; align-items:center; gap:0.4rem;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path></svg>
                        DETEKSI DINI
                    </span>
                    <h2 style="font-size:1.8rem; margin:0;">Apakah kamu mengalami <span style="color:var(--primary);">Bullying</span>?</h2>
                </div>
                <p class="text-muted" style="max-width:300px; font-size:0.85rem; text-align:right;">Pastikan sebelum melapor dengan 3 pertanyaan identifikasi sederhana ini.</p>
            </div>
            
            <div id="quiz-container">
                <div id="quiz-question-1" class="quiz-card active-quiz">
                    <p style="font-size:1.1rem; margin-bottom:1.5rem; color:var(--text);">[1/3] Apakah perilaku candaan mereka membuatmu takut atau sakit hati secara berulang?</p>
                    <div style="display:flex; gap:1rem;">
                        <button class="btn btn-primary" onclick="nextQuiz(1, true)">Ya, sering terjadi</button>
                        <button class="btn btn-secondary" onclick="nextQuiz(1, false)">Tidak, hanya sesekali</button>
                    </div>
                </div>
                
                <div id="quiz-question-2" class="quiz-card" style="display:none;">
                    <p style="font-size:1.1rem; margin-bottom:1.5rem; color:var(--text);">[2/3] Ketika kamu meminta mereka berhenti, apakah mereka mengabaikanmu?</p>
                    <div style="display:flex; gap:1rem;">
                        <button class="btn btn-primary" onclick="nextQuiz(2, true)">Ya, mereka mengabaikanku</button>
                        <button class="btn btn-secondary" onclick="nextQuiz(2, false)">Tidak, mereka berhenti</button>
                    </div>
                </div>
                
                <div id="quiz-question-3" class="quiz-card" style="display:none;">
                    <p style="font-size:1.1rem; margin-bottom:1.5rem; color:var(--text);">[3/3] Apakah ada perbedaan kekuatan (mereka lebih banyak/lebih kuat secara fisik)?</p>
                    <div style="display:flex; gap:1rem;">
                        <button class="btn btn-primary" onclick="nextQuiz(3, true)">Ya, saya lebih lemah</button>
                        <button class="btn btn-secondary" onclick="nextQuiz(3, false)">Tidak, kami setara</button>
                    </div>
                </div>
                
                <div id="quiz-result" class="quiz-card" style="display:none; padding:2rem; background:rgba(238,45,36,0.05); border:1px solid var(--primary); border-radius:var(--radius-sm);">
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="var(--primary)" stroke-width="2" style="margin-bottom:1rem;"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"/><line x1="12" y1="9" x2="12" y2="13"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>
                    <h3 style="color:var(--text); margin-bottom:0.5rem; font-family:monospace;">RESULT: KEMUNGKINAN_BULLYING</h3>
                    <p class="text-muted" style="margin-bottom:1.5rem; font-size:0.9rem;">Indikator menunjukkan pola perundungan. Silakan gunakan hakmu untuk melapor.</p>
                    <a href="{{ route('report.create') }}" class="btn btn-primary">Lapor Sekarang</a>
                </div>
                
                <div id="quiz-result-safe" class="quiz-card" style="display:none; padding:2rem; background:rgba(16,185,129,0.05); border:1px solid var(--success); border-radius:var(--radius-sm);">
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="var(--success)" stroke-width="2" style="margin-bottom:1rem;"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                    <h3 style="color:var(--text); margin-bottom:0.5rem; font-family:monospace;">RESULT: KONFLIK_BIASA</h3>
                    <p class="text-muted" style="margin-bottom:1.5rem; font-size:0.9rem;">Berdasarkan polanya, ini kemungkinan kesalahpahaman biasa. Coba komunikasikan kembali.</p>
                    <button class="btn btn-secondary" onclick="resetQuiz()">Ulangi Kuis</button>
                </div>
            </div>
        </div>

    </div>
</section>

{{-- ═════════════════════════════════════
     CYBERBULLYING TYPES
═════════════════════════════════════ --}}
<section style="padding:3rem 0 5rem;" class="reveal">
    <div style="text-align:center; margin-bottom:3.5rem;">
        <span class="badge badge-maroon" style="margin-bottom:1rem;">KENALI JENISNYA</span>
        <h2 style="font-size:2rem;">Bentuk Perundungan yang<br><span class="text-gradient">Harus Kamu Kenali</span></h2>
        <p class="text-muted" style="margin-top:0.75rem; max-width:550px; margin-left:auto; margin-right:auto;">Perundungan hadir dalam banyak bentuk. Mengenali tandanya adalah langkah pertama melindungi diri sendiri dan orang lain.</p>
    </div>

    <div style="display:grid; grid-template-columns:repeat(3,1fr); gap:1.25rem;" id="type-grid">

        @php
        $types = [
            ['emoji' => '💻', 'title' => 'Cyberbullying', 'color' => 'var(--primary-light)', 'rgba' => '237,28,36', 'badge' => 'badge-red', 'label' => 'Platform Online', 'desc' => 'Ancaman, hinaan, atau penyebaran konten merendahkan melalui media sosial, pesan teks, atau platform online lainnya.'],
            ['emoji' => '🗣️', 'title' => 'Verbal', 'color' => 'var(--secondary)', 'rgba' => '182,37,42', 'badge' => 'badge-maroon', 'label' => 'Kata-Kata', 'desc' => 'Ejekan, hinaan, label negatif, atau ancaman langsung yang menyerang pikiran dan perasaan korban secara emosional.'],
            ['emoji' => '🥊', 'title' => 'Fisik', 'color' => 'var(--warning)', 'rgba' => '245,158,11', 'badge' => 'badge-yellow', 'label' => 'Kontak Fisik', 'desc' => 'Serangan langsung seperti memukul, mendorong, menendang, atau merusak barang milik orang lain secara sengaja.'],
            ['emoji' => '👥', 'title' => 'Sosial', 'color' => 'var(--accent-green)', 'rgba' => '34,211,165', 'badge' => 'badge-green', 'label' => 'Relasi Sosial', 'desc' => 'Pengucilan, penyebaran gosip, atau manipulasi hubungan pertemanan untuk menjatuhkan seseorang secara sosial.'],
            ['emoji' => '🚨', 'title' => 'Seksual / Pelecehan', 'color' => 'var(--danger)', 'rgba' => '244,63,94', 'badge' => '', 'label' => 'Sangat Serius', 'desc' => 'Komentar, sentuhan, atau tindakan seksual yang tidak diinginkan dan sangat merugikan korban secara psikologis.'],
        ];
        @endphp

        @foreach($types as $i => $type)
        <div class="card" data-tilt data-tilt-max="10" data-tilt-speed="400" data-tilt-glare="true" data-tilt-max-glare="0.2" style="position:relative; overflow:hidden; transition-delay:{{ $i * 0.05 }}s;" onmouseover="this.querySelector('.type-glow').style.opacity='1'" onmouseout="this.querySelector('.type-glow').style.opacity='0'">
            <div class="type-glow" style="position:absolute; top:-40px; right:-40px; width:150px; height:150px; background:radial-gradient(circle, rgba({{ $type['rgba'] }},0.12) 0%, transparent 70%); opacity:0; transition:opacity 0.4s;"></div>
            <div style="font-size:2.5rem; margin-bottom:1rem; position:relative; display:inline-block;">
                {{ $type['emoji'] }}
                {{-- Animated ring around emoji on hover --}}
                <svg style="position:absolute; top:-6px; left:-6px;" width="50" height="50" viewBox="0 0 50 50">
                    <circle cx="25" cy="25" r="22" fill="none" stroke="rgba({{ $type['rgba'] }},0.3)" stroke-width="1" stroke-dasharray="138" stroke-dashoffset="138" style="transition: stroke-dashoffset 0.6s;">
                    </circle>
                </svg>
            </div>
            <h3 style="color:{{ $type['color'] }};">{{ $type['title'] }}</h3>
            <p class="text-muted" style="font-size:0.85rem; line-height:1.7;">{{ $type['desc'] }}</p>
            <div style="margin-top:1.25rem; padding-top:1rem; border-top:1px solid var(--border);">
                @if($type['badge'])
                    <span class="{{ $type['badge'] }}">{{ $type['label'] }}</span>
                @else
                    <span style="background:rgba({{ $type['rgba'] }},0.1); color:{{ $type['color'] }}; padding:0.3rem 0.8rem; border-radius:99px; font-size:0.68rem; font-weight:800; border:1px solid rgba({{ $type['rgba'] }},0.25);">{{ $type['label'] }}</span>
                @endif
            </div>
        </div>
        @endforeach

        {{-- CTA card (Flat Minimalist) --}}
        <div class="card" style="background:var(--bg-card); border-color:var(--border); display:flex; flex-direction:column; justify-content:center; align-items:center; text-align:center; gap:1.25rem;">
            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="var(--primary)" stroke-width="1.5"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
            <div>
                <h3 style="font-family:monospace; color:var(--text);">Kamu Tidak Sendirian</h3>
                <p class="text-muted" style="font-size:0.85rem; margin-top:0.4rem;">Sistem siap menerima input.</p>
            </div>
            <a href="{{ route('report.create') }}" class="btn btn-primary" style="width:100%;">Lapor Anonim</a>
        </div>
    </div>
</section>

{{-- Removed old statistics bar as it's merged into Bento Grid --}}

{{-- ═════════════════════════════════════
     HOW IT WORKS — 3 Steps
═════════════════════════════════════ --}}
<section style="padding:4rem 0;" class="reveal">
    <div style="text-align:center; margin-bottom:3.5rem;">
        <span class="badge badge-green" style="margin-bottom:1rem;">CARA KERJA</span>
        <h2>Mudah, Cepat, <span class="text-gradient">100% Anonim</span></h2>
        <p class="text-muted" style="margin-top:0.5rem;">Hanya 3 langkah untuk membuat perubahan nyata.</p>
    </div>

    <div style="display:grid; grid-template-columns:repeat(3,1fr); gap:1.5rem; position:relative;">
        {{-- Connector line --}}
        <div style="position:absolute; top:48px; left:calc(16.66% + 2rem); right:calc(16.66% + 2rem); height:2px; background:linear-gradient(to right, var(--primary), var(--secondary), var(--accent-green)); opacity:0.2; pointer-events:none; z-index:0;"></div>

        @php
        $steps = [
            ['icon' => '📝', 'step' => '01', 'color' => 'var(--primary-light)', 'rgba' => '237,28,36', 'title' => 'Isi Formulir', 'desc' => 'Pilih kategori, deskripsikan kejadian, dan lampirkan bukti. Tidak ada data pribadimu yang tersimpan.'],
            ['icon' => '🔐', 'step' => '02', 'color' => 'var(--secondary)', 'rgba' => '182,37,42', 'title' => 'Terima Kode Rahasia', 'desc' => 'Simpan kode pelacakan 6 digit yang unik. Ini satu-satunya cara untuk mengakses kembali laporanmu.'],
            ['icon' => '💬', 'step' => '03', 'color' => 'var(--accent-green)', 'rgba' => '34,211,165', 'title' => 'Pantau Tanggapan', 'desc' => 'Guru BK akan meninjau dan merespons. Cek progressnya kapan saja lewat halaman Lacak.'],
        ];
        @endphp

        @foreach($steps as $step)
        <div style="text-align:center; padding:2rem 1.5rem; position:relative; z-index:1;">
            <div style="width:80px; height:80px; border-radius:50%; background:rgba({{ $step['rgba'] }},0.1); border:2px solid rgba({{ $step['rgba'] }},0.35); display:flex; align-items:center; justify-content:center; margin:0 auto 1.5rem; font-size:2rem; box-shadow:0 0 25px rgba({{ $step['rgba'] }},0.15); transition:var(--transition);">
                {{ $step['icon'] }}
            </div>
            <div style="font-size:0.72rem; font-weight:800; color:{{ $step['color'] }}; letter-spacing:0.12em; margin-bottom:0.5rem;">LANGKAH {{ $step['step'] }}</div>
            <h3>{{ $step['title'] }}</h3>
            <p class="text-muted" style="font-size:0.85rem; margin-top:0.5rem; line-height:1.7;">{{ $step['desc'] }}</p>
        </div>
        @endforeach
    </div>
</section>

{{-- ═════════════════════════════════════
     EMERGENCY HOTLINES (INNOVATION)
═════════════════════════════════════ --}}
<section style="padding:2rem 0; margin-bottom: 2rem;" class="reveal">
    <div style="background:rgba(244,63,94,0.04); border:1px dashed rgba(244,63,94,0.25); border-radius:var(--radius-lg); padding:2.5rem; text-align:center; position:relative; overflow:hidden;">
        <!-- Background alert glow -->
        <div style="position:absolute; top:50%; left:50%; width:600px; height:600px; background:radial-gradient(circle, rgba(244,63,94,0.05) 0%, transparent 60%); transform:translate(-50%, -50%); pointer-events:none; animation:pulse-glow 4s infinite;"></div>
        
        <h3 style="color:var(--danger); margin-bottom:0.5rem; font-size:1.6rem; position:relative;">🚨 Kontak Darurat Nasional</h3>
        <p class="text-muted" style="margin-bottom:2.5rem; font-size:0.95rem; max-width:600px; margin-left:auto; margin-right:auto; position:relative;">Jika kamu merasa berada dalam ancaman serius atau butuh bantuan psikologis segera, jangan ragu menghubungi layanan ini. Rahasia dijamin.</p>
        
        <div style="display:flex; justify-content:center; gap:1.5rem; flex-wrap:wrap; position:relative;">
            <div class="card" data-tilt data-tilt-max="5" style="border-color:rgba(244,63,94,0.2); background:rgba(244,63,94,0.08); padding:1.5rem; flex:1; min-width:250px;">
                <div style="font-size:2rem; margin-bottom:0.8rem; animation: float 3s ease-in-out infinite;">👶</div>
                <h4>KPAI</h4>
                <p style="font-size:0.8rem; color:var(--text-muted); margin-bottom:1rem;">Komisi Perlindungan Anak</p>
                <a href="tel:02131901556" class="btn btn-danger btn-sm" style="width:100%; padding:0.6rem; font-size:0.85rem;">📞 021-31901556</a>
            </div>
            <div class="card" data-tilt data-tilt-max="5" style="border-color:rgba(237,28,36,0.2); background:rgba(237,28,36,0.08); padding:1.5rem; flex:1; min-width:250px;">
                <div style="font-size:2rem; margin-bottom:0.8rem; animation: float 4s ease-in-out infinite;">🫂</div>
                <h4>SAPA 129</h4>
                <p style="font-size:0.8rem; color:var(--text-muted); margin-bottom:1rem;">Sahabat Perempuan & Anak</p>
                <a href="tel:129" class="btn btn-primary btn-sm" style="width:100%; padding:0.6rem; font-size:0.85rem;">📞 129</a>
            </div>
            <div class="card" data-tilt data-tilt-max="5" style="border-color:rgba(34,211,165,0.2); background:rgba(34,211,165,0.08); padding:1.5rem; flex:1; min-width:250px;">
                <div style="font-size:2rem; margin-bottom:0.8rem; animation: float 3.5s ease-in-out infinite;">🏥</div>
                <h4>SEJIWA</h4>
                <p style="font-size:0.8rem; color:var(--text-muted); margin-bottom:1rem;">Psikologi Sehat Jiwa</p>
                <a href="tel:119" class="btn" style="width:100%; background:rgba(34,211,165,0.15); color:var(--accent-green); border:1px solid rgba(34,211,165,0.4); padding:0.6rem; font-size:0.85rem;">📞 119 ext 8</a>
            </div>
        </div>
    </div>
</section>

{{-- ═════════════════════════════════════
     ARTICLES — Education
═════════════════════════════════════ --}}
<section style="padding:3rem 0 5rem;" class="reveal">
    <div style="display:flex; justify-content:space-between; align-items:flex-end; margin-bottom:2.5rem;">
        <div>
            <span class="badge badge-red" style="margin-bottom:0.75rem;">EDUKASI</span>
            <h2>Materi <span class="text-gradient">Terkini</span></h2>
            <p class="text-muted" style="margin-top:0.5rem;">Kenali dampaknya, lindungi masa depanmu.</p>
        </div>
    </div>

    <div class="article-grid">
        @forelse($articles as $article)
        <div class="article-card" data-tilt data-tilt-max="3" data-tilt-glare="true" data-tilt-max-glare="0.2">
            <div style="overflow:hidden;">
                <img class="article-card-img"
                     src="{{ $article->image_url ?? 'https://images.unsplash.com/photo-1503428593586-e225b39bddfe?auto=format&fit=crop&w=800&q=80' }}"
                     alt="{{ $article->title }}"
                     loading="lazy"
                     onerror="this.src='https://images.unsplash.com/photo-1503428593586-e225b39bddfe?auto=format&fit=crop&w=800&q=80'">
            </div>
            <div class="article-card-body">
                <span class="badge badge-red" style="margin-bottom:0.75rem;">{{ $article->category->name ?? 'Edukasi' }}</span>
                <h3 style="font-size:1.05rem; margin-bottom:0.6rem;">{{ $article->title }}</h3>
                <p class="text-muted" style="font-size:0.83rem; line-height:1.7; margin-bottom:1.25rem;">
                    {{ Str::limit($article->content, 110) }}
                </p>
                <a href="#" style="display:flex; align-items:center; gap:0.4rem; font-size:0.8rem; font-weight:700; color:var(--primary-light); padding-top:1rem; border-top:1px solid var(--border);">
                    Baca Selengkapnya
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                </a>
            </div>
        </div>
        @empty
        <div style="grid-column:1/-1; text-align:center; padding:5rem 2rem; background:var(--bg-card); border:1px dashed var(--border); border-radius:var(--radius);">
            <div style="font-size:3.5rem; margin-bottom:1rem;">📚</div>
            <h3 style="margin-bottom:0.5rem;">Belum Ada Artikel</h3>
            <p class="text-muted">Admin dapat menambahkan materi edukasi lewat Dashboard.</p>
        </div>
        @endforelse
    </div>
</section>

{{-- ═════════════════════════════════════
     CTA BANNER — Final Push
═════════════════════════════════════ --}}
<section style="padding:2rem 0 1rem;" class="reveal">
    <div style="background:var(--bg-card); border:1px solid var(--border); border-radius:var(--radius); padding:4.5rem 3rem; text-align:center; position:relative; overflow:hidden;">

        {{-- Animated image replaced with Flat SVG --}}
        <div style="display:flex; justify-content:center; margin-bottom:1.5rem; position:relative; z-index:1;">
            <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="var(--primary)" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                <rect x="3" y="3" width="18" height="18" rx="2" ry="2"/>
                <line x1="9" y1="3" x2="9" y2="21"/>
            </svg>
        </div>

        <h2 style="font-size:2.25rem; margin-bottom:1rem; position:relative;">Siap Mengambil <span class="text-gradient">Langkah Pertama?</span></h2>
        <p style="color:var(--text-muted); max-width:520px; margin:0 auto 2.5rem; font-size:1.05rem; line-height:1.8; position:relative;">
            Identitasmu dilindungi sepenuhnya. Setiap laporan adalah langkah nyata menuju sekolah yang lebih aman bagi semua.
        </p>

        <div style="display:flex; gap:1rem; justify-content:center; position:relative;">
            <a href="{{ route('report.create') }}" class="btn btn-primary btn-lg" style="min-width:220px;">
                🛡️ Buat Laporan Anonim
            </a>
            <a href="{{ route('track.index') }}" class="btn btn-secondary btn-lg">
                Lacak Laporan
            </a>
        </div>
    </div>
</section>

{{-- Inline Styles + Scripts --}}
<style>
    /* Mood Check-in interactive styles */
    .mood-btn {
        background: transparent;
        border: 1px solid var(--border);
        border-radius: var(--radius-sm);
        padding: 0.75rem 1.5rem;
        font-size: 1rem;
        cursor: pointer;
        transition: var(--transition);
        color: var(--text-muted);
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
    .mood-btn:hover {
        background: rgba(255,255,255,0.02);
        border-color: var(--primary);
        color: var(--text);
    }
    .mood-btn.active {
        background: var(--primary);
        border-color: var(--primary);
        color: white;
    }

    @media (max-width: 900px) {
        #hero { grid-template-columns: 1fr !important; min-height: auto !important; text-align: center; }
        #hero > div:last-child { display: none; }
        #hero .animate-fade-up > div:last-child { justify-content: center; }
    }

    @media (max-width: 768px) {
        .article-grid { grid-template-columns: 1fr !important; }
        #type-grid { grid-template-columns: 1fr 1fr !important; }
        div[style*="grid-template-columns:repeat(3"] { grid-template-columns: 1fr !important; }
        div[style*="grid-template-columns:repeat(4"] { grid-template-columns: 1fr 1fr !important; }
    }

    /* Hover ring animation for type cards */
    .card:hover svg circle {
        stroke-dashoffset: 0 !important;
    }
</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/vanilla-tilt/1.8.1/vanilla-tilt.min.js"></script>
<script>
// Mood check-in interaction
function selectMood(mood) {
    document.querySelectorAll('.mood-btn').forEach(btn => btn.classList.remove('active'));
    document.querySelector(`.mood-btn[data-mood="${mood}"]`).classList.add('active');
    
    const responses = {
        'sad': 'Tidak apa-apa merasa sedih. Kamu tidak sendirian. Jangan ragu untuk bercerita jika butuh teman. 🫂',
        'anxious': 'Tarik napas dalam-dalam. Keberanianmu lebih besar dari rasa cemasmu. Kami ada di sini. 🌿',
        'angry': 'Wajar merasa marah. Jangan biarkan itu menyakitimu lebih jauh. Kami mendengarkan. 🛡️',
        'okay': 'Setiap hari adalah langkah baru. Jaga dirimu, dan ingat kami selalu ada mendukungmu. ☀️',
        'good': 'Senang mendengarnya! Terus sebarkan energi positifmu ke sekitarmu. ✨'
    };
    
    const responseEl = document.getElementById('mood-response');
    responseEl.style.opacity = 0;
    setTimeout(() => {
        responseEl.textContent = responses[mood];
        responseEl.style.opacity = 1;
    }, 200);
}

// Animated counters
document.addEventListener('DOMContentLoaded', () => {
    const counters = document.querySelectorAll('.counter');
    const speed = 80;

    const observerC = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const counter = entry.target;
                const target = +counter.getAttribute('data-target');
                let current = 0;
                const inc = target / speed;
                const timer = setInterval(() => {
                    current += inc;
                    if (current >= target) {
                        counter.textContent = target;
                        clearInterval(timer);
                    } else {
                        counter.textContent = Math.ceil(current);
                    }
                }, 20);
                observerC.unobserve(counter);
            }
        });
    }, { threshold: 0.5 });

    counters.forEach(c => observerC.observe(c));
});

// Typewriter effect
(function() {
    const words = ['Perundungan.', 'Cyberbullying.', 'Kekerasan.', 'Intimidasi.', 'Pelecehan.'];
    let wordIndex = 0;
    let charIndex = 0;
    let isDeleting = false;
    const el = document.getElementById('typewriter-text');
    if (!el) return;

    function type() {
        const current = words[wordIndex];
        if (isDeleting) {
            el.textContent = current.substring(0, charIndex - 1);
            charIndex--;
        } else {
            el.textContent = current.substring(0, charIndex + 1);
            charIndex++;
        }

        let delay = isDeleting ? 50 : 100;

        if (!isDeleting && charIndex === current.length) {
            delay = 2000;
            isDeleting = true;
        } else if (isDeleting && charIndex === 0) {
            isDeleting = false;
            wordIndex = (wordIndex + 1) % words.length;
            delay = 500;
        }

        setTimeout(type, delay);
    }

    setTimeout(type, 1500);
})();

// Quiz logic (Moved outside IIFE for global scope access)
let quizScore = 0;
function nextQuiz(currentQ, isBullyIndicator) {
    if (isBullyIndicator) quizScore++;
    
    document.getElementById('quiz-question-' + currentQ).style.display = 'none';
    
    if (currentQ < 3) {
        const next = document.getElementById('quiz-question-' + (currentQ + 1));
        next.style.display = 'block';
        next.style.animation = 'fadeInUp 0.4s ease forwards';
    } else {
        if (quizScore >= 2) {
            const res = document.getElementById('quiz-result');
            res.style.display = 'block';
            res.style.animation = 'fadeInUp 0.4s ease forwards';
        } else {
            const res = document.getElementById('quiz-result-safe');
            res.style.display = 'block';
            res.style.animation = 'fadeInUp 0.4s ease forwards';
        }
    }
}

function resetQuiz() {
    quizScore = 0;
    document.getElementById('quiz-result').style.display = 'none';
    document.getElementById('quiz-result-safe').style.display = 'none';
    document.getElementById('quiz-question-1').style.display = 'block';
}

</script>

@endsection
