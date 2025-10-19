# Task Management App  
**Status:** ⚠️ *Sedang Dalam Proses Pengembangan*

---

## Deskripsi Singkat
Aplikasi **Task Management** digunakan untuk mengelola laporan pekerjaan harian secara efisien.  
Fitur utamanya mencakup:
- Pembuatan, pengeditan, dan penghapusan task.  
- Penentuan prioritas dan status tugas *(To-Do, In Progress, Done)*.  
- Fitur pencarian dan filter berdasarkan status atau tanggal.  
- Dashboard ringkas untuk memantau produktivitas tim.  

---

## Menu Utama
- **Master** : Master Divisi, Master Status  
- **Pegawai** : Data Pegawai  
- **Task** : Input Data, Laporan Pekerjaan  

---

## Struktur Database (Ringkas)

### Tabel **users**
| Kolom | Tipe |
|-------|------|
| id | BIGINT (PK, AI) |
| name | VARCHAR |
| username | VARCHAR |
| email | VARCHAR |
| email_verified_at | TIMESTAMP |
| password | VARCHAR |
| compId | INT |
| created_at | TIMESTAMP |
| updated_at | TIMESTAMP |

### Tabel **msdivisi**
| Kolom | Tipe |
|-------|------|
| divisiId | INT (PK, AI) |
| divisiNm | VARCHAR |
| compId | INT |
| created_at | TIMESTAMP |
| updated_at | TIMESTAMP |

### Tabel **msstatus**
| Kolom | Tipe |
|-------|------|
| statusId | INT (PK, AI) |
| statusNm | VARCHAR |
| compId | INT |
| created_at | TIMESTAMP |
| updated_at | TIMESTAMP |

### Tabel **mspegawai**
| Kolom | Tipe |
|-------|------|
| pegawaiId | INT (PK, AI) |
| pegawaiUserId | INT (FK → users.id) |
| pegawaiDivisiId | INT (FK → msdivisi.divisiId) |
| pegawaiNip | VARCHAR |
| pegawaiNm | TEXT |
| compId | INT |
| created_at | TIMESTAMP | Waktu dibuat |
| updated_at | TIMESTAMP | Waktu diperbarui |

### Tabel **tasks**
| Kolom | Tipe |
|-------|------|
| task_id | INT (PK, AI) |
| user_id | INT (FK → users.id) |
| title | TEXT |
| description | TEXT |
| status | BIGINT (FK → msstatus.statusId) |
| deadline | DATETIME |
| compId | INT |
| created_at | TIMESTAMP |
| updated_at | TIMESTAMP |

---

## Teknologi yang Digunakan

### Frontend
- **React.js**

### Backend
- **Laravel 8**

### Environment
- **Docker** digunakan untuk menjalankan seluruh stack (Laravel + MySQL + React)  

---

## Langkah Menjalankan Aplikasi

### 🔧 Backend (Laravel)
1. Clone project:
   ```bash
   git clone *url*
   ```
2. Masuk ke folder project dan jalankan:
   ```bash
   composer install
   ```
3. Buat file `.env` dari `.env.example` dan sesuaikan konfigurasi database:
   ```bash
   DB_DATABASE=nama-database
   DB_USERNAME=username-db
   DB_PASSWORD=password-db
   ```
---

### 💻 Frontend (React)
1. Masuk ke folder frontend:
   ```bash
   cd frontend
   npm install
   npm run dev
   ```

---

### Menjalankan Menggunakan Docker
```bash
docker compose up -d --build
```

---

## Akun Administrator Default
```bash
email    : admin@gmail.com
password : 1234
```

---

## Catatan
- Pastikan **Node.js**, **Composer**, dan **Docker** sudah terinstal.  
- Aplikasi masih dalam tahap **pengembangan aktif** — beberapa fitur mungkin belum stabil.  

---
