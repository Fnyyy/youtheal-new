@extends('layouts.app')

@section('content')
<div style="max-width: 460px; margin: 3rem auto;">

    {{-- Header --}}
    <div style="text-align:center; margin-bottom:2.5rem;" class="animate-fade-up">
        <div style="display:inline-flex; align-items:center; justify-content:center; width:68px; height:68px; background:linear-gradient(135deg, rgba(237,28,36,0.2), rgba(139,92,246,0.1)); border:1px solid rgba(237,28,36,0.35); border-radius:50%; margin-bottom:1.25rem; font-size:1.75rem;">🔑</div>
        <h1 style="font-size:2rem; margin-bottom:0.5rem;">Staff <span class="text-gradient">Login</span></h1>
        <p class="text-muted" style="font-size:0.9rem;">Akses eksklusif untuk Guru Bimbingan Konseling (BK)</p>
    </div>

    {{-- Card --}}
    <div class="card animate-fade-up-d1" style="padding:2.5rem;">

        @if($errors->any())
            <div style="background:rgba(255,71,87,0.1); border:1px solid rgba(255,71,87,0.3); color:var(--danger); padding:1rem; border-radius:10px; margin-bottom:1.5rem; font-size:0.875rem; font-weight:600; display:flex; align-items:center; gap:0.6rem;">
                <span>⚠️</span> {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('login.authenticate') }}" method="POST" id="login-form">
            @csrf

            <div class="form-group">
                <label class="form-label">Alamat Email</label>
                <div style="position:relative;">
                    <svg style="position:absolute; left:1rem; top:50%; transform:translateY(-50%); color:var(--text-dim);" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,12 2,6"/></svg>
                    <input type="email" name="email" class="form-input" placeholder="konselor@sekolah.ac.id" required autofocus
                           value="{{ old('email') }}"
                           style="padding-left:2.75rem;">
                </div>
            </div>

            <div class="form-group">
                <label class="form-label">Password</label>
                <div style="position:relative;">
                    <svg style="position:absolute; left:1rem; top:50%; transform:translateY(-50%); color:var(--text-dim);" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                    <input type="password" name="password" class="form-input" placeholder="••••••••" required id="password-field"
                           style="padding-left:2.75rem; padding-right:3rem;">
                    <button type="button" onclick="togglePw()" style="position:absolute; right:1rem; top:50%; transform:translateY(-50%); background:none; border:none; cursor:pointer; color:var(--text-muted); padding:0;" title="Tampilkan password">
                        <svg id="pw-eye" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                    </button>
                </div>
            </div>

            <button type="submit" class="btn btn-primary btn-full btn-lg" id="login-btn" style="margin-top:0.5rem;">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"/><polyline points="10 17 15 12 10 7"/><line x1="15" y1="12" x2="3" y2="12"/></svg>
                Masuk ke Dashboard
            </button>
        </form>

        <div style="border-top:1px solid var(--border); margin-top:2rem; padding-top:1.5rem; text-align:center;">
            <p style="font-size:0.8rem; color:var(--text-dim);">Lupa password? Hubungi IT Support sekolah</p>
        </div>
    </div>

    {{-- Back to home --}}
    <div style="text-align:center; margin-top:1.5rem;">
        <a href="{{ route('home') }}" style="font-size:0.85rem; color:var(--text-muted); display:inline-flex; align-items:center; gap:0.4rem; transition:color 0.2s;" onmouseover="this.style.color='var(--primary-light)'" onmouseout="this.style.color='var(--text-muted)'">
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="15 18 9 12 15 6"/></svg>
            Kembali ke Beranda
        </a>
    </div>
</div>

<script>
function togglePw() {
    const f = document.getElementById('password-field');
    f.type = f.type === 'password' ? 'text' : 'password';
}

document.getElementById('login-form')?.addEventListener('submit', function() {
    const btn = document.getElementById('login-btn');
    btn.textContent = '⏳ Masuk...';
    btn.disabled = true;
});
</script>
@endsection
