@extends('layouts.app')

@section('content')
<div style="max-width: 680px; margin: 0 auto;">

    {{-- Header --}}
    <div style="text-align:center; margin-bottom:3rem;" class="animate-fade-up">
        <div style="display:inline-flex; align-items:center; justify-content:center; width:72px; height:72px; background:rgba(237,28,36,0.15); border:1px solid rgba(237,28,36,0.3); border-radius:50%; margin-bottom:1.5rem; font-size:2rem;">📝</div>
        <h1 style="font-size:2.25rem; margin-bottom:0.75rem;">Laporan <span class="text-gradient">Anonim</span></h1>
        <p class="text-muted" style="font-size:1rem; line-height:1.8; max-width:480px; margin:0 auto;">Ceritamu aman bersama kami. Seluruh laporan bersifat <strong style="color:var(--text);">anonim</strong> dan tidak mencatat data pribadimu.</p>
    </div>

    @if(session('success_code'))
    {{-- ══ SUCCESS STATE ══ --}}
    <div class="animate-fade" style="background:rgba(34,211,165,0.05); border:1px solid rgba(34,211,165,0.25); border-radius:20px; padding:3rem; text-align:center;">

        {{-- Animated checkmark --}}
        <div style="display:inline-flex; align-items:center; justify-content:center; width:80px; height:80px; background:rgba(34,211,165,0.15); border:2px solid rgba(34,211,165,0.4); border-radius:50%; margin-bottom:2rem; font-size:2.5rem; box-shadow:0 0 30px rgba(34,211,165,0.2);">✅</div>

        <h2 style="color:var(--accent-green); margin-bottom:0.75rem;">Laporan Berhasil Dikirim!</h2>
        <p class="text-muted" style="margin-bottom:2rem; line-height:1.7;">
            Guru BK akan segera meninjau laporanmu. Simpan kode berikut untuk memantau perkembangan laporan.
        </p>

        {{-- Tracking code display --}}
        <div style="margin-bottom:2.5rem;">
            <p style="font-size:0.75rem; font-weight:700; text-transform:uppercase; letter-spacing:0.1em; color:var(--text-muted); margin-bottom:0.75rem;">Kode Pelacakanmu</p>
            <div id="tracking-code" style="font-size:2.75rem; font-weight:800; color:var(--text); letter-spacing:0.35em; font-family:monospace; background:var(--bg-elevated); display:inline-block; padding:1rem 2.5rem; border-radius:14px; border:2px dashed rgba(237,28,36,0.5); cursor:pointer; transition:all 0.2s;" onclick="copyCode()" title="Klik untuk menyalin">
                {{ session('success_code') }}
            </div>
            <p style="font-size:0.75rem; color:var(--text-dim); margin-top:0.75rem;" id="copy-hint">
                Klik kode untuk menyalin ke clipboard
            </p>
        </div>

        <div style="display:flex; gap:0.75rem; justify-content:center; flex-wrap:wrap;">
            <a href="{{ route('track.index') }}" class="btn btn-primary">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
                Cek Status Sekarang
            </a>
            <a href="{{ route('home') }}" class="btn btn-secondary">Kembali ke Beranda</a>
        </div>
    </div>

    <script>
        function copyCode() {
            const code = '{{ session('success_code') }}';
            navigator.clipboard.writeText(code).then(() => {
                const el = document.getElementById('tracking-code');
                const hint = document.getElementById('copy-hint');
                el.style.borderColor = 'rgba(34,211,165,0.8)';
                el.style.color = 'var(--accent-green)';
                hint.textContent = '✅ Kode telah disalin!';
                hint.style.color = 'var(--accent-green)';
                setTimeout(() => {
                    el.style.borderColor = 'rgba(237,28,36,0.5)';
                    el.style.color = 'var(--text)';
                    hint.textContent = 'Klik kode untuk menyalin ke clipboard';
                    hint.style.color = '';
                }, 3000);
            });
        }
    </script>

    @else
    {{-- ══ FORM STATE ══ --}}
    <div class="card animate-fade-up-d1" style="padding:2.5rem;">

        {{-- Validation errors --}}
        @if($errors->any())
            <div class="flash-error" style="margin-bottom:2rem;">
                <ul style="list-style:none;">
                    @foreach($errors->all() as $error)
                        <li>⚠️ {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('report.store') }}" method="POST" enctype="multipart/form-data" id="report-form">
            @csrf

            {{-- Category (Maximized UI/UX) --}}
            <div class="form-group">
                <label class="form-label">Kategori Perundungan</label>
                @if($categories->isEmpty())
                    <p style="font-size:0.8rem; color:var(--warning); margin-top:0.5rem; background:rgba(245,158,11,0.1); padding:0.75rem; border-radius:8px;">
                        ⚠️ Belum ada kategori yang tersedia saat ini.
                    </p>
                @else
                    <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(140px, 1fr)); gap:1rem; margin-top:0.5rem;">
                        @foreach($categories as $category)
                            <label class="category-card" style="position:relative; cursor:pointer;">
                                <input type="radio" name="category_id" value="{{ $category->id }}" required {{ old('category_id') == $category->id ? 'checked' : '' }} style="position:absolute; opacity:0;" onchange="updateCategoryCards()">
                                <div class="cat-content" style="background:var(--bg-elevated); border:2px solid var(--border); border-radius:12px; padding:1.25rem 1rem; text-align:center; transition:all 0.3s cubic-bezier(0.4, 0, 0.2, 1); height:100%; display:flex; flex-direction:column; justify-content:center; gap:0.5rem;">
                                    <span style="font-size:1.75rem; display:block; transition:transform 0.3s;">📌</span>
                                    <span style="font-size:0.85rem; font-weight:700; color:var(--text);">{{ $category->name }}</span>
                                </div>
                            </label>
                        @endforeach
                    </div>
                @endif
            </div>

            {{-- Severity (Tingkat Keparahan) --}}
            <div class="form-group">
                <label class="form-label">Tingkat Keparahan / Skala Prioritas <span style="font-weight:400; color:var(--text-dim);">(Opsional)</span></label>
                <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(140px, 1fr)); gap:1rem; margin-top:0.5rem;">
                    <label class="severity-card" style="position:relative; cursor:pointer;">
                        <input type="radio" name="severity" value="Ringan" {{ old('severity') == 'Ringan' ? 'checked' : '' }} style="position:absolute; opacity:0;">
                        <div class="sev-content sev-ringan" style="background:var(--bg-elevated); border:2px solid var(--border); border-radius:12px; padding:1rem; text-align:center; transition:all 0.3s; height:100%; display:flex; flex-direction:column; justify-content:center; gap:0.25rem;">
                            <span style="font-size:1.5rem; margin-bottom:0.25rem;">👀</span>
                            <span style="font-size:0.85rem; font-weight:700; color:var(--text);">Ringan</span>
                            <span style="font-size:0.7rem; color:var(--text-muted); line-height:1.4;">Bercanda Kasar, Ejekan verbal sesekali</span>
                        </div>
                    </label>
                    <label class="severity-card" style="position:relative; cursor:pointer;">
                        <input type="radio" name="severity" value="Sedang" {{ old('severity') == 'Sedang' ? 'checked' : '' }} style="position:absolute; opacity:0;">
                        <div class="sev-content sev-sedang" style="background:var(--bg-elevated); border:2px solid var(--border); border-radius:12px; padding:1rem; text-align:center; transition:all 0.3s; height:100%; display:flex; flex-direction:column; justify-content:center; gap:0.25rem;">
                            <span style="font-size:1.5rem; margin-bottom:0.25rem;">😨</span>
                            <span style="font-size:0.85rem; font-weight:700; color:var(--text);">Sedang</span>
                            <span style="font-size:0.7rem; color:var(--text-muted); line-height:1.4;">Ancaman, Cyberbullying, Pengucilan</span>
                        </div>
                    </label>
                    <label class="severity-card" style="position:relative; cursor:pointer;">
                        <input type="radio" name="severity" value="Parah" {{ old('severity') == 'Parah' ? 'checked' : '' }} style="position:absolute; opacity:0;">
                        <div class="sev-content sev-parah" style="background:var(--bg-elevated); border:2px solid var(--border); border-radius:12px; padding:1rem; text-align:center; transition:all 0.3s; height:100%; display:flex; flex-direction:column; justify-content:center; gap:0.25rem;">
                            <span style="font-size:1.5rem; margin-bottom:0.25rem;">🚨</span>
                            <span style="font-size:0.85rem; font-weight:700; color:var(--text);">Darurat</span>
                            <span style="font-size:0.7rem; color:var(--text-muted); line-height:1.4;">Kekerasan Fisik, Pemerasan, Pelecehan</span>
                        </div>
                    </label>
                </div>
            </div>

            {{-- Additional Details Grid --}}
            <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(250px, 1fr)); gap:1.5rem; margin-bottom:1.5rem;">
                <div class="form-group" style="margin-bottom:0;">
                    <label class="form-label">Siapa Pelakunya? <span style="font-weight:400; color:var(--text-dim);">(Opsional)</span></label>
                    <input type="text" name="perpetrator_name" class="form-input" placeholder="Tulis nama/inisial/kelas..." value="{{ old('perpetrator_name') }}" maxlength="255">
                </div>
                <div class="form-group" style="margin-bottom:0;">
                    <label class="form-label">Tanggal Kejadian <span style="font-weight:400; color:var(--text-dim);">(Opsional)</span></label>
                    <input type="date" name="incident_date" class="form-input" value="{{ old('incident_date') }}" max="{{ date('Y-m-d') }}">
                </div>
            </div>

            <div class="form-group">
                <label class="form-label">Lokasi Kejadian <span style="font-weight:400; color:var(--text-dim);">(Opsional)</span></label>
                <input type="text" name="incident_location" class="form-input" placeholder="Di mana hal ini terjadi? (misal: Kantin, Toilet, WhatsApp)" value="{{ old('incident_location') }}" maxlength="255">
            </div>

            {{-- Description --}}
            <div class="form-group">
                <label class="form-label">Detail Kejadian</label>
                <textarea
                    name="description"
                    class="form-textarea"
                    rows="6"
                    placeholder="Ceritakan apa yang terjadi, kapan, di mana, dan siapa yang terlibat... (Kamu tidak perlu menyebutkan namamu sendiri)"
                    required
                    id="description-area"
                    maxlength="2000"
                    oninput="updateCounter(this)">{{ old('description') }}</textarea>
                <div style="display:flex; justify-content:space-between; margin-top:0.4rem;">
                    <p style="font-size:0.75rem; color:var(--text-dim);">Minimal 30 karakter</p>
                    <p style="font-size:0.75rem; color:var(--text-dim);" id="char-count">0 / 2000</p>
                </div>
            </div>

            {{-- File Upload (Maximized UI/UX) --}}
            <div class="form-group">
                <label class="form-label">Unggah Bukti <span style="font-weight:400; color:var(--text-dim);">(Opsional)</span></label>
                <label for="photo-upload" style="display:flex; flex-direction:column; align-items:center; justify-content:center; gap:0.75rem; background:var(--bg-elevated); border:2px dashed var(--border); border-radius:12px; padding:2rem; cursor:pointer; transition:all 0.3s cubic-bezier(0.4, 0, 0.2, 1); position:relative; overflow:hidden;" id="drop-zone">
                    <div id="upload-prompt" style="display:flex; flex-direction:column; align-items:center; gap:0.75rem;">
                        <span style="font-size:2.5rem; animation:float 3s infinite;">📎</span>
                        <span style="font-size:0.875rem; color:var(--text-muted); text-align:center; font-weight:600;">Klik atau seret foto/screenshot ke sini<br><span style="font-size:0.75rem; color:var(--text-dim); font-weight:400; margin-top:0.25rem; display:block;">Mendukung PNG, JPG, WEBP (Max. 5MB)</span></span>
                    </div>
                    <img id="image-preview" src="" alt="Preview" style="display:none; max-width:100%; max-height:200px; border-radius:8px; box-shadow:0 4px 12px rgba(0,0,0,0.1); z-index:1;">
                    <div id="file-info" style="display:none; background:rgba(34,211,165,0.9); color:white; padding:0.5rem 1rem; border-radius:20px; font-size:0.8rem; font-weight:700; z-index:2; position:absolute; bottom:1rem; backdrop-filter:blur(4px); box-shadow:0 4px 12px rgba(34,211,165,0.3);">
                        <span id="file-name"></span>
                    </div>
                    <input type="file" name="photo" id="photo-upload" accept="image/*" style="display:none;" onchange="updateFileName(this)">
                </label>
            </div>

            {{-- Privacy notice --}}
            <div style="display:flex; gap:1rem; align-items:flex-start; background:rgba(237,28,36,0.07); border:1px solid rgba(237,28,36,0.2); padding:1.25rem; border-radius:12px; margin-bottom:2rem;">
                <div style="font-size:1.5rem; flex-shrink:0;">🔒</div>
                <div>
                    <p style="font-size:0.85rem; font-weight:700; color:var(--text); margin-bottom:0.25rem;">Privasimu Terlindungi Sepenuhnya</p>
                    <p style="font-size:0.8rem; color:var(--text-muted); line-height:1.6;">Laporan ini terenkripsi dan hanya dapat diakses oleh Staff BK berwenang. Kami tidak menyimpan identitas pengirim.</p>
                </div>
            </div>

            <button type="submit" class="btn btn-primary btn-full btn-lg" id="submit-btn">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M22 2L11 13M22 2L15 22l-4-9-9-4 20-7z"/></svg>
                Kirim Laporan Secara Anonim
            </button>
        </form>
    </div>
    @endif
</div>

<style>
    /* Category Cards CSS */
    .category-card input:checked + .cat-content {
        border-color: var(--primary);
        background: rgba(238,45,36,0.05);
        box-shadow: 0 4px 20px rgba(238,45,36,0.15);
        transform: translateY(-4px);
    }
    .category-card input:checked + .cat-content span:first-child {
        transform: scale(1.2);
    }
    .category-card:hover .cat-content {
        border-color: rgba(238,45,36,0.3);
        background: rgba(238,45,36,0.02);
    }
    
    /* Severity Cards CSS */
    .severity-card input:checked + .sev-ringan { border-color:#0ea5e9; background:rgba(14,165,233,0.05); box-shadow:0 4px 15px rgba(14,165,233,0.15); transform:translateY(-2px); }
    .severity-card input:checked + .sev-sedang { border-color:#f59e0b; background:rgba(245,158,11,0.05); box-shadow:0 4px 15px rgba(245,158,11,0.15); transform:translateY(-2px); }
    .severity-card input:checked + .sev-parah { border-color:var(--primary); background:rgba(238,45,36,0.05); box-shadow:0 4px 15px rgba(238,45,36,0.15); transform:translateY(-2px); }
    .severity-card:hover .sev-content { transform:translateY(-2px); }
    
    /* Drop Zone Hover Effect */
    #drop-zone:hover {
        border-color: rgba(238,45,36,0.4);
        background: rgba(238,45,36,0.02);
    }
    #drop-zone.dragover {
        border-color: var(--primary);
        background: rgba(238,45,36,0.05);
        transform: scale(1.02);
    }
</style>

<script>
function updateCounter(textarea) {
    const count = document.getElementById('char-count');
    if (count) count.textContent = textarea.value.length + ' / 2000';
}

function updateFileName(input) {
    const nameEl = document.getElementById('file-name');
    const infoEl = document.getElementById('file-info');
    const dropZone = document.getElementById('drop-zone');
    const promptEl = document.getElementById('upload-prompt');
    const previewEl = document.getElementById('image-preview');
    
    if (input.files && input.files[0]) {
        const file = input.files[0];
        nameEl.textContent = '✅ ' + file.name;
        infoEl.style.display = 'block';
        promptEl.style.display = 'none';
        
        dropZone.style.borderColor = 'rgba(34,211,165,0.5)';
        dropZone.style.background = 'rgba(34,211,165,0.05)';
        dropZone.style.padding = '1rem';
        
        // Image preview
        const reader = new FileReader();
        reader.onload = function(e) {
            previewEl.src = e.target.result;
            previewEl.style.display = 'block';
        }
        reader.readAsDataURL(file);
    }
}

function updateCategoryCards() {
    // Force repaint or trigger validation visual feedback if needed
}

// Drag and drop support
document.addEventListener('DOMContentLoaded', () => {
    const dropZone = document.getElementById('drop-zone');
    const fileInput = document.getElementById('photo-upload');
    
    if (dropZone && fileInput) {
        ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
            dropZone.addEventListener(eventName, preventDefaults, false);
        });
        
        function preventDefaults(e) {
            e.preventDefault();
            e.stopPropagation();
        }
        
        ['dragenter', 'dragover'].forEach(eventName => {
            dropZone.addEventListener(eventName, () => dropZone.classList.add('dragover'), false);
        });
        
        ['dragleave', 'drop'].forEach(eventName => {
            dropZone.addEventListener(eventName, () => dropZone.classList.remove('dragover'), false);
        });
        
        dropZone.addEventListener('drop', (e) => {
            const dt = e.dataTransfer;
            const files = dt.files;
            if (files && files.length > 0) {
                fileInput.files = files;
                updateFileName(fileInput);
            }
        }, false);
    }
});

// Initialize char count
document.addEventListener('DOMContentLoaded', () => {
    const ta = document.getElementById('description-area');
    if (ta) updateCounter(ta);
});

// Submit loading state
document.getElementById('report-form')?.addEventListener('submit', function() {
    const btn = document.getElementById('submit-btn');
    btn.textContent = '⏳ Mengirim...';
    btn.disabled = true;
});
</script>
@endsection
