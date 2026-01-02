# TODO List - Implementasi Akses Kontrol

## Step 1: Buat AuthFilter.php

- [x] Buat file `app/Filters/AuthFilter.php` - Filter untuk membatasi akses berdasarkan role

## Step 2: Update Login Controllers

- [x] Update `LoginSiswa.php` - Tambahkan 'role' => 'siswa' ke session
- [x] Update `LoginAdmin.php` - Tambahkan 'role' => 'admin' ke session
- [x] Update `LoginGuru.php` - Tambahkan 'role' => 'guru' ke session

## Step 3: Update Filters.php

- [x] Daftarkan AuthFilter di `app/Config/Filters.php`

## Step 4: Update Routes.php

- [x] T route adminerapkan filter ke
- [x] Terapkan filter ke route guru
- [x] Terapkan filter ke route siswa

## Status: SELESAI ✓
