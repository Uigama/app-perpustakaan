# Skenario Demo UAS - Sistem Perpustakaan Digital Kampus

## 1. Login ke aplikasi
1. Buka halaman `http://127.0.0.1:8000/login`.
2. Masukkan email `admin@pens.ac.id` dan password `password`.
3. Setelah login berhasil, aplikasi diarahkan ke halaman dashboard.
4. Periksa navbar menampilkan nama admin, yaitu `Bambang Sutrisno`.

## 2. Tampilkan dashboard
1. Buka halaman `/`.
2. Pastikan dashboard menampilkan 3 kartu statistik:
   - Total Buku
   - Total Anggota
   - Peminjaman Aktif
3. Angka statistik diambil dari endpoint `GET /api/stats` yang dipanggil dari aplikasi sendiri.

## 3. Tambah kategori
1. Masuk ke menu `Kategori`.
2. Klik `+ Tambah Kategori`.
3. Isi nama kategori dan deskripsi.
4. Simpan data, lalu pastikan kategori baru tampil di daftar.

## 4. Tambah buku
1. Masuk ke menu `Buku`.
2. Klik `+ Tambah Buku`.
3. Isi judul, penulis, penerbit, tahun, kategori, stok, dan ISBN bila ada.
4. Simpan data, lalu konfirmasi buku baru ditambahkan di daftar.

## 5. Tambah anggota
1. Masuk ke menu `Anggota`.
2. Klik `+ Tambah Anggota`.
3. Isi nama, NIM, email, nomor telepon, alamat, dan status.
4. Simpan data, lalu pastikan anggota baru muncul di tabel.

## 6. Buat peminjaman
1. Masuk ke menu `Peminjaman`.
2. Klik `+ Tambah Peminjaman`.
3. Pilih anggota, tanggal pinjam, tanggal kembali, dan minimal satu buku.
4. Simpan transaksi.
5. Pastikan data peminjaman baru tampil di daftar dengan status `dipinjam`.

## 7. Lihat daftar peminjaman aktif
1. Buka menu `Peminjaman`.
2. Tinjau seluruh daftar transaksi yang masih aktif.
3. Periksa bahwa data member, petugas, judul buku, tanggal pinjam, dan tanggal kembali tampil dengan benar.

## 8. Proses pengembalian buku
1. Pada baris peminjaman aktif, klik tombol `Kembalikan`.
2. Konfirmasi status berubah menjadi `dikembalikan`.
3. Pastikan tanggal pengembalian otomatis tercatat.

## 9. Tampilkan laporan peminjaman
1. Klik tombol `Lihat Laporan Peminjaman` di dashboard atau buka URL `/loans/report`.
2. Verifikasi tabel menampilkan daftar peminjaman dari API `GET /api/loans`.
3. Cek kolom anggota, petugas, judul buku, tanggal pinjam, tanggal kembali, dan status.

## 10. Demo API lewat Postman
1. Ambil endpoint `GET /api/stats` untuk melihat total buku, total anggota, dan peminjaman aktif.
2. Ambil endpoint `GET /api/books` untuk melihat katalog buku.
3. Ambil endpoint `GET /api/members` untuk melihat data anggota.
4. Ambil endpoint `GET /api/loans` untuk melihat daftar transaksi peminjaman beserta relasinya.
5. Coba request `POST /api/loans` untuk menambahkan peminjaman baru.
6. Coba request `PUT /api/loans/{id}/kembalikan` untuk menandai pengembalian buku.

## 11. Catatan teknis demo
- Server utama berjalan di port `8000` untuk akses browser.
- Server API internal berjalan di port `8011` agar aplikasi bisa memanggil API dalam lingkup lokal tanpa deadlock.
- Jika server port `8011` dimatikan, halaman dashboard dan laporan tetap menampilkan fallback nilai `0`/kosong tanpa error 500.
