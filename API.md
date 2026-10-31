# Dokumentasi Endpoint API Perpustakaan

Base URL: `http://127.0.0.1:8000/api`

## 1. GET `/api/books`
- Status sukses: `200 OK`
- Deskripsi: menampilkan daftar buku dengan filter opsional `judul` dan `category_id` serta pagination.

Contoh response:

```json
{
  "data": [
    {
      "id": 1,
      "judul": "Laskar Pelangi",
      "penulis": "Andrea Hirata",
      "penerbit": "Bentang Pustaka",
      "tahun_terbit": 2005,
      "isbn": "978602",
      "stok": 8,
      "category_id": 1,
      "category": {
        "id": 1,
        "nama_kategori": "Fiksi",
        "deskripsi": "Novel dan cerita fiksi"
      },
      "sampul": null,
      "created_at": "2026-09-25T00:00:00.000000Z",
      "updated_at": "2026-09-25T00:00:00.000000Z"
    }
  ],
  "links": {
    "first": "http://127.0.0.1:8000/api/books?page=1",
    "last": "http://127.0.0.1:8000/api/books?page=2",
    "prev": null,
    "next": "http://127.0.0.1:8000/api/books?page=2"
  },
  "meta": {
    "current_page": 1,
    "from": 1,
    "last_page": 2,
    "path": "http://127.0.0.1:8000/api/books",
    "per_page": 10,
    "to": 10,
    "total": 15
  }
}
```

## 2. GET `/api/books/{id}`
- Status sukses: `200 OK`
- Status gagal: `404 Not Found` jika buku tidak ditemukan.

Contoh response:

```json
{
  "data": {
    "id": 1,
    "judul": "Laskar Pelangi",
    "penulis": "Andrea Hirata",
    "penerbit": "Bentang Pustaka",
    "tahun_terbit": 2005,
    "isbn": "978602",
    "stok": 8,
    "category_id": 1,
    "category": {
      "id": 1,
      "nama_kategori": "Fiksi",
      "deskripsi": "Novel dan cerita fiksi"
    },
    "sampul": null,
    "created_at": "2026-09-25T00:00:00.000000Z",
    "updated_at": "2026-09-25T00:00:00.000000Z"
  }
}
```

## 3. POST `/api/books`
- Status sukses: `201 Created`
- Status gagal: `422 Unprocessable Entity`
- Body:

```json
{
  "judul": "Bumi Manusia",
  "penulis": "Pramoedya Ananta Toer",
  "penerbit": "Hasta Mitra",
  "tahun_terbit": 1980,
  "isbn": "9786230012345",
  "stok": 5,
  "category_id": 2
}
```

Contoh response:

```json
{
  "data": {
    "id": 12,
    "judul": "Bumi Manusia",
    "penulis": "Pramoedya Ananta Toer",
    "penerbit": "Hasta Mitra",
    "tahun_terbit": 1980,
    "isbn": "9786230012345",
    "stok": 5,
    "category_id": 2,
    "category": {
      "id": 2,
      "nama_kategori": "Sejarah",
      "deskripsi": "Buku yang membahas peristiwa sejarah"
    },
    "sampul": null,
    "created_at": "2026-10-31T08:00:00.000000Z",
    "updated_at": "2026-10-31T08:00:00.000000Z"
  }
}
```

Contoh validasi gagal:

```json
{
  "message": "The book field is required.",
  "errors": {
    "judul": [
      "Judul buku wajib diisi."
    ],
    "category_id": [
      "Kategori wajib dipilih."
    ]
  }
}
```

## 4. PUT `/api/books/{id}`
- Status sukses: `200 OK`
- Body: sama seperti `POST /api/books` dengan nilai yang diperbarui.

Contoh response:

```json
{
  "data": {
    "id": 12,
    "judul": "Bumi Manusia (Edisi Baru)",
    "penulis": "Pramoedya Ananta Toer",
    "penerbit": "Hasta Mitra",
    "tahun_terbit": 1980,
    "isbn": "9786230012345",
    "stok": 6,
    "category_id": 2,
    "category": {
      "id": 2,
      "nama_kategori": "Sejarah",
      "deskripsi": "Buku yang membahas peristiwa sejarah"
    },
    "sampul": null,
    "created_at": "2026-10-31T08:00:00.000000Z",
    "updated_at": "2026-10-31T08:05:00.000000Z"
  }
}
```

## 5. DELETE `/api/books/{id}`
- Status sukses: `200 OK`

Contoh response:

```json
{
  "message": "Buku berhasil dihapus."
}
```

## 6. GET `/api/members`
- Status sukses: `200 OK`

Contoh response:

```json
{
  "data": [
    {
      "id": 1,
      "nama": "Ayu Lestari",
      "nim": "2023001",
      "email": "ayu@example.com",
      "nomor_telepon": "081234567890",
      "alamat": "Jl. Merdeka No. 10",
      "status": "aktif",
      "created_at": "2026-09-25T00:00:00.000000Z",
      "updated_at": "2026-09-25T00:00:00.000000Z"
    }
  ],
  "links": {
    "first": "http://127.0.0.1:8000/api/members?page=1",
    "last": "http://127.0.0.1:8000/api/members?page=1",
    "prev": null,
    "next": null
  },
  "meta": {
    "current_page": 1,
    "from": 1,
    "last_page": 1,
    "path": "http://127.0.0.1:8000/api/members",
    "per_page": 10,
    "to": 1,
    "total": 1
  }
}
```

## 7. GET `/api/members/{id}`
- Status sukses: `200 OK`
- Status gagal: `404 Not Found` jika anggota tidak ada.

Contoh response:

```json
{
  "data": {
    "id": 1,
    "nama": "Ayu Lestari",
    "nim": "2023001",
    "email": "ayu@example.com",
    "nomor_telepon": "081234567890",
    "alamat": "Jl. Merdeka No. 10",
    "status": "aktif",
    "created_at": "2026-09-25T00:00:00.000000Z",
    "updated_at": "2026-09-25T00:00:00.000000Z"
  }
}
```

## 8. GET `/api/loans`
- Status sukses: `200 OK`

Contoh response:

```json
{
  "data": [
    {
      "id": 3,
      "member": {
        "id": 1,
        "nama": "Ayu Lestari",
        "nim": "2023001",
        "email": "ayu@example.com",
        "nomor_telepon": "081234567890",
        "alamat": "Jl. Merdeka No. 10",
        "status": "aktif",
        "created_at": "2026-09-25T00:00:00.000000Z",
        "updated_at": "2026-09-25T00:00:00.000000Z"
      },
      "petugas": {
        "id": 2,
        "name": "Petugas Perpustakaan",
        "email": "petugas@example.com"
      },
      "tanggal_pinjam": "2026-10-30",
      "tanggal_kembali": "2026-11-02",
      "tanggal_dikembalikan": null,
      "status": "dipinjam",
      "books": [
        {
          "id": 4,
          "judul": "Laskar Pelangi",
          "penulis": "Andrea Hirata",
          "penerbit": "Bentang Pustaka",
          "tahun_terbit": 2005
        }
      ],
      "created_at": "2026-10-30T09:00:00.000000Z",
      "updated_at": "2026-10-30T09:00:00.000000Z"
    }
  ],
  "links": {
    "first": "http://127.0.0.1:8000/api/loans?page=1",
    "last": "http://127.0.0.1:8000/api/loans?page=1",
    "prev": null,
    "next": null
  },
  "meta": {
    "current_page": 1,
    "from": 1,
    "last_page": 1,
    "path": "http://127.0.0.1:8000/api/loans",
    "per_page": 10,
    "to": 1,
    "total": 1
  }
}
```

## 9. POST `/api/loans`
- Status sukses: `201 Created`
- Body:

```json
{
  "member_id": 1,
  "user_id": 2,
  "tanggal_pinjam": "2026-10-31",
  "tanggal_kembali": "2026-11-03",
  "book_ids": [3, 4]
}
```

Contoh response:

```json
{
  "data": {
    "id": 4,
    "member": {
      "id": 1,
      "nama": "Ayu Lestari",
      "nim": "2023001",
      "email": "ayu@example.com",
      "nomor_telepon": "081234567890",
      "alamat": "Jl. Merdeka No. 10",
      "status": "aktif",
      "created_at": "2026-09-25T00:00:00.000000Z",
      "updated_at": "2026-09-25T00:00:00.000000Z"
    },
    "petugas": {
      "id": 2,
      "name": "Petugas Perpustakaan",
      "email": "petugas@example.com"
    },
    "tanggal_pinjam": "2026-10-31",
    "tanggal_kembali": "2026-11-03",
    "tanggal_dikembalikan": null,
    "status": "dipinjam",
    "books": [
      {
        "id": 3,
        "judul": "Bumi Manusia",
        "penulis": "Pramoedya Ananta Toer",
        "penerbit": "Hasta Mitra",
        "tahun_terbit": 1980
      },
      {
        "id": 4,
        "judul": "Laskar Pelangi",
        "penulis": "Andrea Hirata",
        "penerbit": "Bentang Pustaka",
        "tahun_terbit": 2005
      }
    ],
    "created_at": "2026-10-31T09:00:00.000000Z",
    "updated_at": "2026-10-31T09:00:00.000000Z"
  }
}
```

## 10. PUT `/api/loans/{id}/kembalikan`
- Status sukses: `200 OK`

Contoh response:

```json
{
  "data": {
    "id": 3,
    "member": {
      "id": 1,
      "nama": "Ayu Lestari",
      "nim": "2023001",
      "email": "ayu@example.com",
      "nomor_telepon": "081234567890",
      "alamat": "Jl. Merdeka No. 10",
      "status": "aktif",
      "created_at": "2026-09-25T00:00:00.000000Z",
      "updated_at": "2026-09-25T00:00:00.000000Z"
    },
    "petugas": {
      "id": 2,
      "name": "Petugas Perpustakaan",
      "email": "petugas@example.com"
    },
    "tanggal_pinjam": "2026-10-30",
    "tanggal_kembali": "2026-11-02",
    "tanggal_dikembalikan": "2026-10-31",
    "status": "dikembalikan",
    "books": [
      {
        "id": 4,
        "judul": "Laskar Pelangi",
        "penulis": "Andrea Hirata",
        "penerbit": "Bentang Pustaka",
        "tahun_terbit": 2005
      }
    ],
    "created_at": "2026-10-30T09:00:00.000000Z",
    "updated_at": "2026-10-31T07:30:00.000000Z"
  }
}
```

## 11. GET `/api/stats`
- Status sukses: `200 OK`

Contoh response:

```json
{
  "total_buku": 12,
  "total_anggota": 8,
  "peminjaman_aktif": 3
}
```

## Ringkasan endpoint

| Method | URL | Body | Status sukses | Catatan |
|---|---|---|---|---|
| GET | `/api/books` | - | `200` | filter `judul` dan `category_id` |
| GET | `/api/books/{id}` | - | `200` | `404` jika tidak ada |
| POST | `/api/books` | JSON buku | `201` | validasi 422 jika data salah |
| PUT | `/api/books/{id}` | JSON buku | `200` | update satu buku |
| DELETE | `/api/books/{id}` | - | `200` | menghapus buku |
| GET | `/api/members` | - | `200` | daftar anggota |
| GET | `/api/members/{id}` | - | `200` | detail anggota |
| GET | `/api/loans` | - | `200` | daftar transaksi |
| POST | `/api/loans` | JSON peminjaman | `201` | `user_id` wajib diisi |
| PUT | `/api/loans/{id}/kembalikan` | - | `200` | set status menjadi `dikembalikan` |
| GET | `/api/stats` | - | `200` | total buku, anggota, peminjaman aktif |
