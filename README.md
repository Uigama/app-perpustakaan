# Sistem Perpustakaan Digital Kampus

Repositori pengembangan aplikasi sistem informasi perpustakaan berbasis Laravel 12 untuk manajemen katalog buku, anggota, dan sirkulasi peminjaman.

---

## Fitur utama

- Manajemen buku, kategori, anggota, dan transaksi peminjaman.
- Autentikasi login untuk admin dan petugas.
- Dashboard statistik yang memanggil API internal Laravel.
- Laporan peminjaman yang konsumen `GET /api/loans`.
- Seeder dan factory untuk data dummy realistis.
- Pagination custom untuk tampilan Blade.

## Konsep MVC

Pola Model-View-Controller (MVC) membagi aplikasi menjadi tiga komponen utama:

* **Model (`app/`):** Mengelola representasi entitas data, relasi antartabel, dan aturan bisnis database melalui Eloquent ORM.
* **View (`resources/views/`):** Bertanggung jawab atas antarmuka pengguna (tampilan HTML/Blade) tanpa melibatkan pemrosesan logika bisnis berat.
* **Controller (`app/Http/Controllers/`):** Menerima HTTP request, berinteraksi dengan Model untuk memproses data, lalu mengirimkan hasilnya ke View.

## Prasyarat Sistem

* PHP >= 8.2 (ekstensi `zip`, `pdo_mysql`, dan `mbstring` aktif)
* Composer 2.x
* MySQL Server atau SQLite untuk local development pada project ini
* Git Client

## Langkah-Langkah Instalasi Lokal

1. Clone repository:
   ```bash
   git clone https://github.com/Uigama/app-perpustakaan.git
   cd app-perpustakaan
   ```
2. Install dependensi Composer:
   ```bash
   composer install
   ```
3. Setup environment:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
4. Migrasi dan seeding database:
   ```bash
   php artisan migrate:fresh --seed
   ```
5. Jalankan server lokal:
   ```bash
   php artisan serve --port=8000
   ```
6. Jalankan server internal API untuk demo dashboard dan laporan:
   ```bash
   php artisan serve --port=8011
   ```

## Login demo

- Email admin: `admin@pens.ac.id`
- Password: `password`

Setelah login, aplikasi akan diarahkan ke halaman dashboard. Dari sana pengguna dapat melihat ringkasan statistik dan menavigasi ke laporan peminjaman.

## Minggu 10

Pada tahap ini project telah dikembangkan dengan pendekatan konsumsi API internal dari dalam aplikasi sendiri:

- `DashboardController` memanggil `GET /api/stats`.
- `LoanController@report` memanggil `GET /api/loans`.
- `AppServiceProvider` mendaftarkan pagination custom.
- Seeder dan factory dibuat untuk data kategori, buku, anggota, dan peminjaman.
- `DatabaseSeeder` menjalankan urutan seeding yang benar agar relasi data tersedia.

## Demo singkat

Dokumentasi demo detail tersedia pada file `DEMO.md`.

