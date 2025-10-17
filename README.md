- Sedang Dalam Proses Pengembangan

# Task Management App

## Deskripsi Singkat
Aplikasi **Task Management** ini digunakan untuk mengelola laporan pekerjaan harian secara efisien.  
Fitur utamanya mencakup:
- Pembuatan, pengeditan, dan penghapusan task.  
- Penentuan prioritas dan status tugas (To-Do, In Progress, Done).  
- Fitur pencarian dan filter berdasarkan status atau tanggal.  
- Tampilan dashboard ringkas untuk memantau produktivitas.

## Menu
- Master :
    Master Divisi
    Master Status
- Pegawai :
    Data Pegawai
- Task :
    Input Data
    Laporan Pekerjaan
---

## ⚙️ Langkah Menjalankan Aplikasi

### 🖥️ Backend
- Clone project :
```bash
git clone *url*
```
- jalankan perintah :
```bash
composer install
```
- buat file  <b>.env</b>  duplicat file  <b>.env.example</b>  jangan lupa rename jadi  <b>.env</b>
- buka file  <b>.env</b>  Rubah di bagian (Connection ke database kita):

```bash
DB_DATABASE=nama-database
DB_USERNAME=username-db
DB_PASSWORD=password-db
```
```
- Done

## Menjalankan Aplikasi
docker compose up -d --build
```

## Account Administrator Default
- Administrator Utama :

```bash
email : admin@gmail.com
password : 1234# task-management
