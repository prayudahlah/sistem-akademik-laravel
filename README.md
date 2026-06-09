<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# Sistem Akademik

Aplikasi CRUD data akademik berbasis Laravel untuk mengelola data mahasiswa, dosen, mata kuliah, dan perkuliahan.

## Fitur

- **Mahasiswa** — Kelola data mahasiswa (NIM, nama, alamat)
- **Dosen** — Kelola data dosen (NIP, nama, alamat)
- **Mata Kuliah** — Kelola data mata kuliah (kode, nama, SKS, semester)
- **Perkuliahan** — Catat perkuliahan dengan relasi mahasiswa, dosen, dan mata kuliah beserta nilai

## Tech Stack

- **Framework:** Laravel 13
- **PHP:** ^8.3
- **Database:** PostgreSQL
- **Frontend:** Blade + Tailwind CSS
- **Build Tool:** Vite
- **Dev Environment:** Laravel Sail (Docker)

## Prasyarat

- [Docker](https://docs.docker.com/get-started/get-docker/)
- [Composer](https://getcomposer.org/)
- PHP 8.3+

## Setup

1. Clone repositori dan masuk ke direktori proyek:

   ```bash
   cd distribusi-1
   ```

2. Install dependensi PHP:

   ```bash
   composer install
   ```

3. Salin file lingkungan:

   ```bash
   cp .env.example .env
   ```

4. Sesuaikan konfigurasi database di `.env`:

   ```env
   DB_CONNECTION=pgsql
   DB_HOST=nixia
   DB_PORT=5435
   DB_DATABASE=kompter_indvidu
   DB_USERNAME=postgres
   DB_PASSWORD=postgres
   ```

5. Jalankan Sail:

   ```bash
   ./vendor/bin/sail up -d
   ```

6. Generate application key:

   ```bash
   ./vendor/bin/sail artisan key:generate
   ```

7. Jalankan migrasi (jika tabel belum ada):

   ```bash
   ./vendor/bin/sail artisan migrate
   ```

Akses aplikasi di [http://localhost](http://localhost).

## Infrastruktur

Aplikasi berjalan di dalam container Docker Laravel Sail. Container terhubung ke **Docker network eksternal** `sistem-akademik` yang memungkinkan komunikasi dengan database PostgreSQL di host `nixia:5435` (atau container database terpisah dalam network yang sama).

Lihat `compose.yaml` untuk detail konfigurasi.

## Endpoint

| Method | URI                   | Controller              | Keterangan              |
|--------|-----------------------|-------------------------|-------------------------|
| GET    | `/`                   | —                       | Redirect ke mahasiswa   |
| GET    | `/mahasiswa`          | `MahasiswaController`   | Daftar mahasiswa        |
| POST   | `/mahasiswa`          | `MahasiswaController`   | Tambah mahasiswa        |
| GET    | `/mahasiswa/{nim}`    | `MahasiswaController`   | Detail mahasiswa        |
| PUT    | `/mahasiswa/{nim}`    | `MahasiswaController`   | Update mahasiswa        |
| DELETE | `/mahasiswa/{nim}`    | `MahasiswaController`   | Hapus mahasiswa         |
| GET    | `/dosen`              | `DosenController`       | Daftar dosen            |
| POST   | `/dosen`              | `DosenController`       | Tambah dosen            |
| GET    | `/dosen/{nip}`        | `DosenController`       | Detail dosen            |
| PUT    | `/dosen/{nip}`        | `DosenController`       | Update dosen            |
| DELETE | `/dosen/{nip}`        | `DosenController`       | Hapus dosen             |
| GET    | `/mata-kuliah`        | `MataKuliahController`  | Daftar mata kuliah      |
| POST   | `/mata-kuliah`        | `MataKuliahController`  | Tambah mata kuliah      |
| GET    | `/mata-kuliah/{kode}` | `MataKuliahController`  | Detail mata kuliah      |
| PUT    | `/mata-kuliah/{kode}` | `MataKuliahController`  | Update mata kuliah      |
| DELETE | `/mata-kuliah/{kode}` | `MataKuliahController`  | Hapus mata kuliah       |
| GET    | `/perkuliahan`        | `PerkuliahanController` | Daftar perkuliahan      |
| POST   | `/perkuliahan`        | `PerkuliahanController` | Tambah perkuliahan      |
| GET    | `/perkuliahan/{id}`   | `PerkuliahanController` | Detail perkuliahan      |
| PUT    | `/perkuliahan/{id}`   | `PerkuliahanController` | Update perkuliahan      |
| DELETE | `/perkuliahan/{id}`   | `PerkuliahanController` | Hapus perkuliahan       |

## Struktur Database

```
mahasiswa (nim, nama, alamat)
    └── 1:N ── perkuliahan (nim, nip, kode, nilai)
dosen (nip, nama, alamat)  ── N:1 ──┘
mata_kuliah (kode, matkul, sks, smt) ── N:1 ──┘
```

## Catatan

- **Tabel dibuat secara manual** di database — tidak ada migration Laravel untuk tabel `mahasiswa`, `dosen`, `mata_kuliah`, dan `perkuliahan`.
- **Tidak ada autentikasi** — aplikasi dapat diakses tanpa login.
- **Route key binding** menggunakan kolom natural: `nim`, `nip`, `kode` sebagai pengganti `id`.
