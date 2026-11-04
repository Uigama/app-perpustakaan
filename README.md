# Sistem Perpustakaan Digital Kampus

Aplikasi manajemen perpustakaan berbasis Laravel 12 yang dirancang untuk mengelola katalog buku, data anggota, kategori, serta proses peminjaman dan pengembalian buku di lingkungan kampus.

Project ini mencakup dua sisi utama:

- Panel web untuk admin dan petugas perpustakaan
- API internal untuk kebutuhan dashboard dan integrasi data

---

## Ringkasan Project

Sistem ini bertujuan untuk mempermudah pengelolaan perpustakaan kampus dengan fitur seperti:

- Manajemen data buku
- Manajemen kategori buku
- Manajemen data anggota
- Proses peminjaman dan pengembalian buku
- Dashboard statistik real-time
- Autentikasi pengguna berbasis role (`admin`, `petugas`)
- Laporan peminjaman dan ringkasan data
- API RESTful untuk data perpustakaan

---

## Fitur Utama

### 1. Manajemen Katalog Buku
- Menambah, melihat, memperbarui, dan menghapus data buku
- Informasi yang tersedia meliputi judul, penulis, penerbit, tahun terbit, ISBN, stok, dan kategori
- Mendukung relasi antar tabel melalui Eloquent ORM

### 2. Manajemen Kategori
- Kelola kategori buku seperti Fiksi, Sejarah, Teknologi, dan lainnya
- Kategori digunakan untuk mengelompokkan buku agar lebih rapi dan mudah dicari

### 3. Manajemen Anggota
- Data anggota meliputi nama, NIM, email, nomor telepon, alamat, dan status
- Dapat digunakan untuk keperluan validasi peminjaman

### 4. Proses Peminjaman Buku
- Menyimpan transaksi peminjaman per anggota
- Mengatur status peminjaman dan pengembalian
- Mendukung alur peminjaman sampai pengembalian buku

### 5. Dashboard dan Statistik
- Menampilkan ringkasan jumlah buku, anggota, dan peminjaman aktif
- Mengambil data dari API internal Laravel

### 6. Autentikasi & Authorization
- Login untuk admin dan petugas
- Akses fitur dibatasi berdasarkan peran pengguna
- Middleware admin digunakan untuk fitur tertentu seperti kategori

### 7. API Internal
- API tersedia untuk kebutuhan dashboard dan integrasi aplikasi
- Mendukung endpoint untuk buku, anggota, peminjaman, dan statistik

---

## Teknologi yang Digunakan

- PHP 8.2+
- Laravel 12
- SQLite (default untuk local development)
- Bootstrap / Blade Template
- Eloquent ORM
- Vite untuk asset frontend
- PHPUnit untuk testing

---

## Struktur Project

```text
app/
├── Http/
│   ├── Controllers/
│   │   ├── Api/
│   │   ├── AuthController.php
│   │   ├── BookController.php
│   │   ├── CategoryController.php
│   │   ├── DashboardController.php
│   │   ├── LoanController.php
│   │   ├── MemberController.php
│   │   └── ProfileController.php
│   └── Middleware/
├── Models/
├── User.php
├── Providers/
├── ...
config/
resources/
    views/
routes/
    api.php
    web.php
database/
    migrations/
    seeders/
public/
tests/
README.md
API.md
DEMO.md
```

---

## Prasyarat Sistem

Sebelum menjalankan project, pastikan environment sudah memenuhi:

- PHP >= 8.2
- Composer 2.x
- Node.js dan npm (untuk build frontend asset)
- Git
- SQLite atau MySQL

Untuk environment lokal default project ini menggunakan SQLite, sehingga tidak diperlukan konfigurasi database yang rumit di awal.

---

## Langkah Instalasi

### 1. Clone Repository

```bash
git clone https://github.com/Uigama/app-perpustakaan.git
cd app-perpustakaan
```

### 2. Install Dependensi PHP

```bash
composer install
```

### 3. Install Dependensi Frontend

```bash
npm install
```

### 4. Setup Environment

```bash
cp .env.example .env
php artisan key:generate
```

Catatan untuk Windows:

```powershell
copy .env.example .env
php artisan key:generate
```

### 5. Migrasi dan Seed Database

```bash
php artisan migrate:fresh --seed
```

Perintah ini akan membuat tabel database dan mengisi data awal seperti user admin, petugas, kategori, buku, anggota, dan data peminjaman.

### 6. Jalankan Aplikasi

```bash
php artisan serve
```

Aplikasi biasanya dapat diakses di:

```text
http://127.0.0.1:8000
```

### 7. Build Asset Frontend

Jika perlu menjalankan mode development untuk asset frontend:

```bash
npm run dev
```

Untuk production build:

```bash
npm run build
```

---

## Login Default

Setelah database ter-seed, akun berikut dapat digunakan:

| Role | Email | Password |
|---|---|---|
| Admin | `admin@pens.ac.id` | `password` |
| Petugas | `petugas1@pens.ac.id` | `password` |
| Petugas | `petugas2@pens.ac.id` | `password` |

Akun admin memiliki akses lebih luas, termasuk fitur manajemen kategori.

---

## Alur Penggunaan Aplikasi

### Setelah Login
User akan diarahkan ke halaman dashboard. Di halaman dashboard terdapat ringkasan statistik seperti:

- jumlah total buku
- jumlah total anggota
- jumlah peminjaman aktif

### Modul Utama
- `Books`: kelola katalog buku
- `Members`: kelola anggota perpustakaan
- `Loans`: kelola transaksi peminjaman dan pengembalian
- `Categories`: kelola kategori buku (khusus admin)
- `Profile`: ubah profil dan password pengguna

---

## API Internal

Project ini juga menyediakan endpoint API yang digunakan oleh dashboard dan modul tertentu.

Base URL default:

```text
http://127.0.0.1:8000/api
```

Endpoint utama:

- `GET /api/books`
- `GET /api/books/{id}`
- `POST /api/books`
- `PUT /api/books/{id}`
- `DELETE /api/books/{id}`
- `GET /api/members`
- `GET /api/members/{id}`
- `GET /api/loans`
- `POST /api/loans`
- `PUT /api/loans/{id}/kembalikan`
- `GET /api/stats`

Dokumentasi endpoint API lengkap tersedia di file [`API.md`](./API.md).

---

## Demo

Dokumentasi demo aplikasi dan alur penggunaan tersedia di file [`DEMO.md`](./DEMO.md).

---

## Konsep Arsitektur

Project ini mengikuti pola MVC (Model-View-Controller):

- `app/` berisi model dan logika aplikasi
- `resources/views/` berisi tampilan Blade
- `app/Http/Controllers/` menangani request HTTP
- `routes/` menghubungkan URL ke controller
- `database/migrations/` mendefinisikan struktur database
- `database/seeders/` menyediakan data awal

Selain itu, aplikasi juga memanfaatkan pola konsumsi API internal untuk mengambil statistik dan data laporan dari endpoint Laravel sendiri.

---

## Script Umum

Beberapa perintah yang sering dipakai:

```bash
php artisan serve
php artisan migrate
php artisan migrate:fresh --seed
php artisan test
php artisan make:model NamaModel
php artisan make:controller NamaController
```

---

## Catatan Pengembangan

- Aplikasi sudah menggunakan custom pagination pada Blade
- Dashboard mengambil data melalui HTTP request ke endpoint `/api/stats`
- Data dummy dibuat melalui factory dan seeder agar lingkungan development lebih realistis
- Seeder disusun berurutan agar relasi antar tabel tetap valid

---

## Lisensi

Project ini menggunakan lisensi MIT sesuai konfigurasi default Laravel.

---

## Referensi Dokumentasi

- [Laravel Documentation](https://laravel.com/docs)
- [API Documentation](./API.md)
- [Demo Guide](./DEMO.md)

