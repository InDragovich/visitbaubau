# Visit Baubau

Aplikasi web informasi pariwisata Kota Baubau, dibuat sebagai proyek pembelajaran (2022).
Dibangun dengan CodeIgniter 4 dan MySQL/MariaDB.

## Fitur
- Informasi wisata beserta kategorinya
- Artikel dengan komentar pengunjung
- Agenda/event beserta kategorinya
- Marketplace produk lokal dengan katalog dan pencarian
- Kotak pertanyaan dari pengunjung
- Halaman visi-misi dan struktur organisasi
- Autentikasi dengan [Myth:Auth](https://github.com/lonnieezell/myth-auth) dan dua peran:
  `admin` (kelola seluruh konten dan pengguna) dan `penjual` (kelola produk sendiri)

## Teknologi
PHP 7.4+ / 8.x, CodeIgniter 4, Myth:Auth, MySQL/MariaDB, Bootstrap.

## Menjalankan secara lokal
1. `composer install`
2. Salin `env` menjadi `.env`, lalu isi `database.default.*` dan (opsional) `email.*` untuk SMTP.
3. Buat database dan impor skema `DATABASE/schema.sql` (struktur tabel saja, tanpa data).
4. Daftarkan akun, lalu atur perannya menjadi `admin` lewat tabel `auth_groups_users`.
5. `php spark serve`, lalu buka `http://localhost:8080`.

## Catatan
- Kredensial SMTP, dump data, dan foto pengguna tidak disimpan di repositori.
- Repositori ini tidak memiliki tes otomatis selain kerangka bawaan CodeIgniter.
- Riwayat pembaruan ada di [CHANGELOG.md](CHANGELOG.md).

Lisensi: MIT.
