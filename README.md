# Sistem Perpustakaan Digital Kampus

Repositori pengembangan aplikasi sistem informasi perpustakaan berbasis Laravel 12 untuk manajemen katalog buku, anggota, dan sirkulasi peminjaman.

---

## Konsep MVC

Pola Model-View-Controller (MVC) membagi aplikasi menjadi tiga komponen utama:

* **Model (`app/Models/`):** Mengelola representasi entitas data, relasi antartabel, dan aturan bisnis database melalui Eloquent ORM.
* **View (`resources/views/`):** Bertanggung jawab atas antarmuka pengguna (tampilan HTML/Blade) tanpa melibatkan pemrosesan logika bisnis berat.
* **Controller (`app/Http/Controllers/`):** Menerima HTTP request, berinteraksi dengan Model untuk memproses data, lalu mengirimkan hasilnya ke View.


## Prasyarat Sistem

* PHP >= 8.2 (ekstensi `zip`, `pdo_mysql`, dan `mbstring` aktif)
* Composer 2.x
* MySQL Server (misal via XAMPP)
* Git Client


## Langkah-Langkah Instalasi Lokal
1. **Clone repository:**
   ```bash
   git clone [https://github.com/Uigama/app-perpustakaan.git](https://github.com/Uigama/app-perpustakaan.git)
   cd app-perpustakaan
2. **Install dependensi Composer:**
   ```bash
   composer install
3. **Setup environment:**
   ```bash
   cp .env.example .env
   php artisan key:generate
4. **Migrasi Database:**
   ```bash
   php artisan migrate
5. **Jalankan server lokal:**
   ```bash
   php artisan serve   
