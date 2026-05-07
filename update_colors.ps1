$files = Get-ChildItem -Path "d:\COOLYEAH\TUBES PANCA\safespace2\resources\views" -Recurse -Include *.blade.php
foreach ($f in $files) {
    $content = Get-Content $f.FullName -Raw
    $content = $content -replace '108,99,255', '237,28,36'
    $content = $content -replace '255,107,157', '182,37,42'
    $content = $content -replace '108, 99, 255', '237, 28, 36'
    $content = $content -replace '255, 107, 157', '182, 37, 42'
    $content = $content -replace '#6c63ff', '#ed1c24'
    $content = $content -replace '#9d97ff', '#ff4d4d'
    $content = $content -replace '#ff6b9d', '#b6252a'
    $content = $content -replace '#7c3aed', '#d1151c'
    $content = $content -replace '#8b5cf6', '#b6252a'
    $content = $content -replace '#06060e', '#0a0a0a'
    $content = $content -replace '#0e0e1a', '#141414'
    $content = $content -replace '#131320', '#1a1a1a'
    $content = $content -replace 'rgba\(14, 14, 26', 'rgba(20, 20, 20'
    $content = $content -replace 'badge-purple', 'badge-red'
    $content = $content -replace 'badge-pink', 'badge-maroon'
    Set-Content -Path $f.FullName -Value $content -NoNewline
}
