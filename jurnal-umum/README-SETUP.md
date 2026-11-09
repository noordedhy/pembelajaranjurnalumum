# Media Pembelajaran Jurnal Umum — Petunjuk Setup

SMK 17 Agustus 1945 Genteng • Kelas X AKL

## 1. Prasyarat

| Komponen | Versi Minimal |
|---|---|
| PHP | 8.2+ (ekstensi: `intl`, `mbstring`, `mysqlnd`/`mysqli`) |
| Composer | 2.x |
| MySQL / MariaDB | 8.0+ / 10.6+ (InnoDB, `utf8mb4_unicode_ci`) |
| Git | 2.x |

Cek PHP:

```bash
php -v
php -m | grep -E "intl|mbstring|mysqli"
```

## 2. Membuat Proyek Baru

```bash
composer create-project codeigniter4/appstarter jurnal-umum
cd jurnal-umum
```

Versi framework **dikunci** pada `composer.json`:

```json
"require": {
    "php": "^8.2",
    "codeigniter4/framework": "^4.7"
}
```

Jika perlu mengunci ulang:

```bash
composer require "codeigniter4/framework:^4.7" --no-interaction
```

## 3. Konfigurasi Environment

Salin contoh konfigurasi lalu sesuaikan:

```bash
cp env .env
```

Edit `.env` mengikuti **Lampiran C.2** (sudah disediakan di repo ini — lihat file `.env`).
Poin wajib:

- `CI_ENVIRONMENT=development`
- `app.baseURL='http://localhost:8080/'`
- `app.appTimezone='Asia/Jakarta'`
- `database.default.*` → MySQLi, charset `utf8mb4`, DBCollat `utf8mb4_unicode_ci`
- `security.csrfProtection=session`
- `security.regenerate=false`

## 4. Siapkan Database

```sql
CREATE DATABASE jurnal_umum
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;
```

Jalankan migration & seeder (tersedia setelah modul skema dibuat):

```bash
php spark migrate
php spark db:seed App\Database\Seeds\InitSeeder
```

## 5. Jalankan Server Pengembangan

```bash
php spark serve
```

Buka: <http://localhost:8080/>

## 6. Struktur Aset Lokal (Tanpa CDN)

Semua pustaka JS/CSS dipasang secara **lokal** di:

```
public/assets/vendor/jquery/          -> jQuery 3.7.x
public/assets/vendor/bootstrap/       -> Bootstrap 5.3.x (CSS + JS Bundle)
public/assets/vendor/datatables/      -> DataTables 2.x (+ SearchPanes/Buttons opsional)
public/assets/vendor/jvalidate/       -> jQuery Validation 1.20.x + additional-methods
public/assets/vendor/bootstrap-icons/ -> Bootstrap Icons 1.11.x
public/assets/vendor/summernote/      -> Summernote Lite 0.9.x (fallback textarea)
```

Cara mengisi (unduh dari rilis resmi, simpan ke folder terkait — **bukan** via CDN saat runtime):

```bash
# Contoh: jQuery 3.7.1
curl -L -o public/assets/vendor/jquery/jquery.min.js \
  https://github.com/jquery/jquery/releases/download/3.7.1/jquery-3.7.1.min.js
```

> Unduhan hanya dilakukan developer saat setup awal. Halaman aplikasi tidak boleh
> memanggil aset eksternal apa pun (satu-satunya sumber eksternal runtime: YouTube IFrame API).

## 7. Folder Upload Aman

```
public/uploads/foto/    (+ .htaccess deny PHP)
public/uploads/gambar/  (+ .htaccess deny PHP)
public/uploads/video/   (+ .htaccess deny PHP)
```

Setiap folder upload berisi `.htaccess` yang mematikan eksekusi PHP.

## 8. Hak Tulis

```bash
chmod -R 775 writable public/uploads
```

## 9. Verifikasi Awal

```bash
php spark ci                  # periksa versi
php spark serve               # server pengembangan
```

Halaman depan menampilkan layout kosong (beranda sementara) tanpa error.
